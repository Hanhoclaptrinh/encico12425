<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1><br>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>
        <input type="checkbox" name="remember_me" id="remember_me">
        <label for="remember_me">Remember me</label><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
session_start();

$glbUsername = 'wan';
$glbPassword = '123';

if (!isset($_SESSION['username']) && isset($_COOKIE['remember_me'])) {
    $_SESSION['username'] = $_COOKIE['remember_me'];
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    if ($username == $glbUsername && $password == $glbPassword) {
        $_SESSION['username'] = $username;

        if ($remember_me) {
            setcookie('remember_me', $username, time() + (60 * 60 * 24 * 7));
        }

        header('Location: homepage.php');
        exit();
    } else {
        echo '❌ Sai thông tin đăng nhập<br>';
    }
}
