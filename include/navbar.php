
<?php 

if (isset($_SESSION['pseudo'])) {
 ?> 
<a href="index.php?action=acompte">Espace personnel</a>
<a href="index.php?action=logOut">Deconnexion</a>

<?php 
} else {
?>

<a href="index.php?action=login">Connexion</a>
<a href="index.php?action=inscription">Inscription</a>

<?php
}
