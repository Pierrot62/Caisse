<?php
// Il s'agit de la classe de management de la classe User.
// Ici seul 2 �thodes sont impl�ment�es
class UsersManager
{

    public static function add(Users $obj)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Préparation de la requête d'insertion.
        $q = $db->prepare("INSERT INTO users (identifiant, motDePasse, Role) VALUES (:identifiant, :motDePasse, :role)");

        // Assignation des valeurs .
        $q->bindValue(':identifiant', $obj->getidentifiant());
        $q->bindValue(':motDePasse', $obj->getmotDePasse());
        $q->bindValue(':role', $obj->getRole());

        // Exécution de la requête.
        $q->execute();
        $q->CloseCursor();
    }

    public static function update(Users $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE users SET identifiant= :identifiant, motDePasse= :motDePasse, role= :role WHERE idUser= :idUser");
        $q->bindValue(":idUser", $obj->getIdUser());
        $q->bindValue(":identifiant", $obj->getIdentifiant());
        $q->bindValue(":motDePasse", $obj->getMotDePasse());
        $q->bindValue(":role", $obj->getRole());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM users WHERE idUser= $id");
    }

    public static function get($identifiant)
    {
        $db = DbConnect::getDb(); // Instance de PDO.
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
        $q = $db->prepare('SELECT identifiant, motDePasse, role FROM users WHERE identifiant = :identifiant');

        // Assignation des valeurs .
        $q->bindValue(':identifiant', $identifiant);
        $q->execute();
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        $q->CloseCursor();
        if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
            return new Users();
        } else {
            return new Users($donnees);
        }
    }
    public static function findById($id)
    {
        $db = DbConnect::getDb();
        $id = (int) $id;
        $q = $db->query("SELECT * FROM users WHERE idUser = $id");
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false) {
            return new Users($results);
        } else {
            return false;
        }
    }
//     public static function get($role)
//     {
//         $db = DbConnect::getDb(); // Instance de PDO.
//         // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
//         $q = $db->prepare('SELECT identifiant, motDePasse, Role FROM user WHERE role = :role');

//         // Assignation des valeurs .
//         $q->bindValue(':role', $role);
//         $q->execute();
//         $donnees = $q->fetch(PDO::FETCH_ASSOC);
//         $q->CloseCursor();
//         if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
//             return new User();
//         } else {
//             return new User($donnees);
//         }
//     }
public static function getList()
{
    $db = DbConnect::getDb();
    $user= [];
    $q = $db->query("SELECT * FROM users");
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
        if ($donnees != false) {
            $user[] = new Users($donnees);
        }
    }
    return $user;
}
}
