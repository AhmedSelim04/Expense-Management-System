<?php
// app/views/login.php

// جلب رسائل الخطأ أو الإيميل القديم إن وُجدا ثم مسحهما فوراً من السيشين
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
$old_email = isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '';

unset($_SESSION['error']);
unset($_SESSION['old_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Expense Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .card-login {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="card card-login shadow-sm bg-white">
    <div class="text-center mb-4">
        <h1 class="h3 mb-2 fw-bold text-primary">Sign In</h1>
        <p class="text-muted">Expense Management System</p>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center py-2 fs-6" role="alert">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="index.php?page=login-action" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="<?= htmlspecialchars($old_email); ?>" required placeholder="name@example.com">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="******">
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    </form>
</div>

</body>
</html>