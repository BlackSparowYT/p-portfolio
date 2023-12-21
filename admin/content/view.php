<?php

    session_start();

    $page['name'] = "view";
    $page['category'] = "account";
    $page['path_lvl'] = 3;
    require_once("../../files/components/account-setting.php");

    // Get the username from the session
    $username = $_SESSION['name'];
    if (isset($_GET['mode']) && $_GET['mode']) { $mode = $_GET['mode']; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }

    if (isset($_GET['type']) && $_GET['type']) { $type = $_GET['type']; }
    else if ($mode == "delete") { $type = null; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }

    if (isset($_GET['id']) && $_GET['id']) { $id = $_GET['id']; } 
    else if ($mode == "add") { $id = null; }
    else { header("Location: ".$_SERVER['HTTP_REFERER']); }





    if (isset($_POST['project_edit'])) {
        $name = empty($_POST['name']) ? null : $_POST['name'];
        $excerpt = empty($_POST['excerpt']) ? null : $_POST['excerpt'];
        $tags = empty($_POST['tags']) ? json_encode(array()) : json_encode(explode(', ', $_POST['tags']));
        $skills = empty($_POST['skills']) ? json_encode(array()) : json_encode(explode(', ', $_POST['skills']));
        $content1 = $_POST['content1'];
        $content2 = $_POST['content2'];

        if ($content1) {
            if ($content2) { $content = json_encode(array($content1, $content2)); }
            else { $content = json_encode(array($content1, null)); }
        } else {
            if ($content2) { $content = json_encode(array(null, $content2)); }
            else { $content = json_encode(array()); }
        }

        $stmt = $link->prepare("UPDATE `projects` SET `name`=?, `excerpt`=?,`content`=?,`tags`=?, `skills`=? WHERE id = ?");
        $stmt->bind_param("sssssi", $name, $excerpt, $content, $tags, $skills, $id);
        $stmt->execute();

        header("Location: projects.php");
        exit;

    } else if (isset($_POST['project_add'])) {

        $name = empty($_POST['name']) ? null : $_POST['name'];
        $excerpt = empty($_POST['excerpt']) ? null : $_POST['excerpt'];
        $tags = empty($_POST['tags']) ? json_encode(array()) : json_encode(explode(', ', $_POST['tags']));
        $skills = empty($_POST['skills']) ? json_encode(array()) : json_encode(explode(', ', $_POST['skills']));
        $content1 = $_POST['content1'];
        $content2 = $_POST['content2'];

        if ($content1) {
            if ($content2) { $content = json_encode(array($content1, $content2)); }
            else { $content = json_encode(array($content1, null)); }
        } else {
            if ($content2) { $content = json_encode(array(null, $content2)); }
            else { $content = json_encode(array()); }
        }

        $stmt = $link->prepare("INSERT INTO `projects` SET `name`=?, `excerpt`=?, `content`=?, `tags`=?, `skills`=?");
        $stmt->bind_param("sssss", $name, $excerpt, $content, $tags, $skills);
        $stmt->execute();

        header("Location: projects.php");
        exit;

    } else if (isset($_POST['delete'])) {
        $stmt = $link->prepare("DELETE FROM `projects` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header("Location: projects.php");
        exit;
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
                                    <h3>Excerpt</h3>
                                    <textarea name="excerpt"><?= $result['excerpt'] ?></textarea>
                                </div>
                                <div class="form__box">
                                    <div class="col">
                                        <h3>Content Block</h3>
                                        <textarea name="content1"><?= json_decode($result['content'])[0] ?></textarea>
                                    </div>
                                    <div class="col">
                                        <h3>Image</h3>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="form__box">
                                    <h3>Content Block</h3>
                                    <textarea name="content2"><?= json_decode($result['content'])[1] ?></textarea>
                                </div>
                                <div class="form__box">
                                    <div class="col">
                                        <h3>Tags</h3>
                                        <input name="tags" value="<?= implode(', ',json_decode($result['tags'])) ?>" >
                                    </div>
                                    <div class="col">
                                        <h3>Skills</h3>
                                        <input name="skills" value="<?= implode(', ',json_decode($result['skills'], true)) ?>" >
                                    </div>
                                </div>
                                <div class="form__box">
                                    <input type="submit" name="project_edit" class="btn btn--primary btn--small" value="Save">
                                </div>

                            <?php } else { echo "Error in execution!"; }
                        ?>
                    <?php endif; ?>
                <?php elseif ($mode == "delete") : ?>
                    <div class="form__box">
                        <h3>Are you sure you want to delete this item?</h3>
                        <input type="submit" name="delete" class="btn btn--danger btn--small" value="Yes, delete it!">
                    </div>
                <?php elseif ($mode == "add") : ?>
                    <?php if($type == "project") : ?>
                        <div class="form__box">
                            <h3>Project title</h3>
                            <input name="name">
                        </div>
                        <div class="form__box">
                            <h3>Excerpt</h3>
                            <textarea name="excerpt"></textarea>
                        </div>
                        <div class="form__box">
                            <div class="col">
                                <h3>Content Block</h3>
                                <textarea name="content1"></textarea>
                            </div>
                            <div class="col">
                                <h3>Image</h3>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form__box">
                            <h3>Content Block</h3>
                            <textarea name="content2"></textarea>
                        </div>
                        <div class="form__box">
                            <div class="col">
                                <h3>Tags</h3>
                                <input name="tags" placeholder="tag, tag" >
                            </div>
                            <div class="col">
                                <h3>Skills</h3>
                                <input name="skills" placeholder="skill, skill" >
                            </div>
                        </div>
                        <div class="form__box">
                            <input type="submit" name="project_add" class="btn btn--primary btn--small" value="Save">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </form>
        </main>

    </body>

</html>