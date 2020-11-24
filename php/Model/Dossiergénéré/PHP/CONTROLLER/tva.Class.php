<?php

class Tva 
{

	/*****************Attributs***************** */

	private $_idTva;
	private $_tauxTva;

	/***************** Accesseurs ***************** */


	public function getIdTva()
	{
		return $this->_idTva;
	}

	public function setIdTva($idTva)
	{
		$this->_idTva=$idTva;
	}

	public function getTauxTva()
	{
		return $this->_tauxTva;
	}

	public function setTauxTva($tauxTva)
	{
		$this->_tauxTva=$tauxTva;
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
		return "IdTva : ".$this->getIdTva()."TauxTva : ".$this->getTauxTva()."\n";
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