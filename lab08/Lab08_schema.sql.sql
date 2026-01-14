-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_thu_vien`
--
CREATE DATABASE IF NOT EXISTS `ql_thu_vien` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ql_thu_vien`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `published_year` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0
) ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `category_id`, `publisher_id`, `price`, `published_year`, `stock`) VALUES
(1, 'PHP Cơ Bản', 1, 1, 90000.00, 2022, 10),
(2, 'MySQL Nâng Cao', 1, 2, 120000.00, 2023, 8),
(3, 'Java OOP', 1, 3, 150000.00, 2021, 5),
(4, 'Kinh tế vi mô', 2, 2, 110000.00, 2020, 6),
(5, 'Marketing căn bản', 2, 1, 100000.00, 2019, 4),
(6, 'Giải tích 1', 3, 2, 95000.00, 2021, 7),
(7, 'Đại số tuyến tính', 3, 2, 105000.00, 2022, 5),
(8, 'Văn học Việt Nam', 4, 1, 80000.00, 2018, 9),
(9, 'Truyện ngắn Nam Cao', 4, 3, 85000.00, 2017, 6),
(10, 'Vật lý đại cương', 5, 2, 130000.00, 2020, 3),
(11, 'Hóa học cơ bản', 5, 2, 125000.00, 2021, 4),
(12, 'Sinh học 101', 5, 3, 115000.00, 2022, 5),
(13, 'Python Data', 1, 1, 140000.00, 2023, 6),
(14, 'Kinh tế vĩ mô', 2, 2, 120000.00, 2021, 5),
(15, 'Xác suất thống kê', 3, 2, 110000.00, 2020, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'CNTT'),
(5, 'Khoa học'),
(2, 'Kinh tế'),
(3, 'Toán'),
(4, 'Văn học');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'BORROWED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `member_id`, `loan_date`, `due_date`, `status`) VALUES
(1, 1, '2025-12-01', '2025-12-10', 'RETURNED'),
(2, 2, '2025-12-05', '2025-12-15', 'BORROWED'),
(3, 3, '2025-12-07', '2025-12-17', 'BORROWED'),
(4, 4, '2025-12-10', '2025-12-20', 'RETURNED'),
(5, 5, '2025-12-12', '2025-12-22', 'BORROWED'),
(6, 1, '2025-12-15', '2025-12-25', 'BORROWED'),
(7, 2, '2025-12-18', '2025-12-28', 'BORROWED'),
(8, 3, '2025-12-20', '2025-12-30', 'RETURNED'),
(9, 6, '2025-12-22', '2026-01-02', 'BORROWED'),
(10, 7, '2025-12-25', '2026-01-05', 'BORROWED'),
(11, 8, '2025-12-26', '2026-01-06', 'BORROWED'),
(12, 1, '2025-12-28', '2026-01-07', 'BORROWED');

-- --------------------------------------------------------

--
-- Table structure for table `loan_items`
--

CREATE TABLE `loan_items` (
  `loan_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ;

--
-- Dumping data for table `loan_items`
--

INSERT INTO `loan_items` (`loan_id`, `book_id`, `qty`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 1),
(2, 4, 1),
(3, 5, 2),
(3, 6, 1),
(4, 7, 1),
(4, 8, 1),
(5, 9, 2),
(5, 10, 1),
(6, 11, 1),
(6, 12, 1),
(7, 13, 2),
(7, 14, 1),
(8, 15, 1),
(9, 1, 1),
(9, 2, 1),
(10, 3, 1),
(10, 4, 1),
(11, 5, 1),
(11, 6, 1),
(12, 7, 1),
(12, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `full_name`, `phone`, `created_at`) VALUES
(1, 'Nguyễn Văn A', '0901111111', '2026-01-15'),
(2, 'Trần Thị B', '0902222222', '2026-01-15'),
(3, 'Lê Văn C', '0903333333', '2026-01-15'),
(4, 'Phạm Thị D', '0904444444', '2026-01-15'),
(5, 'Hoàng Văn E', '0905555555', '2026-01-15'),
(6, 'Vũ Thị F', '0906666666', '2026-01-15'),
(7, 'Đỗ Văn G', '0907777777', '2026-01-15'),
(8, 'Bùi Thị H', '0908888888', '2026-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name`) VALUES
(2, 'NXB Giáo Dục'),
(3, 'NXB Lao Động'),
(1, 'NXB Trẻ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_books_category` (`category_id`),
  ADD KEY `fk_books_publisher` (`publisher_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `fk_loans_member` (`member_id`);

--
-- Indexes for table `loan_items`
--
ALTER TABLE `loan_items`
  ADD PRIMARY KEY (`loan_id`,`book_id`),
  ADD KEY `fk_li_book` (`book_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_books_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `fk_loans_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `loan_items`
--
ALTER TABLE `loan_items`
  ADD CONSTRAINT `fk_li_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `fk_li_loan` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`loan_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
