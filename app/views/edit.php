<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

$database = new Database();
$db = $database->getConnection();
$expenseModel = new Expense($db);

$user_id = $_SESSION['user_id'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$expense = $expenseModel->getById($id, $user_id);

if (!$expense) {
    header("Location: index.php?page=index");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense - Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark p-3">
                    <h4 class="mb-0 fw-bold"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Expense</h4>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?page=edit-action" method="POST">
                        
                        <input type="hidden" name="id" value="<?= $expense['id']; ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-secondary">Title</label>
                            <input type="text" id="title" name="title" class="form-control" 
                                   value="<?= htmlspecialchars($expense['title']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold text-secondary">Category</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="Food" <?= $expense['category'] === 'Food' ? 'selected' : ''; ?>>Food</option>
                                <option value="Rent" <?= $expense['category'] === 'Rent' ? 'selected' : ''; ?>>Rent</option>
                                <option value="Utilities" <?= $expense['category'] === 'Utilities' ? 'selected' : ''; ?>>Utilities</option>
                                <option value="Transportation" <?= $expense['category'] === 'Transportation' ? 'selected' : ''; ?>>Transportation</option>
                                <option value="Entertainment" <?= $expense['category'] === 'Entertainment' ? 'selected' : ''; ?>>Entertainment</option>
                                <option value="Other" <?= $expense['category'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label fw-semibold text-secondary">Amount ($)</label>
                            <input type="number" id="amount" step="0.01" min="0.01" name="amount" class="form-control" 
                                   value="<?= htmlspecialchars($expense['amount']); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="expense_date" class="form-label fw-semibold text-secondary">Date</label>
                            <input type="date" id="expense_date" name="expense_date" class="form-control" 
                                   max="<?= date('Y-m-d'); ?>" 
                                   value="<?= isset($expense['expense_date']) ? htmlspecialchars($expense['expense_date']) : date('Y-m-d'); ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php?page=index" class="btn btn-secondary px-4">
                                <i class="fa-solid fa-arrow-left me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-warning px-4 fw-semibold text-dark">
                                <i class="fa-solid fa-arrows-rotate me-1"></i> Update Expense
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
