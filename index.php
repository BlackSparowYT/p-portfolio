<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sono:wght@300;600;800&display=swap" rel="stylesheet">

        <title>Home || Finn Josten</title>
        <link rel="stylesheet" href="./styles.css">
    </head>
    
    <body>
        <header>
            <nav>
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
                    <div class="navbar-desktop-items">
                        <a class="t1" href="index.html"><h3>Home</h3></a>
                        <a class="t2" href="./projects/index.php"><h3>Projects</h3></a>
                        <a class="t3" href="./contact/index.html"><h3>Contact</h3></a>
                        <a class="t4" href="./about/index.html"><h3>About</h3></a>
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
                        <div class="nav-overlay-content">
                            <a class="t1" href="index.html"><h3>Home</h3></a>
                            <a class="t2" href="./projects/index.php"><h3>Projects</h3></a>
                            <a class="t3" href="./contact/index.html"><h3>Contact</h3></a>
                            <a class="t4" href="./about/index.html"><h3>About</h3></a>
                        </div>
                    </div>
                </div>

                <script>
                    function openNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "100%"; }
                    function closeNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "0%"; }
                </script>
            </nav>
        </header>

        <main class="home-page">

            <div class="image-background" id="t1">
                <!-- particles.js container --> 
                <div id="particles-js"></div> 
                <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
                <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
                <!-- particles.js script -->
                <script src="./scripts.js"></script>
            </div>

            <div class="hero" style="font-size: large;">
                    <div class="block-1">

                        <!--<h2 class="t1">F</h2>
                        <h2 class="t2">r</h2>
                        <h2 class="t3">e</h2>
                        <h2 class="t4">e</h2>
                        <h2 class="t5">l</h2>
                        <h2 class="t6">a</h2>
                        <h2 class="t7">n</h2>
                        <h2 class="t8">c</h2>
                        <h2 class="t9">e</h2>
                        <h2 class="t10">&nbsp;</h2>
                        <h2 class="t11">S</h2>
                        <h2 class="t12">t</h2>
                        <h2 class="t13">a</h2>
                        <h2 class="t14">r</h2>
                        <h2 class="t15">t</h2>
                        <h2 class="t16">i</h2>
                        <h2 class="t17">n</h2>
                        <h2 class="t18">g</h2>-->

                        <h2 class="t1">S</h2>
                        <h2 class="t2">t</h2>
                        <h2 class="t3">a</h2>
                        <h2 class="t4">r</h2>
                        <h2 class="t5">t</h2>
                        <h2 class="t6">i</h2>
                        <h2 class="t7">n</h2>
                        <h2 class="t8">g</h2>
                    </div>
                    <div class="block-2">
                        <h1 class="t1">D</h1>
                        <h1 class="t2">e</h1>
                        <h1 class="t3">v</h1>
                        <h1 class="t4">e</h1>
                        <h1 class="t5">l</h1>
                        <h1 class="t6">o</h1>
                        <h1 class="t7">p</h1>
                        <h1 class="t8">e</h1>
                        <h1 class="t9">r</h1>
                    </div>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>