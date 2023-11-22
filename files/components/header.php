<header>
    <nav>

        <?php 

        echo '
        <div id="navbar-desktop">
            <div class="navbar-desktop-sitename">
                <h2>FR Josten</h2>
            </div>
            <div class="navbar-desktop-items">';
            if ($page['name'] != "home") {
                '<a class="t1" href="'.$path.'"><h3>Home</h3></a>';
            }
            echo '    
                <a href="'.$path.'over-mij/"><h3>Over Mij</h3></a>
                <a href="'.$path.'projects/"><h3>Projecten</h3></a>
                <a href="#contact"><h3>Contact</h3></a>
            </div>
        </div>
        
        <div id="navbar-mobile">
            <div class="navbar-mobile-sitename">
                <h2>FR Josten</h2>
            </div>
            <div class="navbar-mobile-items">
                <a onclick="openNav()"><h3>&#9776;</h3></a>
            </div>
            <div id="navbar-mobile-fullscreen" class="nav-overlay">
                <a href="javascript:void(0)" class="closebtn t1" onclick="closeNav()">&times;</a>
                <div class="nav-overlay-content">';
                if ($page['name'] != "home") {
                    '<a class="t1" href="'.$path.'"><h3>Home</h3></a>';
                }
                echo '    
                    <a href="'.$path.'over-mij"><h3>Over Mij</h3></a>
                    <a href="'.$path.'projects/"><h3>Projecten</h3></a>
                    <a href="#contact"><h3>Contact</h3></a>
                </div>
            </div>
        </div>';


        ?>

        <script>
            function openNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "100%"; }
            function closeNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "0%"; }
        </script>
    </nav>
</header>