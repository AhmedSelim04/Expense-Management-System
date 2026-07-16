<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id           = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $category     = isset($_POST['category']) ? trim($_POST['category']) : '';
    $amount       = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.0;
    $expense_date = isset($_POST['expense_date']) ? $_POST['expense_date'] : '';
    $user_id      = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

    $today = date('Y-m-d');

    if ($id > 0 && !empty($title) && !empty($category) && $amount > 0 && $user_id > 0 && $expense_date <= $today) {
        
        $database = new Database();
        $db = $database->getConnection();
        $expenseModel = new Expense($db);

        if ($expenseModel->update($id, $user_id, $amount, $category, $title, $expense_date)) {
            header("Location: index.php?page=index");
            exit();
        }
    }
}

header("Location: index.php?page=index");
exit();
