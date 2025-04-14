<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang đăng nhập thành công</h1><br>
    <form action="success.php" method="post">
        <button name="logout" type="submit">Logout</button>
    </form>
</body>
</html>

<?php

if (isset($_COOKIE['username'])) {
    echo "Xin chào " . $_COOKIE['username'];
} else {
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    setcookie('username', '', time() - 3600);
    setcookie('message', 'Đăng xuất thành công', time() + 3600);
    header('Location: login.php');
    exit();
}