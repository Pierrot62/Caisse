<?php
class PaiementsManager
{
    public static function add(Paiements $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO paiements (idModePaiement,idTicket,prixTTC) VALUES (:idModePaiement,:idTicket,:prixTTC)");
        $q->bindValue(":idModePaiement", $obj->getidModePaiement());
        $q->bindValue(":idTicket", $obj->getidTicket());
        $q->bindValue(":prixTTC", $obj->getprixTTC());
        $q->execute();
    }

    public static function update(Paiements $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE paiements SET idModePaiement= :idModePaiement, idTicket= :idTicket, prixTTC= :prixTTC WHERE idPaiement = :idPaiement");
        $q->bindValue(":idPaiement", $obj->getidPaiement());
        $q->bindValue(":idModePaiement", $obj->getidModePaiement());
        $q->bindValue(":idTicket", $obj->getidTicket());
        $q->bindValue(":prixTTC", $obj->getprixTTC());
        $q->execute();
    }

    
    public static function delete(Paiements $obj)
	{
         $db=DbConnect::getDb();
		 $db->exec("DELETE FROM Paiements WHERE idPaiement=" .$obj->getIdPaiement());
	}


    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM paiements WHERE idPaiement = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Paiements($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $client = [];
        $q = $db->query("SELECT * FROM paiements");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $client[] = new Paiements($donnees);
            }
        }
        return $client;
    }

}
