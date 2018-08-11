<?php $title = 'Connectez-vous à votre compte' ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<h1>Merci d'entrez vos identifiants de connexion</h1>
<p><?=  htmlspecialchars($message)?></p>

<form action="index.php?action=verifUser" method="post">
    <div>
        <label for="pseudo">Identifiant</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="mdp">Mot de passe</label><br />
        <input id="mdp" name="mdp"></input>
    </div>
    <div>
        <input type="submit" value="Valider" />
    </div>
</form>
<?php ?>


<?php $content = ob_get_clean(); ?>

<?php
 require('navbar.php');
 require('template.php'); ?>