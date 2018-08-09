

<?php

	require_once('blogEcrivain/model/ArticleManager.php');
	require_once('blogEcrivain/model/CommentManager.php');
	require_once('blogEcrivain/model/UserManager.php');
	require_once('blogEcrivain/model/Article.php');
	require_once('blogEcrivain/model/Comment.php');
	require_once('blogEcrivain/model/User.php');






function articleList() {

	$articleManager = new ArticleManager();

	$article = $articleManager->getList($_GET['id']);

	require('view/frontend/articleList.php');

}

function article() {

	$articleManager = new ArticleManager();
	$commentManager = new CommentManager();

	$article = $articleManager->get($_GET['id']);
	$comments = $commentManager->getList($_GET['id']);

	require('view/frontend/ArticleView.php');
}






function addComment($articleId, $userId, $content)
{
    
    $comment = new Comment(['articleId' => $articleId, '$userId' => $userId, 'content' => $content])
    
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->add($comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $articleId);
    }
}

function addArticle($title, $userId, $content)
{
    
    $article = new Article(['title' => $title, '$userId' => $userId, 'content' => $content])
    
    $articleManager = new ArticleManager();

    $affectedLines = $articleManager->add($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'article !');
    }
    else {
        header('Location: index.php?action=post&id=' . $articleId);
    }
}


function addArticle($pseudo, $mdp)
{
    
    $user = new User(['pseudo' => $pseudo, 'mdp' => $mdp])
    
    $userManager = new UserManager();

    $affectedLines = $userManager->add($user);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'utilisateur');
    }
    else {
        header('Location: index.php');
    }
}