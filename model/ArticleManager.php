<?php


class ArticleManager extends DBAccess {

	public function add(Article $article) 
  {
		$q = $this->db->prepare("INSERT INTO `articles` (`title`, `userId`, `content`, `creationDate`, `updateDate`) VALUES (:title , :userId, :content, NOW(), NOW())");

		$q->bindValue(':userId', $article->getUserId());
    $q->bindValue(':title', $article->getTitle());
    $q->bindValue(':content', $article->getContent());

		$q->execute();

    $article->hydrate([
      'id' => $this->db->lastInsertId()]);
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM articles')->fetchColumn();
  }

  public function delete(Article $article)
  {
    $this->db->exec('DELETE FROM articles WHERE id = '.$article->getId());
  }

 	public function exists($info)
 	{
   	if (is_int($info)) 
    {
      return (bool) $this->db->query('SELECT COUNT(*) FROM articles WHERE id = '.$info)->fetchColumn();
    } else 
    {
    	$q = $this->db->prepare('SELECT COUNT(*) FROM articles WHERE title = :title');
    	$q->execute([':title' => $info]);
    	return (bool) $q->fetchColumn();
    }
  }

  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->db->query('SELECT id, userId, title, content, creationDate, updateDate FROM articles WHERE id = '.$info);
      $article = $q->fetch(PDO::FETCH_ASSOC);
    } else 
    {
     	$q = $this->db->prepare('SELECT id, userId, title, content FROM articles WHERE title = :title');
      $q->execute([':title' => $info]);
      $article = $q->fetch(PDO::FETCH_ASSOC);
    }
    return new Article($article);
  }


  public function getRecentList()
  {
    $articles = [];
    
    $q = $this->db->prepare('SELECT id, userId, title, content FROM articles ORDER BY updateDate');
    $q->execute();
    
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $articles[] = new Article($data);
    }
    return $articles;
  }
  
  public function update(Article $article)
  {
    $q = $this->db->prepare('UPDATE articles SET userId = :userId, title = :title, content = :content, updateDate = NOW() WHERE id = :id');
    
    $q->bindValue(':userId', $article->getUserId());
    $q->bindValue(':title', $article->getTitle());
    $q->bindValue(':content', $article->getContent());
    $q->bindValue(':id', $article->getId());
    $q->execute();
  }
}

