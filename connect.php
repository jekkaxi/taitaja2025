<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "tietotesti";

$conn = new mysqli($servername, $username, $password, $database);
$conn->set_charset('utf8mb4'); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>