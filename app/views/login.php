<?php
// app/views/login.php

// 1. جلب رسائل الخطأ والإيميل القديم من الـ Session إن وجدا
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
$oldEmail = isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '';

// 2. حذفهم فوراً من الـ Session حتى لا يظهروا مجدداً عند عمل Refresh للصفحة
unset($_SESSION['login_error']);
unset($_SESSION['old_email']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Expense Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="card login-card shadow p-4">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-primary">Sign In</h3>
        <p class="text-muted">Expense Management System</p>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger py-2 text-center" role="alert" style="font-size: 0.9rem;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="index.php?page=login" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" 
                   placeholder="admin@arabapps.com" 
                   value="<?php echo htmlspecialchars($oldEmail); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" 
                   placeholder="••••••" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Login</button>
    </form>
</div>

</body>
</html>