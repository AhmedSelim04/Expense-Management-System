<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $title        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $category     = isset($_POST['category']) ? trim($_POST['category']) : 'Other';
    $amount       = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.0;
    $expense_date = !empty($_POST['expense_date']) ? $_POST['expense_date'] : date('Y-m-d');
    echo  $title , $amount ;
    $user_id      = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

    if (!empty($title) && $amount > 0 && $user_id > 0) {
        
        $database = new Database();
        $db = $database->getConnection();
        $expenseModel = new Expense($db);

        if ($expenseModel->create($user_id, $title, $amount, $category, $expense_date)) {
            header("Location: index.php?page=index");
            exit();
        }
    }
}

header("Location: index.php?page=create");
exit();