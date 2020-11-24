<?php

function chargerClasse($classe)
{
	if (file_exists("PHP/CONTROLLER/" . $classe . ".Class.php"))
	{
		require "PHP/CONTROLLER/" . $classe . ".Class.php";
	}
	if (file_exists("PHP/MODEL/" . $classe . ".Class.php"))
	{
		require "PHP/MODEL/" . $classe . ".Class.php";
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
