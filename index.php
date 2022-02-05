<!DOCTYPE html>
<html>
    <head>
        <?php require("init_session.php"); ?>
        <!--- Ordinary Information -->
        <title>Student | Start</title>
        <link rel="icon" href="bilder/mössa.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="En sida dedikerad till Felicia Björneklints student 2022">
        <meta name="author" content="Liam Andersson">
        
        <?php require("components/required_imports.php"); ?>
        <!--- Index specific links / scripts -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script> 
        <link rel="stylesheet" href="css/index_style.css">
        <script src="js/index.js"></script>

    </head>
    <body>
        <!--- Header -->
        <?php  
          require("components/header.php"); 
          include("check_error.php");
          if(wasSuccessful()) {
            echo "<div id='successful-header'>Ditt konto är nu registrerat!</div>";
          }
        ?>

        
        <div class="container-fluid px-0">
          <!-- Three images at the top -->
          <div class="row align-self-center wrapper">

              <div class="countdown-wrapper align-self-center">
                <h1 id="countdown">13 </h1>
                <h2 id="countdown-text">DAGAR KVAR TILL STUDENTEN</h2>
              </div>
              
              <div class="col-4" id="left-image"></div>
              
              <div class="col-4 align-self-center" id="middle-image"></div>
              
              <div class="col-4" id="right-image"></div>


              <!-- Thank you ShadeDivider [https://www.shapedivider.app/] for providing this tool. -->
              <div class="custom-shape-divider-bottom-1644017640">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                </svg>
              </div>
          </div>

          <!-- Big text -->
          <div class="row">
            <div class="col-12">
              <div class="big-text-wrapper">
                <h2 id="welcome-text">VÄLKOMMEN TILL MIN</h1>
                <h1 class="student-text">STUDENT!</h1>

                <div class="text-information">
                  <h2 id="date">Fredagen den 17 Juni</h3>
                  <h3 id="utspring">Utspring: Lars Kaggskolan</h4>
                  <h3 id="fika">Firande & Mat: Mandelblomsvägen 31</h4>
                  <p id="ytterligare_info">OSA senast 1 Juni via <a href="contact.html">Studentdagen.</a></p>
                </div>
              </div>
            </div>
          </div>
        
          <!-- FOOTER -->
          <?php require("components/footer.php"); ?>

        </div>
       
        
    </body>
    

</html>