<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader

    require($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
    
    function sendMail($email, $subject, $messageHTML, $messageAlt) {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = "smtp.gmail.com"; //gethostname();                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "liopboy2002@gmail.com";                     //SMTP username
            $mail->Password   = "LiamAndersson2002!";                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom("liopboy2002@gmail.com","noreply@feliciastudent.se");
            $mail->addAddress($email);     //Add a recipient

            //Content 
            $mail->isHTML(true);  
            $mail->Subject = $subject;
            $mail->Body=$messageHTML;
            $mail->AltBody = $messageAlt;

            if($mail->send()) {
                return true;
            }
            else {
                return false;
            }
            
        } catch (Exception $e) {
            return false;
        }
    }   
?>