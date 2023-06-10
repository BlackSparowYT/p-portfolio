<?php 

    $page_is = "home";
    $page_cat = "default"; 
    require_once("files/db-config.php");
    require_once("files/config.php");

    $pathLVL = 1;

    if ($pathLVL == 1) {
        $path = $FirstLVL_paths;
    } else if ($pathLVL == 2) {
        $path = $SecondLVL_paths;
    } else if ($pathLVL == 3) {
        $path = $ThirdLVL_paths;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;600;800&display=swap" rel="stylesheet">

        <title>Finn Josten</title>
        <?php echo '<link rel="stylesheet" href="'.$path.'files/styles.css">' ?>
        <?php echo '<link rel="icon" type="image/x-icon" href="'.$path.'files/images/logo.png">' ?>
    </head>
    
    <body>

        <?php include($path."files/components/header.php") ?>

        <main class="home-page">
            <div class="hero" style="font-size: large;">
                <div class="text-block">
                    <div class="block-1">
                        <h1 class="t1">B</h1>
                        <h1 class="t2">E</h1>
                        <h1 class="t3">G</h1>
                        <h1 class="t4">I</h1>
                        <h1 class="t5">N</h1>
                        <h1 class="t6">N</h1>
                        <h1 class="t7">E</h1>
                        <h1 class="t8">N</h1>
                        <h1 class="t9">D</h1>
                        <h1 class="t10">E</h1>
                    </div>
                    <div class="block-2">
                        <h1 class="t1">W</h1>
                        <h1 class="t2">E</h1>
                        <h1 class="t3">B</h1>
                    </div>
                    <div class="block-3">
                        <h1 class="t1">D</h1>
                        <h1 class="t2">E</h1>
                        <h1 class="t3">V</h1>
                        <h1 class="t4">E</h1>
                        <h1 class="t5">L</h1>
                        <h1 class="t6">O</h1>
                        <h1 class="t7">P</h1>
                        <h1 class="t8">E</h1>
                        <h1 class="t9">R</h1>
                    </div>
                    <div class="block-4">
                        <a href="#over-mij"><h3>Over Mij</h3></a>
                        <a href="#projecten"><h3>Bekijk mijn projecten</h3></a>
                        <a href="#contact"><h3>Neem contact op</h3></a>
                    </div>
                </div>
                <div class="image-block">
                    <?php echo '<img src="'.$path.'files/images/hero-image.svg">' ?>
                </div>
            </div>
            <div class="content">
                <div class="over-mij" id="over-mij">
                    <div class="text-block">
                        <div class="text">
                            <h1>Wie ben ik?</h1>
                            <p>
                                Finn Josten, een student in software development die graag leert en een hart voor avontuur heeft. Ik heb een goed begrip van webontwikkeling en ik wil altijd wel een intressante en nutige website maken. Maar dat is niet alles. Ik hou ervan om de lucht in te gaan, om met mijn vertrouwde drone van bovenaf alles vast te leggen. Ook heb ik altijd wel tijd om een potje te gamen. 
                                <br>
                                <br>
                                Als ik niet ondergedompeld ben in de digitale wereld, zul je me vaak in de natuur vinden, wandelen en de pracht van het buitenleven verkennen. Dus of het nu gaat om het maken van websites of het beleven van spannende avonturen, ik ben altijd op zoek naar nieuwe horizonten om te veroveren.
                            </p>
                        </div>
                    </div>
                    <div class="image-block">
                        <?php echo '<img src="'.$path.'files/images/over-mij.jpg">' ?>
                    </div>
                </div>
                <div class="projecten" id="projecten">
                    <div class="project-block">
                        <h1>Recenten Projecten</h1>
                        <div class="flex-block">
                            <?php

                                $stmt = $link->prepare("SELECT * FROM `projecten` ORDER BY id DESC LIMIT 3");
            
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    while ($result = mysqli_fetch_assoc($is_run)) {
                                        
                                        echo "<a class='php-block' href='".$path."projecten/project.php?id=".$result['id']."'/>";
                                        echo "<img src='".$path.$result['image']."' />";
                                        echo "<div class='project-flex-box'>";
                                        echo "<h2>".$result['name']."</h2>";
                                        echo "</div>";
                                        echo "</a>"; 
                                    }
                                } else { echo "<h2>Er is iets fout gegaan! Probeer het later opnieuw.</h2>"; }

                            ?>
                        </div>
                    </div>
                    <div class="button-block">
                        <a href="/projecten/index.php"><h3>Bekijk meer projecten</h3><img src="./files/images/icon-link.svg"></a>
                    </div>
                </div>
                <div class="ervaringen" id="ervaringen">
                    <h1>Mijn Ervaringen</h1>
                    <div class="flex-box">
                        <div class="text-block">
                            <div class="block"><img src="./files/images/icon-html.svg"><h2>HTML</h2></div>
                            <div class="block"><img src="./files/images/icon-css.svg"><h2>CSS</h2></div>
                            <div class="block"><img src="./files/images/icon-js.svg"><h2>JavaScript</h2></div>
                            <div class="block"><img src="./files/images/icon-java.svg"><h2>Java</h2></div>
                        </div>
                        <div class="image-block">
                            <?php echo '<img src="'.$path.'files/images/ervaringen.svg">' ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include($path."files/components/footer.php") ?>

    </body>
</html>