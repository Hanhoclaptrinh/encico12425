<?php
require_once 'server.php';
global $conn;

if (!($conn instanceof mysqli)) {
    die("Connection failed: " . $conn->connect_error);
}

$tenphg = $_POST['tenphongban'];

$stmt = $conn->prepare("INSERT INTO phongban (tenphg) VALUES (?)");
$stmt->bind_param("s", $tenphg);

if ($stmt->execute()) {
    echo "✔️ Thêm phòng ban thành công";
    return true;
} else {
    echo "❌ Thêm phòng ban thất bại";
    return false;
}

$stmt->close();
$conn->close();