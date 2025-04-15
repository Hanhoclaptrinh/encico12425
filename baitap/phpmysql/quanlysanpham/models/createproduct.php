<?php
session_start();
require_once "../config/server.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['tensp'];
    $description = $_POST['mota'];
    $price = $_POST['gia'];
    $imagePath = '';
    $category = $_POST['loai'];

    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imgName = time() . '-' . $_FILES['hinhanh']['name'];
        $uploadPath = $uploadDir . $imgName;
        $imagePath = 'images/' . $imgName;
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        if (!in_array($_FILES['hinhanh']['type'], $allowedTypes)) {
            $_SESSION['message'] = "<div class='alert alert-danger'>Allowed file types: JPG, PNG, JPEG, WEBP</div>";
            header("Location: ../views/addproductform.php");
            exit();
        }
        if (!move_uploaded_file($_FILES['hinhanh']['tmp_name'], $uploadPath)) {
            $_SESSION['message'] = "<div class='alert alert-danger'>Failed to upload image</div>";
            header("Location: ../views/addproductform.php");
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $name, $description, $price, $imagePath, $category);
    if ($stmt->execute()) {
        $_SESSION['message'] = "<div class='alert alert-success'>Product created successfully</div>";
        header("Location: ../views/adminpage.php");
        exit();
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Failed to create product</div>";
        header("Location: ../views/addproductform.php");
        exit();
    }
}
