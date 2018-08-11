<?php $title = "Modification - ". htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>


<p><a href="index.php">Retour à la liste des billets</a></p>

<textarea class="tinymce"><?= htmlspecialchars($article->getContent());?></textarea>

<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/template.php'); ?>