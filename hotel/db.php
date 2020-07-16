<?php
$servername = "localhost";
$username = "newuser";
$database="hotel";
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>