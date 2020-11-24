<?php

function chargerClasse($classe)
{
	if (file_exists("../CONTROLLER/" . $classe . ".Class.php"))
	{
		require "../CONTROLLER/" . $classe . ".Class.php";
	}
	if (file_exists("../MODEL/" . $classe . ".Class.php"))
	{
		require "../MODEL/" . $classe . ".Class.php";
	}
}
spl_autoload_register("chargerClasse");
DbConnect::init()
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php echo $titre ?></title>
	<link rel="stylesheet" href="./CSS/Style.css">
	<script src="./JS/Script.js"></script>
</head>
<body>
