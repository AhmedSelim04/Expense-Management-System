<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id           = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $category     = isset($_POST['category']) ? trim($_POST['category']) : '';
    $amount       = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.0;
    $expense_date = isset($_POST['expense_date']) ? $_POST['expense_date'] : '';
    $user_id      = $_SESSION['user_id'];

    if ($id > 0 && !empty($title) && !empty($category) && $amount > 0 && !empty($expense_date)) {
        
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