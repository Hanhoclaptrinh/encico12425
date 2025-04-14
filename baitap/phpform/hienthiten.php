<!-- 📝 Bài 1: Nhập tên và hiển thị
✅ Yêu cầu:
Tạo form nhập tên người dùng.

Gửi tên qua phương thức POST và hiển thị lại tên. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hien thi ten</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="name">Name: <input type="text" name="name"></label>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenNguoiDung = $_POST['name'];
    if (!empty($tenNguoiDung)) {
        echo "Xin chao, {$tenNguoiDung}";
    } else {
        echo "Vui long nhap ten nguoi dung";
    }
}