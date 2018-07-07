<?php
    require_once  "../vendor/autoload.php";
    session_start();

    $client = new Google_Client();
    $client->setAuthConfig('../client_secret.json');

    

?>