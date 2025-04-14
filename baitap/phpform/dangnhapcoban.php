<!-- 📝 Bài 3: Đăng nhập đơn giản
✅ Yêu cầu:
Tạo form đăng nhập (username & password).

Nếu username là "admin" và password là "123", hiển thị "Đăng nhập thành công".

Ngược lại: "Sai thông tin". -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dang nhap</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="username">Username: <input type="text" name="username"></label> <br>
        <label for="password">Password: <input type="password" name="password"></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

$u = 'admin';
$p = '123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == $u && $password == $p) {
            echo "Dang nhap thanh cong";
        } else {
            echo "Dang nhap that bai! Ten dang nhap hoac mat khau khong chinh xac.";
        }
    } else {
        echo "Vui long nhap ten dang nhap va mat khau";
    }
}