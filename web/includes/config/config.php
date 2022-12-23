<?php
session_start();


function is_login() {
    // no login
    $status_login = false;
    // if have session with status ok
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']  == 'yes') {
        $status_login = true;
    }
    return $status_login;
}

function curl_post($url, $data) {

    $cURLConnection = curl_init($url);
    curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // $apiResponse - available data from the API request
    $jsonArrayResponse = json_decode($apiResponse, true);
    return $jsonArrayResponse;
}

function curl_get($url) {
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $phoneList = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    $jsonArrayResponse = json_decode($phoneList, true);
    return $jsonArrayResponse;
}

?>

