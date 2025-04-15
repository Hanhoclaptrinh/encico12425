<?php
require_once __DIR__ . '/../config/server.php';
const CURRENCY = '₫';

$search = $_POST['search'] ?? '';
$param = '%' . $search . '%';

$stmt = $search !== ''
    ? $conn->prepare("SELECT * FROM products WHERE name LIKE ?")
    : $conn->prepare("SELECT * FROM products");

if ($search !== '') {
    $stmt->bind_param("s", $param);
}

if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<tr><td colspan='7' class='text-center'>Không tìm thấy sản phẩm nào.</td></tr>";
    }

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>" . number_format($row['price'], 0, ',', '.') . CURRENCY . "</td>
            <td><img src='{$row['image']}' width='100' style='object-fit: cover;'></td>
            <td>{$row['category']}</td>
            <td>
                <form action='controls/process.php' method='post'>
                    <input type='hidden' name='action' value='addtocart'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <input type='hidden' name='product_name' value='{$row['name']}'>
                    <input type='hidden' name='product_price' value='{$row['price']}'>
                    <input type='hidden' name='product_image' value='{$row['image']}'>
                    <button type='submit' class='btn btn-sm btn-success'>Thêm vào giỏ hàng</button>
                </form>
            </td>
        </tr>";
    }
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
