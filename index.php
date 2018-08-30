<?php 
	session_start();
	require_once('Action.php');
	require_once("Autoloader.php");
	new Autoloader();


try {
    if (isset($_GET['action'])) {
        $index = new Action($_GET['action']);
    } else {
        $frontend = new controller\Frontend();
        $frontend->articlesListView();
    }  
}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


