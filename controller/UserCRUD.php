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

	public function updatePseudo($newPseudo) {
	        $userManager = new UserManager();
	        $user = $userManager->get($_SESSION['id']);
	        $user->setPseudo($newPseudo);
	        $user = $userManager->update($user);
	        return $user;
	}

	public function updateMdp($newMdp) {
	    $userManager = new userManager();
	    $user = $userManager->get(intval($_SESSION['id']));
	    $pass_hache = password_hash($newMdp, PASSWORD_DEFAULT);
	    $user->setMdp($pass_hache);
	    $user = $userManager->update($user);
	    return $user;
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