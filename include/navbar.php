


<nav id="navbar" class="navbar navbar-default">

<a href="index.php">
<h1 class="navbar-text">Plongez avec moi à la découverte de l'Alaska</h1>
</a>
<div class="loger">
<?php 
if (isset($_SESSION['pseudo'])) {
 ?> 
<a class="navbar-link" href="index.php?action=acompte"><div class="navbloc">Espace personnel</div></a>
<a class="navbar-link" href="index.php?action=logOut"><div class="navbloc">Déconnexion</div></a>
<?php 
} else {
?>
<a class="navbar-link" href="index.php?action=login"><div class="navbloc">Connexion</div></a>
<a class="navbar-link" href="index.php?action=inscription"><div class="navbloc">Inscription</div></a>

<?php
} ?>
</div>
</nav>

