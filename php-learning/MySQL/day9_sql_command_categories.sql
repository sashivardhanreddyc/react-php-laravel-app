-- DDL Concepts(CREATE, ALTER, DROP, TRUNCATE, RENAME) with an examples

-- To create a Database
CREATE DATABASE mysql_practice;

-- To Use a Database
USE mysql_practice;

-- To create a table
CREATE TABLE USERS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    status ENUM('Active', "Inactive") DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

-- To Modify existing table structure

-- Add a new column
ALTER TABLE users ADD COLUMN phone VARCHAR(15);

-- Modify a column
ALTER TABLE users MODIFY COLUMN name varchar(150) NOT NULL;

--RENAME a column
ALTER TABLE users RENAME COLUMN name TO full_name;

--Remove a column
ALTER TABLE users DROP COLUMN phone;


-- DROP -- Permanently deletes a database object
DROP TABLE users;

--Delete a Database:
DROP DATABASE mysql_practice;

-- TRUNCATE -- Remove all records but persists the table structure
TRUNCATE TABLE users;

--RENAME -- Changes the table name
RENAME TABLE users to customers;




-- DML Concepts (INSERT, UPDATE, DELETE)

-- INSERT one user record or add new records
INSERT INTO users(name, email, password, status)
    VALUES('sashi', 'sashi@gmail.com', 'sashi123', 'Active');

-- INSERT multiple users
INSERT INTO users (name, email, password, status)
VALUES
('John', 'john@example.com', 'hash1', 'active'),
('David', 'david@example.com', 'hash2', 'inactive'),
('Priya', 'priya@example.com', 'hash3', 'active');


-- UPDATE
UPDATE users SET status = "Inactive" WHERE id = 2;

-- UPDATE multiple columns
UPDATE users
SET
    name = 'John Smith',
    status = 'active'
WHERE id = 2;


-- DELETE a single users
DELETE FROM users WHERE id = 3;

-- Delete all users:
DELETE FROM users;


-- DQL - SELECT, WHERE, AND, OR, IN , BETWEEN


SELECT * FROM users;

SELECT id, name, email FROM users;

-- WHERE
SELECT * FROM users
WHERE status = 'active';

-- AND means all conditions must be true.
SELECT * FROM users
WHERE status = 'active'
AND id > 1;

-- OR means at least one condition must be true.
SELECT * FROM users
WHERE status = 'active'
OR status = 'pending';


-- Checks whether a value matches any value in a given list.
SELECT * FROM users
WHERE status IN ('active', 'pending');


-- Fetches records within a specified range.
SELECT * FROM users
WHERE id BETWEEN 1 AND 5;

-- Used for pattern matching.
-- Names starting with S
SELECT * FROM users
WHERE name LIKE 'S%';

-- Names ending with n
SELECT * FROM users
WHERE name LIKE '%n';

-- Names containing ash
SELECT * FROM users
WHERE name LIKE '%ash%';


-- ORDER BY ASC and DESC
SELECT * FROM users
ORDER BY name ASC;

SELECT * FROM users
ORDER BY id DESC;


--LIMIT
SELECT * FROM users LIMIT 5;


-- This fetches 10 records starting after the first 20 records.
SELECT * FROM users
LIMIT 10 OFFSET 20;

-- DISTINCT Returns unique values.
SELECT DISTINCT status FROM users;

-- Total users
SELECT COUNT(*) FROM users;

-- Find the latest user ID
SELECT MAX(id) FROM users;

-- Find the first user ID
SELECT MIN(id) FROM users;

-- GROUP BY -- Groups records based on a particular column.
SELECT
    status,
    COUNT(*) AS total_users
FROM users
GROUP BY status;

-- HAVING -- Filters grouped results
SELECT
    status,
    COUNT(*) AS total_users
FROM users
GROUP BY status
HAVING COUNT(*) > 5;


-- DCL – Data Control Language (GRANT, REVOKE)

-- GRANT
GRANT SELECT
ON laravel_learning.users
TO 'report_user'@'localhost';

GRANT SELECT, INSERT, UPDATE
ON laravel_learning.users
TO 'developer'@'localhost';

GRANT ALL PRIVILEGES
ON laravel_learning.*
TO 'admin_user'@'localhost';


-- REVOKE
REVOKE INSERT, UPDATE
ON laravel_learning.users
FROM 'developer'@'localhost';


-- TCL – Transaction Control 

-- Create a sample accounts table
CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_holder VARCHAR(100),
    balance DECIMAL(10, 2)
);

-- Insert sample records
INSERT INTO accounts (account_holder, balance)
VALUES
('John', 5000),
('David', 3000);

-- To starts a transaction
START TRANSACTION;

-- COMMIT -- Permanently saves the transaction changes
START TRANSACTION;

UPDATE accounts
SET balance = balance - 1000
WHERE id = 1;

UPDATE accounts
SET balance = balance + 1000
WHERE id = 2;

COMMIT;


-- ROLLBACK -- Cancels uncommitted changes.
START TRANSACTION;

UPDATE accounts
SET balance = balance - 1000
WHERE id = 1;

-- Suppose the second operation fails.

ROLLBACK;


-- SAVEPOINT -- Creates a checkpoint inside a transaction.
START TRANSACTION;

UPDATE accounts
SET balance = balance - 500
WHERE id = 1;

SAVEPOINT first_operation;

UPDATE accounts
SET balance = balance + 500
WHERE id = 2;

ROLLBACK TO SAVEPOINT first_operation;

COMMIT;