<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
mysqli_set_charset($con,"utf8");
/*
Username: aidjH2XmVe
Database name: aidjH2XmVe
Password: NdnxhUdg5N
Server: remotemysql.com
Port: 3306
*/
?>
