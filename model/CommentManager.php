<?php

class CommentManager extends DBAccess
{
  public function add(Comment $comment) 
  {	
		$q = $this->db->prepare("INSERT INTO `comments` (`articleId`, `userId`, `content`, `creationDate`, `reporting`) VALUES (:articleId, :userId, :content, NOW(), '0');");

		$q->bindValue(':userId', $comment->getUserId());
    $q->bindValue(':articleId', $comment->getArticleId());
    $q->bindValue(':content', $comment->getContent());

		$q->execute();

    $comment->hydrate([
      'id' => $this->db->lastInsertId()]);
  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM comments')->fetchColumn();
  }

  public function delete(Comment $comment)
  {
    $this->db->exec('DELETE FROM comments WHERE id = '.$comment->getId());
  }

 	public function exists($info)
 	{
   	if (is_int($info)) 
    {
      return (bool) $this->db->query('SELECT COUNT(*) FROM comments WHERE id = '.$info)->fetchColumn();
	  }
  }

  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->db->query('SELECT id, userId, articleId, content, creationDate, reporting FROM comments WHERE id = '.$info);
      $comment = $q->fetch(PDO::FETCH_ASSOC);
    }
    return new Comment($comment);
  }

  public function getList($articleId)
  {
    $comments = [];
    
    $q = $this->db->prepare('SELECT id, userId, articleId, content, creationDate, reporting FROM comments WHERE articleId = :articleId ORDER BY creationDate');
    $q->execute([':articleId' => $articleId]);
    
    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($data);
    }
    return $comments;
  }
  
  public function update(Comment $comment)
  {
    $q = $this->db->prepare('UPDATE comments SET userId = :userId, articleId = :articleId, content = :content, reporting = :reporting WHERE id = :id');
    
    $q->bindValue(':userId', $comment->getUserId());
    $q->bindValue(':articleId', $comment->getArticleId());
    $q->bindValue(':content', $comment->getContent());
    $q->bindValue(':reporting', $comment->getReporting());
    $q->bindValue(':id', $comment->getId());

    $q->execute();
  }
}

