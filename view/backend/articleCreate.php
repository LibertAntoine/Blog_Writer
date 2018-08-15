<?php $title = "Modification d'un nouvelle article"; ?>

<?php ob_start(); ?>

	<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
	<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

	<h2>Création d'un nouvel article</h2>

	<form action="index.php?action=addArticle" method="post">
		<div class="titleEnter">
			<label  for="title">Title de l'article : </label>
			<input class="titleInput" type="text" id="title" name="title"/>
		</div>
		<div>
			<label for="content">Contenu de l'article : </label>
			<textarea class="tinymce" id="content" name="content"></textarea>
		</div>
		<div>
 			<input class="btn btn-success" type="submit" value="Valider la modification"/>
		</div>
	</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
