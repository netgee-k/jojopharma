<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jojo_meds");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

