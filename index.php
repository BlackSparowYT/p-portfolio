<?php

    $page['name'] = "home";
    $page['category'] = "default";
    $page['path_lvl'] = 1;
    require_once("./files/config.php");

?>

<!DOCTYPE html>
<html lang="<?= $_COOKIE['site_lang'] ?>">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page">

        <?php include($path."files/components/header.php") ?>


        <main class="content">

            <section class="hero hero--homepage">
                <div class="container">
                    <h1><?= get_block(1)['title'] ?></h1>
                    <h2><?= get_block(1)['subtitle'] ?></h2>
                    <div class="btn-group">
                        <?php foreach(get_block(1)['buttons'] as $button) : ?>
                            <a class="btn btn--<?= $button['type'] ?>" href="<?= $button['link'] ?>"><?= $button['text'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <i class="da-icon da-icon--angle-down"></i>
            </section>

            <section class="block text wst--large wsb--large bg--dark">
                <div class="container">
                    <div class="block__name">
                        <i class="da-icon  da-icon--custom-dot"></i>
                        <p><?= get_block_title(2) ?></p>
                    </div>
                    <h2><?= get_block(2)['title'] ?></h2>
                    <div class="text">
                        <div>
                            <p><?= get_block(2)['text1'] ?></p>
                            <p class="width--normal"><?= get_block(2)['text2'] ?></p>
                            <div class="btn-group btn-group--left">
                                <?php foreach(get_block(2)['buttons'] as $button) : ?>
                                    <a class="btn btn--<?= $button['type'] ?>" href="<?= $button['link'] ?>"><?= $button['text'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <img src="<?= get_block(2)['image'] ?>" >
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
                    <div class="posts__readmore">
                        <a class="btn btn--<?= get_block(3)['buttons'][0]['type'] ?>" href="<?= get_block(3)['buttons'][0]['link'] ?>"><?= get_block(3)['buttons'][0]['text'] ?></a>
                    </div>
                </div>
            </section>
        </main>

        <?php //include($path."files/components/footer.php") ?>

    </body>
</html>
