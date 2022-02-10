<?php
    //Require a session
    require("forbidden/init_session.php");
    //Check that it's a post and that it was submitted by the page

    if($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST["submit"]) ) {
        
        //Get the data
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $numberOfGuests = $_POST["guests"];
        $status = $_POST["status"];
        $comment = $_POST["general"];

        //If the activity is "nothing" we want to ignore the allergies.
        if($activity === "kommer ej") {
            $allergies = "";
        }

        else {
            $allergies = $_POST["allergies"];
        }

        // Send email with template
        $file = "mail_templates/registration.html";
    
        if(file_exists($file)) {
            $message_HTML = file_get_contents($file);
            $message_HTML = str_replace("FIRSTNAME", $firstName,$message_HTML);
            $message_HTML = str_replace("LASTNAME", $lastName,$message_HTML);
            $message_HTML = str_replace("GUESTS", $numberOfGuests,$message_HTML);
            $message_HTML = str_replace("STATUS", $status,$message_HTML);
            $message_HTML = str_replace("ALLERGIES", $allergies,$message_HTML);
            $message_HTML = str_replace("COMMENT", $comment,$message_HTML);
            
            require($_SERVER['DOCUMENT_ROOT']."/forbidden/mailer.php");
            $email = $_SESSION["email"];
            $sub = '=?UTF-8?B?'.base64_encode("Anmälan till studenten").'?=';
            
            if(sendMail($email,$sub,$message_HTML, $message_HTML)) {
                $_SESSION["code"] = $SUCCESS_MAIL;
                header("Location: /examination.php#register-form");
                exit;
            }
            else {
                $_SESSION["code"] = $ERROR_MAIL_NOT_SENT;
                header("Location: /examination.php#register-form");
                exit;
            }
        }
      
        //The template does not exist.
        //Go to the code below.

    }
    
    //Inte en POST request
    $_SESSION["code"] = $ERROR_UNKNOWN;
    header("Location: /examination.php#register-form");
    exit;


?>