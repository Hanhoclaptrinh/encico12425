<?php
require_once 'server.php';

$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$ngsinh = $_POST['ngsinh'];
$gtinh = isset($_POST['gtinh']) ? (int)$_POST['gtinh'] : null;
$dchi = $_POST['dchi'];
$lop = $_POST['lop'];

$stmt = $conn->prepare("INSERT INTO sinhvien (masv, hoten, ngaysinh, gioitinh, diachi, malop) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $masv, $hoten, $ngsinh, $gtinh, $dchi, $lop);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Thêm sinh viên thành công')</script>";
    header('Location: trangchu.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Thêm sinh viên thất bại')</script>";
    header('Location: trangchu.php');
    exit();
    return false;
}

$stmt->close();
$conn->close();