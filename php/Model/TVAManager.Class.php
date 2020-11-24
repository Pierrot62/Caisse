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

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM tva WHERE idTva = $id");
    }
    public static function getById($id)
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
