<?php
    //Require a session
    require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
    //Check that it's a post and that it was submitted by the page

    if($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST["submit"]) ) {

        if(isset($_POST['gift']) && is_array($_POST['gift']) ) {
            $selectedGifts = $_POST["gift"];
            //Set up connection
            require("forbidden/db_connection.php");
            $email = $_SESSION["email"];

            $getGuestId = "SELECT id FROM Guest WHERE email = '$email'";

            if($result = mysqli_query($link, $getGuestId)) {

                if(mysqli_num_rows($result) == 1) {
                    //We grab the id
                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
            
                    //Loop through the selected gifts.
                    foreach($selectedGifts as $gift) {
                        $updateGifts = "UPDATE Gift SET guest_id = '$id', taken=1  WHERE name = '$gift' AND taken=0";
                        
                        if(!mysqli_query($link, $updateGifts)) {
                            //Query Failed
                            $_SESSION["code"] = $ERROR_UNKNOWN;
                            header("Location: wishlist.php#gift-form");
                            exit;
                        }
                    }

                    $_SESSION["code"] = $SUCCESS_GIFT;
                    header("Location: wishlist.php#gift-form");
                    exit;
                
                
                }
                //No email in database, however this is not possible...
            }
            //Code that ends here go down to ERROR_UNKNOWN. (Query failed)
        }
        else {
            $_SESSION["code"] = $ERROR_NOT_SELECTED;
            header("Location: wishlist.php#gift-form");
            exit;
        }
         //Code that ends here go down to ERROR_UNKNOWN.  (Not an array)
    }

    //Not POST / not submitted properly.
    $_SESSION["code"] = $ERROR_UNKNOWN;
    header("Location: /wishlist.php#gift-form");
    exit;
?>