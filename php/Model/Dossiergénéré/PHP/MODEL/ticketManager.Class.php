<?php

class TicketManager 
{
	public static function add(Ticket $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Ticket (prixHT,date,montantTVA) VALUES (:prixHT,:date,:montantTVA)");
		$q->bindValue(":prixHT", $obj->getPrixHT());
		$q->bindValue(":date", $obj->getDate());
		$q->bindValue(":montantTVA", $obj->getMontantTVA());
		$q->execute();
	}

	public static function update(Ticket $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Ticket SET idTicket=:idTicket,prixHT=:prixHT,date=:date,montantTVA=:montantTVA WHERE idTicket=:idTicket");
		$q->bindValue(":idTicket", $obj->getIdTicket());
		$q->bindValue(":prixHT", $obj->getPrixHT());
		$q->bindValue(":date", $obj->getDate());
		$q->bindValue(":montantTVA", $obj->getMontantTVA());
		$q->execute();
	}
	public static function delete(Ticket $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Ticket WHERE idTicket=" .$obj->getIdTicket());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Ticket WHERE idTicket =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Ticket($results);
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
		$q = $db->query("SELECT * FROM Ticket");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Ticket($donnees);
			}
		}
		return $liste;
	}
}