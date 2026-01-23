-- =====================================
-- LAB 12 – MVC CRUD (Categories, Employees, Appointments)
-- Database: lab12
-- =====================================

CREATE DATABASE IF NOT EXISTS lab12
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE lab12;

-- =====================================
-- TABLE: categories
-- =====================================
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    status TINYINT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO categories (name, status) VALUES
('Kitchen Tools', 1),
('Appliances', 1),
('Health & Care', 1),
('Electronics', 1);

-- =====================================
-- TABLE: employees
-- =====================================
DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(120) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    position VARCHAR(80) NOT NULL,
    salary INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO employees (full_name, phone, position, salary) VALUES
('Nguyen Van A', '0909000111', 'Cashier', 7000000),
('Tran Thi B', '0909000222', 'Sales', 8000000),
('Le Van C', '0909000333', 'Manager', 12000000);

-- =====================================
-- TABLE: appointments
-- =====================================
DROP TABLE IF EXISTS appointments;
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(120) NOT NULL,
    phone VARCHAR(20),
    service VARCHAR(120) NOT NULL,
    appointment_time DATETIME NOT NULL,
    status VARCHAR(30) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO appointments (customer_name, phone, service, appointment_time, status) VALUES
('Le Thi C', '0912345678', 'Haircut', '2026-02-10 09:00:00', 'Pending'),
('Pham Van D', '0987654321', 'Massage', '2026-02-10 14:30:00', 'Confirmed');
