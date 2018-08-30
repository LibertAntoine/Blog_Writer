<?php

namespace model;

class User {
	protected $id,
	$pseudo,
	$mdp,
	$admin;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
  {
    foreach ($data as $key => $value)
    {
     	$method = 'set'.ucfirst($key);
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function getId() 
  {
    return $this->id;
  }

  public function getPseudo() 
  {
    return $this->pseudo;
  }

  public function getMdp() 
  {
  	return $this->mdp;
  }

  public function getAdmin() 
  {
    return $this->admin;
  }

	public function setId($id) 
  {
 	  $id = (int) $id;
 	  if ($id > 0) 
    {
 		 $this->id = $id;
 	  }
  }

 	public function setPseudo($pseudo) 
  {
  	if (is_string($pseudo) && strlen($pseudo) < 26) 
    {
 		$this->pseudo = $pseudo;
 	  }
  }

 	public function setMdp($mdp) 
  {
  	if (is_string($mdp) && strlen($mdp) < 255) 
    {
 		 $this->mdp = $mdp;
 	  } else {
      throw new Exception("Mot de passe renseigné incorrect");
    }

  }

 	public function setAdmin($admin) 
  {
    $admin = (int) $admin;
    if ($admin >= 0) 
    {
     $this->admin = $admin;
    }
  }
}






