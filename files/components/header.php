<header>
    <nav>

        <?php 

        echo '
        <div id="navbar-desktop">
            <div class="navbar-desktop-sitename">
                <h2 class="t1">F</h2>
                <h2 class="t2">i</h2>
                <h2 class="t3">n</h2>
                <h2 class="t4">n</h2>
                <h2 class="t5">&nbsp;</h2>
                <h2 class="t6">J</h2>
                <h2 class="t7">o</h2>
                <h2 class="t8">s</h2>
                <h2 class="t9">t</h2>
                <h2 class="t10">e</h2>
                <h2 class="t11">n</h2>
            </div>
            <div class="navbar-desktop-items">';
            if ($page_is != "home") {
                '<a class="t1" href="'.$path.'index.php"><h3>Home</h3></a>';
            }
            echo '    
                <a class="t2" href="'.$path.'index.php#over-mij"><h3>Over Mij</h3></a>
                <a class="t3" href="'.$path.'projecten/index.php"><h3>Projecten</h3></a>
                <a class="t4" href="#contact"><h3>Contact</h3></a>
            </div>
        </div>
        
        <div id="navbar-mobile">
            <div class="navbar-mobile-sitename">
                <h2 class="t1">F</h2>
                <h2 class="t2">i</h2>
                <h2 class="t3">n</h2>
                <h2 class="t4">n</h2>
                <h2 class="t5">&nbsp;</h2>
                <h2 class="t6">J</h2>
                <h2 class="t7">o</h2>
                <h2 class="t8">s</h2>
                <h2 class="t9">t</h2>
                <h2 class="t10">e</h2>
                <h2 class="t11">n</h2>
            </div>
            <div class="navbar-mobile-items">
                <a onclick="openNav()"><h3>&#9776;</h3></a>
            </div>
            <div id="navbar-mobile-fullscreen" class="nav-overlay">
                <a href="javascript:void(0)" class="closebtn t1" onclick="closeNav()">&times;</a>
                <div class="nav-overlay-content">';
                if ($page_is != "home") {
                    '<a class="t1" href="'.$path.'index.php"><h3>Home</h3></a>';
                }
                echo '    
                    <a class="t2" href="'.$path.'index.php#over-mij"><h3>Over Mij</h3></a>
                    <a class="t3" href="'.$path.'projecten/index.php"><h3>Projecten</h3></a>
                    <a class="t4" href="#contact"><h3>Contact</h3></a>
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