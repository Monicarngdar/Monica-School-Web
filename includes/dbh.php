<?php 
// This is a Database handler

$server = "localhost";
$dbName = "2025-schoolweb";
$dbUsername = "root";
$dbPassword = "";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

?>