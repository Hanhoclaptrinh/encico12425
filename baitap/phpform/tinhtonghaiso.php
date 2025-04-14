<!-- 📝 Bài 2: Tính tổng 2 số
✅ Yêu cầu:
Tạo form nhập 2 số.

Sau khi người dùng nhấn "Tính", hiển thị tổng của 2 số. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tinh tong hai so</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="a">a: <input type="number" name="a"></label> <br>
        <label for="b">b: <input type="number" name="b"></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = (int) $_POST['a'];
    $b = (int) $_POST['b'];
    $tong = $a + $b;
    if (!empty($a) && !empty($b)) {
        echo "Tong hai so la: {$tong}";
    } else {
        echo "Vui long nhap hai so";
    }
}