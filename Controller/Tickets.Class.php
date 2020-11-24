<?php
class Tickets
{
    /*******************************Attributs*******************************/
    private $_idTicket;
    private $_prixHT;
    private $_date;
    private $_montantTVA;

    /*******************************Accesseurs*******************************/

    public function getidTicket()
    {
        return $this->_idTicket;
    }
    public function setidTicket(int $_idTicket)
    {
        $this->_idTicket = $_idTicket;

        return $this;
    }
    public function getprixHT()
    {
        return $this->_prixHT;
    }
    public function setprixHT(float $_prixHT)
    {
        $this->_prixHT = $_prixHT;

        return $this;
    }
    public function getdate()
    {
        return $this->_date;
    }
    public function setdate($_date)
    {
        $this->_date = $_date;

        return $this;
    }
    public function getmontantTVA()
    {
        return $this->_montantTVA;
    }
    public function setmontantTVA(float $_montantTVA)
    {
        $this->_montantTVA = $_montantTVA;

        return $this;
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
        return $this->getidTicket()."\n" . $this->getprixHT()."\n" . $this->getdate()."\n" . $this->getmontantTVA();
    }

    public static function compareTo($obj1, $obj2)
    {
        if ($obj1->getdate() > $obj2->getdate()) {
            return 1;
        } elseif ($obj1->getdate() < $obj2->getdate()) {
            return -1;
        } else {
            return 0;
        }
    }

    static public function calculTTC($prixHt, $montantTva, $quantite)
    {
        $total = ($prixHt+($prixHt*$montantTva))*$quantite;
        return $total;
    }

    
}
