<?php
require_once 'server.php';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$param = '%' . $search . '%';

if ($search !== '') {
    $stmt = $conn->prepare("SELECT sv.masv, sv.hoten, sv.ngaysinh, sv.gioitinh, sv.diachi, l.tenlop, k.tenkhoa
                            FROM sinhvien sv
                            JOIN lop l ON sv.malop = l.malop
                            JOIN khoa k ON l.makhoa = k.makhoa
                            WHERE sv.hoten LIKE ?");
    $stmt->bind_param("s", $param);
} else {
    $stmt = $conn->prepare("SELECT sv.masv, sv.hoten, sv.ngaysinh, sv.gioitinh, sv.diachi, l.tenlop, k.tenkhoa
                            FROM sinhvien sv
                            JOIN lop l ON sv.malop = l.malop
                            JOIN khoa k ON l.makhoa = k.makhoa");
}

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<tr><td colspan='8' class='text-center'>Không tìm thấy sinh viên nào.</td></tr>";
    }

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['masv'] . "</td>
            <td>" . $row['hoten'] . "</td>
            <td>" . date("d/m/Y", strtotime($row['ngaysinh'])) . "</td>
            <td>" . ($row['gioitinh'] == 0 ? "Nam" : "Nữ") . "</td>
            <td>" . $row['diachi'] . "</td>
            <td>" . $row['tenlop'] . "</td>
            <td>" . $row['tenkhoa'] . "</td>
            <td>
                <div class='d-flex justify-content-center gap-2'>
                    <form action='xuly.php' method='post'>
                        <input type='hidden' name='masv' value='" . $row['masv'] . "'>
                        <button class='btn btn-sm btn-primary' name='action' value='suasv'>Sửa</button>
                    </form>
                    <form action='xuly.php' method='post' onsubmit='return confirm(\"Bạn có chắc chắn muốn xóa sinh viên này không?\")'>
                        <input type='hidden' name='masv' value='" . $row['masv'] . "'>
                        <button class='btn btn-sm btn-danger' name='action' value='xoasv'>Xóa</button>
                    </form>
                </div>
            </td>
        </tr>";
    }
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
