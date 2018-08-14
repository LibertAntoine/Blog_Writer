<?php $title = 'Connectez-vous à votre compte' ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<h1>Merci d'entrez vos identifiants de connexion</h1>
<p><?=  htmlspecialchars($message)?></p>

<h2>Page d'authentification</h2>

<div class="col-sm-6 jumbotron">
<form action="index.php?action=verifUser" method="post">
    <h3>Merci d'entrer vos identifiants de connexion</h3>
    <div>
        <label for="pseudo">Identifiant :</label><br />
        <input type="text" id="pseudo" name="pseudo" />
    </div>
    <div>
        <label for="mdp">Mot de passe :</label><br />
        <input id="mdp" name="mdp"></input>
    </div>
    <div>
        <input class="btn btn-success" type="submit" value="Valider"/>
    </div>
</form>
</div>
<?php ?>


<?php $content = ob_get_clean(); ?>

<?php

 require('template.php'); ?>