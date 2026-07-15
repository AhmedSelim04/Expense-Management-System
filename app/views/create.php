<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Expense - Expense Tracker</title>
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
                <div class="card-header bg-primary text-white p-3">
                    <h4 class="mb-0 fw-bold"><i class="fa-solid fa-plus me-2"></i>Add New Expense</h4>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?page=create-action" method="POST">
                        
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold text-secondary">Title</label>
                            <input type="text" id="title" name="title" class="form-control" 
                                   placeholder="e.g., Office Supplies" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold text-secondary">Category</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="Food">Food</option>
                                <option value="Rent">Rent</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label fw-semibold text-secondary">Amount ($)</label>
                            <input type="number" id="amount" step="0.01" min="0.01" name="amount" class="form-control" 
                                   placeholder="0.00" required>
                        </div>

                        <div class="mb-4">
                            <label for="expense_date" class="form-label fw-semibold text-secondary">Date</label>
                            <input type="date" id="expense_date" name="expense_date" class="form-control" 
                                   value="<?= date('Y-m-d'); ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?page=index" class="btn btn-secondary px-4">
                                <i class="fa-solid fa-arrow-left me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Save Expense
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