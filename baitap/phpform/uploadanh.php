<!-- 📝 Bài 10: Upload ảnh
Tạo form upload ảnh.

Kiểm tra file có đúng định dạng (jpg/png) và dung lượng < 2MB không.

Nếu đúng → lưu vào thư mục uploads/, hiển thị ảnh đã upload. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload anh</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <label for="myfile">File: <input type="file" name="myfile"></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";  # thu muc chua file upload

    if (!is_dir($target_dir) || !file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); # tao thu muc neu chua co
    }

    $myfile = basename($_FILES['myfile']['name']); # lay ten file
    $target_file = $target_dir . $myfile;
    $uploadStatus = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($fileType, $allowTypes)) {
        $uploadStatus = 0;
        echo "Chi duoc upload file JPG, PNG, JPEG, GIF";
    } else if (file_exists($target_file)) {
        $uploadStatus = 0;
        echo "File da ton tai";
    } else if ($_FILES['myfile']['size'] > $maxSize) {
        $uploadStatus = 0;
        echo "File qua lon";
    } else {
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target_file)) {
            echo "File ". htmlspecialchars($myfile) . " da duoc upload thanh cong.<br>";
            echo "<img src='". $target_file . "' alt='anh' width='100px' height='100px'> <br>";
        } else {
            $uploadStatus = 0;
            echo "Co loi khi upload file";
        }
    }
}