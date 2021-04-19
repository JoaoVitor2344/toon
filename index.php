<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Piratatoon</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div class="cartoons">
		<?php
		$cartoons = glob('cartoons/*.jpg');

		foreach ($cartoons as $key) 
		{
			$img = substr($key, 9);
			$cartoon = substr($img, 0, -4);

			echo '
			<div>
				<a href="season.php?cartoon='.$cartoon.'"><img src="cartoons/'.$img.'"></a>
			</div>';
		}

		?>
	</div>
</body>
</html>