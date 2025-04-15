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
            header("Location: ../views/editproductform.php");
            exit();
        }
        if (!move_uploaded_file($_FILES['hinhanh']['tmp_name'], $uploadPath)) {
            $_SESSION['message'] = "<div class='alert alert-danger'>Failed to upload image</div>";
            header("Location: ../views/editproductform.php");
            exit();
        }
    } else {
        $imagePath = $_POST['old_image'];
    }

    $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ?, category = ? WHERE id = ?");
    $stmt->bind_param("ssdssi", $name, $description, $price, $imagePath, $category, $_POST['id']);
    if ($stmt->execute()) {
        $_SESSION['message'] = "<div class='alert alert-success'>Product updated successfully</div>";
        header("Location: ../views/adminpage.php");
        exit();
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Failed to update product</div>";
        header("Location: ../views/editproductform.php");
        exit();
    }
}