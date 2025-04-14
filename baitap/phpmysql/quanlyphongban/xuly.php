<?php
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'them':
        require_once 'themphongban.php';
        break;
    case 'sua':
        require_once 'suaphongban.php';
        break;
    case 'xoa':
        require_once 'xoaphongban.php';
        break;
    case 'xem':
        require_once 'xemphongban.php';
        break;
    default:
        echo "Hành dộng không hợp lệ";
        break;
}