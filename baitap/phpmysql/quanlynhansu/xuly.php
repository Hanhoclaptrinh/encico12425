<?php
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'them':
        require_once 'themnhanvien.php';
        break;
    case 'sua':
        require_once 'suanhanvien.php';
        break;
    case 'xoa':
        require_once 'xoanhanvien.php';
        break;
    case 'xem':
        require_once 'xemnhanvien.php';
        break;
    default:
        break;
}