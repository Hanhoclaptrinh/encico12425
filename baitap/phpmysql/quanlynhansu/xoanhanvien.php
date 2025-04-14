<?php
require_once 'server.php';

$manv = $_POST['manv'];

$stmt = $conn->prepare("DELETE FROM nhanvien WHERE manv = ?");
$stmt->bind_param('s', $manv);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Xóa nhân viên thành công')</script>";
    header('Location: form.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Xóa nhân viên thất bại')</script>";
    header('Location: form.php');
    exit();
    return false;
}

$stmt->close();
$conn->close();