<?php 
$season = array('adventure' => 10,
				'steven' => 6,
				'gravity' => 2,
				'infinity' => 3,
				'craig' => 3);

$cartoon = $_GET['cartoon'];
?>

<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css.css">	
	<style type="text/css">
		<?php
		if($season[$cartoon] <= 6)
		{
			echo 
			'.seasons img{
				width: 300px;
				height: 400px;	
			}';
		}
		else
		{
			echo 
			'.seasons img{
				width: 200px;
				height: 300px;	
			}';
		}
		?>
	</style>
</head>
<body>
	<div class="seasons">
		<?php 
		for($i = 1; $i <= $season[$cartoon]; $i++)
		{
			echo
			'<div>
				<a href="eps.php?cartoon='.$cartoon.'&season='.$i.'">
					<img src="season/'.$cartoon.'/season_'.$i.'.png">
					<h3>Temporada '.$i.'</h3>
				</a>
			</div>';   
		}
		?>
	</div>
	<a href="https://imgur.com/a/oPhjP">Title Card</a>
	<br>
	<a href="https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_Adventure_Time" target="_blank">Titulo e Descrisão</a>
</body>
</html>