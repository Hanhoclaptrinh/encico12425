<?php
session_start();

$id = $_POST['product_id'] ?? '';
$name = $_POST['product_name'] ?? '';
$price = $_POST['product_price'] ?? '';
$image = $_POST['product_image'] ?? '';
$type = $_POST['type'] ?? ''; 

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
    if ($type === 'increase') {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } elseif ($type === 'decrease') {
        $_SESSION['cart'][$id]['quantity'] -= 1;

        if ($_SESSION['cart'][$id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$id]);
            $_SESSION['message'] = "<div class='alert alert-info'>Sản phẩm đã được xóa khỏi giỏ hàng.</div>";
        }
    } else {
        $_SESSION['cart'][$id]['quantity'] += 1;
    }
} else {
    $_SESSION['cart'][$id] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity' => 1
    ];
}

if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = "<div class='alert alert-success'>Đã cập nhật giỏ hàng!</div>";
}

header("Location: ../index.php");
exit();
