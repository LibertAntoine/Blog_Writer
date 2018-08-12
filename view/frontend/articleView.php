<?php $title = htmlspecialchars($article->getTitle()); ?>

<?php ob_start(); ?>

<div class="row">
<div class="col-sm-12">
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php 
if(isset($user)) {
if($user->getStatus() === 'admin') { ?>
<p><a href="index.php?action=editArticle&amp;id=<?= $article->getId() ?>">Modifier l'article</a></p>
<p><a href="index.php?action=deleteArticle&amp;id=<?= $article->getId() ?>">Supprimer l'article</a></p>
<?php }} ?>

<div class="news">
    <h3>
        <?= htmlspecialchars($article->getTitle()) ?>
        <em>le <?= $article->getUpdateDate() ?></em>
    </h3>
    
    <p>
        <?= nl2br(($article->getContent())) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input class="btn btn-default" type="submit" value="ajouter un commentaire"/>
        <input type="hidden" name="id" value=<?= $article->getId() ?> />
    </div>
</form>

<?php
foreach ($comments as $data)
{
?>
    <p><strong><?= htmlspecialchars($data->getUserId()) ?></strong> le <?= $data->getCreationDate(); ?></p>
    <p><?= nl2br(htmlspecialchars($data->getContent())) ?></p>
<?php if (isset($user)) {
    if ($user->getStatus() === 'visitor') { ?>
    <p><a href="index.php?action=reporting&amp;id=<?= $data->getId()?>&amp;article=<?= $article->getId()?>">Signaler un abus</a></p>
<?php } elseif($user->getStatus() === 'admin') { ?>
    <p><a href="index.php?action=deleteComment&amp;id=<?= $data->getId()?>&amp;article=<?= $article->getId()?>">Supprimer le commentaire</a></p>
<?php
}}}
?>
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>
