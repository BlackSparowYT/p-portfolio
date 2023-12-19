<?php

    $page['name'] = "projects-detail";
    $page['category'] = "projects";
    $page['path_lvl'] = 2;
    $page['custom_title']['flag'] = true;
    require_once("../files/config.php");

    require_once("../files/components/Parsedown/Parsedown.php");
    $Parsedown = new Parsedown();
    $Parsedown->setBreaksEnabled(true);

    if(isset($_GET['id']) && $_GET['id']) {
        $id = $_GET['id'];
    } else {
        header("Location: ./index.php");
    }

    $page['custom_title']['seperator'] = '|';
    $page['custom_title']['part1'] = 'Project ' . $id;
    $page['custom_title']['part2'] = 'Portfolio';

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

            <section class="block text bg--dark wst--medium wsb--medium">
                <div class="container">
                    <div class="block__name">
                        <i class="da-icon  da-icon--custom-dot"></i>
                        <p><?= get_block_title(1) ?></p>
                    </div>
                    <h2><?= get_block(1)['title'] ?></h2>
                    <?php
                        $stmt = $link->prepare("SELECT content,image FROM `projects` WHERE id = ?");
                        $stmt->bind_param("i", $id);
                        
                        if ($stmt->execute()) {
                            $is_run = $stmt->get_result();
                            $result = mysqli_fetch_assoc($is_run);
                        ?>

                            <div class="text">
                                <?= $Parsedown->text(json_decode($result['content'], true)[0]) ?>
                                <img src="<?= $path ?>files/images/posts/<?= $result['image'] ?>" alt="image">
                            </div>
                            <div class="text">
                                <?= $Parsedown->text(json_decode($result['content'], true)[1]) ?>
                            </div>

                        <?php
                        } else { echo "Error in execution!"; }
                    ?> 

                </div>
            </section>
            <section class="block skills wst--medium wsb--medium">
                <div class="container">
                    <div class="block__name">
                        <i class="da-icon  da-icon--custom-dot"></i>
                        <p><?= get_block_title(2) ?></p>
                    </div>
                    <h2><?= get_block(2)['title'] ?></h2>
                    <div class="grid gc--4">
                        <?php
                            $stmt = $link->prepare("SELECT skills FROM `projects` WHERE id = ?");
                            $stmt->bind_param("i", $id);

                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                $result = mysqli_fetch_assoc($is_run);

                                foreach (json_decode($result['skills']) as $skill) {
                            ?>

                                <p class="card card--skills">
                                    <?= $skill ?>
                                </p>

                            <?php
                            }} else { echo "Error in execution!"; }
                        ?> 
                    </div>
                </div>
            </section>
            <section class="block posts wst--medium wsb--medium bg--normal">
                <div class="container">
                    <div class="block__name">
                        <i class="da-icon  da-icon--custom-dot"></i>
                        <p><?= get_block_title(3) ?></p>
                    </div>
                    <h2><?= get_block(3)['title'] ?></h2>
                    <div class="posts__grid posts__grid--3">
                        <?php

                            $stmt = $link->prepare("SELECT * FROM `projects` ORDER BY id DESC LIMIT 3");

                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                while ($result = mysqli_fetch_assoc($is_run)) { ?>

                                    <a class="card card--posts" href='<?= $path ?>projecten/project.php?id=<?= $result['id'] ?>'>
                                        <img src='<?= $path."files/images/posts/".$result['image']?>' alt="image" />
                                        <div class="text">
                                            <p class="title"><?= $result['name'] ?></p>
                                            <p class="excerpt"><?= $result['excerpt'] ?></p>
                                        </div>
                                    </a>
                                <?php }
                            } else { echo "<h2>Er is iets fout gegaan! Probeer het later opnieuw.</h2>"; }

                        ?>
                    </div>
                </div>
            </section>
        </main>

        <?php //include($path."files/components/footer.php") ?>

    </body>
</html>



<!-- <div>
</div> -->