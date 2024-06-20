<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Databasename";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database (comment this if you created the database)
$sql = "CREATE DATABASE IF NOT EXISTS mainDatabase";
$conn->query($sql);

// Create table (comment this if you created the table)
$sql = "CREATE TABLE IF NOT EXISTS MyData (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    instaID TEXT NOT NULL,
    publicIP TEXT NOT NULL,
    content TEXT NOT NULL
)";

$conn->query($sql);

$TEXT = $_POST["text9"];

$sql = "INSERT INTO MyData (instaID, publicIP, content) VALUES ('placeholder', '" . $_SERVER['REMOTE_ADDR'] . "', '$TEXT')";
$conn->query($sql);

$conn->close();
?>
