<section>
    <hr>
    <div class="col-12 mt-5 text-center">
        <h1 id="page-header">Admin Privilegier</h1>
        <h4 class="page-info mt-4">
            Välkommen!
        </h4>
        <h5 class="page-info mt-2 mb-2">
            Du är administratör, grattis! Du kan ta bort konton, skapa registreringslänkar, ta bort registreringslänkar,
            se en lista över vem som köper vad, lägga till nya presenter i önskelistan och ta bort presenter.
        </h5>
        <h5 class="page-info pb-5"> Rätt imponerande ellerhur?</h5>
    </div>
</section>

<!--- Generate Link --->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Generera länk</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                <input type="hidden" name="form-id" id="form-id" value="GENERATE-LINK">

                <div class="row">
                    <div class="col py-2">
                        <label class="my-1 mr-2 float-left" for="link">Genererad länk</label>
                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                        <input type="text" class="form-control" name="link" id="link" required="required" 
                        value="<?php
                                    if(isset($_SESSION["generatedCode"])) {
                                        print($_SESSION["generatedCode"]);
                                        unset($_SESSION["generatedCode"]);
                                    } 
                                    else {
                                        print("");
                                    }
                                ?>" readonly>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Generera</button>
            </form>
        </div>
    </div>
</section>


<!--- Delete link --->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Ta bort länk</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                <input type="hidden" name="form-id" id="form-id" value="REMOVE-LINK">
                <div class="row">
                    <div class="form-group w-100">
                        <div class="col py-3">
                            <label class="my-1 mr-2 float-left" for="links">Välj länken du vill ta bort</label>
                            <select class="custom-select mr-sm-2" name="links" id="links" data-width="auto" required>
                                <option value="">Välj...</option>
                                <!-- Print all the keys available -->
                                <?php 
                                    //Get all valid keys
                                    $getKeys = "SELECT address_key FROM Link";

                                    if($result = mysqli_query($link,$getKeys)) {
                                        //Query successful
                                        if(mysqli_num_rows($result) > 0) {
                                            //There are results

                                            while($rows = mysqli_fetch_array($result)) {
                                                $key = $rows["address_key"];
                                                print("<option value='$key'>".$key ."</option>");
                                            }
                                        }

                                        mysqli_free_result($result);
                                    }
                                ?>

                            </select>                            
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Ta Bort</button>

            </form>
        </div>
    </div>
</section>

<!-- Remove accounts -->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Ta bort konto</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                <input type="hidden" name="form-id" id="form-id" value="REMOVE-ACCOUNT">
                <div class="row">
                    <div class="form-group w-100">
                        <div class="col py-3">
                            <label class="my-1 mr-2 float-left" for="guests">Välj kontot du vill ta bort</label>
                            <select class="custom-select mr-sm-2" name="guests" id="guests" data-width="auto" required>
                                <option value="">Välj...</option>
                                <!-- Print all the keys available -->
                                <?php 
                                    //Get all valid keys
                                    $getKeys = "SELECT firstName,lastName,email,admin FROM Guest";

                                    if($result = mysqli_query($link,$getKeys)) {
                                        //Query successful
                                        if(mysqli_num_rows($result) > 0) {
                                            //There are results

                                            while($rows = mysqli_fetch_array($result)) {
                                                $firstName = $rows["firstName"];
                                                $lastName = $rows["lastName"];
                                                $email = $rows["email"];
                                                $admin = $rows["admin"];

                                                if($admin != 1)
                                                    print("<option value='$email'>".$firstName . " " . $lastName . " | E-Post: " . $email . "</option>");
                                            }
                                        }

                                        mysqli_free_result($result);
                                    }
                                ?>

                            </select>                            
                        </div>
                    </div>
                </div>
                <p>Observera att du endast kan ta bort vanliga konton. Alltså ej administratörer. </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Ta bort</button>

            </form>
        </div>
    </div>
</section>

