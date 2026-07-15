<?php

session_start();//for login

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

if (!isset($_SESSION['user_id'])) {
    if ($page !== 'login') {
        header("Location: index.php?page=login");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once '../app/controllers/login-action.php';
    } else {
        require_once '../app/views/login.php';
    }
    exit();
}

if (isset($_SESSION['user_id']) && $page === 'login') {
    header("Location: index.php?page=index");
    exit();
}

switch ($page) {
    case 'index':
        break;
    case 'create':
        break;
    case 'edit':
        break;
    default:
        http_response_code(404);
        echo "Page not found!";
        break;
}