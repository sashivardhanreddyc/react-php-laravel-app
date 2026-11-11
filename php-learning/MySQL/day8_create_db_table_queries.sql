-- To Create a Database
CREATE DATABASE php_mysql_learning;

-- To Use Our DB
USE php_mysql_learning;

-- To Create users Table with specified columns
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- To Create Accounts Table
CREATE TABLE accounts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_name VARCHAR(100) NOT NULL,
    balance DECIMAL(12, 2) NOT NULL,
)

INSERT INTO accounts(account_name, balance)
    VALUES ('account A', 5000),
           ('account B', 3000);
