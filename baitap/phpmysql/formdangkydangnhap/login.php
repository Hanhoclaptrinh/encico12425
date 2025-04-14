<?php
session_start();
require_once 'server.php';

if (isset($_POST['register'])) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT email FROM userinfor WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    } else {
        $stmt = $conn->prepare("INSERT INTO userinfor (name, email, password, role) VALUES (?,?,?,?)");
        $stmt->bind_param("sssi", $name, $email, $password, $role);
        $stmt->execute();
    }
    $stmt->close();
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, email, password, role FROM userinfor WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            if ($user['role'] == 0) {
                header("Location: admin_page.php");
                exit();
            } else {
                header("Location: user_page.php");
                exit();
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Invalid password';
            $_SESSION['active_form'] = 'login';
        }
    } else {
        $_SESSION['login_error'] = 'Email not found';
        $_SESSION['active_form'] = 'login';
    }
    header("Location: index.php");
    exit();
}
?>