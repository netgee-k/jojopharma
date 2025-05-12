<?php
session_start();
$conn = new mysqli("localhost", "jojopharma", "", "jojopharma");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

