<?php
session_start();
$id = $_POST['product_id'] ?? '';

if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
    $_SESSION['message'] = "<div class='alert alert-success'>Đã xóa sản phẩm khỏi giỏ hàng.</div>";
}

header("Location: ../views/cart.php");
exit();
