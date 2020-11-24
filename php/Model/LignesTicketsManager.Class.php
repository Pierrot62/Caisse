<?php
class LignesTicketsManager
{
    public static function add(LignesTickets $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO lignesTickets (quantite,prixHt,montantTVA,idTicket,idArticle) VALUES (:quantite,:prixHt,:montantTVA,:idTicket,:idArticle)");
        $q->bindValue(":quantite", $obj->getquantite());
        $q->bindValue(":prixHt", $obj->getprixHt());
        $q->bindValue(":montantTVA", $obj->getmontantTVA());
        $q->bindValue(":idTicket", $obj->getidTicket());
        $q->bindValue(":idArticle", $obj->getidArticle());
        $q->execute();
    }

    public static function update(LignesTickets $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE lignestickets SET quantite= :quantite, prixHt= :prixHt, montantTVA= :montantTVA, idTicket= :idTicket, idArticle= :idArticle WHERE idLigneTicket = :idLigneTicket");
        $q->bindValue(":idLigneTicket", $obj->getidLigneticket());
        $q->bindValue(":quantite", $obj->getquantite());
        $q->bindValue(":prixHt", $obj->getprixHt());
        $q->bindValue(":montantTVA", $obj->getmontantTVA());
        $q->bindValue(":idTicket", $obj->getidTicket());
        $q->bindValue(":idArticle", $obj->getidArticle());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM lignesTickets WHERE idLigneTicket = $id");
    }


    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM LignesTickets WHERE idLigneTicket = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new LignesTickets($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $client = [];
        $q = $db->query("SELECT * FROM LignesTickets");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $client[] = new LignesTickets($donnees);
            }
        }
        return $client;
    }

    public static function getByTicket($idTicket){
        $db = DbConnect::getDb();
        $idTicket = (int) $idTicket;
        $q = $db->query("SELECT * FROM LignesTickets WHERE idTicket = $idTicket");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new LignesTickets($results);
        } else {
            return false;
        }
    }

    public static function getByDate($dateFin){
        $db = DbConnect::getDb();
        $q = $db->query("SELECT * FROM Tickets WHERE date = $dateFin");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Tickets($results);
        } else {
            return false;
        }
    }
}
