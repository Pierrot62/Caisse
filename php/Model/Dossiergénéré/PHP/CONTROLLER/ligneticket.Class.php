<?php

class Ligneticket 
{

	/*****************Attributs***************** */

	private $_idLigneTicket;
	private $_quantite;
	private $_prixHt;
	private $_montantTva;
	private $_idTicket;
	private $_idArticle;

	/***************** Accesseurs ***************** */


	public function getIdLigneTicket()
	{
		return $this->_idLigneTicket;
	}

	public function setIdLigneTicket($idLigneTicket)
	{
		$this->_idLigneTicket=$idLigneTicket;
	}

	public function getQuantite()
	{
		return $this->_quantite;
	}

	public function setQuantite($quantite)
	{
		$this->_quantite=$quantite;
	}

	public function getPrixHt()
	{
		return $this->_prixHt;
	}

	public function setPrixHt($prixHt)
	{
		$this->_prixHt=$prixHt;
	}

	public function getMontantTva()
	{
		return $this->_montantTva;
	}

	public function setMontantTva($montantTva)
	{
		$this->_montantTva=$montantTva;
	}

	public function getIdTicket()
	{
		return $this->_idTicket;
	}

	public function setIdTicket($idTicket)
	{
		$this->_idTicket=$idTicket;
	}

	public function getIdArticle()
	{
		return $this->_idArticle;
	}

	public function setIdArticle($idArticle)
	{
		$this->_idArticle=$idArticle;
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
		return "IdLigneTicket : ".$this->getIdLigneTicket()."Quantite : ".$this->getQuantite()."PrixHt : ".$this->getPrixHt()."MontantTva : ".$this->getMontantTva()."IdTicket : ".$this->getIdTicket()."IdArticle : ".$this->getIdArticle()."\n";
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