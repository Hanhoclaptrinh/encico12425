<!-- 📝 Bài 11: Upload nhiềunhiều ảnh
Tạo form upload ảnh.

Kiểm tra cáccác file có đúng định dạng (jpg/png) và dung lượng < 2MB/filefile không.

Nếu đúng → lưu vào thư mục uploads/, hiển thị các ảnh đã upload. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload nhieu anh</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <label for="myfile">File: <input type="file" name="myfile[]" multiple></label> <br>
        <input type="submit" value="Submit">
    </form>    
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $maxSize = 2 * 1024 * 1024;
    $maxFiles = 3;
    $totalFiles = count($_FILES['myfile']['name']);

    if ($totalFiles > $maxFiles) {
        echo "<p style='color:red;'>Chi duoc upload $maxFiles file.</p>";
        exit;
    }

    foreach ($_FILES['myfile']['name'] as $key => $value) {
        $tmp_name = $_FILES['myfile']['tmp_name'][$key];
        $size = $_FILES['myfile']['size'][$key];
        $error = $_FILES['myfile']['error'][$key];
        $file_ext = strtolower(pathinfo($value, PATHINFO_EXTENSION));

        if ($error === UPLOAD_ERR_OK) {
            if (!in_array($file_ext, $allowTypes)) {
                echo "<p style='color:red;'>$value: Sai định dạng. Chỉ chấp nhận file ảnh.</p>";
                continue;
            }

            if ($size > $maxSize) {
                echo "<p style='color:red;'>$value: Quá dung lượng (tối đa 2MB).</p>";
                continue;
            }

            $target_file = $target_dir . basename($value);

            if (move_uploaded_file($tmp_name, $target_file)) {
                echo "<p style='color:green;'>$value: Tải lên thành công.</p>";
            } else {
                echo "<p style='color:red;'>$value: Lỗi khi tải lên.</p>";
            }
        } else {
            echo "<p style='color:red;'>$value: Lỗi file.</p>";
        }
    }

    echo "<h3>Ảnh đã upload:</h3>";
    $images = glob($target_dir . "*.{jpg,jpeg,png}", GLOB_BRACE);
    foreach ($images as $img) {
        echo "<img src='$img' style='width:150px; margin:10px;'> ";
    }
}