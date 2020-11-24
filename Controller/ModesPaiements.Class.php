<?php
class ModesPaiements
{
/*******************************Attributs*******************************/
    private $_idModePaiement;
    private $_typePaiement;

/******************************Accesseurs*******************************/
    public function getIdModePaiement()
    {
        return $this->_idModePaiement;
    }
    public function setIdModePaiement(int $_idModePaiement)
    {
        return $this->_idModePaiement = $_idModePaiement;
    }
    public function getTypePaiement()
    {
        return $this->_typePaiement;
    }
    public function setTypePaiement($_typePaiement)
    {
        return $this->_typePaiement = $_typePaiement;
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
        return $this->getIdModePaiement() . "\n" . $this->getTypePaiement() . "\n";
    }

}
