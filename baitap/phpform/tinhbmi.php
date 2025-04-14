<!-- 📝 Bài 5: Tính chỉ số BMI
✅ Yêu cầu:
Form gồm: nhập cân nặng (kg), chiều cao (m).

Tính BMI = cân nặng / (chiều cao * chiều cao).

In kết quả và phân loại (gầy, bình thường, béo, v.v). -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tinh chi so BMI</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="weight">Weight: <input type="number" step="0.01" name="weight"></label> <br>
        <label for="height">Height: <input type="number" step="0.01" name="height"></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cannang = (float) $_POST['weight'];
    $chieucao = (float) $_POST['height'];

    if ($cannang > 0 && $chieucao > 0) {
        $bmi = $cannang / pow($chieucao, 2);
        $bmi = round($bmi, 2);

        echo "Chỉ số BMI của bạn là: {$bmi}<br>";

        if ($bmi < 18.5) {
            echo "→ Bạn đang thiếu cân (Gầy)";
        } elseif ($bmi < 25) {
            echo "→ Cân nặng bình thường";
        } elseif ($bmi < 30) {
            echo "→ Thừa cân";
        } else {
            echo "→ Béo phì";
        }
    } else {
        echo "Vui lòng nhập cân nặng và chiều cao hợp lệ (lớn hơn 0)";
    }
}
?>

