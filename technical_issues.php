<?php
    //Sends a message to the developer's email. The message sender is in the footer.
    //Require a session
    require("forbidden/init_session.php");
    $cameFrom = "/".$_SESSION["redirect"];
    //Check that it's a post and that it was submitted by the page

    if($_SERVER["REQUEST_METHOD"] === "POST"  && isset($_POST["submit"]) ) {
        
        require("forbidden/mailer.php");
        $message = $_POST["msg"];
        $sub = '=?UTF-8?B?'.base64_encode("Tekniska problem med student sidan").'?=';
    
        if(sendMail("Liam.andersson2002@gmail.com",$sub,$message,$message)){
            $_SESSION["code"] = $SUCCESS_TECHNICAL_MAIL_SENT;
            header("Location: ". $cameFrom);
            exit;
        }   
    }

    $_SESSION["code"] = $ERROR_TECHNICAL_MAIL_NOT_SENT;
    header("Location: ". $cameFrom);
    exit;
    

?>