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

$stmt = $conn->prepare("INSERT INTO nhanvien (manv, honv, tenlot, tennv, gtinh, luong, ngsinh, diachi, phg) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssidssi", $manv, $honv, $tenlot, $tennv, $gtinh, $luong, $ngsinh, $diachi, $phongban);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Thêm nhân viên thành công')</script>";
    header('Location: form.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Thêm nhân viên thất bại')</script>";
    header('Location: form.php');
    exit();
    return false;
}

$stmt->close();
$conn->close();
