<?php

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');

function editArticle($articleId) {

if(isset($articleId)) {
	$articleManager = new articleManager();
	$article = $articleManager->get(intval($articleId));
}

	require('view/backend/articleEdit.php');

}

function createArticle() {

	require('view/backend/articleCreate.php');

}


function addArticle($userId, $title, $content)
{
    
    $article = new Article(['title' => $title, 'userId' => $userId, 'content' => $content]);
    
    $articleManager = new ArticleManager();

    $affectedLines = $articleManager->add($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'article !');
    }
    else {
        header('Location: index.php?action=article&id=' . $article->getId());
    }
}


function deleteArticle($articleId) {
	$articleManager = new ArticleManager();
	$articleManager->delete($articleId);
	$commentManager = new CommentManager();
	$commentManager->deleteList($articleId);

	header('Location: index.php');
}


function deleteComment($commentId, $articleId) {
	$commentManager = new CommentManager();
	$commentManager->delete($commentId);

	 header('Location: index.php?action=article&id=' . $articleId);
}


function updateArticle($articleId, $userId, $title, $content)
{
    
    $article = new Article(['id' => $articleId, 'title' => $title, 'userId' => $userId, 'content' => $content]);
    
    $articleManager = new ArticleManager();

    $affectedLines = $articleManager->update($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible de mettre à jour l\'article !');
    }
    else {
        header('Location: index.php?action=article&id=' . $articleId);
    }
}



function addComment($userId, $articleId , $content)
{
    
    $comment = new Comment(['articleId' => $articleId, 'userId' => $userId, 'content' => $content]);
    
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->add($comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=article&id=' . $articleId);
    }
}

function acompte()
{
    $userManager = new userManager();
    $user = $userManager->get(intval($_SESSION['id']));

    if ($user->getStatus() === "admin") {
    	require('view/backend/adminBackOffice.php');
    } elseif ($user->getStatus() === "visitor") {
    	require('view/backend/visitorBackOffice.php');
    }

}

