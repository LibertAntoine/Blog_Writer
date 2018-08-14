<?php $title = 'Blog d\'un écrivain - Acceuil';

 ob_start(); ?>



<h2>Bienvenue sur mon blog</h2>
<p>Découvrez mes derniers articles de voyage :</p>

<div class="row">
<div class="col-sm-8">
<?php

foreach ($articles as $data)
{ 

?>

    <div class="articleBox jumbotron">
        <h3><?= htmlspecialchars($data->getTitle()) ?></h3>
        <em>créé le <?= $data->getCreationDate() ?></em>
        <p>
            <?= nl2br(($data->getContent())) ?>
            <br />
            <em><a href="index.php?action=article&amp;id=<?= $data->getId() ?>">Voir les commentaires</a></em>
        </p>
    </div>

<?php
}
?>
</div>
<div class="col-sm-4">
	<div id="topComment">
    <h3>Top des articles les plus commentés du site</h3>
<?php
foreach ($topArticles as $data)
{ 
?>	
    <div class="resumeArticles">
        <h4><?= htmlspecialchars($data->getTitle()) ?></h4>
        <p> crée le <?= $data->getCreationDate() ?></p>
        <p><?= $data->getNbComment() ?> Commentaires</p>
    </div>


<?php
}
?>
		
</div>
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>