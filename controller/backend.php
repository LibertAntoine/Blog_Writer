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