<?php

$page['name'] = "dashboard";
$page['cat'] = "account";
$page['path_lvl'] = 3;
require_once("../../files/components/account-setting.php");

// Get the username from the session
$username = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="<?= $_COOKIE['site_lang'] ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php include($path . "files/components/head.php") ?>

<body class="<?= $page['name'] ?> page page--account">

    <?php include($path . "files/components/account-sidebar.php") ?>

    <main class="content">
        <section class="row">
            <div class="col col--1 span--2">

            </div>
            <div class="col col--2 span--2">

            </div>
        </section>

        <section class="row span--2">
            <div class="col col--1 span--3">
                <div class="chart chart--visitors">
                    <canvas id="chartVisitors" class="chart__inner"></canvas>
                    <?php $monthCount = 6; ?>
                    <script>
                        const xValues = [<?php for ($i = $monthCount - 1; $i >= 0; $i--) { echo "'" . date('F', strtotime($i . ' months ago')) . "',"; } ?>];
                        const yValues = [<?php
                            for ($i = $monthCount - 1; $i >= 0; $i--) {
                                $date = date('Y-m', strtotime($i . ' months ago'));
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ? ");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    while ($result = mysqli_fetch_assoc($is_run)) {
                                        echo $result['count'] . ",";
                                    }
                                }
                            }
                        ?>];

                        new Chart("chartVisitors", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    borderColor: '#8FD4FF',
                                    data: yValues,
                                    borderRadius: 10,             
                                    lineTension: 0.25,
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                maintainAspectRatio: false,
                                scales: {
                                    x: {
                                        ticks: {
                                            color: "#ffffff"
                                        },
                                    },
                                    y: {
                                        ticks: {
                                            color: "#ffffff"
                                        },
                                    }
                                },
                            }
                        });
                    </script>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col col--1 span--2">

            </div>
            <div class="col col--2 span--2">

            </div>
        </section>
    </main>

</body>

</html>