<?php
require_once 'server.php';

$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$ngsinh = $_POST['ngsinh'];
$gtinh = isset($_POST['gtinh']) ? (int)$_POST['gtinh'] : null;
$dchi = $_POST['dchi'];
$lop = $_POST['lop'];

$stmt = $conn->prepare("UPDATE sinhvien SET hoten = ?, ngaysinh = ?, gioitinh = ?, diachi = ?, malop = ? WHERE masv = ?");
$stmt->bind_param("ssisss", $hoten, $ngsinh, $gtinh, $dchi, $lop, $masv);

if ($stmt->execute()) {
    echo "<script>alert('✔️ Sửa sinh viên thành công')</script>";
    header('Location: trangchu.php');
    exit();
    return true;
} else {
    echo "<script>alert('❌ Sửa sinh viên thất bại')</script>";
    header('Location: trangchu.php');
    exit();
    return false;
}

$stmt->close();
$conn->close();