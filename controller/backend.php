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

class Backend {

    public function createArticleView() {
        $message = '';
    	require('view/backend/articleCreateView.php');
    }

    public function editArticleView($articleId) {
        if(isset($articleId)) {
            $articleManager = new articleManager();
            $article = $articleManager->get(intval($articleId));
        }
        require('view/backend/articleEditView.php');
    }

    public function backOfficeView($message = NULL) {
        $userManager = new userManager();
        $user = $userManager->get(intval($_SESSION['id']));
        $articleManager = new articleManager();
        $commentManager = new commentManager();
        $comments = $commentManager->getReportingList();
        require('view/backend/backOfficeView.php');
    }

    public function loginView() {
        $message = '';
        require('view/frontend/loginView.php');
    }

    public function inscriptionView() {
        $message = '';
        require('view/frontend/inscriptionView.php');
    }
}
