<?php $title = 'Création d\'un compte utilisateur';

 ob_start(); ?>

<h2>Création d'un nouveau compte</h2>

<div class="col-sm-6 jumbotron">
<form action="index.php?action=addUser" method="post">
<h3>Merci de rensiegner les informations necessaire à la création de votre compte</h3>
<div>
<label for="pseudo">Pseudo : </label>
<input type="text" id="pseudo" name="pseudo"/>
<p>Entre 8 et 25 caractères<p>
</div>
<div>
<label for="mdp">Mot de passe : </label>
<input type="text" id="mdp" name="mdp"/>
<p>Entre 8 et 25 caractères<p>
</div>
<div>
        <input class="btn btn-success" type="submit" value="Je valide mon inscription"/>
</div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>