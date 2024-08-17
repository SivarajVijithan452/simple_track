-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 01:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_task_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(6, 'Jane Smith', 'jane.smith@example.com', '555-5678', '123 Oak Avenue', NULL, '2024-08-17 15:26:25'),
(7, 'Emily Johnson', 'emily.johnson@example.com', '555-8765', '140 Pine Road', NULL, '2024-08-17 15:39:57'),
(8, 'Michael Brown', 'michael.brown@example.com', '555-1122', '122 Maple Lane', NULL, '2024-08-17 15:42:30'),
(9, 'Sarah Davis', 'sarah.davis@example.com', '555-3344', '202 Birch Boulevard', NULL, NULL),
(10, 'David Wilson', 'david.wilson@example.com', '555-5566', '303 Cedar Drive', NULL, NULL),
(11, 'Laura Martinez', 'laura.martinez@example.com', '555-7788', '303 Fir Circle', NULL, '2024-08-17 15:47:02'),
(12, 'James Taylor', 'james.taylor@example.com', '555-9900', '505 Spruce Court', NULL, NULL),
(13, 'Jessica Anderson', 'jessica.anderson@example.com', '555-2233', '606 Redwood Avenue', NULL, NULL),
(14, 'William Thomas', 'william.thomas@example.com', '555-4455', '717 Pinecrest Road', NULL, '2024-08-17 15:43:51'),
(15, 'sivaraj vijithan', 'vijithan678@gmail.com', '0763569121', '97,muslimcollege Road Jaffna,', '2024-08-17 15:26:35', '2024-08-17 15:26:35'),
(18, 'test', 'test@gmail.com', '0781828865', '231, Road, coombo', '2024-08-17 17:01:41', '2024-08-17 17:31:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
