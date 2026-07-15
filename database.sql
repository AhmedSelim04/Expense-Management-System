CREATE DATABASE IF NOT EXISTS `expense_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `expense_db`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `expenses` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,      
    `amount` DECIMAL(10, 2) NOT NULL,   
    `category` VARCHAR(100) NOT NULL,   
    `expense_date` DATE NOT NULL,       
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO `users` (`id`, `email`, `password`) 
VALUES (
    1,
    'admin@arabapps.com', 
    '$2y$12$WqirRj7RBTcFNNK3IXxjseI91JOam2FGoe8NnTrzrExPCtUEFYRxO'
)
ON DUPLICATE KEY UPDATE `password` = VALUES(`password`);

INSERT INTO `expenses` (`user_id`, `title`, `amount`, `category`, `expense_date`) 
VALUES 
(1, 'Dinner with clients', 120.50, 'Food', CURDATE()),
(1, 'Office Rent', 800.00, 'Rent', CURDATE()),
(1, 'Electricity Bill', 75.00, 'Utilities', CURDATE() - INTERVAL 1 DAY)
ON DUPLICATE KEY UPDATE `user_id` = `user_id`;