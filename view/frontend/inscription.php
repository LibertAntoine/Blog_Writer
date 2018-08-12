<?php $title = 'Création d\'un compte utilisateur';

 ob_start(); ?>

<h1>Merci de renseigner les informations pour votre inscription</h1>


<form action="index.php?action=addUser" method="post">
<div>
<label for="pseudo">Pseudo</label>
<input type="text" id="pseudo" name="pseudo"/>
<p>Maximum 25 caractères<p>
</div>
<div>
<label for="mdp">Mot de passe</label>
<input type="text" id="mdp" name="mdp"/>
<p>Maximum 25 caractères<p>
</div>
<div>
        <input type="submit" value="Je valide mon inscription" />
</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php 
require('template.php'); ?>