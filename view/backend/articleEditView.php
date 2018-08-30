<?php $title = "Modification - ". htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>

	<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
	<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

	<h2>Modification de l'article : <?= $article->getTitle() ?></h2>
	<?php if (isset($message)) { ?> 
        <p><?=$message?></p> 
    <?php } ?> 
	<form action="index.php?action=updateArticle" method="post">
		<div class="titleEnter">
			<label  for="title">Title de l'article : </label>
			<input class="titleInput" type="text" id="title" name="title" value="<?= htmlspecialchars_decode($article->getTitle()) ?>" required/>
		</div>
		<div>
			<label for="content">Contenu de l'article : </label>
			<textarea class="tinymce" id="content" name="content" required><?= htmlspecialchars_decode($article->getContent());?></textarea>
		</div>
		<div>
	 		<input class="btn btn-success" type="submit" value="Valider la modification"/>
	        <input type="hidden" name="id" value=<?= $article->getId() ?> />
	        <input type="hidden" name="nbComment" value=<?= $article->getNbComment() ?> />
		</div>
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>