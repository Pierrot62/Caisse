<?php
class Categories
{
/*******************************Attributs*******************************/
private $_idCategorie;
private $_libelleCategorie;

/******************************Accesseurs*******************************/
public function getIdCategorie()
{
 return $this->_idCategorie;
}
public function setIdCategorie(int $_idCategorie)
{
 return $this->_idCategorie = $_idCategorie;
}
public function getLibelleCategorie()
{
 return $this->_libelleCategorie;
}
public function setLibelleCategorie($_libelleCategorie)
{
 return $this->_libelleCategorie = $_libelleCategorie;
}

/*******************************Construct*******************************/
public function __construct(array $options = [])
    {
        if (!empty($options))
        {
            $this->hydrate($options);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = "set" . ucfirst($key);
            if (is_callable(([$this, $methode])))
            {
                $this->$methode($value);
            }
        }
    }

/****************************Autres méthodes****************************/
public function toString() 
{ 
 return "Categorie numero : ".$this->getIdCategorie() ." ". $this->getLibelleCategorie() ;
}
public function toStringCategorie() 
{ echo "Categorie : ";
 return $this->getLibelleCategorie()." ," ;
}

}