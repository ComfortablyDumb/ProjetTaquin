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

	<h2>Choisissez la taille de votre taquin</h2>

	<form action="choix.php" method="get">

		<div class="menus">
			Nombre lignes:
			<select name="lignes">
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
			<br>
			Nombre colonnes:
			<select name="colonnes">
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</div>
		<br>
		<input type="submit" value="Envoyer" />
	</form>

</body>


</html>