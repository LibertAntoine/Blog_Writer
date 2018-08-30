<?php

namespace model;

class UserManager extends DBAccess
{

	public function add(User $user) 
  {
		$q = $this->db->prepare("INSERT INTO `roche_users` (`pseudo`, `mdp`, `admin`) VALUES (:pseudo, :mdp, 0);");

		$q->bindValue(':pseudo', $user->getPseudo());
    $q->bindValue(':mdp', $user->getMdp());

		$q->execute();

    $user->hydrate([
      'id' => $this->db->lastInsertId()]);

    return $user;
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM roche_users')->fetchColumn();
  }

  public function delete(User $user)
  {
    $this->db->exec('DELETE FROM roche_users WHERE id = '.$user->getId());
  }

 	public function exists($info)
 	{
   	if (is_int($info)) {
      return (bool) $this->db->query('SELECT COUNT(*) FROM roche_users WHERE id = '.$info)->fetchColumn();
    } else 
    {
      $q = $this->db->prepare('SELECT COUNT(*) FROM roche_users WHERE pseudo = :pseudo');
    	$q->execute([':pseudo' => $info]);
    	return (bool) $q->fetchColumn();
    }
	}

  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->db->query('SELECT id, pseudo, mdp, admin FROM roche_users WHERE id = '.$info);
      $user = $q->fetch(\PDO::FETCH_ASSOC);
    } else 
    {
      $q = $this->db->prepare('SELECT id, pseudo, mdp, admin FROM roche_users WHERE pseudo = :pseudo');
      $q->execute([':pseudo' => $info]);
      
      $user = $q->fetch(\PDO::FETCH_ASSOC);
    } 
    return new User($user);
  }


  public function getList()
  {
    $users = [];
    
    $q = $this->db->prepare("SELECT id, pseudo, mdp, admin FROM roche_users WHERE admin = 0 ORDER BY pseudo");
    $q->execute();
    while ($data = $q->fetch(\PDO::FETCH_ASSOC))
    {
     $users[] = new User($data);
    }
    return $users;
  }

  public function getName($userId)
  {
    $users = [];
    
    $q = $this->db->prepare("SELECT pseudo FROM roche_users WHERE id = $userId");
    $q->execute();
 
     $pseudo = $q->fetch();
     $pseudo = $pseudo[0];
    return $pseudo;
  }
  
  public function update(User $user)
  {
    $q = $this->db->prepare('UPDATE roche_users SET pseudo = :pseudo, mdp = :mdp, admin = :admin WHERE id = :id');
    
    $q->bindValue(':pseudo', $user->getPseudo());
    $q->bindValue(':mdp', $user->getMdp());
    $q->bindValue(':admin', $user->getAdmin());
    $q->bindValue(':id', $user->getId());

    $q->execute();

    return $user;
  }
}