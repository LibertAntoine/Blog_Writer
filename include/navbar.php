


<nav id="navbar" class="navbar navbar-default">

<a href="index.php">
<h1 class="navbar-text">Plongez avec moi à la découverte de l'Alaska</h1>
</a>
<?php 
if (isset($_SESSION['pseudo'])) {
 ?> 
<div class="loger">
<a class="navbar-link" href="index.php?action=acompte"><div class="navbloc">Espace personnel</div></a>
<a class="navbar-link" href="index.php?action=logOut"><div class="navbloc">Déconnexion</div></a>
</div>
<?php 
} else {
?>
<div class="loger">
<a class="navbar-link" href="index.php?action=login"><div class="navbloc">Connexion</div></a>
<a class="navbar-link" href="index.php?action=inscription"><div class="navbloc">Inscription</div></a>
</div>
<?php
} ?>

</nav>

