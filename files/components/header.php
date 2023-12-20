<header>
    <nav>

        <?php 

        echo '
        <div id="navbar-desktop">
            <div class="navbar-desktop-sitename">
                <h2>Finn Josten</h2>
            </div>
            <div class="navbar-desktop-items">';
            if ($page['name'] != "home") {
                '<a class="t1" href="'.$path.'"><p>Home</p></a>';
            }
            echo '    
                <a href="'.$path.'over-mij/"><p>Over Mij</p></a>
                <a href="'.$path.'projects/"><p>Mijn werk</p></a>
                <a href="'.$path.'contact/"><p>Contact</p></a>
            </div>
        </div>
        
        <div id="navbar-mobile">
            <div class="navbar-mobile-sitename">
                <h2>Finn Josten</h2>
            </div>
            <div class="navbar-mobile-items">
                <a onclick="openNav()"><p>&#9776;</p></a>
            </div>
            <div id="navbar-mobile-fullscreen" class="nav-overlay">
                <a href="javascript:void(0)" class="closebtn t1" onclick="closeNav()">&times;</a>
                <div class="nav-overlay-content">';
                if ($page['name'] != "home") {
                    '<a class="t1" href="'.$path.'"><p>Home</p></a>';
                }
                echo '    
                    <a href="'.$path.'over-mij"><p>Over Mij</p></a>
                    <a href="'.$path.'projects/"><p>Mijn werk</p></a>
                    <a href="'.$path.'contact/"><p>Contact</p></a>
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