<?php

    require_once('model/BlogContent.php');
    require_once('model/DBAccess.php');
    require_once('model/ArticleManager.php');
    require_once('model/CommentManager.php');
    require_once('model/UserManager.php');
    require_once('model/Article.php');
    require_once('model/Comment.php');
    require_once('model/User.php');


class Backend {

    public function createArticleView() {
    	require('view/backend/articleCreate.php');
    }

    public function editArticleView($articleId) {
        if(isset($articleId)) {
            $articleManager = new articleManager();
            $article = $articleManager->get(intval($articleId));
        }
        require('view/backend/articleEdit.php');
    }

    public function backOfficeView() {
        $userManager = new userManager();
        $user = $userManager->get(intval($_SESSION['id']));
        $articleManager = new articleManager();
        $commentManager = new commentManager();
        $comments = $commentManager->getReportingList();

        require('view/backend/backOffice.php');
    }

    public function loginView() {
        $message = '';
        require('view/frontend/loginView.php');
    }

    public function inscriptionView() {
        $message = '';
        require('view/frontend/inscription.php');
    }
}
