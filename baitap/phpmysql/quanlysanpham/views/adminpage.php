<?php
    session_start();
    if (!isset($_SESSION['id']) || $_SESSION['isAdmin'] !== 1) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sinh viên - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Xin chào, <span id="admin-name"><?php echo $_SESSION['fullname']; ?></span> 👋</h2>
        <div class="d-flex justify-content-between mb-3">
            <h3>Danh sách sản phẩm</h3>

            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }        
            ?>

            <div>
                <form action="../controls/process.php" method="post" class="d-inline">
                    <button type="submit" name="action" value="addprd" class="btn btn-success">Thêm sản phẩm</button>
                    <button type="submit" name="action" value="logout" class="btn btn-danger">Đăng xuất</button>
                </form>
            </div>
        </div>

        <div class="mb-3 d-flex justify-content-start gap-2">
            <form method="post" class="d-flex gap-2">
                <input type="text" name="search" placeholder="Tìm kiếm theo tên" class="form-control" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>

        <div id="alert-box"></div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Phân loại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="student-table">
                <?php include '../models/loadproduct_admin.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
