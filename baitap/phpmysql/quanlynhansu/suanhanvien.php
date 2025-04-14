<?php
require_once 'server.php';

$manv = $_POST['manv'];
$honv = $_POST['honv'];
$tenlot = $_POST['tenlot'];
$tennv = $_POST['tennv'];
$gtinh = isset($_POST['gtinh']) ? (int)$_POST['gtinh'] : null;
$luong = $_POST['luong'];
$ngsinh = $_POST['ngsinh'] ?? null;
$diachi = $_POST['diachi'];
$phongban = $_POST['phongban'];

$stmt = $conn->prepare("UPDATE nhanvien SET honv = ?, tenlot = ?, tennv = ?, gtinh = ?, luong = ?, ngsinh = ?, diachi = ?, phg = ? WHERE manv = ?");
$stmt->bind_param("sssidssis", $honv, $tenlot, $tennv, $gtinh, $luong, $ngsinh, $diachi, $phongban, $manv);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Sửa thông tin nhân viên thành công')</script>";
    header('Location: form.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Sửa thông tin nhân viên thất bại')</script>";
    header('Location: form.php');
    exit();
    return false;
} 

$stmt->close();
$conn->close();