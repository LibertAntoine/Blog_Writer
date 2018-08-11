

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
 

    </head>
        
    <body>
    	<textarea class="tinymce"></textarea>

    	<?php require("include/navbar.php");?>
        <?= $content ?>






        <script type="text/javascript" src="vendor/jQuery/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="vendor/tinymce/js/tinymce.min.js"></script>
		<script type="text/javascript" src="vendor/tinymce/js/themes/init-tinymce.js"></script>
    </body>
</html>

