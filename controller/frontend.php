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




class Frontend {

	public function articlesListView() {
		$articleManager = new ArticleManager();
		$articles = $articleManager->getRecentList();
		$topArticles = $articleManager->getBestList();
		require('view/frontend/articlesListView.php');
	}

	public function biographieView() {
		require('view/frontend/biographyView.php');
	}

	public function genesysVIew() {
		require('view/frontend/genesysProjectView.php');
	}

	public function allArticlesView() {
		$articleManager = new ArticleManager();
		$articles = $articleManager->getAllList();
		$topArticles = $articleManager->getBestList();
		require('view/frontend/articlesAllView.php');
	}

	public function articleView() {

		$articleManager = new ArticleManager();
		$commentManager = new CommentManager();
		$userManager = new UserManager();

		$article = $articleManager->get(intval(htmlspecialchars($_GET['id'])));
		$topArticles = $articleManager->getBestList();
		$comments = $commentManager->getList($_GET['id']);
		if (isset($_SESSION['id'])) {
			$user = $userManager->get($_SESSION['id']);
		}
		if (gettype($article) === 'object') {
			require('view/frontend/articleView.php');
		} else {
			throw new Exception('L\'article désigné n\'existe pas');
		}
		
	}	
}









