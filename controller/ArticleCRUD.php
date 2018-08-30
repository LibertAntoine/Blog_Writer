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

class ArticleCRUD {

	public function addArticle($userId, $title, $content)
	{	    
	    $article = new Article(['title' => $title, 'userId' => $userId, 'content' => $content]);	    
	    $articleManager = new ArticleManager();
	    $article = $articleManager->add($article);
	    if ($article) {
	       return $article;
	    }
	}

	public function updateArticle($articleId, $userId, $title, $content, $nbComment) {
	    $article = new Article(['id' => $articleId, 'title' => $title, 'userId' => $userId, 'content' => $content, 'nbComment' => $nbComment]);	  
	    $articleManager = new ArticleManager();
	    $article = $articleManager->update($article);
	    
	    if (gettype($article) === 'object') {
	        return $article;
	    } else {
	        return FALSE;
	    }
	}

	public function readArticle($info) {	  
	    $articleManager = new ArticleManager();
	    $article = $articleManager->get($info);

	    if (gettype($article) === 'object') {
	        return $article;
	    } else {
	        return FALSE;
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
