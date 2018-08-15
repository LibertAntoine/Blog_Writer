<?php

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');

class ArticleCRUD {

	public function addArticle($userId, $title, $content)
	{	    
	    $article = new Article(['title' => $title, 'userId' => $userId, 'content' => $content]);	    
	    $articleManager = new ArticleManager();
	    $affectedLines = $articleManager->add($article);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'enregister l\'article !');
	    } else {
	        header('Location: index.php?action=article&id=' . $article->getId());
	    }
	}

	public function updateArticle($articleId, $userId, $title, $content, $nbComment) {
	    $article = new Article(['id' => $articleId, 'title' => $title, 'userId' => $userId, 'content' => $content, 'nbComment' => $nbComment]);	  
	    $articleManager = new ArticleManager();
	    $affectedLines = $articleManager->update($article);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible de mettre à jour l\'article !');
	    } else {
	        header('Location: index.php?action=article&id=' . $articleId);
	    }
	}

	public function deleteArticle($articleId) {
		$articleManager = new ArticleManager();
		$articleManager->delete($articleId);
		$commentManager = new CommentManager();
		$commentManager->deleteList($articleId);
		header('Location: index.php');
	}
}
