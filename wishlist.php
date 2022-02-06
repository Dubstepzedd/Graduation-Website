<!DOCTYPE html>
<html>
    <head>
        <?php 
            require("components/init_session.php"); 
            require("components/check_login.php");
            redirectIfNotLoggedIn("wishlist.php");
        ?>
        <title>Student | Studentdagen</title>
        <link rel="icon" href="bilder/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("components/required_imports.php"); ?>
        <!-- Examination specific links / scripts -->
        <link rel="stylesheet" href="css/examination_style.css">
        
    </head>
    <body>
        <!-- Header -->
        <?php require("components/header.php"); ?>

        <!--- TEMPORARY SPACE -->
        <div class="space"></div>

        <!-- FOOTER -->
        <?php require("components/footer.php"); ?>


    </body>

</html>