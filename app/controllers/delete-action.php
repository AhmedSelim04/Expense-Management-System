<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user_id = $_SESSION['user_id'];

if ($id > 0) {
    $database = new Database();
    $db = $database->getConnection();
    $expenseModel = new Expense($db);

    $expenseModel->delete($id, $user_id);
}

header("Location: index.php?page=index");
exit();