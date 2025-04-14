<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý phòng ban</title>
</head>
<body>
    <h1>Quản lý phòng ban</h1><br>
    <form action="xuly.php" method="post">
        <label for="maphongban">Mã phòng ban: </label>
        <input type="text" name="maphongban"><br><br>

        <label for="tenphongban">Tên phòng ban:</label>
        <input type="text" name="tenphongban"><br><br>

        <button type="submit" name="action" value="them">Thêm phòng ban</button>
        <button type="submit" name="action" value="sua">Sửa phòng ban</button>
        <button type="submit" name="action" value="xoa">Xóa phòng ban</button>
        <button type="submit" name="action" value="xem">Danh sách phòng ban</button>
    </form>
</body>
</html>
