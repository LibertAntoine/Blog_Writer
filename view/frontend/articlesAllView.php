<?php $title = 'Blog d\'un écrivain - Tous les articles';

 ob_start(); ?>

<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

<h2>Retrouver tous les articles de mon voyage en Alaska</h2>

<div class="row">
<div class="col-lg-8 col-md-7">

<table class="table">
   <tr>
       <th>Titre</th>
       <th>Contenu</th>
       <th class="dateColumn">Date de création</th>
   </tr>
<?php

foreach ($articles as $data)
{ 
?>   
   <tr>
       <td><a href="index.php?action=article&amp;id=<?= $data->getId() ?>"><h3><?= htmlspecialchars($data->getTitle()) ?></h3></a></td>
       <td><?= nl2br((substr($data->getContent(), 0, 100).'...')) ?><a href="index.php?action=article&amp;id=<?= $data->getId() ?>">lire la suite</a></td>
       <td class="dateColumn">le <?= $data->getCreationDate() ?></td>
   </tr>
<?php
}
?>
</table>
</div>
<div class="col-lg-4 col-md-5">
    <div id="navPage" class="jumbotron">
    <h3>Autres contenus</h3>
        <ul>
        <li><a class="indexLink" href="index.php?action=biography">Ma biographie</a></li>    
        <li><a class="indexLink" href="index.php?action=genesys">La génèse du projet</a></li>
        <li><a class="indexLink" href="index.php">Tous les articles</a></li>
        </ul>
    </div>    
	<div id="topComment" class="jumbotron">
    <h3>Top des articles les plus commentés du site</h3>
<?php
foreach ($topArticles as $data)
{ 
?>	
    <div class="resumeArticles">
       <h4> <a href="index.php?action=article&amp;id=<?= $data->getId() ?>"><?= htmlspecialchars($data->getTitle()) ?></a> - <?= $data->getNbComment() ?> Commentaires</h4>

        <p class="creationDate"> ajouté le <?= $data->getCreationDate() ?></p>
        <p></p>
    </div>


<?php
}
?>		
</div>
<div id="book" class="jumbotron">
    <h3>Précommandez mon livre !!!</h3>
    <p>Vous pouvez d'or et déjà commander mon livre sur mon voyage en Alaska.</p>
<div id="logoBox">
    <a href="https://www.amazon.fr/"><img src="public/pictures/amazon-logo.jpg" alt="logo amazon"></a>
    <a href="https://www.amazon.fr/ebooks-kindle/b?ie=UTF8&node=695398031" alt="logo kindle"><img src="public/pictures/kindle-logo.png"></a>
    <a href="https://www.fnac.com/"><img src="public/pictures/logo-fnac.jpg" alt="logo fnac"></a>
</div>
    </div>    
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>