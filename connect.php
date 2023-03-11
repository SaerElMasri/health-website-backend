<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/javascript");
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "medical_db";
    $conn = new mysqli($hostname, $username, $password, $database);
    if($conn -> connect_error){
        die("Connection failed: " . $conn -> connect_error);
    }
?>