<?php

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$public_pages = ['login', 'login-action'];

if (!isset($_SESSION['user_id'])) {

    if (!in_array($page, $public_pages)) {
        header("Location: index.php?page=login");
        exit();
    }
} else {
    if ($page === 'login' || $page === 'login-action') {
        header("Location: index.php?page=index");
        exit();
    }
}
switch ($page) {
    case 'index':
        require_once __DIR__ . '/../app/views/index.php';
        break;
    case 'login':
        require_once __DIR__ . '/../app/views/login.php';
        break;

    case 'create':
        require_once __DIR__ . '/../app/views/create.php';
        break;
    case 'edit':
        require_once __DIR__ . '/../app/views/edit.php';
        break;
    case 'create-action':
        require_once __DIR__ . '/../app/controllers/create-action.php';
        break;
    case 'edit-action':
        require_once __DIR__ . '/../app/controllers/edit-action.php';
        break;
    case 'delete-action':
        require_once __DIR__ . '/../app/controllers/delete-action.php';
        break;
    case 'login-action':
        require_once __DIR__ . '/../app/controllers/login-action.php';
        break;

    case 'logout-action':
        require_once __DIR__ . '/../app/controllers/logout-action.php';
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Page not found!</h1>";
        break;
}