<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang đăng nhập</h1><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="username">Username: <input type="text" name="username" required placeholder="Your username"></label> <br>
        <label for="password">Password: <input type="password" name="password" required placeholder="Your password"></label> <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>

<?php

$u = 'pitou';
$p = '123456';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if ($_POST['username'] == $u && $_POST['password'] == $p) {
            setcookie('username', $_POST['username'], time() + 3600);
            header('Location: success.php');
            exit();
        }
    }
}

if (isset($_COOKIE['message'])) {
    echo $_COOKIE['message'];
    setcookie('message', '', time() - 3600);
}