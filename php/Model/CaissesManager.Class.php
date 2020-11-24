<?php
class CaissesManager
{
    public static function add(Caisses $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO caisses (nomCaisse,totalCaisse,date,idUser) VALUES (:nomCaisse,:totalCaisse,:date,:idUser)");
        $q->bindValue(":nomCaisse", $obj->getnomCaisse());
        $q->bindValue(":totalCaisse", $obj->getTotalCaisse());
        $q->bindValue(":date", $obj->getDate());
        $q->bindValue(":idUser", $obj->getIdUser());
        $q->execute();
        $q->CloseCursor();
    }

    public static function update(Caisses $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE caisses SET nomCaisse= :nomCaisse, totalCaisse= :totalCaisse, date= :date, idUser= :idUser WHERE idCaisse = :idCaisse");
        $q->bindValue(":nomCaisse", $obj->getnomCaisse());
        $q->bindValue(":totalCaisse", $obj->getTotalCaisse());
        $q->bindValue(":date", $obj->getDate());
        $q->bindValue(":idUser", $obj->getIdUser());
        $q->bindValue(":idCaisse", $obj->getIdCaisse());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM caisses WHERE idCaisse = $id");
    }

    public static function get($caisse)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
        $q = $db->prepare('SELECT nomCaisse FROM caisses WHERE nomCaisse = :nomCaisse');

        // Assignation des valeurs .
        $q->bindValue(':nomCaisse', $caisse);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $q->CloseCursor();
        if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
            return new Caisses();
        } else {
            return new Caisses($donnees);
        }
    }
    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM caisses WHERE idCaisse = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Caisses($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $caisse = [];
        $q = $db->query("SELECT * FROM caisses");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $caisse[] = new Caisses($donnees);
            }
        }
        return $caisse;
    }

}
