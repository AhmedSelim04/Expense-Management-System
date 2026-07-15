<?php
// app/controllers/login-action.php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/user.php'; // تأكد أن اسم ملف الموديل هكذا (user.php)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($email) && !empty($password)) {
        
        $database = new Database();
        $db = $database->getConnection();
        
        $userModel = new Users($db); // تأكد من اسم الكلاس (Users أو User)
        
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            
            header("Location: index.php?page=index");
            exit();
        }
    }
    
    $_SESSION['error'] = "Invalid email or password.";
    $_SESSION['old_email'] = $email;
}

header("Location: index.php?page=login");
exit();