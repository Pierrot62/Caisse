<?php

class Modepaiement 
{

	/*****************Attributs***************** */

	private $_idModePaiement;
	private $_typePaiement;

	/***************** Accesseurs ***************** */


	public function getIdModePaiement()
	{
		return $this->_idModePaiement;
	}

	public function setIdModePaiement($idModePaiement)
	{
		$this->_idModePaiement=$idModePaiement;
	}

	public function getTypePaiement()
	{
		return $this->_typePaiement;
	}

	public function setTypePaiement($typePaiement)
	{
		$this->_typePaiement=$typePaiement;
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
		return "IdModePaiement : ".$this->getIdModePaiement()."TypePaiement : ".$this->getTypePaiement()."\n";
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