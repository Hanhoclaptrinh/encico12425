<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng của bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">🛒 Giỏ hàng của bạn</h2>

        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                    ?>
                        <tr>
                            <td><img src="<?php echo '../' . $item['image']; ?>" width="80" height="80" style="object-fit: cover;"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo number_format($item['price'], 0, ',', '.') . '₫'; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo number_format($subtotal, 0, ',', '.') . '₫'; ?></td>
                            <td>
                                <form action="../controls/process.php" method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="removefromcart">
                                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                    <button class="btn btn-danger btn-sm" type="submit" name="action" value="removefromcart">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td colspan="2"><strong><?php echo number_format($total, 0, ',', '.') . '₫'; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
        <?php endif; ?>

        <a href="../index.php" class="btn btn-primary">← Tiếp tục mua hàng</a>
    </div>
</body>
</html>
