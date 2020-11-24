<?php
class ModesPaiementsManager
{
    public static function add(ModesPaiements $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO modespaiements (typePaiement) VALUES (:typePaiement)");
        $q->bindValue(":typePaiement", $obj->getTypePaiement());
        $q->execute();
    }

    public static function update(ModesPaiements $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE modespaiements SET typePaiement= :typePaiement WHERE idModePaiement = :idModePaiement");
        $q->bindValue(":typePaiement", $obj->getTypePaiement());
        $q->bindValue(":idModePaiement", $obj->getIdModePaiement());
        $q->execute();
    }

    
    public static function delete(ModesPaiements $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM ModesPaiements WHERE idModePaiement=" .$obj->getIdModePaiement());
	}

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM modespaiements WHERE idModePaiement = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new ModesPaiements($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $modepaiement = [];
        $q = $db->query("SELECT * FROM modespaiements");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $modepaiement[] = new ModesPaiements($donnees);
            }
        }
        return $modepaiement;
    }
}
