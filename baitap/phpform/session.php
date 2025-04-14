<?php

echo 'Session trong php<br>';

session_start(); # khoi tao session

$_SESSION['fruit'] = 'Banana';
$_SESSION['color'] = 'Yellow';
echo 'Fruit: '. $_SESSION['fruit'] .'<br>';
echo 'Color: '. $_SESSION['color'] .'<br>';

# xoa session (xoa mot phan)
unset($_SESSION['fruit']);
unset($_SESSION['color']);

# xoa toan bo session
session_destroy();