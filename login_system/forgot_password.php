<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
            //Require a session
            require($_SERVER['DOCUMENT_ROOT']."/forbidden/init_session.php");
            
        ?>
        <!--- Ordinary Information -->
        <title>Student | Glömt Lösenord</title>
        <link rel="icon" href="../images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">

        <!--- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!--- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <!-- CSS file -->
        <link rel="stylesheet" href="../css/forgot_password_style.css">

    </head>
    <body>
        <main>
            <section>
                <div class="container-fluid px-0">
                    <div class="d-flex background align-items-center">
                        <div class="card my-4 text-center mx-auto">
                            <div class="card-header pt-4">
                                <h2 id="card-header-text">Glömt lösenord</h2>
                            </div>
                            <div class="card-body">
                                <form action="forgot_password_dbcon.php" method="POST">
                                    <div class="row">
                                        <div class="col py-3">
                                            <label class="my-1 mr-2 float-left" for="email">E-Post</label>
                                            <!--- The onkeydown event makes sure that "Space" is not pressed --->
                                            <input type="email" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" class="form-control" name="email" id="email" required="required" placeholder="...">
                                        </div>
                                    </div>
                                    <p> Vi kommer att skicka ett meddelande till den angivna E-Posten ovan om den existerar i databasen. </p>
                                    <button type="submit" name="submit" class="btn btn-primary px-2 py-2 mt-4">Skicka</button>

                                    <!--- Handle any error -->
                                    <?php 
                                        include($_SERVER['DOCUMENT_ROOT']."/forbidden/check_error.php");
                                        $code = getCode($CODES);
                                        
                                        switch($code) {
                                            // Possible scenarios.
                                            case $ERROR_UNKNOWN:
                                                echo "<p style='color: red' class='my-3'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                                break;
                                            case $ERROR_USER_DOES_NOT_EXIST:
                                                echo "<p style='color: red' class='my-3'>Den angivna e-posten existerar inte i databasen.</p>";
                                                break;
                                            case $ERROR_WRONG_PASSWORD:
                                                echo "<p style='color: red' class='my-3'>Fel lösenord.</p>";
                                                break;
                                            case $ERROR_MAIL_NOT_SENT:
                                                echo "<p style='color: red' class='my-3'>Det elektroniska brevet skickades ej. Vänligen försök igen. Om problemet kvarstår, kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                                break;
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>