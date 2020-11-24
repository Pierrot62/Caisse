<?php
class ArticlesManager
{
    public static function add(Articles $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO articles (libelleArticle, prixHt, codeBarre, idCategorie, idTva) VALUES (:libelleArticle, :prixHt, :codeBarre, :idCategorie, :idTva)");
        $q->bindValue(":libelleArticle", $obj->getLibelleArticle());
        $q->bindValue(":prixHt", $obj->getPrixHT());
		$q->bindValue(":codeBarre", $obj->getCodeBarre());
		$q->bindValue(":idCategorie", $obj->getIdCategorie());
		$q->bindValue(":idTva", $obj->getIdTVA());
        $q->execute();
    }

    public static function update(Articles $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE articles SET  libelleArticle=:libelleArticle, prixHT=:prixHT, codeBarre=:codeBarre, idCategorie=:idCategorie, idTVA=:idTVA WHERE idArticle=:idArticle");
        $q->bindValue(":idArticle", $obj->getIdArticle());
        $q->bindValue(":libelleArticle", $obj->getLibelleArticle());
        $q->bindValue(":prixHT", $obj->getPrixHT());
        $q->bindValue(":codeBarre", $obj->getCodeBarre());
        $q->bindValue(":idCategorie", $obj->getIdCategorie());
        $q->bindValue(":idTVA", $obj->getIdTVA());
        $q->execute();
    }

    public static function delete($id)
    {
        $db = DbConnect::getDb();
        $db->exec("DELETE FROM articles WHERE idArticle= $id");
    }

    static public function findById($id) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idArticle, libelleArticle, prixHT, codeBarre, idCategorie, idTVA  FROM articles WHERE idArticle = :idArticle' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':idArticle', $id );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new Articles ();
		} else {
			return new Articles ( $donnees );
		}
    }

    static public function getlib($libelle) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idArticle, libelleArticle, prixHT, codeBarre, idCategorie, idTVA  FROM articles WHERE libelleArticle = :libelleArticle' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':libelleArticle', $libelle );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new Articles ();
		} else {
			return new Articles ( $donnees );
		}
    }
    
    static public function getcodeB($codeBarre) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idArticle, libelleArticle, prixHT, codeBarre, idCategorie, idTVA  FROM articles WHERE codeBarre = :codeBarre' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':codeBarre', $codeBarre );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new Articles ();
		} else {
			return new Articles ( $donnees );
		}
    }
    
    static public function getCateg($idCategorie) {
		$db = DbConnect::getDb (); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personne
		$q = $db->prepare ( 'SELECT idArticle, libelleArticle, prixHT, codeBarre, idCategorie, idTVA  FROM articles WHERE codeBarre = :codeBarre' );
		
		// Assignation des valeurs .
		$q->bindValue ( ':idCategorie', $idCategorie );
		$q->execute ();
		$donnees = $q->fetch ( PDO::FETCH_ASSOC );
		$q->CloseCursor ();
		if ($donnees == false) { // Si l'utilisateur n'existe pas, on renvoi un objet vide
			return new Articles ();
		} else {
			return new Articles ( $donnees );
		}
	}

    public static function getList()
    {
        $db = DbConnect::getDb();
        $article = [];
        $q = $db->query("SELECT * FROM articles");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $article[] = new Articles($donnees);
            }
        }
        return $article;
    }

}