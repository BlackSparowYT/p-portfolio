<?php

    $page['name'] = "projects";
    $page['category'] = "projects";
    $page['path_lvl'] = 2;
    require_once("../files/config.php");

?>

<!DOCTYPE html>
<html lang="nl">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page">

        <?php include($path."files/components/header.php") ?>


        <main class="content">
            <section class="hero hero--subpage">
                <div class="container">
                    <h1><?= get_block(1)['title'] ?></h1>
                </div>
            </section>
            <section class="block block--filters">
                <div class="container">

                </div>
            </section>
            <section class="block block--projects">
                <div class="container">
                    <?php
                        $query = "SELECT * FROM `projects` ORDER BY id DESC";
                        if ($is_query_run = mysqli_query($link, $query)) {
                            while ($result = mysqli_fetch_assoc ($is_query_run))
                            { ?>
                                <a class='card card--projects' href='<?= $path ?>project/<?= strtolower(urlencode($result['name'])) ?>'>
                                    <div class='text'>
                                        <h2><?= $result['name'] ?></h2>
                                        <div class="text__tags">
                                            <?php $i = 0; $tags = json_decode($result['tags'], true); foreach ($tags as $tag) { if ($i < 3) { ?>
                                                <p class="tag"><?= $tag ?></p>
                                            <?php }$i++;} ?>
                                        </div>
                                        <p><?= $result['excerpt'] ?></p>
                                    </div>
                                    <img src='<?= $path ?>files/images/posts/<?= $result['image'] ?>' alt="image"/>
                                </a>
                            <?php }
                        } else { echo "Error in execution!"; }
                    ?> 
                </div>
            </section>
        </main>

        <?php //include($path."files/components/footer.php") ?>

    </body>
</html>