<!-- 📝 Bài 4: Kiểm tra số chẵn lẻ
✅ Yêu cầu:
Nhập một số nguyên.

Kiểm tra và in ra kết quả: "Đây là số chẵn" hoặc "Đây là số lẻ". -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kiem tra so chan le</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="number">Number: <input type="number" name="number"></label>
        <input type="submit" value="Check">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['number'])) {
        if ($_POST['number'] % 2 == 0) {
            echo "Day la so chan";
        } else {
            echo "Day la so le";
        }
    } else {
        echo "Vui long nhap mot so nguyen";
    }
}