<?php 
    /*Checks if the user is logged in or not. If logged in -  continue. If not, login and then return to the 
    same website. */

    function redirectIfNotLoggedIn($name) {
        
        if(!isset($_SESSION["firstName"]) || !isset($_SESSION["lastName"]) || !isset($_SESSION["email"])) {
            $_SESSION["redirect"] = $name;  //Spara dit användaren ville
            header("Location: login.php");  //Logga in för att komma till den här sidan.
            exit;
        }
    }
   

?>