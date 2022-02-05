<!DOCTYPE html>
<html>
    <head>
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
            <div class="background d-flex align-items-center">
                <div class="card text-center mx-auto">
                    <div class="card-header py-3">
                        <h2 id="card-header-text">FELICIA STUDENT</h2>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="firstname">Förnamn</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="lastname">Efternamn</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-3">
                                    <label class="my-1 mr-2 float-left" for="password">Lösenord</label>
                                    <input type="password" class="form-control" id="password" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-muted info-text mx-auto">
                                    Vi har valt att göra ett inloggningsystem för att undvika otillåten trafik på sidan.
                                    Genom att trycka på "Registera mig" nedan så går du med på att dina uppgifter sparas tills efter
                                    evenemanget är över.
                                </p>
                               
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Registrera mig</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>
            </div>
    </body>
</html>