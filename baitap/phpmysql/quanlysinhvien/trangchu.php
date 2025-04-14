<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: dangnhap.php");
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
            <h3>Danh sách sinh viên</h3>
            <div>
                <form action="xuly.php" method="post" class="d-inline">
                    <button type="submit" name="action" value="themsv" class="btn btn-success">Thêm sinh viên</button>
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
                    <th>Mã SV</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Lớp</th>
                    <th>Khoa</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody id="student-table">
                <?php include 'loadsinhvien.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
