<?php 
    //Require a session and ensure that the visitor is logged in.
    require("forbidden/init_session.php"); 
    require("forbidden/check_login.php");
    redirectIfNotLoggedIn("contact.php");
?>
<!DOCTYPE html>
<html lang="sv">
    <head>
        <title>Student | Kontakt</title>
        <link rel="icon" href="images/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        <?php require("forbidden/required_imports.php") ?>
        <!-- Contact specific links / scripts -->
        <link rel="stylesheet" href="css/contact_style.css">
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
        <main>
            <!--- Main body --->
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
                    <!-- Contact cards -->
                    <div class="row text-center mt-5 mb-5">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <!-- Section Heading-->
                            <h1 class="title">Kontakt</h1>
                            <p>Vid frågor och funderingar så finns kontaktuppgifter nedan. </p>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto">
                            <div class="card mb-5">
                                <div class="card-body mx-auto">
                                    <img class="img mx-auto" src="images/felicia_göteborg.jpg">
                                    <div class="info-container">
                                        <h4 class="card-title">Felicia Björneklint</h5>
                                        <p class="card-text">Telefon: <a class="blue-text" href="tel:+46723298140">072-329 81 40</a></p>
                                        <p class="card-text">E-Post: <a class="blue-text" href="mailto:Felicia.bk@live.se">Felicia.bk@live.se</a></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="card-body mx-auto">
                                    <img class="img mx-auto" src="images/malena.jpg">
                                    <div class="info-container">
                                        <h4 class="card-title">Malena Björneklint</h5>
                                        <p class="card-text">Telefon: <a class="blue-text" href="tel:+46705081770">070-508 17 70</a></p>
                                        <p class="card-text">E-Post: <a class="blue-text" href="mailto:Malena.bk@live.se">Malena.bk@live.se</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- FOOTER -->
        <?php require("forbidden/footer.php"); ?>
    </body>

</html>