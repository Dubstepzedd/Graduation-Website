<!DOCTYPE html>
<html>
    <head>

        <?php 
            // --- Here we handle requests to the site. If it does not match the key the user will be sent to index.php
            require("components/init_session.php");
            require("components/db_connection.php");
            //If there is not get request, throw them to index.php.
            if(!empty($_GET) && isset($_GET["key"])) {

                $key = mysqli_real_escape_string($link,$_GET["key"]);
                $sql = "SELECT * FROM Link WHERE link.address_key ='$key' limit 1";
            
                if($result = mysqli_query($link, $sql)){
                
                    if(mysqli_num_rows($result) != 1){
                        
                        header("Location: /index.php");
                        exit;
                    } 
                    
                    $_SESSION["key"] = $key;
                    //Free the memory
                    mysqli_free_result($result);
                    
                
                } 
                else {
                    header("Location: /index.php");
                    exit;
                }
            
            }
            else {
                header("Location: /index.php");
                exit;
            }

            mysqli_close($link);
        ?>
        <!--- Ordinary Information -->
        <title>Student | Registrera</title>
        <link rel="icon" href="bilder/mössa.jpg">
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
        <link rel="stylesheet" href="css/register_style.css">

    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="d-flex background align-items-center">
                <div class="card my-4 text-center mx-auto">
                    <div class="card-header pt-4">
                        <h2 id="card-header-text">FELICIAS STUDENT</h2>
                    </div>
                    <div class="card-body">
                        <form action="register_dbcon.php" method="post">
                            <div class="row">
                                <div class="col py-2">
                                    <label class="my-1 mr-2 float-left" for="firstname">Förnamn</label>
                                     <!-- Bara bokstäver tillåtna a-ö -->
                                    <input type="text" onkeydown="return /[a-ö]/i.test(event.key)" class="form-control" name="firstname" id="firstname" equired="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="lastname">Efternamn</label>
                                    <!-- Bara bokstäver tillåtna a-ö -->
                                    <input type="text" onkeydown="return /[a-ö]/i.test(event.key)" class="form-control" name="lastname" id="lastname" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="email">E-Post</label>
                                    <input type="email" class="form-control" name="email" id="email" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="password">Lösenord</label>
                                    <input type="password" class="form-control" name="password" id="password" required="required" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-muted info-text mx-auto">
                                    Vi har valt att göra ett inloggningsystem för att undvika otillåten trafik på sidan.
                                    Genom att trycka på "Registera mig" nedan så går du med på att dina uppgifter sparas tills efter
                                    evenemanget är över.
                                </p>
                            </div>

                            <button type="submit" class="btn btn-primary px-2 py-2 mt-4">Registrera mig</button>
                            <!--- Handle any error -->
                            <?php 
                                include("components/check_error.php");
                                print(isset($_SESSION["error"]));
                                if(hasErrorOccured()) {
                                    echo "<p style='color: red' class='my-3'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>