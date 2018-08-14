<?php $title = 'Blog d\'un écrivain - Acceuil';

 ob_start(); ?>

<?php if(isset($_SESSION['pseudo'])) { ?>
<h2>Bonjour <?=  $_SESSION['pseudo']?>, venez découvrir l'Alaska avec moi</h2>
<?php } else { ?>
    <h2>Bienvenue sur mon blog de voyage</h2>
<?php } ?>


<div id='presentation' class="jumbotron">
    <h3>Je m'appelle Jean Forteroche</h3>
    <p> Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet, utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet, an esset hoc quidem proprium amicitiae, sed antiquior et pulchrior et magis a natura ipsa profecta alia causa. Amor enim, ex quo amicitia nominata est, princeps est ad benevolentiam coniungendam. Nam utilitates quidem etiam ab iis percipiuntur saepe qui simulatione amicitiae coluntur et observantur temporis causa, in amicitia autem nihil fictum est, nihil simulatum et, quidquid est, id est verum et voluntarium.</p>
    <a href="#">Découvrez plus en détail sur l'origine de mon projet.</a>
</div>


<h3>Retrouver les derniers articles sur mon voyage : </h3>

<div class="row">
<div class="col-lg-8 col-md-7">
<?php

foreach ($articles as $data)
{ 

?>

    <div class="articleBox jumbotron">
        <a href="index.php?action=article&amp;id=<?= $data->getId() ?>"><h3><?= htmlspecialchars($data->getTitle()) ?></h3></a>
        <em class="creationDate">ajouté le <?= $data->getCreationDate() ?></em>
        <p>
            <?= nl2br((substr($data->getContent(), 0, 320).'...')) ?>
            <a href="index.php?action=article&amp;id=<?= $data->getId() ?>">lire la suite</a>
            <br />
            <em><a class="commentLink" href="index.php?action=article&amp;id=<?= $data->getId() ?>">Voir les commentaires</a></em>
        </p>
    </div>

<?php
}
?>
</div>
<div class="col-lg-4 col-md-5">
    <div id="navPage" class="jumbotron">
    <h3>Autres contenus</h3>
        <ul>
        <li><a class="indexLink" href="index.php?action=biography">Ma biographie</a></li>    
        <li><a class="indexLink" href="index.php?action=genesys">La génèse du projet</a></li>
        <li><a class="indexLink" href="index.php?action=allArticles">Tous les articles</a></li>
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