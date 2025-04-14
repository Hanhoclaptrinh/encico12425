<!-- 📝 Bài 8: Tính toán với select option
✅ Yêu cầu:
Tạo form nhập 2 số + 1 dropdown để chọn phép tính: cộng, trừ, nhân, chia.

Khi submit, in kết quả. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tinh toan voi select</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="a">a: <input type="number" name="a"></label> <br>
        <label for="b">b: <input type="number" name="b"></label> <br>
        <label for="pheptoan">Operator: 
            <select name="operator" id="operator">
                <option value="">Chon mot phep toan</option>
                <option value="cong">+</option>
                <option value="tru">-</option>
                <option value="nhan">*</option>
                <option value="chianguyen">/</option>
                <option value="chialaydu">%</option>
            </select>
        </label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $option = isset($_POST['operator']) ? $_POST['operator'] : false;
    if ($option) {
        $a = (int) $_POST['a'];
        $b = (int) $_POST['b'];

        $ketQua = match($option) {
            'cong' => $a + $b,
            'tru' => $a - $b,
            'nhan' => $a * $b,
            'chianguyen' => $a / $b,
            'chialaydu' => $a % $b,
            default => 0
        };

        echo "Ket qua la: {$ketQua}";
    } else {
        echo "Vui long chon mot phep toan";
    }
}