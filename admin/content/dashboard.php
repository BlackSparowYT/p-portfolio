<?php

    $page['name'] = "dashboard";
    $page['category'] = "account";
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
                <div class="col col--1 bg--light">
                    <p>Visitors this month</p>
                    <?php
                        $date = date('Y-m');
                        $thisYear = date('Y')."-%";
                        $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ? AND date LIKE ?");
                        $stmt->bind_param("ss", $date, $thisYear);
                        if ($stmt->execute()) {
                            $is_run = $stmt->get_result();
                            while ($result = mysqli_fetch_assoc($is_run)) {
                                echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                $thisMonth = $result['count'];
                            }
                        }
                    ?>
                    <div class="statsrate">
                        <?php
                            $date = date('Y-m', strtotime('1 month ago'));
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                $result = mysqli_fetch_assoc($is_run);
                                $lastMonth = $result['count'];
                                echo "<p style='display: none'>last month $lastMonth</p>";
                                $rate = round($thisMonth / $lastMonth * 100 - 100);
                                if ($rate > 0) {
                                    echo "<i class='da-icon da-icon--arrow-trend-up da-icon--accent'></i><p>+";
                                } else if ($rate < 0) {
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>";
                                } else if ($rate == 0) {
                                    echo "<i class='da-icon da-icon--dash da-icon--orange'></i><p>";
                                }
                                echo $rate."%</p>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col col--2 bg--light">
                    <p>Visitors this year</p>
                    <?php
                        $date = date('Y');
                        $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                        $stmt->bind_param("s", $date);
                        if ($stmt->execute()) {
                            $is_run = $stmt->get_result();
                            while ($result = mysqli_fetch_assoc($is_run)) {
                                echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                $thisYear = $result['count'];
                            }
                        }
                    ?>
                    <div class="statsrate">
                        <?php
                            $date = date('Y', strtotime('1 year ago'));
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                $result = mysqli_fetch_assoc($is_run);
                                $lastYear = $result['count'];
                                echo "<p style='display: none'>last year $lastYear</p>";
                                $rate = round($thisYear / $lastYear * 100 - 100);
                                if ($rate > 0) {
                                    echo "<i class='da-icon da-icon--arrow-trend-up da-icon--accent'></i><p>+";
                                } else if ($rate < 0) {
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>";
                                } else if ($rate == 0) {
                                    echo "<i class='da-icon da-icon--dash da-icon--orange'></i><p>";
                                }
                                echo $rate."%</p>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col col--1 bg--light">
                </div>
                <div class="col col--1 bg--light">
                </div>
            </section>

            <section class="row span--2">
                <div class="col col--1 span--3">
                    <div class="chart chart--visitors">
                        <canvas id="chartVisitors" class="chart__inner"></canvas>
                        <?php $monthCount = 12; ?>
                        <script>
                            var ctx = document.getElementById('chartVisitors').getContext('2d');

                            const xValues = [<?php for ($i = $monthCount - 1; $i >= 0; $i--) { echo "'" . date('F', strtotime($i . ' months ago')) . "',"; } ?>];
                            const yValues = [<?php
                                for ($i = $monthCount - 1; $i >= 0; $i--) {
                                    $date = date('Y-m', strtotime($i . ' months ago'));
                                    $thisYear = date('Y')."-%";
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

                            var chartVisitors = new Chart(ctx, {
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
                                        x: [{
                                            gridLines: {
                                                display: false // Hide x-axis grid lines
                                            }
                                        }],
                                        y: [{
                                            gridLines: {
                                                display: false // Hide y-axis grid lines
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col col--2 bg--accent">
                    <h3>Check all analytics on the analytics page</h3>
                    <a href="analytics.php" class="btn btn--secondary">
                        View page
                    </a>
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