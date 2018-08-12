


<nav class="navbar navbar-default">
<img class="img-thumbnail" src="public/pictures/logo.png">
<p class="navbar-text">Un simple texte</p>
<ul class="nav navbar-nav">	
<?php 
if (isset($_SESSION['pseudo'])) {
 ?> 
<li><a class="navbar-link" href="index.php?action=acompte">Espace personnel</a></li>
<li><a class="navbar-link" href="index.php?action=logOut">Deconnexion</a></li>

<?php 
} else {
?>

<li><a class="navbar-link" href="index.php?action=login">Connexion</a></li>
<li><a class="navbar-link" href="index.php?action=inscription">Inscription</a></li>

<?php
} ?>
</ul>
</nav>

