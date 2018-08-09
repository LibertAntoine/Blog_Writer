<?php $title = 'Blog d\'un écrivain - Acceuil'; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur mon blog</h1>
<p>Découvrez mes derniers articles de voyage :</p>


<?php
for ($i=0; $data = $articles->fetch() && $i < 5; $i++) { 
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data.getTitle()) ?>
            <em>le <?= $data.getCreationDate() ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data.getContent())) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data.getId() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>