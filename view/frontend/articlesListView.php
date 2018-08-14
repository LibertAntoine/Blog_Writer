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
    <a href="#">Découvrez plus en détail l'origine de mon projet.</a>
</div>


<p>Retrouver les derniers articles sur mon voyage : </p>

<div class="row">
<div class="col-sm-8">
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
<div class="col-sm-4">
	<div id="topComment" class="jumbotron">
    <h3>Top des articles les plus commentés du site</h3>
<?php
foreach ($topArticles as $data)
{ 
?>	
    <div class="resumeArticles">
        <h4><?= htmlspecialchars($data->getTitle()) ?></h4>
        <p> ajouté le <?= $data->getCreationDate() ?></p>
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