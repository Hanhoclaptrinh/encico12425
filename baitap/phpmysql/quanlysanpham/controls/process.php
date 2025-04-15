<?php
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'register':
        require_once "../models/registerprocess.php";
        break;
    case 'login':
        require_once "../models/loginprocess.php";
        break;
    case 'logout':
        require_once "../models/logoutprocess.php";
        break;
    case 'addprd';
        require_once "../views/addproductform.php";
        break;
    case 'editprd';
        require_once "../views/editproductform.php";
        break;
    case 'create';
        require_once "../models/createproduct.php";
        break;
    case 'update';
        require_once "../models/updateproduct.php";
        break;
    case 'deleteprd';
        require_once "../models/deleteproduct.php";
        break;
    case 'addtocart';
        require_once "../models/addtocart.php";
        break;
    case 'viewcart';
        require_once "../views/cart.php";
        break;
    case 'removefromcart';
        require_once "../models/removefromcart.php";
        break;
    default:
        echo "Invalid action";
        break;
}