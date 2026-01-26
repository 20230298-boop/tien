CREATE DATABASE lab13;
USE lab13;
CREATE TABLE products(id INT AUTO_INCREMENT PRIMARY KEY,code VARCHAR(50),name VARCHAR(100),price DECIMAL(10,2));
CREATE TABLE customers(id INT AUTO_INCREMENT PRIMARY KEY,full_name VARCHAR(100),phone VARCHAR(20),email VARCHAR(100),address VARCHAR(255));
CREATE TABLE orders(id INT AUTO_INCREMENT PRIMARY KEY,order_code VARCHAR(50),customer_name VARCHAR(100),total_amount DECIMAL(10,2),status VARCHAR(30));
INSERT INTO products(code,name,price) VALUES('P001','Keyboard',100000),('P002','Mouse',50000);
INSERT INTO customers(full_name,phone,email,address) VALUES('Nguyen A','0901','a@gmail.com','HN');
INSERT INTO orders(order_code,customer_name,total_amount,status) VALUES('ORD1','Nguyen A',150000,'NEW');
