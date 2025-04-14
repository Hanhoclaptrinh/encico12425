<?php
require_once 'server.php';
global $conn;

if (!($conn instanceof mysqli)) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM phongban");

if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo "──────────────────── DANH SÁCH PHÒNG BAN ────────────────────<br>";
    while ($row = $result->fetch_assoc()) {
        echo "Phòng: " . $row['phg'] . "<br>";
        echo "Tên phòng: " . $row['tenphg'] . "<br>";
        echo "───────────────────────────────<br>";
    }
    echo "──────────────────────────────────────────────────────────<br>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();