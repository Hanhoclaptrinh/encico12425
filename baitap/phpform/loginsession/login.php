<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1><br>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php

session_start();

$u = 'admin';
$p = '123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] == $u && $_POST['password'] == $p) {
        $_SESSION['name'] = $_POST['username'];
        header('Location: success.php');
        exit();
    } else {
        echo '❌ Sai thông tin đăng nhập<br>';
    }
}