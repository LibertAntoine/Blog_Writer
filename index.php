<?php 

require('controller/frontend.php');

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
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
