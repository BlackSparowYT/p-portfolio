<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sono:wght@300;600;800&display=swap" rel="stylesheet">

        <title>Projects || Finn Josten</title>
        <link rel="stylesheet" href="../styles.css">
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
                        <a class="t1" href="../index.html"><h3>Home</h3></a>
                        <a class="t2" href="../projects/index.php"><h3>Projects</h3></a>
                        <a class="t3" href="../contact/index.html"><h3>Contact</h3></a>
                        <a class="t4" href="../about/index.html"><h3>About</h3></a>
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
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="nav-overlay-content">
                            <a class="t1" href="../index.html"><h3>Home</h3></a>
                            <a class="t2" href="../projects/index.php"><h3>Projects</h3></a>
                            <a class="t3" href="../contact/index.html"><h3>Contact</h3></a>
                            <a class="t4" href="../about/index.html"><h3>About</h3></a>
                        </div>
                    </div>
                </div>


                <script>
                    function openNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "100%"; }
                    function closeNav() { document.getElementById("navbar-mobile-fullscreen").style.height = "0%"; }
                </script>
            </nav>
        </header>

        <main class="projects-page">

            <div class="image-background">
                <!-- particles.js container --> 
                <div id="particles-js"></div> 

                <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
                <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 

                <!-- particles.js script -->
                <script src="../scripts.js"></script>
            </div>

            
            <div class="projects-block-2">
                <?php
                    require_once("../config.php");

                    $urlid = $_GET["id"];
                    $stmt = $link->prepare("SELECT * FROM `projects` WHERE id = ?");
                    $stmt->bind_param("i", $urlid);
                    if ($stmt->execute()) {
                        $is_run = $stmt->get_result();
                        while ($result = mysqli_fetch_assoc($is_run)) {
                            echo "<div class='projects-flex-box'>";
                            echo "<img src='".$result['image']."' />";
                            echo "<h2>".$result['name']."</h2>";
                            echo "<p class='desc'>".$result['large-desc']."</p>";
                            echo "<p class='bttns'>".$result['buttons']."</p>";
                            echo "</div>";
                        }
                    } else { echo "Error in execution!"; }
                ?> 
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>