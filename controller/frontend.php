<?php session_start();

	require_once('model/BlogContent.php');
	require_once('model/DBAccess.php');
	require_once('model/ArticleManager.php');
	require_once('model/CommentManager.php');
	require_once('model/UserManager.php');
	require_once('model/Article.php');
	require_once('model/Comment.php');
	require_once('model/User.php');

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

		$article = $articleManager->get(intval($_GET['id']));
		$topArticles = $articleManager->getBestList();
		$comments = $commentManager->getList($_GET['id']);
		if (isset($_SESSION['id'])) {
			$user = $userManager->get($_SESSION['id']);
		}

		require('view/frontend/articleView.php');
	}	
}









