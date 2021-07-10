-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 02:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `let`
--

CREATE TABLE `let` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `let`
--

INSERT INTO `let` (`id`, `uid`, `file`, `file_name`, `created_at`) VALUES
(5, 2, 'PyAudio-0.2.11-cp39-cp39-win_amd64.whl', '0405211620125967PyAudio-0.2.11-cp39-cp39-win_amd64.whl', '2021-05-04 10:59:27'),
(6, 2, 'EST_FP_Group_no_14.docx', '0405211620138383EST_FP_Group_no_14.docx', '2021-05-04 14:26:23'),
(7, 2, 'tts (1).py', '0505211620185442tts (1).py', '2021-05-05 03:30:42'),
(8, 2, 'let.sql', '0505211620185467let.sql', '2021-05-05 03:31:07'),
(9, 2, 'CM.pdf', '0505211620185496CM.pdf', '2021-05-05 03:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `deleted`) VALUES
(1, 'Abhishek Aakash Sinha', 'abhisheksinha1377@gmail.com', '$2y$10$t1VPN4gXxfwSpSl6mK8AJ.iQqcpBxn9pSGjvJaDk.G18Gls/F/oCu', 0),
(2, 'Abhishek Sinha', 'abhisheksinha12377@gmail.com', '$2y$10$kyYqUCRsNyyuQwpfsLEtIuZT/2OJ8ilGFZBQuHjlYUCzjiGBOWxFy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `let`
--
ALTER TABLE `let`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `let`
--
ALTER TABLE `let`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `let`
--
ALTER TABLE `let`
  ADD CONSTRAINT `let_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
