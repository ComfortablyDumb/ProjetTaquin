<?php

function name($s) { # taquin/image1/*.jpg
		$a = explode(".",basename($s));
		return $a[0];
	}
	
	$taquin = $_GET["taquin"];
	$array = glob("image/$taquin/[1-9].jpg");
	shuffle($array);
	$title = file_get_contents("image/$taquin/title.txt");
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <title>Taquin</title>
	<meta name="author" content="Yassine et Enzo">
    <link type="text/css" rel="stylesheet" href="taquin.css" />
    <script type="text/javascript" src="taquin.js"></script>
  </head>

<body>
	<h1>Taquin</h1>
	<hr>
	
<h2><?= $title ?></h2>

<img id="image" src="image/<?= $taquin ?>/image.jpg" />

<div id="taquin">
	<div>
<?php
	for ( $i = 0; $i < count($array); $i++ ) {
		if ( $i > 0 && $i % 3 == 0 ) {
?>
	</div><div>
<?php
		}
?>
      <img name="<?= name($array[$i]) ?>" src="<?= $array[$i] ?>" />
<?php
	}
?>
	</div>
</div>

<div id="result">Bravo vous avez terminé le taquin !!</div>

</body>
</html>