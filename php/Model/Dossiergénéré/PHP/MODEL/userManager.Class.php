<?php

class UserManager 
{
	public static function add(User $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO User (identifiant,motDePasse,role) VALUES (:identifiant,:motDePasse,:role)");
		$q->bindValue(":identifiant", $obj->getIdentifiant());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":role", $obj->getRole());
		$q->execute();
	}

	public static function update(User $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE User SET idUser=:idUser,identifiant=:identifiant,motDePasse=:motDePasse,role=:role WHERE idUser=:idUser");
		$q->bindValue(":idUser", $obj->getIdUser());
		$q->bindValue(":identifiant", $obj->getIdentifiant());
		$q->bindValue(":motDePasse", $obj->getMotDePasse());
		$q->bindValue(":role", $obj->getRole());
		$q->execute();
	}
	public static function delete(User $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM User WHERE idUser=" .$obj->getIdUser());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM User WHERE idUser =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new User($results);
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
		$q = $db->query("SELECT * FROM User");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new User($donnees);
			}
		}
		return $liste;
	}
}