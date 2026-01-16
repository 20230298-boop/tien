CREATE DATABASE IF NOT EXISTS it3220_library CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE it3220_library;

CREATE TABLE IF NOT EXISTS books (
 id INT AUTO_INCREMENT PRIMARY KEY,
 isbn VARCHAR(20) NOT NULL UNIQUE,
 title VARCHAR(200) NOT NULL,
 author VARCHAR(120) NOT NULL,
 category VARCHAR(80),
 quantity INT NOT NULL DEFAULT 1,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS members (
 id INT AUTO_INCREMENT PRIMARY KEY,
 member_code VARCHAR(20) NOT NULL UNIQUE,
 full_name VARCHAR(120) NOT NULL,
 email VARCHAR(120) NOT NULL UNIQUE,
 phone VARCHAR(20),
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS borrows (
 id INT AUTO_INCREMENT PRIMARY KEY,
 member_id INT NOT NULL,
 book_id INT NOT NULL,
 borrow_date DATE NOT NULL,
 due_date DATE NOT NULL,
 return_date DATE,
 status ENUM('BORROWED','RETURNED') DEFAULT 'BORROWED',
 FOREIGN KEY (member_id) REFERENCES members(id),
 FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO books(isbn,title,author,category,quantity) VALUES
('ISBN001','Lập trình PHP','Nguyễn Văn A','IT',5),
('ISBN002','Cơ sở dữ liệu','Trần Văn B','IT',3);

INSERT INTO members(member_code,full_name,email,phone) VALUES
('MB001','Nguyễn Sinh Viên','sv1@gmail.com','0123456789'),
('MB002','Trần Sinh Viên','sv2@gmail.com','0987654321');
