<?php
class Articles
{
    /*******************************Attributs*******************************/
    private $_idArticle;
    private $_libelleArticle;
    private $_prixHT;
    private $_codeBarre;
    private $_idCategorie;
    private $_idTVA;
    private $_Categorie;
    private $_TVA;

    /******************************Accesseurs*******************************/
    public function getIdArticle()
    {
        return $this->_idArticle;
    }

    public function setIdArticle(int $_idArticle)
    {
        $this->_idArticle = $_idArticle;

    }

    public function getLibelleArticle()
    {
        return $this->_libelleArticle;
    }

    public function setLibelleArticle($_libelleArticle)
    {
        $this->_libelleArticle = $_libelleArticle;

    }

    public function getPrixHT()
    {
        return $this->_prixHT;
    }

    public function setPrixHT(float $_prixHT)
    {
        $this->_prixHT = $_prixHT;

    }

    public function getCodeBarre()
    {
        return $this->_codeBarre;
    }

    public function setCodeBarre($_codeBarre)
    {
        $this->_codeBarre = $_codeBarre;

    }

    public function getIdCategorie()
    {
        return $this->_idCategorie;
    }

    public function setIdCategorie(int $_idCategorie)
    {
        $this->_idCategorie = $_idCategorie;
        $this->setCategorie(CategoriesManager::findById($_idCategorie));

    }

    public function getIdTVA()
    {
        return $this->_idTVA;
    }

    public function setIdTVA(int $_idTVA)
    {
        $this->_idTVA = $_idTVA;
        $this->setTVA(TVAManager::getById($_idTVA));

    }
    public function getCategorie()
    {
        return $this->_Categorie;
    }


    public function setCategorie(Categories $_Categorie)
    {
        $this->_Categorie = $_Categorie;

    }

    public function getTVA()
    {
        return $this->_TVA;
    }

    public function setTVA(TVA $_TVA)
    {
        $this->_TVA = $_TVA;

    }

    /*******************************Construct*******************************/
    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = "set" . ucfirst($key);
            if (is_callable(([$this, $methode]))) {
                $this->$methode($value);
            }
        }
    }

    /****************************Autres méthodes****************************/
    public function toString()
    {
        return $this->getIdArticle() . $this->getLibelleArticle() . $this->getPrixHT() . $this->getCategorie()->getLibelleCategorie() . $this->getTVA()->getTauxTva() . $this->getCodeBarre();
    }

    public static function compareTo($obj1, $obj2)
    {
        if ($obj1->getLibelleArticle() > $obj2->getLibelleArticle())
        {
            return 1;
        }
        elseif ($obj1->getLibelleArticle() < $obj2->getLibelleArticle())
        {
            return -1;
        }
        elseif ($obj1->getPrixHT() > $obj2->getPrixHT())
        {
            return 1;
        }
        elseif ($obj1->getPrixHT() < $obj2->getPrixHT())
        {
            return -1;
        }
        else
        {
            return 0;
        }
    }    
  
    static public function calculTTC($prixHt, $montantTva, $quantite)
    {
        $total = ($prixHt+($prixHt*$montantTva))*$quantite;
        return $total;
    }
    

   
}
