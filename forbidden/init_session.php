<?php

    //Debug tools for all PHP sites with sessions.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Include the error / success codes.
    include($_SERVER['DOCUMENT_ROOT']."/forbidden/codes.php");
    
    //A file that initializes a session. Is used on all pages except components.
    session_start();

    if(!isset($_SESSION["code"])) {
        $_SESSION["code"] = $NONE;
    }

 ?>