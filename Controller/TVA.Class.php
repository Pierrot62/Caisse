<?php
class TVA
{
/*******************************Attributs*******************************/
private $_idTva;
private $_tauxTva;

/******************************Accesseurs*******************************/
public function getIdTva()
{
 return $this->_idTva;
}
public function setIdTva(int $_idTva)
{
 return $this->_idTva = $_idTva;
}
public function getTauxTva()
{
 return $this->_tauxTva;
}
public function setTauxTva(float $_tauxTva)
{
 return $this->_tauxTva = $_tauxTva;
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
 return $this->getIdTva()."\t" . $this->getTauxTva()."\t"  ;
}

}