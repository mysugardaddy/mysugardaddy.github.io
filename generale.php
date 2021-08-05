<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<?php $_SESSION['voie']="generale";?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="main.css">
	<title>Simulateur Bac - Saisie des spécialités</title>
</head>
<body>
<h1>choisissez vos trois spécialités.</h1>
<form method="post" action="abandon.php">
	<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=specialites;charset=utf8', 'root', 'root');
	$query = $bdd->query('SELECT * FROM spes ORDER BY nom');
	while ($spe = $query->fetch()) 
	{
	?>
	<input class="checkbox" type="checkbox" name="<?php echo $spe[id]?>" id="<?php $spe[id]?>"> <label class="checklist" for="<?php echo $spe[id]?>"><?php echo $spe[nom]?></label><br>
	<?php
	}
	?>
	<input class="submit" type="submit" value="Valider" /> <br>
	<?php 
	if (isset($_GET[error])) 
	{
		if ($_GET[error]="nbspe") 
		{
			echo "veuillez choisir 3 spécialités";
		}
	}

	?>
</form>
</body>
</html>
