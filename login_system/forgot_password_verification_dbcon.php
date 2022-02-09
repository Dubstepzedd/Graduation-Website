<?php
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");

    //Check that the request is POST.
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        if(isset($_POST["verificationCode"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) {
            require($_SERVER['DOCUMENT_ROOT']."/forbidden/db_connection.php");
            //Get POST data.
            $code =  mysqli_real_escape_String($link,trim($_POST["verificationCode"]));
            $password =  mysqli_real_escape_String($link,$_POST["password"]);
            $confirmPassword =  mysqli_real_escape_String($link,$_POST["confirmPassword"]);

            if(strcmp($password,$confirmPassword) == 0) {
                //The passwords match
                if(strcmp($_SESSION["verification_code"],$code) == 0) {
                    //The code is correct.
                    
                    //Change password.
                    $email = $_SESSION["email"];
                    $hash = password_hash($password,PASSWORD_BCRYPT);

                    $getUser = "UPDATE Guest SET pass = '$hash' WHERE email = '$email'";

                    if(mysqli_query($link,$getUser)) {
                        //Query successful.
                        $_SESSION["code"] = $SUCCESS_VERIFICATION;
                        unset($_SESSION["verification"]);
                        header("Location: login.php");
                        exit;
                    }
                    else {
                        //Something went wrong with the query.
                        $_SESSION["code"] = $ERROR_UNKNOWN;
                        header("Location: forgot_password_verification.php");
                        exit;
                    }
                }
                else {
                    //Wrong code.
                    $_SESSION["code"] = $ERROR_WRONG_CODE;
                    header("Location: forgot_password_verification.php");
                    exit;

                }
            }
            else {
                //The passwords do not match
                $_SESSION["code"] = $ERROR_WRONG_PASSWORD;
                header("Location: forgot_password_verification.php");
                exit;
            }

        }
        //End of if statement. No else statement here.
        /*  ...
            The code that goes here will end up at "Wrong Method Call". 
            ...
        */
        
    }
    
    //Wrong method call
    $_SESSION["code"] = $ERROR_UNKNOWN;
    header("Location: login_system/forgot_password_verification.php");
    exit;
    
?>