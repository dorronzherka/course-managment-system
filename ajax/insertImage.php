<?php
require_once "../appdata/Image.php";
try{
    $directory = "../assets/img/profileImages";
    echo Image::uploadImage('file',$directory);
}catch (Exception $msg){
    echo "Error:".$msg->getMessage();
}
?>