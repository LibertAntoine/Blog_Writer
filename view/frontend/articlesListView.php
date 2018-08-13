<?php $title = 'Blog d\'un écrivain - Acceuil';

 ob_start(); ?>



<h2>Bienvenue sur mon blog</h2>
<p>Découvrez mes derniers articles de voyage :</p>


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
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>