


<nav id="navbar" class="navbar navbar-default">
<h1 class="navbar-text">Plongez avec moi à la découverte de l'Alaska</h1>

<?php 
if (isset($_SESSION['pseudo'])) {
 ?> 
<div id="nav">
<a class="navbar-link" href="index.php?action=acompte"><div class="navbloc">Espace personnel</div></a>
<a class="navbar-link" href="index.php?action=logOut"><div class="navbloc">Deconnexion</div></a>
</div>
<?php 
} else {
?>

<li><a class="navbar-link" href="index.php?action=login">Connexion</a></li>
<li><a class="navbar-link" href="index.php?action=inscription">Inscription</a></li>

<?php
} ?>

</nav>

