<?php $title = 'Création d\'un compte utilisateur';

ob_start(); ?>

	<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
	<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

	<h2>Création d'un nouveau compte</h2>

	<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 jumbotron">
		<h3>Merci de renseigner les informations necessaires à la création de votre compte</h3>
		<?php if (isset($message)) { ?> 
            <p><?=$message?></p> 
        <?php } ?> 
		<form action="index.php?action=addUser" method="post">
			<label for="pseudo">Pseudo : </label>
			<input type="text" id="pseudo" name="pseudo"/>
			<p>Entre 8 et 25 caractères<p>
			<label for="mdp">Mot de passe : </label>
			<input type="password" id="mdp" name="mdp"/>
			<p>Entre 8 et 25 caractères<p>
			<input class="btn btn-success" type="submit" value="Je valide mon inscription"/>
		</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>