<?php
class CategoriesManager
{
    public static function add(Categories $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO categorie (libelleCategorie) VALUES (:libelleCategorie)");
        $q->bindValue(":libelleCategorie", $obj->getLibelleCategorie());
        $q->execute();
    }

    public static function update(Categories $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE categorie SET libelleCategorie= :libelleCategorie WHERE idCategorie = :idCategorie");
        $q->bindValue(":libelleCategorie", $obj->getLibelleCategorie());
        $q->bindValue(":idCategorie", $obj->getIdCategorie());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM categorie WHERE idCategorie = $id");
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM categorie WHERE idCategorie = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Categories($results);
        } else {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $categorie = [];
        $q = $db->query("SELECT * FROM categorie");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $categorie[] = new Categories($donnees);
            }
        }
        return $categorie;
    }



    public static function findByLibellecategorie($libelleCategorie)
    {
        $db = DbConnect::getDb();
        $libelleCategorie = $libelleCategorie;
        $q = $db->query("SELECT * FROM categorie WHERE libelleCategorie = $libelleCategorie");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Categories($results);
        } else {
            return false;
        }
    }

    public static function getListCategorie()
    {
        $db = DbConnect::getDb();
        $categorie = [];
        $q = $db->query("SELECT libelleCategorie FROM categorie");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees != false) {
                $categorie[] = new Categories($donnees);
            }
        }
        return $categorie;
    }
}
