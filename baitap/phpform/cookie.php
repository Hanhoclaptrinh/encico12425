<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cookie</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="name">Name: <input type="text" name="name" required placeholder="Your name"></label>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php

echo 'Cookie trong php<br>';

setcookie('food', 'Pizza', time() + 3600); # cookie song trong 1 gio (3600 giay)
setcookie('drink', 'Pepsi', time() + 3600);

# lay cookie
if (isset($_COOKIE['drink'])) {
    echo 'Drink: '. $_COOKIE['drink'] .'<br>';
} else {
    echo 'Cookie khong ton tai';
}

# xoa cookie
setcookie('food', '', time() - 3600);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    setcookie('name', $name, time() + 60);
}

if (isset($_COOKIE['name'])) {
    echo 'Xin chao, '. $_COOKIE['name'] .'<br>';
}