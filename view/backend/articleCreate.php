<?php $title = "Modification d'un nouvelle article"; ?>

<?php ob_start(); ?>


<p><a href="index.php">Retour à la liste des billets</a></p>

<form action="index.php?action=addArticle" method="post">
<div>
<label for="title"></label>
<input type="text" id="title" name="title"/>
</div>
<div>
<label for="content"></label>
<textarea class="tinymce" id="content" name="content">Ecrivez votre nouvelle article ici.</textarea>
</div>
<div>
        <input type="submit" value="Valider la création de l'article" />
</div>
</form>


<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>
