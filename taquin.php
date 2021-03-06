<?php
$l = $_GET["lignes"];
$c = $_GET["colonnes"];
$d = $l."x".$c;
$max = $l*$c;
function name($s)
{ // taquin/image1/*.jpg
	$a = explode(".", basename($s));
	return $a[0];
}


function isMovable($indice_blanc, $indice)
{
	//Fonction vérifiant si l'échange entre la case d'indice $indice et la case blanche est valide
	if ($indice_blanc % 3 == 1) {
		return ($indice_blanc == $indice + 3 || $indice_blanc == $indice - 3 || $indice_blanc == $indice - 1);
	} else if ($indice_blanc % 3 == 0) {
		return ($indice_blanc == $indice + 3 || $indice_blanc == $indice - 3 || $indice_blanc == $indice + 1);
	} else {
		return ($indice_blanc == $indice + 3 || $indice_blanc == $indice - 3 || $indice_blanc == $indice + 1 || $indice_blanc == $indice - 1);
	}
}

function shuffle_taquin(&$array)
{
	//Fonction mélangeant le tableau du taquin
	$indice_blanc = 8; //La case blanche est initialement à l'incide 8
	$n = 0;
	while ($n < 200) {
		$i = random_int(0, 8);
		if (isMovable($indice_blanc, $i)) {
			$temp = $array[$indice_blanc];
			$array[$indice_blanc] = $array[$i];
			$array[$i] = $temp;
			$indice_blanc = $i;
			$n++;
		}
	}
}

$taquin = $_GET["taquin"];
$array = glob("image/$d/$taquin/[1-$max].jpg");
/*shuffle_taquin($array);*/
$title = file_get_contents("image/$d/$taquin/title.txt");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Taquin</title>
	<meta name="author" content="Yassine et Enzo">
	<link type="text/css" rel="stylesheet" href="taquin.css" />
	<link rel="icon" type="image/png" href="icone.png" />
	<script type="text/javascript" src="taquin.js"></script>
</head>

<body>
<a href=<?php echo "choix.php?taquin=$taquin&lignes=$l&colonnes=$c"; ?> >  <img id="retour" src="retour.png" alt="Retour"></a>
	<h1><a href="index.php">Taquin</a></h1>
	<hr>

	<h2><?= $title ?></h2>

	<img id="image" src="image/<?php echo $d."/" ?><?= $taquin ?>/image.jpg" />

	<div id="taquin">
		<div>
			<?php
			for ($i = 0; $i < count($array); $i++) {
				if ($i > 0 && $i % 3 == 0) {
					?>
				</div>
				<div>
				<?php
			}
			?>
				<img name="<?= name($array[$i]) ?>" src="<?= $array[$i] ?>" />
			<?php
		}
		?>
		</div>
	</div>

	<div id="result"></div>

</body>

</html>