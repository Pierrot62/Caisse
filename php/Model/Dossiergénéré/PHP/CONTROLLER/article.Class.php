<?php

class Article 
{

	/*****************Attributs***************** */

	private $_idArticle;
	private $_libelleArticle;
	private $_prixHt;
	private $_codeBarre;
	private $_idTva;
	private $_idCategorie;

	/***************** Accesseurs ***************** */


	public function getIdArticle()
	{
		return $this->_idArticle;
	}

	public function setIdArticle($idArticle)
	{
		$this->_idArticle=$idArticle;
	}

	public function getLibelleArticle()
	{
		return $this->_libelleArticle;
	}

	public function setLibelleArticle($libelleArticle)
	{
		$this->_libelleArticle=$libelleArticle;
	}

	public function getPrixHt()
	{
		return $this->_prixHt;
	}

	public function setPrixHt($prixHt)
	{
		$this->_prixHt=$prixHt;
	}

	public function getCodeBarre()
	{
		return $this->_codeBarre;
	}

	public function setCodeBarre($codeBarre)
	{
		$this->_codeBarre=$codeBarre;
	}

	public function getIdTva()
	{
		return $this->_idTva;
	}

	public function setIdTva($idTva)
	{
		$this->_idTva=$idTva;
	}

	public function getIdCategorie()
	{
		return $this->_idCategorie;
	}

	public function setIdCategorie($idCategorie)
	{
		$this->_idCategorie=$idCategorie;
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
		return "IdArticle : ".$this->getIdArticle()."LibelleArticle : ".$this->getLibelleArticle()."PrixHt : ".$this->getPrixHt()."CodeBarre : ".$this->getCodeBarre()."IdTva : ".$this->getIdTva()."IdCategorie : ".$this->getIdCategorie()."\n";
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