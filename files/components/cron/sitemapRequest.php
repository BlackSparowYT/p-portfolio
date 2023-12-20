<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$page['name'] = "createTable";
$page['categorie'] = "cron";
$page['path_lvl'] = 4;
require_once("../../config.php");

// API endpoint URL
$apiUrl = 'https://www.codepunker.com/tools';

// Data to be sent in the POST request
$postData = [
    'execute' => 'authorizeAPI',
    'key' => $api['sitemap'],
    'rand' => "yfos0mnonv6tsyl2be9zccs4lju3phqx"
];

// Initialize cURL session
$ch = curl_init($apiUrl);

// Set cURL options for a POST request
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and fetch the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Process the API response
    $response = json_decode($response, true);
    var_dump($response);
    $token = $response['response'];

    // Data to be sent in the POST request
    $postData = [
        'execute' => 'executeSitemapGenerator',
        'domain' => "https://" . $site['url'],
        'key' => $api['sitemap'],
        'freq' => 'never',
        'token' => $token,
    ];

    // Execute cURL session for the second API call
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // Process the API response
        $response = json_decode($response, true);
        var_dump($response);

        $apiUrl = $response['ping_url'];
        $stop = false;
        $start_time = time();

        while (!$stop && (time() - $start_time) < 1200) { // Loop for a maximum of 20 minutes (1200 seconds)
            // Needs to ping the new $apiUrl
            $pingResponse = pingApiUrl($apiUrl);

            // Check the ping response
            if (str_contains($pingResponse, "sitemap not found")) {
                // Sitemap request not found, continue looping
                echo "Sitemap not found. Retrying...\n";
            } else {
                // Sitemap found, stop the loop
                echo "Sitemap found. Stopping...\n";
                $stop = true;
            }

            // Sleep for 5 seconds before the next iteration
            sleep(5);
        }
    }
}

// Close cURL session
curl_close($ch);

function pingApiUrl($url) {
    // Initialize cURL session for pinging
    $ch = curl_init($url);

    // Set cURL options for a GET request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and fetch the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close cURL session for pinging
    curl_close($ch);

    return $response;
}
?>
