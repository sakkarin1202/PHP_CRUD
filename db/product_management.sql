-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(7, 'CPUEdit', 'i5 gen14', 29999.00, '2024-12-09 08:10:32', '2024-12-09 08:11:28'),
(8, 'Test', 'asd', 213.00, '2024-12-09 08:12:22', '2024-12-09 08:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'sakkarin', '$2y$10$rM39Ro5GCGBUU9OPKmWqYeilvTpkD45izp9cI0GYUEWcnaiU2mlri', '2024-12-09 05:32:47'),
(4, 'sakkarin1', '$2y$10$GT.7SVXzOVzrBLODaQaioufL9U48QJE.4DbydXuBQhMHh8kdDseXO', '2024-12-09 05:37:22'),
(5, 'Test', '$2y$10$zyFLwmovf08nlWalfS8bPu71z60Eda9X.YqVxzS175uvnRLrq7nMy', '2024-12-09 08:22:36'),
(6, 'Test2', '$2y$10$rc64o5cl1U36XbltK4WQ.OBybc3/UjbXxjcMA6jcX3hXHlvmXGi8m', '2024-12-09 08:23:43'),
(7, 'test4', '$2y$10$41TSPMTtBSHhN3LkODk27uiWJJFd9ed0Ts/TD5qELWmgRVqLpsw32', '2024-12-18 07:27:24'),
(8, 'vick', '$2y$10$EEzgpLzss40xnGIEuCH.y.Hh6RR2MX0IBmvjU1QzefLIcg8BM4u/q', '2024-12-18 07:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
