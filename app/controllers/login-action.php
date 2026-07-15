<?php
// app/controllers/login-action.php

// الاستدعاء يتم بالنسبة لملف public/index.php لأن الـ Controller بيتم عمل require له هناك
require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/user.php';
// استقبال وتطهير البيانات من الفراغات
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// 1. Validation: التحقق من الحقول الفارغة
if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Please fill in all fields.";
    header("Location: index.php?page=login");
    exit();
}

// 2. تهيئة قاعدة البيانات واستدعاء الموديل
$database = new Database();
$db = $database->getConnection();
$userModel = new Users($db);

$user = $userModel->get_by_email($email);
if ($user) {
    if (password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        header("Location: index.php?page=index");
        exit();
        
    } else {
        $_SESSION['login_error'] = "Invalid email or password.";
        $_SESSION['old_email'] = $email;
    }
} 
else {
        $_SESSION['login_error'] = "Invalid email or password.";
        $_SESSION['old_email'] = $email; 
}

header("Location: index.php?page=login");
exit();