<?php

class CaisseManager 
{
	public static function add(Caisse $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Caisse (nomCaisse,totalCaisse,date,idUser) VALUES (:nomCaisse,:totalCaisse,:date,:idUser)");
		$q->bindValue(":nomCaisse", $obj->getNomCaisse());
		$q->bindValue(":totalCaisse", $obj->getTotalCaisse());
		$q->bindValue(":date", $obj->getDate());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}

	public static function update(Caisse $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Caisse SET idCaisse=:idCaisse,nomCaisse=:nomCaisse,totalCaisse=:totalCaisse,date=:date,idUser=:idUser WHERE idCaisse=:idCaisse");
		$q->bindValue(":idCaisse", $obj->getIdCaisse());
		$q->bindValue(":nomCaisse", $obj->getNomCaisse());
		$q->bindValue(":totalCaisse", $obj->getTotalCaisse());
		$q->bindValue(":date", $obj->getDate());
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->execute();
	}
	public static function delete(Caisse $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Caisse WHERE idCaisse=" .$obj->getIdCaisse());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Caisse WHERE idCaisse =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Caisse($results);
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
		$q = $db->query("SELECT * FROM Caisse");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Caisse($donnees);
			}
		}
		return $liste;
	}
}