<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    logToFile("\n---------------------------------------------------\nDB Mirror script started at " . date("Y-m-d H:i:s") . PHP_EOL);

    $page['name'] = "createTable";
    $page['categorie'] = "cron";
    $page['path_lvl'] = 4;
    require_once("../../config.php");

    $cur_date['full'] = date('Y-m-d');
    $cur_date['month'] = date('Y-m');
    $cur_date['year'] = date('Y');

    try {
        // Insert year row if needed
        $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'year' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($id, $date, $count, $mode);
        $stmt->fetch();
        $stmt->close();

        $last_row['year'] = $date;

        if ($cur_date['year'] > $last_row['year'] || $last_row['year'] == NULL) {
            logToFile("Adding year row");

            $stmt = $link->prepare("INSERT INTO `visitors` (`date`, `count`, `mode`) VALUES (?,'0','year')");
            $stmt->bind_param("s", $cur_date['year']);
            $stmt->execute();
            $stmt->close();
        }

        // Insert month row if needed
        $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'month' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($id, $date, $count, $mode);
        $stmt->fetch();
        $stmt->close();

        $last_row['month'] = $date;

        if ($cur_date['month'] > $last_row['month'] || $last_row['month'] == NULL) {
            logToFile("Adding month row");

            $stmt = $link->prepare("INSERT INTO `visitors` (`date`, `count`, `mode`) VALUES (?,'0','month')");
            $stmt->bind_param("s", $cur_date['month']);
            $stmt->execute();
            $stmt->close();
        }

        // Insert day row if needed
        $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'day' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($id, $date, $count, $mode);
        $stmt->fetch();
        $stmt->close();

        $last_row['day'] = $date;

        if ($cur_date['full'] > $last_row['day'] || $last_row['day'] == NULL) {
            logToFile("Adding day row");

            $stmt = $link->prepare("INSERT INTO `visitors` (`date`, `count`, `mode`) VALUES (?,'0','day')");
            $stmt->bind_param("s", $cur_date['full']);
            $stmt->execute();
            $stmt->close();
        }

    } catch (Exception $e) {
        logToFile("Error: " . $e->getMessage());
    }
    
    logToFile("\n\nDB Mirror script ended at " . date("Y-m-d H:i:s") . PHP_EOL);

    function logToFile($message) {
        $logFile = "cron_log.txt";
        file_put_contents($logFile, $message, FILE_APPEND);
        return;
    }

?>
