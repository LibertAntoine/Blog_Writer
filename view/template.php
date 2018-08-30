<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>

        <meta property="og:title" content="Jean Forteroche - Blog sur l'Alaska"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="http://openclassrooms.ingenus.pro/index.php"/> 
        <meta property="og:image" content="http://openclassrooms.ingenus.pro/public/pictures/vignette_alaska.jpg"/> 
        <meta property="og:description" content="Retrouvez sur mon blog le récit fabuleux de mon voyage en Alaska"/>

        <meta name="twitter:card" content="website">
        <meta name="twitter:site" content="@ingenus.pro">
        <meta name="twitter:title" content="Jean Forteroche - Blog sur l'Alaska">
        <meta name="twitter:description" content="Retrouvez sur mon blog le récit fabuleux de mon voyage en Alaska">
        <meta name="twitter:creator" content="@Jean_Forteroche">
        <meta name="twitter:image" content="http://openclassrooms.ingenus.pro/public/pictures/vignette_alaska.jpg">


        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="public/css/styles.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css?family=Bitter|Corben|Merriweather|Sawarabi+Mincho" rel="stylesheet">
    </head>
        
    <body>

    	<?php require("view/include/navbar.php");?>
        
        <section id="blogContent" class="container">
            <?= $content ?>
        </section>

        <?php require("view/include/footer.php");?>  

        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="vendor/jQuery/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="vendor/tinymce/js/tinymce.min.js"></script>
		<script type="text/javascript" src="vendor/tinymce/js/themes/init-tinymce.js"></script>
    </body>
</html>

