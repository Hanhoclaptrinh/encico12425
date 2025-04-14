<?php
require_once 'server.php';
global $conn;

if (!($conn instanceof mysqli)) {
    die("Connection failed: " . $conn->connect_error);
}

$tenphg = $_POST['tenphongban'];
$phg = $_POST['maphongban'];

$stmt = $conn->prepare("UPDATE phongban SET tenphg = ? WHERE phg = ?");
$stmt->bind_param("ss", $tenphg, $phg);

if ($stmt->execute()) {
    echo "✔️ Sửa phòng ban thành công";
    return true;
} else {
    echo "❌ Sửa phòng ban thất bại";
    return false;
}

$stmt->close();
$conn->close();