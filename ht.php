<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mainDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS mainDatabase";
$conn->query($sql);

// Use the created database
$conn->select_db("mainDatabase");

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS MyData (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    instaID TEXT NOT NULL,
    publicIP TEXT NOT NULL,
    content TEXT NOT NULL
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $conn->real_escape_string($_POST["text9"]);
    $instaID = 'placeholder'; // Replace with actual instaID logic if needed
    $publicIP = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO MyData (instaID, publicIP, content) VALUES ('$instaID', '$publicIP', '$text')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
