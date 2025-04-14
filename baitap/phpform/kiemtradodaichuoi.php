<!-- 📝 Bài 7: Kiểm tra độ dài chuỗi
✅ Yêu cầu:
Người dùng nhập vào một đoạn văn bản.

Tính và hiển thị số ký tự có trong chuỗi. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kiem tra do dai chuoi</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="sentence">Sentence: <input type="text" name="sentence"></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['sentence'])) {
        $sentence = $_POST['sentence'];
        $length = strlen($sentence);
        echo "Do dai chuoi la: {$length}";
    } else {
        echo "Vui long nhap chuoi";
    }
}