<?php 
    /*Checks if the user is logged in or not. If logged in -  continue. If not, login and then return to the 
    same website. */

    function redirectIfNotLoggedIn($name) {
        $_SESSION["redirect"] = $name;  //We set this here because of the technical mail. It always have  to know the site.

        if(!isset($_SESSION["firstName"]) || !isset($_SESSION["lastName"]) || !isset($_SESSION["email"])) {
            header("Location: login_system/login.php");  //Log in to get to the redirected site.
            exit;
        }
    }
   

?>