<footer class="w-100 pt-4 flex-shrink-0">
    <div class="container">
        <div class="row gy-4 gx-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-3 footer-title">Kort information</h5>
                <p class="small text-muted">
                    Den här sidan är dedikerad till Felicia Björneklints student.
                    All nödvändig information finns tillgänglig på den här domänen.
                </p>
                <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. Björneklint</p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-white mb-3 footer-title">Länkar</h5>
                <ul class="list-unstyled text-muted py-0">
                    <li><a href="index.php" class="small">Hem</a></li>
                    <li><a href="examination.php"  class="small">Studentdagen</a></li>
                    <li><a href="contact.php" class="small">Önskelista</a></li>
                    <li><a href="contact.php" class="small">Kontakt</a></li>
                    <li><a href="account.php" class="small">Mitt Konto</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-3 footer-title">Tekniska problem</h5>
                <p class="small text-muted">
                    Upplever du något problem med sidan? Beskriv ditt problem nedan så åtgärdar vi det så fort vi kan!
                </p>
                <form action="/technical_issues.php" method="POST">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Meddelande" aria-label="Meddelande" aria-describedby="button-addon2" id="msg" name="msg">
                        <button class="btn btn-primary" name="submit" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>