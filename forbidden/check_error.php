<?php 

//We assume that a session is present and that the codes are already defined..  

function getCode($CODES) {
    global $NONE;
    if(isset($_SESSION["code"])) {
        //A code is set!
        $code = $_SESSION["code"];
        
        if($code < count($CODES)) {
           
            $returnValue = $CODES[$code];
            $_SESSION["code"] = $NONE;
            return $returnValue;
        }
    }
    
    throw new Exception("Code has not been set yet.");
    
}

?>