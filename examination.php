<!DOCTYPE html>
<html lang="sv">
    <head>
        <?php 
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
        <!--- Handle Radiobuttons in form -->
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
        <?php require("forbidden/header.php"); ?>

        <!--- Main body --->
        <div class="container-fluid px-0">

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

            <!-- Welcoming message under images -->
            <div class="row mb-5">
                <div class="col-12">
                <div class="big-text-wrapper">
                    <h2 id="welcome-text">VÄLKOMMEN TILL MIN</h1>
                    <h1 class="student-text">STUDENT!</h1>
                </div>
                </div>
            </div>

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
            
            <!-- Space -->
            <div class="py-5 my-5"></div>

            <!-- Party information -->
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




            <!-- Registration form -->
            <div class="card text-center mx-auto">
                <div class="card-header pt-4">
                    <h2 id="card-header-text">Anmälningsformulär</h2>
                </div>
                <div class="card-body">
                    <form action="examination_dbcon.php" method="POST">
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
                                <select class="custom-select mr-sm-2" id="guests" required>
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
                        <div class="form-check form-check-inline pb-3">
                            <input class="form-check-input" type="radio" name="activity" id="both" value="Firande och utspring" checked>
                            <label class="form-check-label" for="both">
                                Kommer på både utspring och firande.
                            </label>
                        </div>
                        <div class="form-check form-check-inline pb-3">
                            <input class="form-check-input" type="radio" name="activity" id="exam" value="Firande">
                            <label class="form-check-label" for="exam">
                                Kommer endast på utspringet.
                            </label>
                        </div>
                        <div class="form-check form-check-inline pb-3">
                            <input class="form-check-input" type="radio" name="activity" id="celebration" value="Firande">
                            <label class="form-check-label" for="celebration">
                                Kommer endast på firandet.
                            </label>
                        </div>
                        <div class="form-check form-check-inline pb-3">
                            <input class="form-check-input" type="radio" name="activity" id="none" value="Inget">
                            <label class="form-check-label" for="none">
                                Har tyvärr inte möjlighet att komma.
                            </label>
                        </div>
                        
                        <div class="form-group mt-4">
                            <label for="allergies">Ange Specialkost / Allergier</label>
                            <textarea class="form-control rounded-1 mx-auto alternative" id="allergies" rows="3"></textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label for="allergies">Övrigt</label>
                            <textarea class="form-control rounded-1 mx-auto alternative" id="allergies" rows="3"></textarea>
                        </div>
                                        
                        <button type="submit" name="submit" id="submit"class="btn btn-primary mx-auto py-3 mt-5">Skicka min anmälan</button>
                        <p class="pt-4">Vill du säga några ord på denna festliga dag, kontakta <a href="mailto:malena.bk@live.se">Malena Björneklint.</a></p>

                        <!--- Handle any error -->
                        <?php 
                            include($_SERVER['DOCUMENT_ROOT']."/forbidden/check_error.php");
                            $code = getCode($CODES);
                        
                            switch($code) {
                                // Possible scenarios.
                                case $ERROR_UNKNOWN:
                                    echo "<p style='color: red' class='my-3'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                                    break;
                                case $SUCCESS_VERIFICATION:
                                    echo "<p style='color: green' class='my-3'>Ditt lösenord är nu bytt.</p>";
                                    break;
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>


    </body>

</html>