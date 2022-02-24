<?php

    //Init session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");

    if(isset($_SESSION["firstName"]) && isset($_SESSION["lastName"]) && isset($_SESSION["email"])) {
        //A login session is set
        unset($_SESSION["firstName"]);
        unset($_SESSION["lastName"]);
        unset($_SESSION["email"]);
    }

    //Redirect to login.
    header("Location: login.php");
    exit();

?>