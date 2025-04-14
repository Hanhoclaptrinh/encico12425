<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "quanlysinhvien";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

global $conn;
if (!($conn instanceof mysqli)) {
    die("Connection failed: " . $conn->connect_error);
}