<?php

    $page['name'] = "detail";
    $page['categorie'] = "projects";
    $page['path_lvl'] = 2;
    require_once("../files/config.php");

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



<!-- <div>
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
</div> -->