<?php
    //Require a session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
    //Check that it's a post and that it was submitted by the page

    if($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST["submit"]) && isset($_POST["form-id"])) {
        //Correct method call, we now need to figure out what form was sent.
        require("forbidden/db_connection.php");
        //Grab form-id
        $formId =  mysqli_real_escape_string($link,$_POST["form-id"]);

        switch($formId) {


            case "ACCOUNT-INFORMATION":
                //Here we handle requests regarding change of e.g email.

                //Grab all the data
                $firstName =  mysqli_real_escape_string($link, $_POST["firstname"]);
                $lastName =  mysqli_real_escape_string($link, $_POST["lastname"]);
                $email =  mysqli_real_escape_string($link, $_POST["email"]);
                
                $currentEmail = $_SESSION["email"];

                $changeInformation = "UPDATE Guest SET firstName = '$firstName', lastName = '$lastName', email = '$email' WHERE email = '$currentEmail'";

                //Update database with new information
                if(mysqli_query($link, $changeInformation)) {
                    //Success
                    $_SESSION["firstName"] = $firstName;
                    $_SESSION["lastName"] = $lastName;
                    $_SESSION["email"] = $email;

                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;
                }
                else {
                    //Query failed
                    $_SESSION["code"] = $ERROR_CHANGE;
                    header("account.php");
                    exit;
                }
                break;

            case "GIFT-INFORMATION":
                //Here we handle requests regarding removal of selected gifts.

                //Check that gift is an array and that it is set.
                if(isset($_POST["gift"]) && is_array($_POST["gift"]) ) {

                    $selectedGifts = array_map(function( $element ) use ($link) {
                        return mysqli_real_escape_string($link, $element);
                    }, $_POST["gift"]);
                   
                    foreach($selectedGifts as $giftName) {
                        
                        $updateGift = "UPDATE Gift SET guest_id = NULL, taken=0  WHERE name = '$giftName' AND taken=1";
                        if(!mysqli_query($link,$updateGift)) {
                            //Query Failed
                            $_SESSION["code"] = $ERROR_CHANGE;
                            header("Location: account.php");
                            exit;
                        }
                    }
                    
                    //All selected gifts removed.
                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;

                }
                
                //No selected gifts, let the error below catch it.
                
                break;

            default:
                //Unknown form id
                $_SESSION["code"] = $ERROR_CHANGE;
                header("account.php");
                exit;

                break;
                
        }

        
    }
    //Wrong method call
    $_SESSION["code"] = $ERROR_CHANGE;
    header("Location: account.php");
    exit;

?>