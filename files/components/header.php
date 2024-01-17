<header>
    <nav class="container">

        <div class="navbar-desktop">
            <div class="navbar-desktop-sitename">
                <h2>Finn Josten</h2>
            </div>
            <div class="navbar-desktop-items">';
                <?php if ($page['name'] != "home") { ?> <a href="<?= $path ?>"><p>Home</p></a> <?php } ?>
                <a href="<?= $path ?>over-mij/"><p>Over Mij</p></a>
                <a href="<?= $path ?>projects/"><p>Mijn werk</p></a>
                <a href="<?= $path ?>contact/"><p>Contact</p></a>
            </div>
        </div>
        
        <div class="navbar-mobile">
            <div class="navbar-mobile-sitename">
                <h2>Finn Josten</h2>
            </div>
            <div class="navbar-mobile-items">
                <div class="open-nav" onclick="openNav()"><i class="da-icon da-icon--bars da-icon--large"></i></div>
            </div>
            <div id="navbar-mobile-fullscreen" class="nav-overlay">
                <p href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="da-icon da-icon--xmark da-icon--xxx-large"></i></p>
                <div class="nav-overlay-content">';
                    <?php if ($page['name'] != "home") { ?> <a href="<?= $path ?>"><p>Home</p></a> <?php } ?>
                    <a href="<?= $path ?>over-mij"><p>Over Mij</p></a>
                    <a href="<?= $path ?>projects/"><p>Mijn werk</p></a>
                    <a href="<?= $path ?>contact/"><p>Contact</p></a>
                </div>
            </div>
        </div>

        <script>
            function openNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "100%"; }
            function closeNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "0%"; }
        </script>
    </nav>
</header>