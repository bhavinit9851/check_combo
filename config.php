<?php
error_reporting(1);
//session_id('mySessionID');
//session_start();
//$siteurl = "http://localhost/iwaykidz_theme/";
$servername = "localhost";
$username = "root";
$password = "";
$database="check_combox";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>