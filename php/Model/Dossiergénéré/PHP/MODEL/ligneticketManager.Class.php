<?php

class LigneticketManager 
{
	public static function add(Ligneticket $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Ligneticket (quantite,prixHt,montantTva,idTicket,idArticle) VALUES (:quantite,:prixHt,:montantTva,:idTicket,:idArticle)");
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixHt", $obj->getPrixHt());
		$q->bindValue(":montantTva", $obj->getMontantTva());
		$q->bindValue(":idTicket", $obj->getIdTicket());
		$q->bindValue(":idArticle", $obj->getIdArticle());
		$q->execute();
	}

	public static function update(Ligneticket $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Ligneticket SET idLigneTicket=:idLigneTicket,quantite=:quantite,prixHt=:prixHt,montantTva=:montantTva,idTicket=:idTicket,idArticle=:idArticle WHERE idLigneTicket=:idLigneTicket");
		$q->bindValue(":idLigneTicket", $obj->getIdLigneTicket());
		$q->bindValue(":quantite", $obj->getQuantite());
		$q->bindValue(":prixHt", $obj->getPrixHt());
		$q->bindValue(":montantTva", $obj->getMontantTva());
		$q->bindValue(":idTicket", $obj->getIdTicket());
		$q->bindValue(":idArticle", $obj->getIdArticle());
		$q->execute();
	}
	public static function delete(Ligneticket $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Ligneticket WHERE idLigneTicket=" .$obj->getIdLigneTicket());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Ligneticket WHERE idLigneTicket =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Ligneticket($results);
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
		$q = $db->query("SELECT * FROM Ligneticket");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Ligneticket($donnees);
			}
		}
		return $liste;
	}
}