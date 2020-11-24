<?php

class User 
{

	/*****************Attributs***************** */

	private $_idUser;
	private $_identifiant;
	private $_motDePasse;
	private $_role;

	/***************** Accesseurs ***************** */


	public function getIdUser()
	{
		return $this->_idUser;
	}

	public function setIdUser($idUser)
	{
		$this->_idUser=$idUser;
	}

	public function getIdentifiant()
	{
		return $this->_identifiant;
	}

	public function setIdentifiant($identifiant)
	{
		$this->_identifiant=$identifiant;
	}

	public function getMotDePasse()
	{
		return $this->_motDePasse;
	}

	public function setMotDePasse($motDePasse)
	{
		$this->_motDePasse=$motDePasse;
	}

	public function getRole()
	{
		return $this->_role;
	}

	public function setRole($role)
	{
		$this->_role=$role;
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
		return "IdUser : ".$this->getIdUser()."Identifiant : ".$this->getIdentifiant()."MotDePasse : ".$this->getMotDePasse()."Role : ".$this->getRole()."\n";
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