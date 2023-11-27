<?php

    if ($page['cat'] != "account" && $page['cat'] != "admin" && $page['name'] != 'login' && $page['name'] != 'register') {
        if (isset($_COOKIE['visitor_log'])) {
            setcookie('visitor_log', 'true', time() + (60 * 20), "/");
        } else {

            setcookie('visitor_log', 'true', time() + (60 * 20), "/");

            $cur_date['full'] = date('Y-m-d');
            $cur_date['month'] = date('Y-m');
            $cur_date['year'] = date('Y');
        
            // get last year row from db and make new year row if the year changed
            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'year' ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $is_run = $stmt->get_result();
            $result = mysqli_fetch_assoc($is_run);
        
            $last_row['year'] = $result['date'];
            $last_row['count'] = $result['count'] + 1;
        
            $stmt = $link->prepare("UPDATE `visitors` SET `count`= ? WHERE date = ?");
            $stmt->bind_param("is", $last_row['count'], $last_row['year']);
            $stmt->execute();
        
        
            // get last month row from db and make new month row if the month changed
            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'month' ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $is_run = $stmt->get_result();
            $result = mysqli_fetch_assoc($is_run);
        
            $last_row['month'] = $result['date'];
            $last_row['count'] = $result['count'] + 1;
        
            $stmt = $link->prepare("UPDATE `visitors` SET `count`= ? WHERE date = ?");
            $stmt->bind_param("is", $last_row['count'], $last_row['month']);
            $stmt->execute();
        
        
            // get last day from db and make a new row if they day changed
            $stmt = $link->prepare("SELECT * FROM `visitors` WHERE mode = 'day' ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $is_run = $stmt->get_result();
            $result = mysqli_fetch_assoc($is_run);
        
            $last_row['day'] = $result['date'];
            $last_row['count'] = $result['count'] + 1;
        
            $stmt = $link->prepare("UPDATE `visitors` SET `count`= ? WHERE date = ?");
            $stmt->bind_param("is", $last_row['count'], $last_row['day']);
            $stmt->execute();
        }
    } else {
        setcookie("visitor_log", "", time() - 3600, "/");
    }

?>
