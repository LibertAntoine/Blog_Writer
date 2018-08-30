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
        <?php foreach ($articles as $data) { ?>   
        <tr>
          <td><a href="index.php?action=article&amp;id=<?= $data->getId() ?>"><h3><?= htmlspecialchars_decode($data->getTitle()) ?></h3></a></td>
          <td><?= nl2br((htmlspecialchars_decode(substr($data->getContent(), 0, 100).'...'))) ?><a href="index.php?action=article&amp;id=<?= $data->getId() ?>"> lire la suite</a></td>
          <td class="dateColumn">le <?= $data->getCreationDate() ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="col-lg-4 col-md-5">
      <?php  require('view/include/navPage.php'); ?>
      <?php  require('view/include/topComment.php'); ?>    
      <?php  require('view/include/book.php'); ?>   
    </div>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>