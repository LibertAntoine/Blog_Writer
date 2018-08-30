<?php

	namespace controller;
	
	use \model\DBAccess;
    use \model\BlogContent;
    use \model\Article;
    use \model\Comment;
    use \model\User;   
    use \model\ArticleManager;
    use \model\CommentManager;
    use \model\UserManager;


class CommentCRUD {

	public function addComment($userId, $articleId , $content)
	{    
	    $comment = new Comment(['articleId' => $articleId, 'userId' => $userId, 'content' => $content]);
	    $commentManager = new CommentManager();
	    $affectedLines = $commentManager->add($comment); 
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    } else {
	        $articleManager = new ArticleManager();
	        $articleManager->updateNbComment($articleId, 'add');
	        header('Location: index.php?action=article&id=' . $articleId);
	    }
	}

	public function readComment($commentId) {
		$commentManager = new CommentManager();
		if ($commentManager->exists($commentId) === TRUE) {
			$comment = $commentManager->get($commentId);
			if (gettype($comment) === 'object') {
				return $comment;	
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}     
	}


	public function deleteComment($commentId, $articleId) {
		$commentManager = new CommentManager();
		$commentManager->delete($commentId);
	    $articleManager = new ArticleManager();
	    $articleManager->updateNbComment($articleId, "remove");
	    return TRUE;
	}


	public function reporting($commentId) {
		$commentManager = new CommentManager();
		$result = $commentManager->reporting($commentId);
		if ($result === TRUE) {
			return TRUE;
		}
	}

	public function removeReport($commentId)
	{
	    $commentManager = new commentManager();
	    $result = $commentManager->removeReporting($commentId);
	   	if ($result === TRUE) {
			return TRUE;
		}

	}
}