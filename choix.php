<?php
$l = $_GET["lignes"];
$c = $_GET["colonnes"];
$d = $l."x".$c;
$array = glob("image/$d/*");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Taquin</title>
	<meta name="author" content="Yass et Enzo">
	<link rel="icon" type="image/png" href="icone.png" />
	<link type="text/css" rel="stylesheet" href="taquin.css" />
</head>

<body>
	<h1>Le jeu de taquin</h1>
	<hr>

	<h2>Choisissez votre taquin !</h2>

	<?php
	foreach ($array as $taquin) {
		?>
		<div class="small">
			<a href="taquin.php?taquin=<?= basename($taquin) ?>&ligne=<?= $l ?>&colonne=<?= $c ?>">
				<img src="<?= "$taquin/image.jpg" ?>" alt="Image" />
			</a>
			<h3><?= file_get_contents("$taquin/title.txt") ?></h3>
		</div>

	<?php } ?>

	

</body>


</html>