<!--- See who have selected what gift -->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Presenter</h2>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <?php 
                    //Display all the taken gifts and their "owners".
                    $getTakenGifts = "SELECT Guest.firstName, Guest.lastName, Gift.name FROM Guest JOIN Gift ON Gift.guest_id = Guest.id";

                    if($result = mysqli_query($link,$getTakenGifts)) {
                        //Query successful
                        if(mysqli_num_rows($result) > 0) {
                            
                            //There are results
                            while($row = mysqli_fetch_array($result)) {
                                //Fetch a row
                                $firstName = $row["firstName"];
                                $lastName = $row["lastName"];
                                $giftName = $row["name"];
                                
                                print("<li class='list-group-item'> Present: " . $giftName . " | Vald av: " . $firstName . " " . $lastName . "</li>");
                            }
                        }
                        else {
                            print("<p>Inga presenter har valts ännu.</p>");
                        }
                    }
                    else {
                        $_SESSION["code"] = $ERROR_UNKNOWN;

                    }
                
                ?>
               
            </ul>
        </div>

        <!--- Handle any error -->
        <?php 
            
            $code = getCode($CODES);
        
            switch($code) {
                // Possible scenarios.
                case $ERROR_UNKNOWN:
                    echo "<p style='color: red' class='my-3 text-center'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                    break;
            }
        ?>
    </div>
</section>

<!-- Add gift -->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Lägg till present</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                <input type="hidden" name="form-id" id="form-id" value="ADD-GIFT">

                <div class="row">
                    <div class="col py-2">
                        <label class="my-1 mr-2 float-left" for="gift">Presentnamn</label>
                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                        <input type="text" class="form-control" name="gift" id="gift" required="required">
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Lägg till</button>
            </form>
        </div>
    </div>
</section>

<!-- Remove gift -->
<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Ta bort present</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                <input type="hidden" name="form-id" id="form-id" value="REMOVE-GIFT">

                <div class="row">
                    <div class="col py-2">
                        <label class="my-1 mr-2 float-left" for="gift">Presentnamn</label>
                        <!--- The onkeydown event makes sure that "Space" is not pressed --->
                        <input type="text" class="form-control" name="gift" id="gift" required="required">
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Ta bort</button>
                <p class="mt-3">Notera att det du skriver in är skiftlägekänsligt!</p>
            </form>
        </div>
    </div>
</section>

<!-- Edit gifts -->


<section>
    <div class="card my-5 text-center mx-auto">
        <div class="card-header text-center pt-4">
            <h2 id="card-header-text">Ändra existerande presenter</h2>
        </div>

        <div class="card-body">
            <form action="admin_dbcon.php" method="POST">
                <div class="form-group">
                    <!-- Hidden input, We have to keep track of what form is submitted on the page -->
                    <input type="hidden" name="form-id" id="form-id" value="EDIT-GIFTS">
                    <?php 
                        //Display all the taken gifts and their "owners".
                        $getTakenGifts = "SELECT name FROM Gift";

                        if($result = mysqli_query($link,$getTakenGifts)) {
                            //Query successful
                            if(mysqli_num_rows($result) > 0) {
                                
                                //There are results
                                while($row = mysqli_fetch_array($result)) {
                                    //Fetch a row
                                    $name = $row["name"];
                                    
                                    print('<input type="text" class="form-control mb-3" name="gift[]" id="' . $name . '" ' . 'value="'. $name .'" required="required" >');
                                }
                            }
                            else {
                                print("<p>Hittade inga presenter i listan.</p>");
                            }
                        }
                        else {
                            $_SESSION["code"] = $ERROR_UNKNOWN;

                        }
                    
                    ?>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary px-2 mx-auto py-2 mt-4">Ändra presenter</button>
                </div>
            </form>
        </div>

        <!--- Handle any error -->
        <?php 
            
            $code = getCode($CODES);
        
            switch($code) {
                // Possible scenarios.
                case $ERROR_UNKNOWN:
                    echo "<p style='color: red' class='my-3 text-center'>Något gick fel. Vänligen försök igen eller kontakta <a href='mailto:liam.andersson2002@gmail.com'>liam.andersson2002@gmail.com.</a></p>";
                    break;
            }
        ?>
    </div>
</section>
