<?php

    $page['name'] = "home";
    $page['categorie'] = "default";
    $page['path_lvl'] = 1;
    require_once("./files/config.php");

?>

<!DOCTYPE html>
<html lang="nl">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page">

        <?php include($path."files/components/header.php") ?>


        <main class="content">
            <section class="hero hero--homepage">
                <h1><?=$variable['siteName']?></h1>
                <div class="btn-group">

                </div>
            </section>

            <section class="container">
                <!-- Your content here! -->
            </section>
        </main>

        <?php include($path."files/components/footer.php") ?>

    </body>
</html>



<!-- <div class="projecten" id="projecten">
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
                        echo "<p>".$result['small-desc']."</p>";
                        echo "</div>";
                        echo "</a>"; 
                    }
                } else { echo "<h2>Er is iets fout gegaan! Probeer het later opnieuw.</h2>"; }

            ?>
        </div>
    </div>
    <div class="button-block">
        <?php echo '<a href="'.$path.'projecten/index.php"><h3>Bekijk meer projecten</h3><img src="./files/images/icon-link.svg"></a>'; ?>
    </div>
</div> -->