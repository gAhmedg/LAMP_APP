<?php
$servername = "db";  // the MySQL container hostname
$username = "user";
$password = "password";
$dbname = "myappdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
