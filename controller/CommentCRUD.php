<?php

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');


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

	public function deleteComment($commentId, $articleId) {
		$commentManager = new CommentManager();
		$commentManager->delete($commentId);
	    $articleManager = new ArticleManager();
	    $articleManager->updateNbComment($articleId, "remove");
		header('Location: index.php?action=article&id=' . $articleId);
	}

	public function deleteAdminComment($commentId, $articleId) {
	    $commentManager = new CommentManager();
	    $commentManager->delete($commentId);
	    $comments = $commentManager->getReportingList();
	    $articleManager = new ArticleManager();
	    $articleManager->updateNbComment($articleId, "remove");
	    $userManager = new userManager();
       	$user = $userManager->get(intval($_SESSION['id']));
       	
        require('view/backend/backOffice.php');
	}

	public function reporting($commentId, $articleId) {
		$commentManager = new CommentManager();
		$commentManager->reporting($commentId);
		header('Location: index.php?action=article&id=' . $articleId);
	}

	public function removeReport($commentId)
	{
	    $userManager = new userManager();
	    $user = $userManager->get(intval($_SESSION['id']));
	    $articleManager = new articleManager();
	    $commentManager = new commentManager();
	    $comments = $commentManager->removeReporting($commentId);

	    require('view/backend/backOffice.php');
	}
}