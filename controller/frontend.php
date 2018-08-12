

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
	$userManager = new UserManager();

	$article = $articleManager->get(intval($_GET['id']));
	$comments = $commentManager->getList($_GET['id']);
	$user = $userManager->get($_SESSION['id']);

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
			$_SESSION['id'] = $user->getId();
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

function inscription() {
	$message = '';
	require('view/frontend/inscription.php');

}


function addUser($pseudo, $mdp)
{

    $user = new User(['pseudo' => $pseudo, 'mdp' => $mdp]);
    
    echo $user->getPseudo();

    $userManager = new UserManager();

    $affectedLines = $userManager->add($user);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enregister l\'utilisateur');
    }
    else {
        $_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['id'] = $user->getId();
		header('Location: index.php');
    }
}