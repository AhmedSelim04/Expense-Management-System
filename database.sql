CREATE DATABASE IF NOT EXISTS `expense_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `expense_db`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL, 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO `users` (`email`, `password`) 
VALUES (
    'admin@arabapps.com', 
    '$2y$12$WqirRj7RBTcFNNK3IXxjseI91JOam2FGoe8NnTrzrExPCtUEFYRxO'
)
