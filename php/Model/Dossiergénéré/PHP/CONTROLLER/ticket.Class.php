<?php

class Ticket 
{

	/*****************Attributs***************** */

	private $_idTicket;
	private $_prixHT;
	private $_date;
	private $_montantTVA;

	/***************** Accesseurs ***************** */


	public function getIdTicket()
	{
		return $this->_idTicket;
	}

	public function setIdTicket($idTicket)
	{
		$this->_idTicket=$idTicket;
	}

	public function getPrixHT()
	{
		return $this->_prixHT;
	}

	public function setPrixHT($prixHT)
	{
		$this->_prixHT=$prixHT;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setDate($date)
	{
		$this->_date=$date;
	}

	public function getMontantTVA()
	{
		return $this->_montantTVA;
	}

	public function setMontantTVA($montantTVA)
	{
		$this->_montantTVA=$montantTVA;
	}

	/*****************Constructeur***************** */

	public function __construct(array $options = [])
	{
 		if (!empty($options)) // empty : renvoi vrai si le tableau est vide
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
 		foreach ($data as $key => $value)
		{
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
			if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
			{
				$this->$methode($value);
			}
		}
	}

	/*****************Autres Méthodes***************** */

	/**
	* Transforme l'objet en chaine de caractères
	*
	* @return String
	*/
	public function toString()
	{
		return "IdTicket : ".$this->getIdTicket()."PrixHT : ".$this->getPrixHT()."Date : ".$this->getDate()."MontantTVA : ".$this->getMontantTVA()."\n";
	}


	
	/* Renvoit Vrai si lobjet en paramètre est égal 
	* à l'objet appelant
	*
	* @param [type] $obj
	* @return bool
	*/
	public function equalsTo($obj)
	{
		return;
	}


	/**
	* Compare l'objet à un autre
	* Renvoi 1 si le 1er est >
	*        0 si ils sont égaux
	*      - 1 si le 1er est <
	*
	* @param [type] $obj1
	* @param [type] $obj2
	* @return Integer
	*/
	public function compareTo($obj)
	{
		return;
	}
}