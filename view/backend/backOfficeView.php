<?php $title = 'Blog d\'un écrivain - Espace administrateur';

$_SESSION['page'] = 'index.php?action=acompte';

ob_start(); ?>

	<h2>Bienvenue <?= $_SESSION['pseudo'] ?> dans votre espace administrateur</h2>

	<p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
	<p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

	<?php if ($user->getAdmin() === 1) { ?>
		<a href="index.php?action=createArticle"><div id="newArticle" class="btn btn-primary btn-lg">
		<p>Créer un nouvel article</p></div></a>
	<?php } ?>

	<div class="row">
		<div class="col-md-6 col-sm-12 jumbotron">
			<?php if (isset($message)) { ?>

				<p><?= $message ?></p>
			<?php } ?>	
			<form action="index.php?action=editPseudo" method="post">
				<h3>Modification du nom utilisateur</h3>
				<p>Votre nom actuelle est <strong><?= $_SESSION['pseudo'] ?></strong></p>
				<label for="newPseudo">Nouveau nom utilisateur :  </label>
				<input type="text" id="newPseudo" name="newPseudo" required>
				<input class="btn btn-success" type="submit" value="Valider la modification"/>
			</form>
		</div>
		<div class="col-md-6 col-sm-12 jumbotron">
			<form action="index.php?action=editMdp" method="post">
				<h3>Modification du mot de passe du compte</h3>
				<label for="oldMdp">Ancien mot de passe :  </label>
				<input type="password" id='oldMdp' name="oldMdp" required>
				<label for="newMdp">Nouveau mot de passe :</label>
				<input type="password" id='newMdp' name="newMdp" required>
				<input class="btn btn-success" type="submit" value="Valider la modification"/>
			</form>
		</div>
	</div>

	<?php if ($user->getAdmin() === 1) { ?>
		<h2>Liste des commentaires signalés</h2>
		<?php if ($comments != NULL) {?>
			<table class="table">
			   	<tr>
			       	<th>Commentaire</th>
			       	<th class="dateColumn">Nombre de signalement</th>
			       	<th class="dateColumn">Article associé</th>
			       	<th class="dateColumn">Date de création de l'article</th>
			       	<th>Action</th>
			   	</tr>
				<?php foreach ($comments as $data) { ?>   
	   				<tr>
				       	<td><?= htmlspecialchars($data->getContent()) ?></td>
				       	<td class="dateColumn"><?= $data->getReporting() ?></td>
				       	<td class="dateColumn"><a href="index.php?action=article&amp;id=<?= $data->getArticleId() ?>"><?= $articleManager->getTitle($data->getArticleId()) ?></a></td>
				       	<td class="dateColumn">le <?= $data->getCreationDate() ?></td>
				       	<td>
				       		<a href="index.php?action=deleteComment&amp;id=<?= $data->getId()?>&amp;article=<?= $data->getArticleId()?>">Supprimer</a><br>
				       		<a href="index.php?action=removeReport&amp;id=<?= $data->getId() ?>">Annuler</a>
				   		</td>
				   </tr>
				<?php }?>
			</table>
		<?php } else { ?>
			<p>Aucun commentaire n'a été signalé</p>
	<?php }} ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>