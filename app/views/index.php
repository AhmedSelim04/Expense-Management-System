<?php
// app/views/index.php

// الصفحة محمية تلقائياً بواسطة الـ Router (index.php) ولن يدخلها إلا مستخدم مسجل
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'User';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .welcome-card {
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?page=index">
            <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
        </a>
        <div class="d-flex align-items-center">
            <span class="text-light me-3">
                <i class="fa-solid fa-circle-user me-1"></i> <?= htmlspecialchars($user_email); ?>
            </span>
            <a href="index.php?page=logout-action" class="btn btn-danger btn-sm px-3">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container my-5 flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card welcome-card text-white shadow-sm mb-4">
                <div class="card-body p-5">
                    <h1 class="display-5 fw-bold mb-3">Welcome Back!</h1>
                    <p class="lead text-white-50 mb-4">You have successfully logged into your secure dashboard control panel.</p>
                    <hr class="my-4 text-white-50">
                    <p class="mb-0">Logged in as: <strong class="text-warning"><?= htmlspecialchars($user_email); ?></strong></p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4 text-center text-muted">
                    <i class="fa-solid fa-cubes fa-3x mb-3 text-secondary"></i>
                    <h4>Your Custom Application Starts Here</h4>
                    <p>You can now add your own database models, forms, and features directly inside this clean layout.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>