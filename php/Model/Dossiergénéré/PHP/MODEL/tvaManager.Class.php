<?php

class TvaManager 
{
	public static function add(Tva $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Tva (tauxTva) VALUES (:tauxTva)");
		$q->bindValue(":tauxTva", $obj->getTauxTva());
		$q->execute();
	}

	public static function update(Tva $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Tva SET idTva=:idTva,tauxTva=:tauxTva WHERE idTva=:idTva");
		$q->bindValue(":idTva", $obj->getIdTva());
		$q->bindValue(":tauxTva", $obj->getTauxTva());
		$q->execute();
	}
	public static function delete(Tva $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Tva WHERE idTva=" .$obj->getIdTva());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Tva WHERE idTva =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Tva($results);
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
		$q = $db->query("SELECT * FROM Tva");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Tva($donnees);
			}
		}
		return $liste;
	}
}