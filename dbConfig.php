<?php
// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword= "root";
$dbName = "user_base";

// Connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//check connection

if( $db -> connect_error){
    die("Connection failed: " . $db->connect_error);
}

?>