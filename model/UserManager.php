<?php


class UserManager extends DBAccess
{

	public function add(User $user) 
  {
		$q = $this->db->prepare("INSERT INTO `users` (`pseudo`, `mdp`, `status`) VALUES (:pseudo, :mdp, 'visitor');");

		$q->bindValue(':pseudo', $user->getPseudo());
    	$q->bindValue(':mdp', $user->getMdp());

		$q->execute();

    $user->hydrate([
      'id' => $this->db->lastInsertId()]);
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM users')->fetchColumn();
  }

  public function delete(User $user)
  {
    $this->db->exec('DELETE FROM users WHERE id = '.$user->getId());
  }

 	public function exists($info)
 	{
   	if (is_int($info)) {
      return (bool) $this->db->query('SELECT COUNT(*) FROM users WHERE id = '.$info)->fetchColumn();
    } else 
    {
      $q = $this->db->prepare('SELECT COUNT(*) FROM users WHERE pseudo = :pseudo');
    	$q->execute([':pseudo' => $info]);
    	return (bool) $q->fetchColumn();
    }
	}

  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->db->query('SELECT id, pseudo, mdp, status FROM users WHERE id = '.$info);
      $user = $q->fetch(PDO::FETCH_ASSOC);
    } else 
    {
      $q = $this->db->prepare('SELECT id, pseudo, mdp, status FROM users WHERE pseudo = :pseudo');
      $q->execute([':pseudo' => $info]);
      
      $user = $q->fetch(PDO::FETCH_ASSOC);
    } 
    return new User($user);
  }


  public function getList()
  {
    $users = [];
    
    $q = $this->db->prepare("SELECT id, pseudo, mdp, status FROM users WHERE status = 'visitor' ORDER BY pseudo");
    $q->execute();
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
     $users[] = new User($data);
    }
    return $users;
  }
  
  public function update(User $user)
  {
    $q = $this->db->prepare('UPDATE users SET pseudo = :pseudo, mdp = :mdp, status = :status WHERE id = :id');
    
    $q->bindValue(':pseudo', $user->getPseudo());
    $q->bindValue(':mdp', $user->getMdp());
    $q->bindValue(':status', $user->getStatus());
    $q->bindValue(':id', $user->getId());

    $q->execute();
  }
}