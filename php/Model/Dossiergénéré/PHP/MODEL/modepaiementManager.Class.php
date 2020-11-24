<?php

class ModepaiementManager 
{
	public static function add(Modepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Modepaiement (typePaiement) VALUES (:typePaiement)");
		$q->bindValue(":typePaiement", $obj->getTypePaiement());
		$q->execute();
	}

	public static function update(Modepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Modepaiement SET idModePaiement=:idModePaiement,typePaiement=:typePaiement WHERE idModePaiement=:idModePaiement");
		$q->bindValue(":idModePaiement", $obj->getIdModePaiement());
		$q->bindValue(":typePaiement", $obj->getTypePaiement());
		$q->execute();
	}
	public static function delete(Modepaiement $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Modepaiement WHERE idModePaiement=" .$obj->getIdModePaiement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Modepaiement WHERE idModePaiement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Modepaiement($results);
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
		$q = $db->query("SELECT * FROM Modepaiement");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Modepaiement($donnees);
			}
		}
		return $liste;
	}
}