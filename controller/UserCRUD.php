<?php

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');


class UserCRUD {
	
	public function addUser($pseudo, $mdp)
	{
	    $user = new User(['pseudo' => $pseudo, 'mdp' => $mdp]);	   
	    $userManager = new UserManager();
	    $affectedLines = $userManager->add($user);
	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'enregister l\'utilisateur');
	    } else {
	        $_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['id'] = $user->getId();
			header('Location: index.php');
	    }
	}

	public function editPseudo($newPseudo) {
	    if(strlen($newPseudo) < 25 && strlen($newPseudo) > 8) {
	        $userManager = new UserManager();
	        $user = $userManager->get($_SESSION['id']);
	        $user->setPseudo($newPseudo);
	        $userManager->update($user);
	        $_SESSION['pseudo'] = $newPseudo;
	        $message = 'Le nouveau pseudo a bien été enregistré';
	    } else {
        	$message = 'Le pseudo renseigné n\'est pas compris entre 8 et 15 caractères';
    	}
    	require('view/backend/backOffice.php');
	}

	public function editMdp($oldMdp, $newMdp) {
	    $userManager = new userManager();
	    $user = $userManager->get(intval($_SESSION['id']));
	    if ($user->getMdp() === $oldMdp) {
	        if(strlen($newMdp) < 25 && strlen($newMdp) > 8) {
	        $user->setMdp($newMdp);
	        $userManager->update($user);
	        $message = 'Le nouveau mot de passe a bien été enregistré';
	    	} else {
	        	$message = 'Le mot de passe renseigné n\'est pas compris entre 8 et 15 caractères';
	    	}
	    } else {
	        $message = 'L\'ancien mot de passe renseigné n\'est pas le bon';
		}
	    require('view/backend/backOffice.php');
	}

	public function verifUser() {
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

	public function logOut() {
		session_destroy();
		header('Location: index.php');
	}
}