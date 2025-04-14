<?php
require_once 'server.php';

$stmt = $conn->prepare("SELECT nhanvien.manv, honv, tenlot, tennv, gtinh, luong, ngsinh, diachi, phongban.tenphg AS tenphongban 
                        FROM nhanvien 
                        JOIN phongban ON nhanvien.phg = phongban.phg");

if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo "──────────────────── DANH SÁCH NHÂN VIÊN ────────────────────<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>Mã NV</th>
                <th>Họ</th>
                <th>Tên lót</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Lương</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Phòng ban</th>
              </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['manv'] . "</td>";
            echo "<td>" . $row['honv'] . "</td>";
            echo "<td>" . $row['tenlot'] . "</td>";
            echo "<td>" . $row['tennv'] . "</td>";
            echo "<td>" . ($row['gtinh'] == 0 ? "Nam" : "Nữ") . "</td>";
            echo "<td>" . $row['luong'] . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($row['ngsinh'])) . "</td>";
            echo "<td>" . $row['diachi'] . "</td>";
            echo "<td>" . $row['tenphongban'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
} else {
    echo "Error: " . $stmt->error;
}

echo "<br><br><a href='form.php' style='text-decoration: none;'>Quay lại trang chủ 🔙</a>";

$stmt->close();
$conn->close();
