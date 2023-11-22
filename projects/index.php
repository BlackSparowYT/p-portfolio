<?php

    $page['name'] = "projects";
    $page['categorie'] = "projects";
    $page['path_lvl'] = 2;
    require_once("../files/config.php");

?>

<!DOCTYPE html>
<html lang="nl">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page">

        <?php //include($path."files/components/header.php") ?>


        <main class="content">
            <section class="hero hero--subpage">
                <div class="container">
                    <h1><?= get_block(1)['title'] ?></h1>
                </div>
            </section>

            <section class="container">
                <!-- Your content here! -->
            </section>
        </main>

        <?php //include($path."files/components/footer.php") ?>

    </body>
</html>



<!-- <div>
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
</div> -->