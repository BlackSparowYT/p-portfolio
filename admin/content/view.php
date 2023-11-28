<?php

    $page['name'] = "view";
    $page['cat'] = "account";
    $page['path_lvl'] = 3;
    require_once("../../files/components/account-setting.php");

    /* $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
    $Parsedown->setBreaksEnabled(true);
    $Parsedown->setMarkupEscaped(true); */

    // Get the username from the session
    $username = $_SESSION['name'];
    if (isset($_GET['mode'])) { $mode = $_GET['mode']; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }

    if (isset($_GET['type'])) { $type = $_GET['type']; }
    else if ($mode == "delete") { $type = null; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }

    if (isset($_GET['id'])) { $id = $_GET['id']; } 
    else if ($mode == "add") { $id = null; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }





    if (isset($_POST['project_edit'])) {
        $name = $_POST['name'];
        $excerpt = $_POST['excerpt'];
        $content = $_POST['content'];
        $tags = $_POST['tags'];

        $stmt = $link->prepare("UPDATE `projects` SET `name`=?, `excerpt`=?,`content`=?,`tags`=? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $excerpt, $content, $tags, $id);
        $stmt->execute();
    } else if (isset($_POST['delete'])) {
        $stmt = $link->prepare("DELETE FROM `projects` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

?>
<!DOCTYPE html>
<html lang="<?= $_COOKIE['site_lang'] ?>">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page page--account">

        <?php include($path."files/components/account-sidebar.php") ?>

        <main class="content">
            <div class="btn-group">
                <a class="btn btn--primary btn--small" href="./projects.php"><i class="da-icon da-icon--arrow-left da-icon--small"></i>Go back</a>
                <?php if($mode != "add") : ?>
                    <a class="btn btn--primary btn--small btn--danger" href="?mode=delete&id=<?=$id?>"><i class="da-icon da-icon--trash da-icon--small"></i>Delete</a>
                <?php endif; ?>
            </div>
            <form method="post" class="form">

                <?php if($mode == "edit") : ?>
                    <?php if($type == "project") : ?>
                        <?php
                            $stmt = $link->prepare("SELECT * FROM `projects` WHERE id = ?");
                            $stmt->bind_param("i", $id);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                $result = mysqli_fetch_assoc ($is_run); ?>

                                <div class="form__box">
                                    <h3>Project title</h3>
                                    <input name="name" value="<?= $result['name'] ?>">
                                </div>
                                <div class="form__box">
                                    <div class="col">
                                        <h3>Excerpt</h3>
                                        <textarea name="excerpt"><?= $result['excerpt'] ?></textarea>
                                    </div>
                                    <div class="col">
                                        <h3>Content</h3>
                                        <textarea name="content"><?= $result['content'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form__box">
                                    <h3>Content</h3>
                                    <textarea name="tags"><?= $result['tags'] ?></textarea>
                                </div>
                                <div class="form__box">
                                    <input type="submit" name="project_edit" class="btn btn--primary btn--small" value="Save">
                                </div>

                            <?php } else { echo "Error in execution!"; }
                        ?>
                    <?php elseif ($type == "????") : ?>
    
                    <?php endif; ?>
                <?php elseif ($mode == "delete") : ?>

                    <div class="form__box">
                        <h3>Are you sure you want to delete this item?</h3>
                        <input type="submit" name="delete" class="btn btn--danger btn--small" value="Yes, delete it!">
                    </div>
                <?php endif; ?>

            </form>
        </main>

    </body>

</html>