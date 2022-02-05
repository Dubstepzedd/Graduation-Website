<?php 
//We assume that a session is present.  

function hasErrorOccured() {

    if($_SESSION["error"] === true) {
        $_SESSION["error"] = null;
        return true;
    }
    return false; 
     
}


function wasSuccessful() {
    if($_SESSION["error"] === false) {
        $_SESSION["error"] = null;
        return true;
    }  

    return false;
}

?>