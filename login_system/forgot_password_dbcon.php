<?php
    //Activate session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]) && isset($_POST["email"])) {

        //Activate database connection
        require($_SERVER['DOCUMENT_ROOT']."/forbidden/db_connection.php");
        // Grab the POST data. $link is from "db_connection.php".
        $email = mysqli_real_escape_string($link,$_POST["email"]);
        
        $get_user = "SELECT firstName,lastName FROM Guest WHERE email = '$email'";

        if($result = mysqli_query($link,$get_user)) {
            //Query passed

            //Check that only one result came in.
            if(mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result);
                
                //Retrieve information.
                $firstName = $row["firstName"];
                $lastName = $row["lastName"];
                //Generate a verification code
                $code = generateCode();
                //Save the correct code in a session (server side)
                $_SESSION["verification_code"] = $code;
                /* Here we set the email session, but it wont affect the login state as that requires firstName 
                and lastName as well.*/
                $_SESSION["email"] = $email;
                //nl2br makes the linebreaks visible in the email.
                $msg = nl2br("Hej $firstName! \n\r <br>Din kod är: $code</br>");
                $alt_msg = nl2br("Hej $firstName! \n\r Din kod är: $code");

                //Now send an email to the provided $email.
                require_once($_SERVER['DOCUMENT_ROOT']."/forbidden/mailer.php");
                //Set a subject
                $sub = '=?UTF-8?B?'.base64_encode("Glömt lösenord").'?=';
                
                if(sendMail($email,$sub,$msg, $alt_msg)) {
                    $_SESSION["code"] = $SUCCESS_MAIL;
                    $_SESSION["verification"] = 1;
                    header("Location: forgot_password_verification.php");
                    exit;
                }
                else {
                    //Mail was not sent
                    $_SESSION["code"] = $ERROR_MAIL_NOT_SENT;
                    header("Location: forgot_password.php");
                    exit;
                }

        
            }
            else {
                //No user exists with that email.
                $_SESSION["code"] = $ERROR_USER_DOES_NOT_EXIST;
                header("Location: forgot_password.php");
                exit;
            }
            
            mysqli_free_result($result);
        }
        else {
            //Query failed.
            $_SESSION["code"] = $ERROR_UNKNOWN;
            header("Location: forgot_password.php");
            exit;
        }
        

    }
    else {
        $_SESSION["code"] = $ERROR_UNKNOWN;
        header("Location: forgot_password.php");
        exit;
    }
    //Generates a random and never before used code.
    function generateCode() {
        $chars = "abcdefghijkmnopqrstuvwxyz0123456789!$@?";
        srand((double)microtime()*1000000);
        $i = 1;
        $pass = '' ;

        while ($i <= 10) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return strtoupper($pass);
    }


?>