-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:55 PM
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
-- Database: `bene`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminreg`
--

CREATE TABLE `adminreg` (
  `id` int(11) NOT NULL,
  `adminid` varchar(20) NOT NULL,
  `adminame` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminreg`
--

INSERT INTO `adminreg` (`id`, `adminid`, `adminame`, `email`, `password`, `created_at`) VALUES
(1, '123456', 'gen', 'gen@gmail.com', '$2y$10$BSNUCXfnGNh4cU7LRYnaUe1vviY6CmMY11kEK77W7tAUFBdyziU42', '2024-07-18 09:23:29'),
(2, '234567', 'gen', 'gen@gmail.com', '$2y$10$p1jAiP.ttG6x01M17v7YkeqAWYdGBWSFN2q6FMzQWkgumraiimrHO', '2024-07-18 09:24:51'),
(3, '300000', 'benr', 'benr@gmail.com', '$2y$10$RQh5StH56RJW7woILyn7quKh15osm533u1cZtKhxTSH1lVpFN.txO', '2024-07-18 09:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `ben`
--

CREATE TABLE `ben` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `home` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ben`
--

INSERT INTO `ben` (`id`, `name`, `phone`, `email`, `home`, `status`) VALUES
(1, '[nyams]', 748572687, '[bennyamai@gmail.com]', '[kasyala]', 1),
(2, '[esir]', 745896811, '[esr@gmail.com]', '[kitui]', 1),
(3, '[john]', 702854785, '[ykj@gmail.com]', '[kitui]', 1),
(4, '[bete]', 725896578, '[klm@gmail.com]', '[town]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(10) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `dob` date NOT NULL,
  `bcn` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` int(13) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pschool` varchar(70) NOT NULL,
  `grade` varchar(70) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `fullname`, `dob`, `bcn`, `email`, `phone`, `address`, `pschool`, `grade`, `status`) VALUES
(6, 'Kama', '2024-07-17', '258754', 'ftr@gmail.com', 74512754, 'jakil', 'Gaga', 'grade-7', '0'),
(7, 'Ben Nyamai', '2024-07-10', '1025874', 'fgr@yahoo.com', 2475842, 'adrfer', 'htg', 'grade-8', '0'),
(9, 'joh', '2024-07-09', '1042451', 'hen@gmail.com', 7458245, 'kali', 'kaliis', 'grade-2', '0'),
(10, 'han', '2024-07-08', '1023548', 'hi@gmail.com', 72548451, 'haaa', 'liamana', 'grade-7', '0');

-- --------------------------------------------------------

--
-- Table structure for table `studentsignup`
--

CREATE TABLE `studentsignup` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentsignup`
--

INSERT INTO `studentsignup` (`id`, `studentid`, `username`, `email`, `password`, `created_at`) VALUES
(1, '1254785', 'jamu', 'df@gmail.com', '$2y$10$fG4A38i3R1M/nbbysRP/seMsOUxIANbnc.rJkZmNYuiArrlLYeXZS', '2024-07-17 15:23:51'),
(2, '32548751', 'Ben', 'ben@gmail.com', '$2y$10$9T5lrGmfbHudhqNa5eYx7.f0u5UZR.UJS6WrqF7niCYVpPi4rYdFe', '2024-07-17 15:25:12'),
(3, '32547', 'kli', 'lkjh@gmail.com', '$2y$10$LQZeof2A9Ga/jbpP/TMZPuJ3nGzI/nAlgRi34dUhHf3qt0L/cYiMq', '2024-07-17 15:30:45'),
(4, '21427', 'Benjam Mateni', 'benm@gmail.com', '218874', '2024-07-17 16:12:14'),
(5, '224228', 'Esir Ben', 'benamm@gmail.com', '$2y$10$jZUIpemN7H4IAPKpD2PStO/OJmR8IZ8p5FsXXYt/U7DXVs5ltd6/W', '2024-07-17 16:13:56'),
(6, '210527', 'Nune', 'benamm@gmail.com', '$2y$10$yImZwtGwoHAZ7hy134brvuU0vMu52d7Th5yuB0qY6pyEmbgvw4K6W', '2024-07-18 08:38:55'),
(7, '218527', 'Maner', 'maner@gmail.com', '$2y$10$w0ckRzE76vO26Bc20KWTcerZVvgDMGqfJOTY4iqwQ3CCFO8.wleD2', '2024-07-18 08:44:03'),
(8, '217527', 'nert', 'nert@gmail.com', '$2y$10$z8cb.ZZu3v6agboVOM8/seaT7PsjVHw./J6q6GEhlbnOqrGviU8xW', '2024-07-18 08:45:22'),
(9, '22222', 'bent', 'slasherlimited@gmail.com', '$2y$10$0PuTofBZQFKhnHvE4O2BbeQbs3SAsEWokoHQaarRGw0x8Q4DILJh6', '2024-07-18 15:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreg`
--
ALTER TABLE `adminreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminid` (`adminid`);

--
-- Indexes for table `ben`
--
ALTER TABLE `ben`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bcn` (`bcn`);

--
-- Indexes for table `studentsignup`
--
ALTER TABLE `studentsignup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminreg`
--
ALTER TABLE `adminreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ben`
--
ALTER TABLE `ben`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studentsignup`
--
ALTER TABLE `studentsignup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
