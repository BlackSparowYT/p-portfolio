<footer>

    <?php

    echo '
        <div class="flex-box-1">
            <div class="block-1">
                <a><img src="'.$path.'files/images/logo.png"></a>
            </div>
            <div class="block-2">
                <div class="block-2-1">
                    <h3>Contact</h3>
                    <p>
                        email: <a target="_blank" href="mailto:support@remote-reizen.nl">support@remote-reizen.nl</a>
                        <br>
                        Telefoon: <a target="_blank" href="tel:+31632897589">+31 6 32897589</a>
                    </p>

                </div>
                <div class="block-2-2">
                    <h3>Alle Pagina&apos;s:</h3>
                    <div class="block-2-2-1">
                        <p><a href="'.$path.'index.php">Home</a></p>
                        <p><a href="'.$path.'reizen/index.php">Onze Reizen</a></p>
                        <p><a href="'.$path.'over-ons.php">Over Ons</a></p>
                        <p><a href="'.$path.'contact.php">Contact</a></p>
                        <?php if($loggedin == true): ?>
                            <p><a href="'.$path.'account/login.php">Dashboard</a></p>
                        <?php else: ?>
                            <p><a href="'.$path.'account/login.php">Login</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>';
    
    ?>
    
    <div class="block-3">
        <h3>&#169; <script>document.write(new Date().getFullYear())</script> | Remote Reizen</h3>
    </div>
</footer>