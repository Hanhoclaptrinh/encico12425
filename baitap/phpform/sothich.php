<!-- 📝 Bài 6: Gửi nhiều sở thích
✅ Yêu cầu:
Cho người dùng chọn nhiều sở thích (checkbox).

Sau khi gửi, hiển thị danh sách các sở thích đã chọn. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>So thich</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="sothich">So thich: </label> <br>
        <input type="checkbox" name="sothich[]" value="The thao"> The thao <br>
        <input type="checkbox" name="sothich[]" value="Dien anh"> Dien anh <br>
        <input type="checkbox" name="sothich[]" value="Doc sach"> Doc sach <br>
        <input type="checkbox" name="sothich[]" value="Choi game"> Choi game <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $soThich = $_POST['sothich'];
    if (!empty($soThich)) {
        echo "Ban da chon ". count($soThich) ." so thich<br>";
        echo "So thich cua ban la: ";
        foreach ($soThich as $soThich) {
            echo $soThich . " ";
        }
    } else {
        echo "Vui long chon so thich";
    }
}