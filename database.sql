CREATE DATABASE support_db;
USE support_db;

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer VARCHAR(100) NOT NULL,
    issue TEXT NOT NULL,
    status ENUM('új', 'folyamatban', 'kész') DEFAULT 'új',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);