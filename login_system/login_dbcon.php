<?php
    //Init session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
    
    //Check if the request is POST and that submit is set.
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {

        if(isset($_POST["email"]) && isset($_POST["password"])) {
        
            require($_SERVER['DOCUMENT_ROOT']."/forbidden/db_connection.php");
            // Grab the POST data. $link is from "db_connection.php".
            $email = mysqli_real_escape_string($link,$_POST["email"]);
            $password = mysqli_real_escape_string($link,$_POST["password"]);

            //We check if there is a user with the email $email.
            $getUser = "SELECT firstName,lastName,pass,admin FROM guest WHERE email = '$email'";

            if($result = mysqli_query($link,$getUser)) {
                
                //Will always be 1 as the column email is unique.
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);

                    //Retrieve the password from db. 
                    $retrievedPassword = $row["pass"];
                    //Create a boolean that is true if the passwords match
                    $valid = password_verify($password, $retrievedPassword);
                
                    if($valid) {
                        //The password is correct.
                        
                        //Save data in session variables. (These are used to verify if one is logged in or not)
                        $_SESSION["firstName"] = $row["firstName"];
                        $_SESSION["lastName"] = $row["lastName"];
                        $_SESSION["email"] = $email;
                        $_SESSION["admin"] = $row["admin"];
                        
                        //Does the password in the database need rehashing?
                        if(password_needs_rehash($retrievedPassword,PASSWORD_BCRYPT)) {
                            $newHash = password_hash($password,PASSWORD_BCRYPT);

                            //The hash needs to replace our current hashed password in db.

                            $replacePassword = "UPDATE Guest SET pass = '$newHash' WHERE email = '$email'";

                            if(!mysqli_query($link,$replacePassword)) {
                                
                                //Rehash failed.
                                //Free the memory.
                                mysqli_free_result($result);
                                //Go back to login page even though the user was validated. Something went wrong with the rehashing and it is possible it will be fixed if the user tries again.
                                $_SESSION["code"] = $ERROR_UNKNOWN;
                                header("Location: login.php");
                                exit;

                            }

                            //Free the memory.
                            mysqli_free_result($result);
                            
                        }

                        //Move on to the website... You are logged in!
                        $_SESSION["code"] = $SUCCESS_LOGIN;
                        //Do you have a redirect? 
                        if(isset($_SESSION["redirect"])) {
                            header("Location: /".$_SESSION["redirect"]);
                    
                        }
                        //If not go to the frontpage.
                        else {
                            header("Location: /index.php");
                        }
                        
                        exit;
                        
                    }
                    else {
                        //The password is wrong.
                        $_SESSION["code"] = $ERROR_WRONG_PASSWORD;
                    
                        header("Location: login.php");
                        exit;
                    }

                }
                else {
                    $_SESSION["code"] = $ERROR_USER_DOES_NOT_EXIST;
                    header("Location: login.php");
                    exit;
                }
                
                //Free the memory.
                mysqli_free_result($result);

            }
            else {
                //Something went wrong with the query.
                $_SESSION["code"] = $ERROR_UNKNOWN;
                //Go back to login page.
                header("Location: login.php");
                exit;
                
            }

            //Close the db connection.
            mysqli_close($link);
        }
        //If you end up here, then you should go to the error handling below.

    }
    //Wrong method call
    $_SESSION["code"] = $ERROR_UNKNOWN;
    header("Location: login.php");
    exit;
   


?>