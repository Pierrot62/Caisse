<?php

class CategorieManager 
{
	public static function add(Categorie $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Categorie (libelleCategorie) VALUES (:libelleCategorie)");
		$q->bindValue(":libelleCategorie", $obj->getLibelleCategorie());
		$q->execute();
	}

	public static function update(Categorie $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Categorie SET idCategorie=:idCategorie,libelleCategorie=:libelleCategorie WHERE idCategorie=:idCategorie");
		$q->bindValue(":idCategorie", $obj->getIdCategorie());
		$q->bindValue(":libelleCategorie", $obj->getLibelleCategorie());
		$q->execute();
	}
	public static function delete(Categorie $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Categorie WHERE idCategorie=" .$obj->getIdCategorie());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Categorie WHERE idCategorie =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Categorie($results);
		}
		else
		{
			return false;
		}
	}
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Categorie");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Categorie($donnees);
			}
		}
		return $liste;
	}
}