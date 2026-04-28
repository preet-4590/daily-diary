<?php
$conn = new mysqli("localhost", "root", "", "entry_pass");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>