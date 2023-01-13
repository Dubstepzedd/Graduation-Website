<?php
    //Require a session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
    //Check that it's a post and that it was submitted by the page

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]) && isset($_POST["form-id"])) {
        //Correct method call, we now need to figure out what form was sent.
        require("forbidden/db_connection.php");
        //Grab form-id
        $formId =  mysqli_real_escape_string($link,$_POST["form-id"]);

        switch($formId) {

            case "GENERATE-LINK":

                //Generate a code
                $code = generateCode();

                $addCode = "INSERT INTO Link (address_key) VALUES('$code')";

                if(mysqli_query($link,$addCode)) {
                    //Link was added successfully.
                    $_SESSION["generatedCode"] = "https://feliciastudent.se/login_system/register.php?key=".$code;
                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;
                } 
                else {
                    //Query failed.
                    $_SESSION["code"] = $ERROR_CHANGE;
                    header("Location: account.php");
                    exit;

                }
                
                break;


            case "REMOVE-LINK":
                $key = mysqli_real_escape_string($link,$_POST["links"]);
                
                $removeKey = "DELETE FROM Link WHERE address_key = '$key'";

                if(mysqli_query($link,$removeKey)) {
                    //Key was removed
                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;
                }
                else {
                    //Query failed.
                    $_SESSION["code"] = $ERROR_CHANGE;
                    header("Location: account.php");
                    exit;
                }

                break;

            case "REMOVE-ACCOUNT":

                $email = mysqli_real_escape_string($link,$_POST["guests"]);

                $getId = "SELECT id FROM Guest WHERE email = '$email'";
                if($result = mysqli_query($link,$getId)) {
                    
                    if(mysqli_num_rows($result) == 1) {
                        //We got 1 result as expected.

                        $row = mysqli_fetch_array($result);
                        $id = $row["id"];

                        //Delete User
                        $removeUser = "DELETE FROM Guest WHERE email = '$email'";
                        if(mysqli_query($link,$removeUser)) {
                            //Guest was deleted
                            //Update the Gifts that the account had selected
                            $updateAllGifts = "UPDATE Gift SET guest_id = NULL, taken = 0 WHERE guest_id = '$id'";

                            if(mysqli_query($link,$updateAllGifts)) {
                                //Success
                                $_SESSION["code"] = $SUCCESS_CHANGE;
                                header("Location: account.php");
                                exit;
                            }
                        }
                    }
                }
               
                $_SESSION["code"] = $ERROR_CHANGE;
                header("Location: account.php");
                exit;
        
                break;

            case "ADD-GIFT":

                $gift = mysqli_real_escape_string($link,$_POST["gift"]);

                $addGift = "INSERT INTO Gift (name) VALUES ('$gift')";
                
                if(mysqli_query($link,$addGift)) {
                    //Success
                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;
                }
                else {
                    //Query failed
                    $_SESSION["code"] = $ERROR_CHANGE;
                    header("Location: account.php");
                    exit;
                }

                break;

            case "REMOVE-GIFT":

                $gift = mysqli_real_escape_string($link,$_POST["gift"]);

                $addGift = "DELETE FROM Gift WHERE name = '$gift'";
                
                if(mysqli_query($link,$addGift)) {
                    //Success
                    $_SESSION["code"] = $SUCCESS_CHANGE;
                    header("Location: account.php");
                    exit;
                }
                else {
                    //Query failed
                    $_SESSION["code"] = $ERROR_CHANGE;
                    header("Location: account.php");
                    exit;
                }

                break;

            case "EDIT-GIFTS":
                if(isset($_POST["gift"]) && is_array($_POST["gift"]) ) {

                    $selectedGifts = array_map(function( $element ) use ($link) {
                        return mysqli_real_escape_string($link, $element);
                    }, $_POST["gift"]);
                    
        
                    $getCurrentGifts = "SELECT Gift.name FROM Gift";
                    
                    $currentGifts = [];
                    $i = 0;

                    if($result = mysqli_query($link, $getCurrentGifts)) {
                        
                        if(mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_Array($result)) {
                                $name = $row["name"];
                                $currentGifts[$i] = $name;
                                $i++;
                            }
                            //Set the new data
                            for($x = 0; $x < count($selectedGifts); $x++) {
                                $giftName = $selectedGifts[$x];
                                $currentGiftName = $currentGifts[$x];

                                $updateGift = "UPDATE Gift SET name = '$giftName' WHERE name = '$currentGiftName'";

                                if(!mysqli_query($link,$updateGift)) {
                                    print(mysqli_error($link));
                                    //Query Failed
                                    $_SESSION["code"] = $ERROR_CHANGE;
                                    header("Location: account.php");
                                    exit;
                                }
                                
                  
                            }

                            //Success
                            $_SESSION["code"] = $SUCCESS_CHANGE;
                            header("Location: account.php");
                            exit;
                        }
                        else {
                            //No results
                            $_SESSION["code"] = $ERROR_CHANGE;
                            header("Location: account.php");
                            exit;
                        }

                    }

                   
                    
                }

                break;

        }

    }
    
    //This  catches all potential bugs and returns an error. 
    $_SESSION["code"] = $ERROR_CHANGE;
    header("Location: account.php");
    exit;
    

    
    //Generates a random and never before used code.
    function generateCode() {
        $chars = "abcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 1;
        $pass = '' ;

        while ($i <= 20) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;
    }


?>