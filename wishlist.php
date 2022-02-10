<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
            require("forbidden/init_session.php"); 
            require("forbidden/check_login.php");
            redirectIfNotLoggedIn("wishlist.php");
        ?>
        <title>Student | Studentdagen</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("forbidden/required_imports.php"); ?>
        <!-- Examination specific links / scripts -->
        <link rel="stylesheet" href="css/wishlist_style.css">
        <link rel="stylesheet" href="css/fade_in.css">
        
    </head>
    <body>
        <!-- Header -->
        <?php 
            require("forbidden/header.php"); 
            require("forbidden/check_error.php");
            
            //If the user is newly logged in / registered we want to show a green header at the top.
            require("forbidden/login_register_animation.php");
        ?>

        <div class="container-fluid">
                <!-- The  three images at the top -->
                <div class="row align-self-center wrapper">
                
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4" id="left-image"></div>
                
                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4" id="middle-image"></div>
                
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4" id="right-image"></div>


                <!-- Thank you ShadeDivider [https://www.shapedivider.app/] for providing this tool.  -->
                <div class="custom-shape-divider-bottom-1644017640">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>    

            </div>

            <div class="row">
                <div class="col-12 text-container">
                    <h1 id="text-header">Önskelista</h1>
                    <p>
                        Din närvaro är allt jag önskar. Om du ändå vill uppmärksamma min student med en present 
                        så finns det en önskelista längre ner på sidan.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 description">
                    <p>
                        Om ni vill köpa något finns förslag nedan. Vänligen bocka för det du vill köpa och
                        tryck sedan på <strong>"Skicka"</strong> knappen längst ner för att undvika dubbletter. Om ett objekt är <s>överstruket
                        </s> så betyder det att någon annan redan har köpt det. 
                    </p>
                </div>
            </div>

            <!-- Registration form -->
            <div class="card mx-auto mt-5">
                <div class="card-header pt-4">
                    <h2 id="card-header-text">Presentlista</h2>
                </div>
                <div class="card-body">
                    <form action="whitelist_dbcon.php" id="gift-form" method="POST">  
                        <?php
                            // Print the gifts in the database.
                            require("forbidden/db_connection.php");

                            $get_gifts = "SELECT name,taken FROM Gift";

                            if($result = mysqli_query($link,$get_gifts)) {
                                if(mysqli_num_rows($result) > 0) {
                                    while($rows = mysqli_fetch_array($result)) {
                                        //Get the values
                                        $name = $rows["name"];
                                        $taken = $rows["taken"];
                                        
                                        if($taken) {
                                            print("<div class='form-group'>
                                                        <div class='col py-3 ml-3 float-left'>
                                                            <input class='form-check-input' type='checkbox' value='$name' name='gift[]' id='$name' disabled>
                                                            <label class='form-check-label' for='$name'>
                                                                <s>$name</s>
                                                            </label>
                                                        </div>
                                                    </div>");
                                        }
                                        else {
                                            print("<div class='form-group'>
                                                        <div class='col py-3 ml-3 float-left'>
                                                            <input class='form-check-input' type='checkbox' value='$name' name='gift[]' id='$name'>
                                                            <label class='form-check-label' for='$name'>
                                                                $name
                                                            </label>
                                                        </div>
                                                    </div>");
                                        }
                                    }
                                }
                            }
                            else {
                                //Query failed
                                $_SESSION["code"] = $ERROR_UNKNOWN;
                            }
                        
                        ?>
                        


                        <button type="submit" name="submit" id="submit"class="btn btn-primary mx-auto py-3 mt-6">Skicka min anmälan</button>
                        <p class="pt-4 text-center">Om du har strukit över ett objekt men ångrar dig, kontakta <a href="mailto:malena.bk@live.se">Malena Björneklint.</a></p>
                      
                        <!--- Handle any error -->
                        <?php 
                          
                            $code = getCode($CODES);
                        
                            switch($code) {
                                // Possible scenarios.
                                case $ERROR_UNKNOWN:
                                    echo "<p style='color: red' class='my-3 text-center'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                    break;
                                case $SUCCESS_GIFT:
                                    echo "<p style='color: green' class='my-3 text-center'>Din förfrågan var lyckad. Ditt/Dina valda presenter är nu låsta.</a> </p>";
                                    break;
                                case $ERROR_NOT_SELECTED:
                                    echo "<p style='color: red' class='my-3 text-center'>Vänligen välj något i listan.</p>";
                                    break;
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>

        <!--- TEMPORARY SPACE -->
        <div class="space"></div>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>


    </body>

</html>