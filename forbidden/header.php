
<header>
    <nav class="fixed-top navbar navbar-expand-lg background-top" id="menu">
        <div class="navbar-brand y-auto">
            <h1 class="navbar-brand" id="brand">FELICIA BJÖRNEKLINT</h1>
        </div>

        <button class="navbar-toggler" id="collapse-btn" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="#navbar" aria-expanded="false" aria-label="Toggle navigation" onclick="changeIcon(this)">
            <i class="fas fa-bars fa-lg" id="collapse-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav ml-auto y-auto" id="menu-navbar">
                <?php 
                    //Get the current file name and alter the links after it. 
                    $file = substr($_SERVER["SCRIPT_NAME"],1);
                    $ending = ".php";
                    $file = substr($file,0,strlen($file) - strlen($ending));
                   
                ?>
                <a class="nav-item nav-link <?php if ($file == 'index') echo 'active'; ?>" href="index.php">Hem</a>
                <a class="nav-item nav-link <?php if ($file == 'examination') echo 'active'; ?>" id="examination" href="examination.php">Studentdagen</a>
                <a class="nav-item nav-link <?php if ($file == 'wishlist') echo 'active'; ?>" id="wishlist" href="wishlist.php">Önskelista</a>
                <a class="nav-item nav-link <?php if ($file == 'contact') echo 'active'; ?>" id="contact" href="contact.php">Kontakt</a>   
                <a class="nav-item nav-link <?php if ($file == 'account') echo 'active'; ?>" id="account" href="account.php">Mitt Konto</a>   
            </div>
        </div>
    </nav>
</header>