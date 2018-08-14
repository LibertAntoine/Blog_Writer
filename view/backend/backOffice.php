<?php $title = 'Blog d\'un écrivain - Espace administrateur';

 ob_start(); ?>

<h1>Bienvenue <?= $_SESSION['pseudo'] ?> dans votre espace administrateur</h1>


<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

<?php if ($user->getStatus() === 'admin') { ?>
<a href="index.php?action=createArticle"><div id="newArticle" class="btn btn-primary btn-lg">
<p>Créer un nouvel article</p></div></a>
<?php } ?>

<div class="row">
	<div class="col-md-6 col-sm-12 jumbotron">
<?php if (isset($message)) { ?>	
	<p><?= $message ?></p>
<?php } ?>	
		<form action="index.php?action=editPseudo" method="post">
			<h3>Modification du nom utilisateur</h3>
			<p>Votre nom actuelle est <strong><?= $_SESSION['pseudo'] ?></strong></p>
			<label for="newPseudo">Nouveau nom utilisateur :  </label>
			<input type="text" id="newPseudo" name="newPseudo">
			 <input class="btn btn-success" type="submit" value="Valider la modification"/>
		</form>
	</div>
	<div class="col-md-6 col-sm-12 jumbotron">
		<form action="index.php?action=editMdp" method="post">
			<h3>Modification du mot de passe du compte</h3>
			<label for="oldMdp">Ancien mot de passe :  </label>
			<input type="password" id='oldMdp' name="oldMdp">
			<label for="newMdp">Nouveau mot de passe :</label>
			<input type="password" id='newMdp' name="newMdp">
			<input class="btn btn-success" type="submit" value="Valider la modification"/>
		</form>
	</div>
</div>




<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>