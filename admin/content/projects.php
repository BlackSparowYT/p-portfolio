<?php

    $page['name'] = "projects";
    $page['cat'] = "account";
    $page['path_lvl'] = 3;
    require_once("../../files/components/account-setting.php");

    // Get the username from the session
    $username = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="<?= $_COOKIE['site_lang'] ?>">

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page page--account">

        <?php include($path."files/components/account-sidebar.php") ?>

        <main class="content">
            <div class="btn-group">
                <a class="btn btn--primary btn--small" href="./view.php?type=project&mode=add"><i class="da-icon da-icon--plus da-icon--small"></i>Add project</a>
            </div>
            <table id="projectsTable" class="display" data-page-length='13'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post name</th>
                        <th>Excerpt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `projects`";
                        if ($is_query_run = mysqli_query($link, $query)) {
                            while ($result = mysqli_fetch_assoc ($is_query_run))
                            { ?>
                                
                                <tr>
                                    <td><?= $result['id'] ?></td>
                                    <td><?= $result['name'] ?></td>
                                    <td><?= $result['excerpt'] ?></td>
                                    <td><a href="./view.php?type=project&mode=edit&id=<?= $result['id'] ?>"><i class="da-icon da-icon--pen da-icon--small"></i> Edit project</a></td>
                                </tr>
                            <?php }
                        } else { echo "Error in execution!"; }
                    ?>
                </tbody>
            </table>
            <script>
                let table = new DataTable('#projectsTable', {
                    "lengthMenu": [13],
                });
            </script>
        </main>

    </body>

</html>