<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Thêm sinh viên</h1>
        <form action="themsinhvien.php" method="post">
            <div class="form-group">
                <label for="masv">Mã sinh viên:</label>
                <input type="text" name="masv" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hoten">Họ tên:</label>
                <input type="text" name="hoten" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ngsinh">Ngày sinh:</label>
                <input type="date" name="ngsinh" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gtinh"> Giới tính:</label> &nbsp;&nbsp;
                <input type="radio" name="gtinh" value="0">Nam
                <input type="radio" name="gtinh" value="1">Nữ
            </div>
            <div class="form-group">
                <label for="dchi">Địa chỉ:</label>
                <input type="text" name="dchi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lop">Lớp:</label>
                <select name="lop" id="" class="form-control">
                    <option value="">Chọn lớp</option>
                    <?php include 'loadlop.php' ?>
                </select>
            </div>
            <button type="submit" name="them" value="create" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>