<?php
    require_once '../vendor/autoload.php';
    session_start();
    $client = new Google_Client();
    $client->setAuthConfig('../client_secret.json');
    $client->setRedirectUri("http://".$_SERVER['HTTP_HOST']."/ecms/googleApiCallbacks/createCourseCallback.php");
    $client->addScope(Google_Service_Classroom::CLASSROOM_COURSES);
    if(!isset($_GET['code'])){
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    }else{
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        header('Location:../addCourseToClassroom.php');
    }
?>