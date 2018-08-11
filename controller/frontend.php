

<?php session_start();

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');



function articlesList() {

	$articleManager = new ArticleManager();

	$articles = $articleManager->getRecentList();


	require('view/frontend/articlesListView.php');

}

function article() {

	$articleManager = new ArticleManager();
	$commentManager = new CommentManager();


	$article = $articleManager->get(intval($_GET['id']));
	$comments = $commentManager->getList($_GET['id']);

	require('view/frontend/articleView.php');
}


function login() {
	$message = '';
	require('view/frontend/loginView.php');

}

function verifUser() {

	$userManager = new UserManager();
	if ($userManager->exists($_POST['pseudo'])) {
		$user = $userManager->get($_POST['pseudo']);
		if ($user->getMdp() == $_POST['mdp']) {
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['mdp'] = $_POST['mdp'];
			header('Location: index.php');
		} else {
			$message = 'Le mot de passe renseigné ne correspond pas à cette utilisateur';
			require('view/frontend/loginView.php');
		}
	} else {
	$message = 'L\'identifiant renseigné est incorrect';
	require('view/frontend/loginView.php');
}
}

function logOut() {
	session_destroy();
	header('Location: index.php');
}






function addComment($articleId, $userId, $content)
{
    
    $comment = new Comment(['articleId' => $articleId, '$userId' => $userId, 'content' => $content]);
    
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
    
    $article = new Article(['title' => $title, '$userId' => $userId, 'content' => $content]);
    
    $articleManager = new ArticleManager();

    $affectedLines = $articleManager->add($article);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'article !');
    }
    else {
        header('Location: index.php?action=post&id=' . $articleId);
    }
}


function addUser($pseudo, $mdp)
{
    
    $user = new User(['pseudo' => $pseudo, 'mdp' => $mdp]);
    
    $userManager = new UserManager();

    $affectedLines = $userManager->add($user);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'utilisateur');
    }
    else {
        header('Location: index.php');
    }
}