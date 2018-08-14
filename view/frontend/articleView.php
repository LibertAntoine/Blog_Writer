<?php $title = htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>

<div class="row">
<div class="col-sm-12">
<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

<div id="article" class="article jumbotron">
<?php 
if(isset($user)) {
if($user->getStatus() === 'admin') { ?>
<div id="editBloc">
    <p><a href="index.php?action=editArticle&amp;id=<?= $article->getId() ?>">Modifier l'article</a> -
<a href="index.php?action=deleteArticle&amp;id=<?= $article->getId() ?>">Supprimer l'article</a></p>
</div>
<?php }} ?>


    <h2>
        <?= htmlspecialchars($article->getTitle()) ?>  
    </h2>
    <em>dernière modification le <?= $article->getUpdateDate() ?></em>
    
    <p>
        <?= nl2br(($article->getContent())) ?>
    </p>
</div>

<div class="row">
<div id="commentSpace" class="col-lg-8 col-md-10 col-sm-12 col-xs-12 jumbotron">
<h3>Commentaires</h3>

<?php if (isset($user)) { ?>
<form action="index.php?action=addComment" method="post">
    <div>
        <label for="comment">Ajouter un commentaire :</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input class="btn btn-primary" type="submit" value="Valider"/>
        <input type="hidden" name="id" value=<?= $article->getId() ?> />
    </div>
</form>

<?php
}
foreach ($comments as $data)
{
?>
<div class="commentBox">
<div class="suppReportComment">
    <?php if (isset($user)) {
    if ($user->getStatus() === 'visitor') { ?>
    <p><a href="index.php?action=reporting&amp;id=<?= $data->getId()?>&amp;article=<?= $article->getId()?>">Signaler un abus</a></p>
<?php } elseif($user->getStatus() === 'admin') { ?>
    <p><a href="index.php?action=deleteComment&amp;id=<?= $data->getId()?>&amp;article=<?= $article->getId()?>">Supprimer le commentaire</a></p>
<?php
}}
?>
</div>
    <p><strong><?= htmlspecialchars($userManager->getName($data->getUserId())) ?></strong> le <?= $data->getCreationDate(); ?></p>
    <p><?= nl2br(htmlspecialchars($data->getContent())) ?></p>

<?php
}
?>
</div>
</div>
</div>
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>
