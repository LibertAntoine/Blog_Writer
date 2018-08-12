<?php $title = "Modification - ". htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>


<p><a href="index.php">Retour à la liste des billets</a></p>


<form action="index.php?action=updateArticle" method="post">
<div>
<label for="title"></label>
<input type="text" id="title" name="title" value="<?= $article->getTitle() ?>" />
</div>
<div>
<label for="content"></label>
<textarea class="tinymce" id="content" name="content"><?= htmlspecialchars($article->getContent());?></textarea>
</div>
<div>
        <input type="submit" value="Valider la création de l'article" />
        <input type="hidden" name="id" value=<?= $article->getId() ?> />
</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>