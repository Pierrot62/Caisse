<?php

class Caisse 
{

	/*****************Attributs***************** */

	private $_idCaisse;
	private $_nomCaisse;
	private $_totalCaisse;
	private $_date;
	private $_idUser;

	/***************** Accesseurs ***************** */


	public function getIdCaisse()
	{
		return $this->_idCaisse;
	}

	public function setIdCaisse($idCaisse)
	{
		$this->_idCaisse=$idCaisse;
	}

	public function getNomCaisse()
	{
		return $this->_nomCaisse;
	}

	public function setNomCaisse($nomCaisse)
	{
		$this->_nomCaisse=$nomCaisse;
	}

	public function getTotalCaisse()
	{
		return $this->_totalCaisse;
	}

	public function setTotalCaisse($totalCaisse)
	{
		$this->_totalCaisse=$totalCaisse;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setDate($date)
	{
		$this->_date=$date;
	}

	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
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
		return "IdCaisse : ".$this->getIdCaisse()."NomCaisse : ".$this->getNomCaisse()."TotalCaisse : ".$this->getTotalCaisse()."Date : ".$this->getDate()."IdUser : ".$this->getIdUser()."\n";
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