<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
            require("forbidden/init_session.php"); 
            require("forbidden/check_login.php");
            redirectIfNotLoggedIn("wishlist.php");
        ?>
        <title>Student | Studentdagen</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("forbidden/required_imports.php"); ?>
        <!-- Examination specific links / scripts -->
        <link rel="stylesheet" href="css/examination_style.css">
        
    </head>
    <body>
        <!-- Header -->
        <?php require("forbidden/header.php"); ?>

        <!--- TEMPORARY SPACE -->
        <div class="space"></div>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>


    </body>

</html>