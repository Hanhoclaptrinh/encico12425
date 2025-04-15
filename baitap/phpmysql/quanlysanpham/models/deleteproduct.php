<?php
session_start();
require_once "../config/server.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "<div class='alert alert-success'>Product deleted successfully</div>";
        header("Location: ../views/adminpage.php");
        exit();
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Failed to delete product</div>";
        header("Location: ../views/adminpage.php");
        exit();
    }
}