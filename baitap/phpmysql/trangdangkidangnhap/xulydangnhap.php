<?php
session_start();
require_once "server.php";

if (isset($_POST['action'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $check = $result->fetch_assoc();
        if (password_verify($password, $check['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['full_name'] = $check['full_name'];
            header("Location: trangchu.php");
            exit();
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Password is incorrect</div>";
            header("Location: dangnhap.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Email not found</div>";
        header("Location: dangnhap.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}