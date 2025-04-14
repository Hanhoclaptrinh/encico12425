<?php

session_start();

if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit();
}

echo 'Welcome '. $_SESSION['name'] .'<br>';
echo '<a href="logout.php" style="text-decoration: none">Logout</a>';