<?php

    //ini_set('display_errors', 0);

    // Use credentials (If false DB wont work even if thats true)
    $use_credentials = false;
    // Use a database (If false DB Settings wont work even if thats true)
    $use_db = false;
    // Use a secondary database
    $use_secondary_db = false;
    // Use settings in database (requires settings table)
    $use_db_settings = false;
    /*
        Setting table must have a column called "settings", this will contain the setting name
        It must also have a column called "value", this will contain the value for the setting
        Its recommended to also have an ID column that auto increments
    */

    $path_lvl[1] = './';
    $path_lvl[2] = '../';
    $path_lvl[3] = '../../';
    $path_lvl[4] = '../../../';
    $path_lvl[5] = '../../../../';
    $path_lvl[6] = '../../../../../';

    if ($page['path_lvl'] == 1) {
        $path = $path_lvl[1];
    } else if ($page['path_lvl'] == 2) {
        $path = $path_lvl[2];
    } else if ($page['path_lvl'] == 3) {
        $path = $path_lvl[3];
    }



    // Set some settings
    $site['url'] = 'siteurl.com';
    $site['name'] = 'Site name';
    $site['description'] = 'Site description';



    // Get some preset functions
    include($path.'files/components/functions.php');

    // Get the credentials for all the connections
    if ($use_credentials) {
        include($path.'files/components/credentials.php');
    }


    // Link the DB
    if ($use_db && $use_credentials) {
        $link = new mysqli($db_host, $db_user, $db_password, $db_name);
        if (!$link){
            echo "<p style='color: red;'>Connection Unsuccessful!</p>";
        }
    }



    // Link the DB
    if ($use_secondary_db && $use_credentials) { 
        $second_link = new mysqli($sec_db_host, $sec_db_user, $sec_db_password, $sec_db_name);
        if (!$second_link){
            echo "<p style='color: red;'>Secondary Connection Unsuccessful!</p>";
        }
    }



    // Get and set some settings
    if ($use_db_settings && $use_db  && $use_credentials) { include($path.'files/components/settings.php'); }



    // Set some variables / settings
    if ($use_db_settings && $use_db  && $use_credentials) {
        if (count($settings) > 0) {
            if ($settings['site_url'])              { $site['url'] = $settings['site_url']; }
            if ($settings['company_name'])          { $site['name'] = $settings['company_name']; }
            if ($settings['company_description'])   { $site['description'] = $settings['company_description']; }
        }
    }

    $variable['siteName']   = $site['name'];
    $variable['siteDesc']   = $site['description'];
    $variable['year']       = date('Y');
    $variable['month']      = date('m');
    $variable['monthName']  = date('F');
    $variable['day']        = date('d');
    $variable['dayName']    = date('z');
    $variable['dayOfYear']  = date('l');

?>