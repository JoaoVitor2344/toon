<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Episodios</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	// set_time_limit(10);

	$c = $_GET['cartoon']; // cartoon
	$s = $_GET['season']; // season

	$cartoon = array('adventure' => 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Adventure_Time',
					'steven' => 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Steven_Universe',
					'gravity' => 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Gravity_Falls',
					'infinity' => 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Infinity_Train',
					'craig' => 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Craig_of_the_Creek');

	$dados = file_get_contents($cartoon[$_GET['cartoon']]);
	$start = explode('<span class="mw-headline" id="'.$s, $dados);
	$end = explode('delimiter', $start[1]);

	$string = $end[0];

	// Quantidade de episodios por temporada
	$eps = 0;

	for($i = 1; $i <= $s; $i++) 
	{ 
		if($c == "steven" || $c == "adventure") $pos = substr($dados, stripos($dados, '<td><a href="#'.$i.'.ª_temporada'));
		// if($c == 'adventure') $pos = substr($dados, stripos($dados, '<td><a href="#'.$i.'.ª_temporada'));
		if($c == 'gravity') $pos = substr($dados, stripos($dados, '1"><a href="#'.$i.'.ª_Temporada'));

		$start = strstr($pos, '</td>');
		$start = strstr($start, '<td');
		$end = strstr($start, '</td>', true);

		$dados = strstr($start, '<td', false);

		if($c == "gravity") $season = substr($end, -2);
		else $season = substr($end, 4);

		$season = intval($season);

		$eps += $season;
	}

	$eps -= $season;

	echo '<div class="eps">';

	for($i = 1; $i <= $season; $i++)
	{ 
		// Imagem
		if($s < 10) 
		{
			if($i < 10) $filename = 'S0'.$s.'E0'.$i.'.jpeg';
			else 		$filename = 'S0'.$s.'E'.$i.'.jpeg';
		}
		else
		{
			if($i < 10) $filename = 'S'.$s.'E0'.$i.'.jpeg';
			else 		$filename = 'S'.$s.'E'.$i.'.jpeg';
		}

		$filename = 'card/' . $c . '/' . $filename;

		if(file_exists($filename)) 
		{
			$img = '<img src='.$filename.'>';

			$eps += 1;

			// Temporada e Episodio
			$pos_desc = substr($string, stripos($string, 'id="'.$s.'.ª_Temporada'));
			$desc_start = strstr($pos_desc, '<td id="ep'.$eps);

			// Nome do Ep
			$nome_start = strstr($desc_start, '<b>');
			$nome = strstr($nome_start, '</b>', true);
			
			/*
			
			steven = colspan="6">
			adventure = colspan="8">
			gravity = colspan="8"> (nao tenho certeza)

			*/

			// Descrisão 
			if($c == "steven")
			{
				$desc_start = strstr($desc_start, 'colspan="6">');
			}
			else
			{
				$desc_start = strstr($desc_start, 'colspan="8">');
			}

			$desc = strstr($desc_start, '&#160;', true);
			$desc = substr($desc, 12);

			$string = strstr($desc_start, '</td></tr>', false);
			
			if($s == 7) // Estaca Zero
			{
				if($i == 6)
				{
					echo '
					</div>
					<hr>
					<div class="MiniSerie">
						<h1>Estaca Zero</h1>
						<div class="eps">';
				}
				else if($i == 14)
				{
					echo ' 
						</div>
					</div>
					<hr>
					<div class="eps">';
				}
			}	
			if($s == 8) // Ilhas
			{
				if($i == 20)
				{
					echo '
					</div>
					<hr>
					<div class="MiniSerie">
						<h1>Ilhas</h1>
						<div class="eps">';
				}
				else if($i == 28)
				{
					echo ' 
						</div>
					</div>
					<hr>
					<div class="eps">';
				}
			}
			if($s == 9) // Elementos
			{
				if($i == 2)
				{
					echo '
					</div>
					<hr>
					<div class="MiniSerie">
						<h1>Elementos</h1>
						<div class="eps">';
				}
				else if($i == 10)
				{
					echo ' 
						</div>
					</div>
					<hr>
					<div class="eps">';
				}
			}

			if($i == $season) $class = "ep-end";
			else $class = "ep";

			echo '
				<div class="'.$class.'">
					<div class="left">
						'.$img.'
						<div>
							<a>'.$eps.'</a> 
							 |  
							<a>'.$i.'</a>
							'.$nome.'.</b>
						</div>
					</div>
					<div class="right">
						<a>'.$desc.'</a>
					</div>
				</div>';
		}
		else
		{
			$eps += 1;
		}
	}

	echo '</div>';

	?>
</body>
</html>