<?php $title = 'Blog d\'un écrivain - Espace administrateur';

 ob_start(); ?>

<h1>Bienvenue <?= $_SESSION['pseudo'] ?> dans votre espace administrateur</h1>


<p><a href="index.php">-> Retour  l'acceuil du site</a></p>
<a href="index.php?action=createArticle"><div id="newArticle" class="btn btn-primary btn-lg">
<p>Créer un nouvel article</p></div></a>

<div class="row">
	<div class="col-sm-6 jumbotron">
		<form action="index.php?action=editPseudo" method="post">
			<h3>Modification du nom utilisation</h3>
			<p>Votre nom actuelle est <?= $_SESSION['pseudo'] ?></p>
			<label>Nouveau nom utilisateur :</label>
			<input type="text" name="newPseudo">
			 <input class="btn btn-success" type="submit" value="Valider la modification"/>
		</form>
	</div>
	<div class="col-sm-6 jumbotron">
		<form action="index.php?action=editPseudo" method="post">
			<h3>Modification du mot de passe du compte</h3>
			<label>Ancien mot de passe :</label>
			<input type="text" name="newPseudo">
			<label>Nouveau mot de passe :</label>
			<input type="text" name="newPseudo">
			<input class="btn btn-success" type="submit" value="Valider la modification"/>
		</form>
	</div>
</div>




<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>