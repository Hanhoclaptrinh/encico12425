<?php
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'register':
        require_once "xulydangki.php";
        break;
    case 'login':
        require_once "xulydangnhap.php";
        break;
    case 'logout':
        require_once "dangxuat.php";
        break;
    case 'themsv';
        require_once "formthem.php";
        break;
    case 'suasv';
        require_once "formsua.php";
        break;
    case 'xoasv';
        require_once "xoasinhvien.php";
        break;
    default:
        echo "Invalid action";
        break;
}