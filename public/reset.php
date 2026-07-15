<?php

require_once __DIR__ . '/../app/configs/database.php';

$database = new Database();
$db = $database->getConnection();

$new_password = password_hash('123456', PASSWORD_DEFAULT);

$query = "UPDATE users SET password = :password WHERE id = 1";
$stmt = $db->prepare($query);

if ($stmt->execute([':password' => $new_password])) {
    echo "Successfully updated! New hash generated: " . $new_password;
} else {
    echo "Failed to update.";
}