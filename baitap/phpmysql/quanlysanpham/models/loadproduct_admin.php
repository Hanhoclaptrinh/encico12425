<?php
require_once __DIR__ . '/../config/server.php';
const CURRENCY = '₫';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$param = '%' . $search . '%';

if ($search !== '') {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $stmt->bind_param("s", $param);
} else {
    $stmt = $conn->prepare("SELECT * FROM products");
}

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<tr><td colspan='8' class='text-center'>Không tìm thấy sản phẩm nào.</td></tr>";
    }

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . number_format($row['price'], 0, ',', '.') . CURRENCY . "</td>
            <td>
                <img src='../" . $row['image'] . "' style='width: 100px; height: auto; object-fit: cover;'>
            </td>
            <td>" . $row['category'] . "</td>
            <td>
                <div class='d-flex justify-content-center gap-2'>
                    <form action='../controls/process.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <input type='hidden' name='old_image' value='" . $row['image'] . "' />
                        <button class='btn btn-sm btn-primary' name='action' value='editprd'>Sửa</button>
                    </form>
                    <form action='../controls/process.php' method='post' onsubmit='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button class='btn btn-sm btn-danger' name='action' value='deleteprd'>Xóa</button>
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
