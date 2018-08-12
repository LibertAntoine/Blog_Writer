<?php 

require('controller/frontend.php');
require('controller/backend.php');

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'articlesList') {
            articlesList();
        }
        elseif ($_GET['action'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                article();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'login') {
        	login();
        }
        elseif ($_GET['action'] == 'verifUser') {
        	verifUser();
        }
        elseif ($_GET['action'] == 'logOut') {
        	logOut();
        }
        elseif ($_GET['action'] == 'acompte') {
        	acompte();
        }
        elseif ($_GET['action'] == 'editArticle') {
        	editArticle($_GET['id']);
        }
        elseif ($_GET['action'] == 'createArticle') {
        	createArticle();
        }
        elseif ($_GET['action'] == 'addArticle') {
        		
        		if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                	if (!empty($_POST['title']) && !empty($_POST['content'])) {
                   		addArticle($_SESSION['id'], $_POST['title'], $_POST['content']);
                	};
        }}
        elseif ($_GET['action'] == 'updateArticle') {
        		if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
	                	if (!empty($_POST['title']) && !empty($_POST['content'])) {
	                   		updateArticle($_POST['id'], $_SESSION['id'], $_POST['title'], $_POST['content']);
	                	}
	               }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                if (!empty($_POST['id']) && !empty($_POST['comment'])) {
                    addComment($_SESSION['id'], $_POST['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        articlesList();
    }


}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
