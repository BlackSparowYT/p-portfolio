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
            <table id="projectsTable" class="display" data-page-length='25'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Berglunds snabbkop</td>
                        <td>Sweden</td>
                    </tr>
                    <tr>
                        <td>North/South</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Koniglich Essen</td>
                        <td>Germany</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Italy</td>
                    </tr>
                    <tr>
                        <td>Paris specialites</td>
                        <td>France</td>
                    </tr>
                    <tr>
                        <td>Island Trading</td>
                        <td>UK</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Canada</td>
                    </tr>
                </tbody>
            </table>
            <script>
                let table = new DataTable('#projectsTable', {
                    "lengthMenu": [25],
                });
            </script>
        </main>

    </body>

</html>