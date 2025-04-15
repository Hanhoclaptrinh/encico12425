<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Sửa thông tin sản phẩm</h1>

        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <form action="../controls/process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <input type="hidden" name="old_image" value="<?php echo $_POST['old_image']; ?>">

            <div class="form-group">
                <label for="tensptensp">Tên sản phẩm:</label>
                <input type="text" name="tensp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="motamota">Mô tả:</label>
                <input type="text" name="mota" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gia">Giá:</label>
                <input type="number" name="gia" class="form-control" required step="0.01">
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình ảnh:</label>
                <input type="file" name="hinhanh" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="loai">Loại sản phẩm:</label>
                <select name="loai" id="loai" class="form-control">
                    <option value="">Chọn loại sản phẩm</option>
                    <option value="Hàng tiêu dùng">Hàng tiêu dùng</option>
                    <option value="Đồ điện gia dụng">Đồ điện gia dụng</option>
                    <option value="Thực phẩm">Thực phẩm</option>
                    <option value="Mỹ phẩm">Mỹ phẩm</option>
                    <option value="Thời trang">Thời trang</option>
                    <option value="Công nghệ">Công nghệ</option>
                    <option value="Văn phòng phẩm">Văn phòng phẩm</option>
                    <option value="Giáo dục & Sách">Giáo dục & Sách</option>
                    <option value="Nội thất">Nội thất</option>
                    <option value="Sức khỏe">Sức khỏe</option>
                </select>
            </div>
            <button type="submit" name="action" value="update" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>