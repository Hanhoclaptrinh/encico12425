<?php
require_once 'server.php';
global $conn;

if (!($conn instanceof mysqli)) {
    die("Connection failed: " . $conn->connect_error);
}

$phg = $_POST['maphongban'];

$stmt = $conn->prepare("DELETE FROM phongban WHERE phg = ?");

if ($stmt->execute()) {
    echo "✔️ Xóa phòng ban thành công";
    return true;
} else {
    echo "❌ Xóa phòng ban thất bại";
    return false;
}

$stmt->close();
$conn->close();