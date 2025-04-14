<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang chủ</h1><br>
    <form action="homepage.php" method="post">
        <button type="submit" name="logout">Đăng xuất</button>
    </form>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    header('Location: logout.php');
    exit();
}

echo 'Xin chào ' . $_SESSION['username'] . '!';