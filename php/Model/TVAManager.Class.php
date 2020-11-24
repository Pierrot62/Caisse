<?php
class TVAManager
{
    public static function add(TVA $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO tva (tauxTva) VALUES (:tauxTva)");
        $q->bindValue(":tauxTva", $obj->getTauxTva());
        $q->execute();
        $q->CloseCursor();
    }

    public static function update(TVA $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE tva SET tauxTva= :tauxTva WHERE idTva = :idTva");
        $q->bindValue(":tauxTva", $obj->getTauxTva());
        $q->bindValue(":idTva", $obj->getIdTva());
        $q->execute();
    }

<<<<<<< HEAD
    public static function delete(Tva $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Tva WHERE idTva=" .$obj->getIdTva());
    }
    
=======
    public static function delete(TVA $obj)
	{
        $db=DbConnect::getDb();
        $db->exec("DELETE FROM lignestickets WHERE idTva=" .$obj->getIdTva());
        $db->exec("DELETE FROM articles WHERE idTva=" .$obj->getIdTva());
		$db->exec("DELETE FROM tva WHERE idTva=" .$obj->getIdTva());
	}
>>>>>>> f4563b530c3f603ccef1ba650674fd7157991f61
    public static function findById($id)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
        $q = $db->prepare("SELECT * FROM tva WHERE idTva = :id");

        // Assignation des valeurs .
        $q->bindValue(":id", $id);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $q->CloseCursor();
        if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
            return new TVA();
        } else {
            return new TVA($donnees);
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $tva = [];
        $q = $db->query("SELECT * FROM tva");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $tva[] = new TVA($donnees);
            }
        }
        return $tva;
    }

}
