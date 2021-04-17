<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Piratatoon</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.cartoons{
			display: flex;
			flex-wrap: wrap;

			justify-content: center;
			margin-left: auto;
			margin-right: auto;

			width: 80vw;
		}
		.cartoons div{
			display: flex;
			flex-direction: column;

			margin-right: 10px;
			margin-bottom: 10px;
			cursor: pointer;
		}
		.cartoons img{
			width: 300px;
			height: 450px;
		}
	</style>
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