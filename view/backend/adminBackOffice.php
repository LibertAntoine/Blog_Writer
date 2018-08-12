<?php $title = 'Blog d\'un écrivain - Espace administrateur';

 ob_start(); ?>

<h1>Bienvenue <?= $_SESSION['pseudo'] ?> dans votre espace administrateur</h1>


<p><a href="index.php">Retour à la liste des billets</a></p>
<p></p><a href="index.php?action=createArticle">Créer un nouvelle article</a></p>



<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>