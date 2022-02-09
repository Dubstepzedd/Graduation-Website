<?php 
    //Activate session  
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
    
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
        //Set database connection
        require($_SERVER['DOCUMENT_ROOT']."/forbidden/db_connection.php");

        // Here we handle the form data send bylogin_system/register.php. We know that this information is valid. e.g firstname does not contain numbers.

        //We use mysqli_real_escape_string() to avoid SQL-Injection
        $firstname = mysqli_real_escape_string($link, $_POST["firstname"]);
        $lastname =  mysqli_real_escape_string($link, $_POST["lastname"]);
        $password =  mysqli_real_escape_string($link, $_POST["password"]);
        $email = mysqli_real_escape_string($link, $_POST["email"]);

        //Hash password
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
                //Activate login session
                $_SESSION["firstName"] = $firstname;
                $_SESSION["lastName"] = $lastName;
                $_SESSION["email"] = $email;
                //Unset the link and send the user to the frontpage.
                unset($_SESSION["key"]);
                header("Location: /index.php");
                exit;
            }

            //Delete the user? That's my best plan right now.

            $delete_user = "DELETE FROM Guest WHERE email = '$email'";
            if(mysqli_query($link, $delete_user)) {
                //User is now deleted. Restart at register page as the key is not destroyed.
                $_SESSION["code"] = $ERROR_UNKNOWN;
                //You could unset key in SESSION before this.
                header("Location: register.php?key=".$_SESSION["key"]);
                exit;
            }
            else {
                //A severe problem has occured!
                $_SESSION["code"] = $ERROR_SEVERE;
                header("Location: register.php?key=".$_SESSION["key"]);
                exit;
            }
            
            
        }
        else {
            // Go back tologin_system/register.php with an error.
            $_SESSION["code"] = $ERROR_USER_ALREADY_EXIST;
            //You could unset key in SESSION before this.
            header("Location: register.php?key=".$_SESSION['key']);
            exit;
        }


        mysqli_close($link);
    }

    $_SESSION["code"] = $ERROR_UNKNOWN;
    header("Location: register.php");
    exit;
?>