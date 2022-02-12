<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
            //Require a session and ensure that the visitor is logged in.
            require("forbidden/init_session.php");
            require("forbidden/check_login.php");
            redirectIfNotLoggedIn("examination.php");
        ?>
        <title>Student | Studentdagen</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("forbidden/required_imports.php"); ?>
        <!-- Examination specific links / scripts -->
        <link rel="stylesheet" href="css/examination_style.css">
        <link rel="stylesheet" href="css/fade_in.css">

        <!--- Handle Radiobuttons in form (disables allergies when a certain status is checked) --->
        <script type="text/javascript">
            $(document).ready(function(){
                $('input[type=radio][name=activity]').change(function() {
                    if (this.id == "none" && this.checked) {
                        console.log(this.value);
                        $(".alternative").prop("disabled",true);
                    }
                    else {
                        $(".alternative").prop("disabled",false);
                    }
                });
             
            });

        </script>
    </head>

    <body>
        <!-- Header -->
        <?php 
            require("forbidden/header.php"); 
            require("forbidden/check_error.php");
            
            //If the user is newly logged in / registered we want to show a green header at the top.
            require("forbidden/login_register_animation.php");
        ?>
        <!--- Main body --->
        <main>
            <div class="container-fluid px-0">
                <section>
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
                </section>

                <section>
                    <!-- Welcoming message under images -->
                    <div class="row mb-5">
                        <div class="col-12">
                        <div class="big-text-wrapper">
                            <h2 id="welcome-text">VÄLKOMMEN TILL MIN</h1>
                            <h1 class="student-text">STUDENT!</h1>
                        </div>
                        </div>
                    </div>
                </section>

                <section>
                    <!-- School information -->
                    <div class="row fixed-img-container">
                        <!-- Waves above -->
                        <div class="custom-shape-divider-bottom-1644359138">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>

                        <!-- Fixed background-->
                    
                        <div class="background" id="school-background">
                            <div class="row h-100">
                                <div class="col-sm-12 my-auto">
                                    <h1 class="info-text mx-auto my-auto">Utspring kommer att ske på <a href="https://goo.gl/maps/tAH6iSBKdB9bgtgs7" target="_blank">Lars Kaggskolan</a> (Lorensbergsgatan 56). Exakt tid för utspring kommer i Maj. </h1>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Waves below -->
                        <div class="custom-shape-divider-top-1644359076">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                </section>

                <section>
                    <!-- Space -->
                    <div id="space"></div>
                </section>

                <section>
                    <!-- Celebration information -->
                    <div class="fixed-img-container">
                        <!-- Waves above -->
                        <div class="custom-shape-divider-bottom-1644359138">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>

                        <!-- Fixed background-->
                    
                        <div class="background" id="party-background">
                            <div class="row h-100">
                                <div class="col-sm-12 my-auto">
                                    <h1 class="info-text mx-auto my-auto">Efter utspringet kommer jag att åka flak i Kalmar city i cirka en timme. Därefter serveras mat och dryck i trädgården på <a>Mandelblomsvägen 31</a></h1>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Waves below -->
                        <div class="custom-shape-divider-top-1644359076">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                </section>

                <section>
                    <!-- Registration form -->
                    <div class="card mx-auto">
                        <div class="card-header pt-4">
                            <h2 id="card-header-text">Anmälningsformulär</h2>
                        </div>
                        <div class="card-body">
                            <form action="examination_dbcon.php" id="register-form" method="POST">
                                <!--- Basic information -->
                                <div class="form-group">
                                    <div class="col py-3">
                                        <label class="my-1 mr-2 float-left" for="firstName">Förnamn</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" required="required" value="<?php print($_SESSION["firstName"]);?>" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col py-3">
                                        <label class="my-1 mr-2 float-left" for="lastName">Efternamn</label>
                                        <input type="text" class="form-control" name="lastName" id="lastName" required="required" value="<?php print($_SESSION["lastName"]);?>" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col py-3">
                                        <label class="my-1 mr-2 float-left" for="guests">Välj antal gäster</label>
                                        <select class="custom-select mr-sm-2" name="guests" id="guests" required>
                                            <option value="">Välj...</option>
                                            <?php 
                                                for($i = 1; $i <= 8; $i++) {
                                                    print("<option value=". $i .">$i</option>");
                                                }
                                            ?>
                                        </select>                            
                                    </div>
                                </div>
                                <!-- Radio buttons -->
                                <div class="col py-2">
                                    <p> Välj en av följande: </p>
                                </div>
                                <div class="form-group form-check form-check-inline pb-3">
                                    <div class="col py-1 d-flex">
                                        <input class="form-check-input" type="radio" name="status" id="both" value="kommer på firande och utspring" checked>
                                        <label class="form-check-label" for="both">
                                            Kommer på både utspring och firande.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-check form-check-inline pb-3">
                                    <div class="col py-1 d-flex">
                                        <input class="form-check-input" type="radio" name="status" id="exam" value="kommer på utspring">
                                        <label class="form-check-label" for="exam">
                                            Kommer på utspringet.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-check form-check-inline pb-2">
                                    <div class="col py-1 d-flex">
                                        <input class="form-check-input" type="radio" name="status" id="celebration" value="kommer på firande">
                                        <label class="form-check-label" for="celebration">
                                            Kommer på firandet.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-check form-check-inline pb-2">
                                    <div class="col py-1 d-flex">
                                        <input class="form-check-input" type="radio" name="status" id="moment" value="kommer en stund">
                                        <label class="form-check-label" for="moment">
                                            Kommer förbi en stund.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-check form-check-inline pb-2">
                                    <div class="col py-1 d-flex">
                                        <input class="form-check-input" type="radio" name="status" id="none" value="kommer ej">
                                        <label class="form-check-label" for="none">
                                            Har tyvärr inte möjlighet att komma.
                                        </label>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group mt-4">
                                    <div class="col py-3">
                                        <label for="allergies">Ange Specialkost / Allergier</label>
                                        <textarea class="form-control rounded-1 alternative" name="allergies" id="allergies" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <div class="col py-3">
                                        <label for="general">Övrigt</label>
                                        <textarea class="form-control rounded-1" name="general" id="general" rows="3"></textarea>
                                    </div>
                                </div>
                                                
                                <button type="submit" name="submit" id="submit"class="btn btn-primary mx-auto py-3 mt-5">Skicka min anmälan</button>
                                <p class="pt-4 text-center">Vill du säga några ord på denna festliga dag, kontakta <a href="mailto:malena.bk@live.se">Malena Björneklint.</a></p>

                                <!--- Handle any error -->
                                <?php 
                                    $code = getCode($CODES);
                                    switch($code) {
                                        // Possible scenarios.
                                        case $ERROR_UNKNOWN:
                                            echo "<p style='color: red' class='my-3 text-center'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                            break;
                                        case $SUCCESS_MAIL:
                                            echo "<p style='color: green' class='my-3 text-center'>Din anmälan har skickats!</a> </p>";
                                            break;
                                        case $ERROR_MAIL_NOT_SENT:
                                            echo "<p style='color: red' class='my-3 text-center'> Din anmälan skickades ej. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a> </p>";
                                            break;
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>


    </body>

</html>