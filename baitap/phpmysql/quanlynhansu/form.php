<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
</head>
<body>
    <h1>Quản lý nhân viên</h1><br>
    <form action="xuly.php" method="post">
        <label for="manv">Mã nhân viên: </label>
        <input type="text" name="manv"><br><br>
        <label for="honv">Họ nhân viên: </label>
        <input type="text" name="honv"><br><br>
        <label for="tenlot">Tên đệm nhân viên: </label>
        <input type="text" name="tenlot"><br><br>
        <label for="tennv">Tên nhân viên: </label>
        <input type="text" name="tennv"><br><br>
        <label for="gtinh"> Giới tính:
            <input type="radio" name="gtinh" value="0">Nam
            <input type="radio" name="gtinh" value="1">Nu
        </label><br><br>
        <label for="luong">Lương: </label>
        <input type="number" step="0.01" name="luong"><br><br>
        <label for="ngsinh">Ngày sinh: </label>
        <input type="date" name="ngsinh"><br><br>
        <label for="diachi">Địa chỉ: </label>
        <input type="text" name="diachi"><br><br>
        <label for="phongban">Phòng ban: </label>
        <select name="phongban" id="">
            <option value="">Chọn phòng ban</option>
            <?php include 'loadphongban.php' ?>
        </select><br><br>
        <button type="submit" name="action" value="them">Them</button>
        <button type="submit" name="action" value="sua">Sua</button>
        <button type="submit" name="action" value="xoa">Xoa</button>
        <button type="submit" name="action" value="xem">Xem</button>
    </form>
</body>
</html>