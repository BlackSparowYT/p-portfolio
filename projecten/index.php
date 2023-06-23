<?php 

    $page['name'] = "projects";
    $page['cat'] = "projects";
    $page['lvl'] = 2;
    require_once("../files/db-config.php");
    require_once("../files/config.php");

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

        <main class="projects-page">
            <div class="hero" style="font-size: large;">
                <div class="text-block">
                    <h1 class="t1">P</h1>
                    <h1 class="t2">R</h1>
                    <h1 class="t3">O</h1>
                    <h1 class="t4">J</h1>
                    <h1 class="t5">E</h1>
                    <h1 class="t6">C</h1>
                    <h1 class="t7">T</h1>
                    <h1 class="t8">E</h1>
                    <h1 class="t9">N</h1>
                </div>
            </div>
            <div class="content">
                <div class="projects-block">
                    <?php

                        $last_cat = NULL;
                        $query = "SELECT * FROM `projecten` ORDER BY category";
                        if ($is_query_run = mysqli_query($link, $query)) {
                            while ($result = mysqli_fetch_assoc ($is_query_run))
                            {
                                if ($last_cat == $result['category']) {
                                } else if ($result['category'] == "Projectweek") {
                                    echo '<h2>Project Weken</h2>';
                                } else if ($result['category'] == "Programmeren") {
                                    echo '<h2>Programmeren</h2>';
                                } else {
                                    echo '<h2>Web</h2>';
                                }
                                echo "<a class='block' href='./project.php?id=".$result['id']."'/>";
                                echo "<div class='product-flex-box'>";
                                echo "<img src='".$path.$result['image']."' />";
                                echo "<h3>".$result['name']."</h3>";
                                echo "<p>".$result['small-desc']."</p>";
                                echo "</div>";
                                echo "</a>";
                                $last_cat = $result['category'];
                            }
                        } else { echo "Error in execution!"; }
                    ?> 
                </div>
            </div>
        </main>

        <?php include($path."files/components/footer.php") ?>

    </body>
</html>