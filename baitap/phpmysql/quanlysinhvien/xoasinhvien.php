<?php
require_once 'server.php';

$masv = $_POST['masv'];

$stmt = $conn->prepare("DELETE FROM sinhvien WHERE masv = ?");
$stmt->bind_param("s", $masv);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Xóa sinh viên thành công')</script>";
    header('Location: trangchu.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Xóa sinh viên thất bại')</script>";
    header('Location: trangchu.php');
    exit();
    return false;
}

$stmt->close();
$conn->close();