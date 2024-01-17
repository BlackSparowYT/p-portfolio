<?php

    $page['name'] = "analytics";
    $page['category'] = "account";
    $page['path_lvl'] = 3;
    require_once("../../files/components/account-setting.php");

    // Get the username from the session
    $username = $_SESSION['name'];

    $show_graphs = false;
    if(isset($_GET['d']) && $_GET['d'] == 'graphs') $show_graphs = true;

?>
<!DOCTYPE html>
<html lang="<?= $_COOKIE['site_lang'] ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <?php include($path."files/components/head.php") ?>
    
    <body class="<?=$page['name']?> page page--account">

        <?php include($path."files/components/account-sidebar.php") ?>

        <main class="content">

            <?php if($show_graphs == true) { ?>
                <section class="row span--2">
                    <div class="col col--1 span--2">
                        <div class="chart chart--visitors-day">
                            <canvas id="chartVisitorsDay" class="chart__inner"></canvas>
                            <?php $dayCount = 7; ?>
                            <script>
                                var ctx = document.getElementById('chartVisitorsDay').getContext('2d');

                                var xValues = [<?php for ($i = $dayCount - 1; $i >= 0; $i--) { echo "'" . date('l', strtotime($i . ' days ago')) . "',"; } ?>];
                                var yValues = [<?php
                                    for ($i = $dayCount - 1; $i >= 0; $i--) {
                                        $date = date('Y-m-d', strtotime($i . ' days ago'));
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

                                var chartVisitorsDay = new Chart(ctx, {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            label: "Visitors last week",
                                            borderColor: '#8FD4FF',
                                            data: yValues,
                                            borderRadius: 10,             
                                            lineTension: 0.25,
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            display: true
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
                    <div class="col col--1 span--2">
                        <div class="chart chart--visitors-month">
                            <canvas id="chartVisitorsMonth" class="chart__inner"></canvas>
                            <?php $monthCount = 12; ?>
                            <script>
                                var ctx = document.getElementById('chartVisitorsMonth').getContext('2d');

                                var xValues = [<?php for ($i = $monthCount - 1; $i >= 0; $i--) { echo "'" . date('F', strtotime($i . ' months ago')) . "',"; } ?>];
                                var yValues = [<?php
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

                                var chartVisitorsMonth = new Chart(ctx, {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            label: "Visitors last year",
                                            borderColor: '#8FD4FF',
                                            data: yValues,
                                            borderRadius: 10,             
                                            lineTension: 0.25,
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            display: true
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
                </section>

                <section class="row span--2">
                    <div class="col col--1 span--2">
                        <div class="chart chart--visitors-year">
                            <canvas id="chartVisitorsYear" class="chart__inner"></canvas>
                            <?php $yearCount = 5; ?>
                            <script>
                                var ctx = document.getElementById('chartVisitorsYear').getContext('2d');

                                var xValues = [<?php for ($i = $yearCount - 1; $i >= 0; $i--) { echo "'" . date('Y', strtotime($i . ' years ago')) . "',"; } ?>];
                                var yValues = [<?php
                                    for ($i = $yearCount - 1; $i >= 0; $i--) {
                                        $date = date('Y', strtotime($i . ' years ago'));
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

                                var chartVisitorsYear = new Chart(ctx, {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            label: "Visitors last years",
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
                    <div class="col col--1 span--2 bg--light d-grid--center">
                        <a class="btn btn--primary" href="?d=overview">Bekijk overzicht</a>
                    </div>
                </section>
            <?php } else {?>

                <section class="row">
                    <div class="col col--1 bg--light">
                        <p><?= date('l') ?></p>
                        <?php
                            $date = date('Y-m-d');
                            $thisYear = date('Y')."-%";
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                while ($result = mysqli_fetch_assoc($is_run)) {
                                    echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                    $today = $result['count'];
                                }
                            }
                        ?>
                        <div class="statsrate">
                            <?php
                                $date = date('Y-m-d', strtotime('1 day ago'));
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    $result = mysqli_fetch_assoc($is_run);
                                    $yesterday = $result['count'];
                                    echo "<p style='display: none'>Yesterday $yesterday</p>";
                                    if($yesterday == 0) $yesterday++;
                                    $rate = round($today / $yesterday * 100 - 100);
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
                    <div class="col col--2">
                        <p><?= date('l', strtotime('1 day ago')) ?></p>
                        <?php
                            $date = date('Y-m-d', strtotime('1 day ago'));
                            $thisYear = date('Y')."-%";
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                while ($result = mysqli_fetch_assoc($is_run)) {
                                    echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                    $today = $result['count'];
                                }
                            }
                        ?>
                        <div class="statsrate">
                            <?php
                                $date = date('Y-m-d', strtotime('2 days ago'));
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    $result = mysqli_fetch_assoc($is_run);
                                    $yesterday = $result['count'];
                                    echo "<p style='display: none'>Yesterday $yesterday</p>";
                                    if($yesterday == 0) $yesterday++;
                                    $rate = round($today / $yesterday * 100 - 100);
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
                    <div class="col col--2">
                        <p><?= date('l', strtotime('2 days ago')) ?></p>
                        <?php
                            $date = date('Y-m-d', strtotime('2 days ago'));
                            $thisYear = date('Y')."-%";
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                while ($result = mysqli_fetch_assoc($is_run)) {
                                    echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                    $today = $result['count'];
                                }
                            }
                        ?>
                        <div class="statsrate">
                            <?php
                                $date = date('Y-m-d', strtotime('3 days ago'));
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    $result = mysqli_fetch_assoc($is_run);
                                    $yesterday = $result['count'];
                                    echo "<p style='display: none'>Yesterday $yesterday</p>";
                                    if($yesterday == 0) $yesterday++;
                                    $rate = round($today / $yesterday * 100 - 100);
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
                    <div class="col col--4">
                        <p><?= date('l', strtotime('3 days ago')) ?></p>
                        <?php
                            $date = date('Y-m-d', strtotime('3 days ago'));
                            $thisYear = date('Y')."-%";
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
                            if ($stmt->execute()) {
                                $is_run = $stmt->get_result();
                                while ($result = mysqli_fetch_assoc($is_run)) {
                                    echo "<h3>".da_number_format($result['count'], 0)."</h3>";
                                    $today = $result['count'];
                                }
                            }
                        ?>
                        <div class="statsrate">
                            <?php
                                $date = date('Y-m-d', strtotime('4 days ago'));
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    $result = mysqli_fetch_assoc($is_run);
                                    $yesterday = $result['count'];
                                    echo "<p style='display: none'>Yesterday $yesterday</p>";
                                    if($yesterday == 0) $yesterday++;
                                    $rate = round($today / $yesterday * 100 - 100);
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
                </section>

                <section class="row">
                    <div class="col col--1 bg--light">
                        <p><?= date('F', strtotime('0 months ago')) ?></p>
                        <?php
                            $date = date('Y-m');
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
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
                    <div class="col col--2">
                        <p><?= date('F', strtotime('1 month ago')) ?></p>
                        <?php
                            $date = date('Y-m', strtotime('1 month ago'));
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
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
                                $date = date('Y-m', strtotime('2 months ago'));
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
                    <div class="col col--2">
                        <p><?= date('F', strtotime('2 months ago')) ?></p>
                        <?php
                            $date = date('Y-m', strtotime('2 months ago'));
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
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
                                $date = date('Y-m', strtotime('3 months ago'));
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
                    <div class="col col--4">
                        <p><?= date('F', strtotime('3 months ago')) ?></p>
                        <?php
                            $date = date('Y-m', strtotime('3 months ago'));
                            $thisYear = date('Y')."-%";
                            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                            $stmt->bind_param("s", $date);
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
                                $date = date('Y-m', strtotime('4 months ago'));
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
                </section>

                <section class="row">
                    <div class="col col--1 bg--light">
                        <p><?= date('Y') - 0 ?></p>
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
                                $date = date('Y') - 1;
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
                    <div class="col col--2">
                        <p><?= date('Y') - 1 ?></p>
                        <?php
                            $date = date('Y') - 1;
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
                                $date = date('Y') - 2;
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
                    <div class="col col--3">
                        <p><?= date('Y') - 2 ?></p>
                        <?php
                            $date = date('Y') - 2;
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
                                $date = date('Y') - 3;
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
                    <div class="col col--4">
                        <p><?= date('Y') - 3 ?></p>
                        <?php
                            $date = date('Y') - 3;
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
                                $date = date('Y') - 4;
                                $stmt = $link->prepare("SELECT * FROM `visitors` WHERE date = ?");
                                $stmt->bind_param("s", $date);
                                if ($stmt->execute()) {
                                    $is_run = $stmt->get_result();
                                    $result = mysqli_fetch_assoc($is_run);
                                    $lastYear = $result['count'] = 1;
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
                </section>

                <section class="row">
                    <div class="col col--1 span--4 bg--light d-grid--center">
                            <a class="btn btn--primary" href="?d=graphs">Bekijk grafieken</a>
                    </div>
                </section>

            <?php } ?>
        </main>

    </body>

</html>