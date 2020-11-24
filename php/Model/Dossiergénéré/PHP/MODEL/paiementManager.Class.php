<?php

class PaiementManager 
{
	public static function add(Paiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Paiement (idModePaiement,idTicket,prixTTC) VALUES (:idModePaiement,:idTicket,:prixTTC)");
		$q->bindValue(":idModePaiement", $obj->getIdModePaiement());
		$q->bindValue(":idTicket", $obj->getIdTicket());
		$q->bindValue(":prixTTC", $obj->getPrixTTC());
		$q->execute();
	}

	public static function update(Paiement $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Paiement SET idPaiement=:idPaiement,idModePaiement=:idModePaiement,idTicket=:idTicket,prixTTC=:prixTTC WHERE idPaiement=:idPaiement");
		$q->bindValue(":idPaiement", $obj->getIdPaiement());
		$q->bindValue(":idModePaiement", $obj->getIdModePaiement());
		$q->bindValue(":idTicket", $obj->getIdTicket());
		$q->bindValue(":prixTTC", $obj->getPrixTTC());
		$q->execute();
	}
	public static function delete(Paiement $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Paiement WHERE idPaiement=" .$obj->getIdPaiement());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Paiement WHERE idPaiement =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Paiement($results);
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
		$q = $db->query("SELECT * FROM Paiement");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Paiement($donnees);
			}
		}
		return $liste;
	}
}