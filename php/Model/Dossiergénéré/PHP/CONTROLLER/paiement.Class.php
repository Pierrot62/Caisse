<?php

class Paiement 
{

	/*****************Attributs***************** */

	private $_idPaiement;
	private $_idModePaiement;
	private $_idTicket;
	private $_prixTTC;

	/***************** Accesseurs ***************** */


	public function getIdPaiement()
	{
		return $this->_idPaiement;
	}

	public function setIdPaiement($idPaiement)
	{
		$this->_idPaiement=$idPaiement;
	}

	public function getIdModePaiement()
	{
		return $this->_idModePaiement;
	}

	public function setIdModePaiement($idModePaiement)
	{
		$this->_idModePaiement=$idModePaiement;
	}

	public function getIdTicket()
	{
		return $this->_idTicket;
	}

	public function setIdTicket($idTicket)
	{
		$this->_idTicket=$idTicket;
	}

	public function getPrixTTC()
	{
		return $this->_prixTTC;
	}

	public function setPrixTTC($prixTTC)
	{
		$this->_prixTTC=$prixTTC;
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
		return "IdPaiement : ".$this->getIdPaiement()."IdModePaiement : ".$this->getIdModePaiement()."IdTicket : ".$this->getIdTicket()."PrixTTC : ".$this->getPrixTTC()."\n";
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