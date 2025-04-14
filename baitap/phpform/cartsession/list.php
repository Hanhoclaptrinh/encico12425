<?php
session_start();

# danh sach san pham
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

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }
    header("Location: list.php");
    exit;
}

foreach ($products as $id => $name) {
    echo "$name <a href='?add=$id'>[Thêm vào giỏ]</a><br>";
}
echo "<br><a href='cart.php'>🛒 Xem giỏ hàng</a>";