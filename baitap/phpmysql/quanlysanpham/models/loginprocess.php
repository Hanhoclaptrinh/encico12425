<?php
session_start();
require_once "../config/server.php";

if (isset($_POST['action'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['isAdmin'] = $user['isadmin'];
            $_SESSION['fullname'] = $user['fullname'];
            
            if ($user['isadmin'] == 1) {
                header("Location: ../views/adminpage.php");
                exit();
            } else {
                header("Location: ../index.php");
                exit();
            }

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Password is incorrect</div>";
            header("Location: ../views/login.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Email not found</div>";
        header("Location: ../views/login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}