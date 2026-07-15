<?php

require_once __DIR__ . '/../configs/database.php';
require_once __DIR__ . '/../models/expense.php';

$database = new Database();
$db = $database->getConnection();
$expenseModel = new Expense($db);

$user_id = $_SESSION['user_id'];

$keyword   = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$category  = isset($_GET['category']) ? trim($_GET['category']) : '';
$from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
$to_date   = isset($_GET['to_date']) ? $_GET['to_date'] : '';

$expenses = $expenseModel->search($user_id, $keyword, $category, $from_date, $to_date);

$total_spent = array_sum(array_column($expenses, 'amount'));?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?page=index">
            <i class="fa-solid fa-wallet me-2"></i>Expense Tracker
        </a>
        <div class="d-flex align-items-center">
            <span class="text-light me-3">
                <i class="fa-solid fa-user me-1"></i> <?= htmlspecialchars($_SESSION['user_email']); ?>
            </span>
            <a href="index.php?page=logout-action" class="btn btn-danger btn-sm px-3">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold text-secondary">Dashboard</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="index.php?page=create" class="btn btn-primary px-4 py-2 fw-semibold">
                <i class="fa-solid fa-plus me-1"></i> Add New Expense
            </a>
        </div>
    </div>

    <div class="card bg-primary text-white mb-4 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex align-items-center">
                <div class="bg-white text-primary rounded-circle p-3 me-3">
                    <i class="fa-solid fa-dollar-sign fa-2x"></i>
                </div>
                <div>
                    <h5 class="card-title mb-1 text-white-50">Total Spent</h5>
                    <h1 class="card-text fw-bold">$<?= number_format($total_spent, 2); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <form method="GET" action="index.php" class="row g-3 mb-4 bg-white p-3 rounded shadow-sm border">
        <input type="hidden" name="page" value="index">
        
        <div class="col-md-3">
            <label class="form-label fw-semibold text-muted small">Search Title</label>
            <input type="text" name="keyword" class="form-control" placeholder="Search by title..." value="<?= htmlspecialchars($keyword) ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold text-muted small">Category</label>
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="Food" <?= $category === 'Food' ? 'selected' : '' ?>>Food</option>
                <option value="Rent" <?= $category === 'Rent' ? 'selected' : '' ?>>Rent</option>
                <option value="Utilities" <?= $category === 'Utilities' ? 'selected' : '' ?>>Utilities</option>
                <option value="Transportation" <?= $category === 'Transportation' ? 'selected' : '' ?>>Transportation</option>
                <option value="Entertainment" <?= $category === 'Entertainment' ? 'selected' : '' ?>>Entertainment</option>
                <option value="Other" <?= $category === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold text-muted small">From Date</label>
            <input type="date" name="from_date" class="form-control" value="<?= htmlspecialchars($from_date) ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label fw-semibold text-muted small">To Date</label>
            <input type="date" name="to_date" class="form-control" value="<?= htmlspecialchars($to_date) ?>">
        </div>
        <div class="col-md-3 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fa-solid fa-filter me-1"></i> Filter
            </button>
            <a href="index.php?page=index" class="btn btn-secondary">
                Reset
            </a>
        </div>
    </form>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-white py-3">
            <h5 class="card-title mb-0 fw-bold text-secondary">My Expenses</h5>
        </div>
        <div class="card-body">
            <?php if (empty($expenses)): ?>
                <div class="text-center py-5">
                    <i class="fa-solid fa-receipt fa-3x text-muted mb-3"></i>
                    <p class="text-muted fs-5 mb-0">No expenses found matching your criteria.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th class="text-center" style="width: 180px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($expenses as $expense): ?>
                                <tr>
                                    <td class="fw-semibold text-dark">
                                        <?= htmlspecialchars($expense['title']); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary px-3 py-2">
                                            <?= htmlspecialchars($expense['category']); ?>
                                        </span>
                                    </td>
                                    <td class="fw-bold text-danger fs-5">
                                        $<?= number_format($expense['amount'], 2); ?>
                                    </td>
                                    <td>
                                        <i class="fa-regular fa-calendar me-1 text-muted"></i>
                                        <?= htmlspecialchars($expense['expense_date']); ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?page=edit&id=<?= $expense['id']; ?>" class="btn btn-sm btn-outline-warning me-1">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>
                                        <a href="index.php?page=delete-action&id=<?= $expense['id']; ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Are you sure you want to delete this expense?');">
                                            <i class="fa-regular fa-trash-can"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>