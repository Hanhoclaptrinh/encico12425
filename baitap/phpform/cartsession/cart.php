<?php
session_start();

$products = [
    1 => 'Wireless Mouse',
    2 => 'Laptop',
    3 => 'eBook',
    4 => 'Mobile Phone',
    5 => 'Earphone',
    6 => 'Gaming PC',
    7 => 'Adapter',
    8 => 'USB',
    9 => 'HDMI Cable',
    10 => 'Fast Charger',
];

echo "<h3>🛍️ Giỏ hàng của bạn:</h3>";
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        echo "{$products[$id]} - Số lượng: $qty<br>";
    }
} else {
    echo "Chưa có sản phẩm nào trong giỏ.";
}
echo "<br><a href='list.php'>← Quay lại mua tiếp</a>";
