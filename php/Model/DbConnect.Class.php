<?php

// Ce fichier sera inclus � chaque fois que l'on aura besoin d'acceder � la base de donn�es.
// Il permet d'ouvrir la connection � la base de donn�es
class DbConnect{
	private static $db;

	public static function getDb()
	{
		return DbConnect::$db;
	}

	public static function init()
	{
		try {
			self::$db= new PDO ( 'mysql:host=localhost;dbname=caisseenregistreuse;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur :'. $e->getMessage());
		}
	}
}