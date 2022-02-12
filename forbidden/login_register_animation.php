<!-- We assume that a session has started before hand -->
<style>

    .successful-header {
        background: green;
        color: #FFFF;
        text-align: center;
        font-weight: bold;
        font-size: 1em;
    }
    .not-successful-header {
        background: red;
        color: #FFFF;
        text-align: center;
        font-weight: bold;
        font-size: 1em;
    }


</style>

<!--- Maybe move this into a seperate file? -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    // This removes the header after 3 seconds with an animation.

    //What if the div does not exist?
    setTimeout(() => {
        $(".successful-header").slideUp(function() {
            $(".successful-header").remove();
        });

    },3000);
    
</script>

<?php
    //Display message if logged in / newly registered.
    $code = getCode($CODES);
    switch($code) {
        case $SUCCESS_LOGIN:
            print("<div class='successful-header'>Du är nu inloggad.</div>");
            break;
        case $SUCCESS_REGISTER:
            print("<div class='successful-header'>Du är nu registrerad.</div>");
            break;
        case $SUCCESS_TECHNICAL_MAIL_SENT:
            print("<div class='successful-header'>Ditt meddelande har skickats!</div>");
            break;
        case $ERROR_TECHNICAL_MAIL_NOT_SENT:
            print("<div class='not-successful-header'>Ditt meddelande skickades ej.</div>");
            break;
        case $ERROR_CHANGE:
            print("<div class='not-successful-header'>Något gick fel med din förfrågan.</div>");
            break;
        case $SUCCESS_CHANGE:
            print("<div class='successful-header'>Dina uppgifter har ändrats.</div>");
            break;
        default:
            $_SESSION["code"] = $code;
    }
    
?>