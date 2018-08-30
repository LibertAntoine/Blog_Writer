<?php $title = "Création d'un nouvel article"; ?>

<?php ob_start(); ?>

	<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
	<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

	<h2>Création d'un nouvel article</h2>
	<?php if (isset($message)) { ?> 
        <p><?=$message?></p> 
    <?php } ?> 
	<form action="index.php?action=addArticle" method="post">
		<div class="titleEnter">
			<label  for="title">Title de l'article : </label>
			<input class="titleInput" type="text" id="title" name="title" value="<?php if (isset($articleTitle)) { echo htmlspecialchars_decode($articleTitle);} ?>" required/>
		</div>
		<div>
			<label for="content">Contenu de l'article : </label>
			<textarea class="tinymce" id="content" name="content"><?php if (isset($content)) { echo htmlspecialchars_decode($content);} ?></textarea>
		</div>
		<div>
 			<input class="btn btn-success" type="submit" value="Valider la création de l'article"/>
		</div>
	</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
