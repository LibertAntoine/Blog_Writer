<?php $title = 'Connectez-vous à votre compte' ?>

<?php ob_start(); ?>

    <p><a class="indexLink" href="index.php">-> Retour à l'acceuil du site</a></p>
    <p><a class="indexLink" href="index.php?action=allArticles">-> Voir tous les articles</a></p>

    <h2>Page d'authentification</h2>

    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 jumbotron">
        <h3>Merci d'entrer vos identifiants de connexion</h3>
        <?php if (isset($message)) { ?> 
            <p><?=$message?></p> 
        <?php } ?> 
        <form action="index.php?action=connexion" method="post">     
                <label for="pseudo">Identifiant :</label><br />
                <input type="text" id="pseudo" name="pseudo" required/>
                <br/>
                <label for="mdp">Mot de passe :</label><br />
                <input type="password" id="mdp" name="mdp" required></input>
                <br/>
                <input class="btn btn-success" type="submit" value="Valider"/>
        </form>
        <br/>
        <p>Pas encore de compte ? <a href="index.php?action=inscription">Inscrivez-vous !</a></p>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>