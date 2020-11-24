<?php

class Users{
	private $_idUser;
	private $_identifiant;
	private $_motDePasse;
	private $_role;
	
	// Getter / Setter

    public function getIdUser()
    {
        return $this->_idUser;
    }
    public function getRole()
    {
        return $this->_role;
    }

    public function setIdUser(int $_idUser)
    {
        $this->_idUser = $_idUser;
    }

    public function setRole(int $_role)
    {
        $this->_role = $_role;
    }

   	/**
	 * Get the value of _identifiant
	 */ 
	public function getIdentifiant()
	{
		return $this->_identifiant;
	}

	public function setIdentifiant($_identifiant)
	{
		$this->_identifiant = $_identifiant;

		return $this;
	}

	public function getMotDePasse()
	{
		return $this->_motDePasse;
	}

	public function setMotDePasse($_motDePasse)
	{
		$this->_motDePasse = $_motDePasse;

		return $this;
	}

	// Constructeur
	public function __construct(array $options = [])
	{ 
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
    }
    /****************************Autres méthodes****************************/
public function toString() 
{ 
 return $this->getIdUser()."\t" . $this->getidentifiant()."\t" . $this->getmotDePasse()."\t" . $this->getRole() ;
}

}