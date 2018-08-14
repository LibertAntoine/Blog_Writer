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
        elseif ($_GET['action'] == 'allArticles') {
            allArticles();
        }
        elseif ($_GET['action'] == 'biography') {
            goBiographie();
        }
        elseif ($_GET['action'] == 'genesys') {
            goGenesys();
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
        elseif ($_GET['action'] == 'editPseudo') {
            editPseudo($_POST['newPseudo']);
        }
        elseif ($_GET['action'] == 'editMdp') {
            editMdp($_POST['oldMdp'],$_POST['newMdp']);
        }
        elseif ($_GET['action'] == 'createArticle') {
        	createArticle();
        }
        elseif ($_GET['action'] == 'inscription') {
        	inscription();
        }
        elseif ($_GET['action'] == 'deleteArticle') {
        	deleteArticle($_GET['id']);
        }
        elseif ($_GET['action'] == 'deleteComment') {
        	deleteComment($_GET['id'], $_GET['article']);
        }
        elseif ($_GET['action'] == 'reporting') {
        	reporting($_GET['id'], $_GET['article']);
        }
        elseif ($_GET['action'] == 'addUser') {

        		if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
                	   
                	if (strlen($_POST['pseudo']) < 26 && strlen($_POST['pseudo']) > 0 ) {
                		 echo 'ok';
                		if (strlen($_POST['mdp']) < 26 && strlen($_POST['mdp']) > 0 ) {
                   		addUser($_POST['pseudo'], $_POST['mdp']);
                	}};
        }}
        elseif ($_GET['action'] == 'addArticle') {
        		
        		if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                	if (!empty($_POST['title']) && !empty($_POST['content'])) {
                   		addArticle($_SESSION['id'], $_POST['title'], $_POST['content']);
                	};
        }}
        elseif ($_GET['action'] == 'updateArticle') {
        		if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
	                	if (!empty($_POST['title']) && !empty($_POST['content'])) {
	                   		updateArticle($_POST['id'], $_SESSION['id'], $_POST['title'], $_POST['content'], $_POST['nbComment']);
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
                throw new Exception('Vous devez vous connecter pour ajouter un commentaire');
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
