<?php
class Caisses
{
    /*******************************Attributs*******************************/
    private $_idCaisse;
    private $_nomCaisse;
    private $_totalCaisse;
    private $_date;
    private $_idUser;
    private $_User;

    /******************************Accesseurs*******************************/
    public function getIdCaisse()
    {
        return $this->_idCaisse;
    }
    public function setIdCaisse(int $_idCaisse)
    {
        return $this->_idCaisse = $_idCaisse;
    }
    public function getnomCaisse()
    {
        return $this->_nomCaisse;
    }
    public function setnomCaisse($_nomCaisse)
    {
        return $this->_nomCaisse = $_nomCaisse;
    }
    public function getTotalCaisse()
    {
        return $this->_totalCaisse;
    }
    public function setTotalCaisse(float $_totalCaisse)
    {
        return $this->_totalCaisse = $_totalCaisse;
    }
    public function getDate()
    {
        return $this->_date;
    }
    public function setDate($_date)
    {
        return $this->_date = $_date;
    }
    public function getIdUser()
    {
        return $this->_idUser;
    }
    public function setIdUser(int $_idUser)
    {
        $this->_idUser = $_idUser;
        $this->setUser(UsersManager::findById($_idUser));
    }
    public function getUser()
    {
        return $this->_User;
    }

    public function setUser(Users $_User)
    {
        $this->_User = $_User;
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
        return $this->getIdCaisse() . "\t" . $this->getnomCaisse() . "\t" . $this->getTotalCaisse() . "\t" . $this->getDate("now") . "\t" . $this->getUser()->getIdentifiant();
    }
}
