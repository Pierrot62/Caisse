<?php
class TicketsManager
{
    public static function add(Tickets $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO tickets (prixht,date,montantTVA) VALUES (:prixht,:date,:montantTVA)");
        $q->bindValue(":prixht", $obj->getprixHT());
        $q->bindValue(":date", $obj->getdate()->format("j/m/y"));
        $q->bindValue(":montantTVA", $obj->getmontantTVA());
        $q->execute();
    }

    public static function update(Tickets $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE tickets SET prixht= :prixht, date= :date, montantTVA= :montantTVA WHERE idTicket = :idTicket");
        $q->bindValue(":idTicket", $obj->getidTicket());
        $q->bindValue(":prixht", $obj->getprixHT());
        $q->bindValue(":date", $obj->getdate());
        $q->bindValue(":montantTVA", $obj->getmontantTVA());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM tickets WHERE idTicket = $id");
    }


    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM tickets WHERE idTicket = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Tickets($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $ticket = [];
        $q = $db->query("SELECT * FROM tickets");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $ticket[] = new Tickets($donnees);
            }
        }
        return $ticket;
    }

}
