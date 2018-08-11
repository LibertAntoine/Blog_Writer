<?php $title = 'Blog d\'un écrivain - Acceuil';

 ob_start(); ?>

<h1>Bienvenue sur mon blog</h1>
<p>Découvrez mes derniers articles de voyage :</p>


<?php

foreach ($articles as $data)
{ 

?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data->getTitle()) ?>
            <em>le <?= $data->getCreationDate() ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data->getContent())) ?>
            <br />
            <em><a href="index.php?action=article&amp;id=<?= $data->getId() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php 
require('navbar.php');
require('template.php'); ?>