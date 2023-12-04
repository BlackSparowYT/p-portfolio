<?php

    $page['name'] = "analytics";
    $page['category'] = "account";
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
            <section class="row">
                <div class="col col--1 bg--light">
                    <p><?= date('F', strtotime('0 months ago')) ?></p>
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
                <div class="col col--2">
                    <p><?= date('F', strtotime('1 month ago')) ?></p>
                    <?php
                        $date = date('Y-m', strtotime('1 month ago'));
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
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>-";
                                } else if ($rate = 0) {
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
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>-";
                                } else if ($rate = 0) {
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
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>-";
                                } else if ($rate = 0) {
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
                                    echo "<i class='da-icon da-icon--arrow-trend-down da-icon--red'></i><p>-";
                                } else if ($rate = 0) {
                                    echo "<i class='da-icon da-icon--dash da-icon--orange'></i><p>";
                                }
                                echo $rate."%</p>";
                            }
                        ?>
                    </div>
                </div>
            </section>
        </main>

    </body>

</html>