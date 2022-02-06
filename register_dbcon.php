<?php 

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
        require("components/init_session.php");
        require("components/db_connection.php");

        // Here we handle the form data send by register.php. We know that this information is valid. e.g firstname does not contain numbers.

        //We use mysqli_real_escape_string() to avoid SQL-Injection
        $firstname = mysqli_real_escape_string($link, $_POST["firstname"]);
        $lastname =  mysqli_real_escape_string($link, $_POST["lastname"]);
        $password =  mysqli_real_escape_string($link, $_POST["password"]);
        $email = mysqli_real_escape_string($link, $_POST["email"]);

        //Hask password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        //Insert info
        $add_user_query = "INSERT INTO Guest (firstName,lastName,email,pass) VALUES ('$firstname','$lastname','$email','$hashed_password');";

        if(mysqli_query($link,$add_user_query)) {
            
            //Deactivate link.
            $key = $_SESSION["key"];
            $remove_link = "DELETE FROM Link WHERE address_key = '$key'";
            
            if(mysqli_query($link,$remove_link)) {
                //The link was removed.
                $_SESSION["code"] = $SUCCESS_REGISTER;
                unset($_SESSION["key"]);
                header("Location: index.php");
                exit;
            }

            //FIXME: Don't know what to do here. Delete the user?
            $_SESSION["code"] = $ERROR_QUERY_FAILED;
            
        }
        else {
            // Go back to register.php with an error.
            $_SESSION["code"] = $ERROR_USER_ALREADY_EXIST;
            header("Location: register.php?key=".$_SESSION['key']);
            exit;
        }


        mysqli_close($link);
    }
?>