<?php 
require("components/init_session.php");
require("components/db_connection.php");

// Here we handle the form data send by register.php. We know that this information is valid. e.g firstname does not contain numbers.

//We use mysqli_real_escape_string() to avoid SQL-Injection
$firstname = mysqli_real_escape_string($link, $_POST["firstname"]);
$lastname =  mysqli_real_escape_string($link, $_POST["lastname"]);
$hashed_password =  mysqli_real_escape_string($link, password_hash($_POST["password"], PASSWORD_DEFAULT) );
$email = mysqli_real_escape_string($link, $_POST["email"]);

//Hask password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


//Insert info
$add_user_query = "INSERT INTO Guest (firstName,lastName,email,pass) VALUES ('$firstname','$lastname','$email','$hashed_password');";

if(mysqli_query($link,$add_user_query)) {

    //TODO Deactivate link.
    $key = $_SESSION["key"];
    $remove_link = "DELETE FROM Link WHERE address_key = '$key'";
    
    if(mysqli_query($link,$remove_link)) {
        //The link was removed.
        $_SESSION["error"] = false;
        unset($_SESSION["key"]);
        header("Location: index.php");
        exit;
    }

    //Don't know what to do here.
    $_SESSION["error"] = true;
    
}
else {
     // Go back to register.php with an error.
     $_SESSION["error"] = true;
     header("Location: register.php?key=".$_SESSION['key']);
     exit;
}


mysqli_close($link);
?>