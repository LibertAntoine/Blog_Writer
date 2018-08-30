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




class UserCRUD {
	
	public function addUser($pseudo, $mdp)
	{
		$pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
	    $user = new User(['pseudo' => $pseudo, 'mdp' => $pass_hache]);	   
	    $userManager = new UserManager();
	    $user = $userManager->add($user);
	    if ($user) {
	    	return $user;
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
	
	
	public function readAdmin($pseudo) {
		$userManager = new UserManager();
		if ($userManager->exists($pseudo)) {
			$user = $userManager->get($pseudo);
			if ($user->getAdmin() === 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function read($pseudo, $mdp = '') {
		$userManager = new UserManager();
		if ($userManager->exists($pseudo)) {
			$user = $userManager->get($pseudo);
			$verif = password_verify($mdp, $user->getMdp());
			if ($verif) {
				return $user;
			} else {
				return 2;
			}
		} else {
			return 1;
		}
	}

	public function logOut() {
		session_destroy();
		header('Location: index.php');
	}
}