<?php
session_start();
require_once "server.php";

if (isset($_POST['action'])) {
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    $repeat_password = trim($_POST['repeat_password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($fullname) || empty($email) || empty($password) || empty($repeat_password)) {
        $_SESSION['message'] = "<div class='alert alert-danger'>All fields are required</div>";
        header("Location: dangki.php");
        exit();
    }

    if (strlen($fullname) < 6) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Fullname must be at least 6 characters</div>";
        header("Location: dangki.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Password must be at least 6 characters</div>";
        header("Location: dangki.php");
        exit();
    }

    if ($password !== $repeat_password) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Password does not match</div>";
        header("Location: dangki.php");
        exit();
    }

    $check = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['message'] = "<div class='alert alert-danger'>User already exists</div>";
        header("Location: dangki.php");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $hashedPassword);
    if ($stmt->execute()) {
        header("Location: dangnhap.php");
        $stmt->close();
        $conn->close();
        exit();
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Registration failed</div>";
        header("Location: dangki.php");
        exit();
    }
}