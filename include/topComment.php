<div id="topComment" class="jumbotron">
    <h3>Top des articles les plus commentés du site</h3>
<?php
foreach ($topArticles as $data)
{ 
?>	
    <div class="resumeArticles">
       <h4> <a href="index.php?action=article&amp;id=<?= $data->getId() ?>"><?= htmlspecialchars($data->getTitle()) ?></a> - <?= $data->getNbComment()?> Commentaires</h4>

        <p class="creationDate"> ajouté le <?= $data->getCreationDate() ?></p>
        <p></p>
    </div>


<?php
}
?>		
</div>