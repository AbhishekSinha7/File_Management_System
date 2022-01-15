-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 08:46 PM
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
-- Database: `file_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `let`
--

CREATE TABLE `let` (
  `id` int(11) NOT NULL,
  `report` varchar(255) NOT NULL,
  `reoprt_new_name` varchar(255) NOT NULL,
  `ppt` varchar(255) NOT NULL,
  `ppt_new_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_new_name` varchar(255) NOT NULL,
  `exe` varchar(255) NOT NULL,
  `exe_new_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `let`
--

INSERT INTO `let` (`id`, `report`, `reoprt_new_name`, `ppt`, `ppt_new_name`, `img`, `img_new_name`, `exe`, `exe_new_name`) VALUES
(1, 'Dictionary.docx', '2904211619709537Dictionary.docx', '', '', '', '', '', ''),
(6, 'Dictionary.docx', '2904211619710522Dictionary.docx', 'List in Python.txt', '2904211619710522List in Python.txt', '', '', 'Operators in Python.docx', '2904211619710522Operators in Python.docx'),
(7, 'Tuple Data Structure.docx', '2904211619710592Tuple Data Structure.docx', 'Set.docx', '2904211619710592Set.docx', '', '', 'Operators in Python.docx', '2904211619710592Operators in Python.docx'),
(8, 'List in Python.txt', '2904211619710699List in Python.txt', 'Set.docx', '2904211619710699Set.docx', '', '', 'Tuple Data Structure.docx', '2904211619710699Tuple Data Structure.docx'),
(9, '', '', '', '0105211619843798', ' ', ' 0105211619843798', '', '0105211619843798'),
(10, '11.PNG', '010521161984389911.PNG', '', '0105211619843899', ' ', ' 0105211619843899', '', '0105211619843899'),
(11, '', '0105211619843981', '', '0105211619843981', ' ', ' 0105211619843981', '', '0105211619843981'),
(12, '4.PNG', '01052116198440714.PNG', '', '0105211619844071', ' ', ' 0105211619844071', '', '0105211619844071'),
(13, '1.PNG', '01052116198443931.PNG', '2.PNG', '01052116198443932.PNG', '3.PNG ', ' 01052116198443933.PNG', '4.PNG', '01052116198443934.PNG'),
(14, '1.png', '01052116198691751.png', '2.png', '01052116198691752.png', '', '', '3.png', '01052116198691753.png'),
(15, '1.png', '01052116198692911.png', '2.png', '01052116198692912.png', '3.png ', ' 01052116198692913.png', '4.png', '01052116198692914.png'),
(16, '1.png', '01052116198695041.png', '2.png', '01052116198695042.png', '3.png ', ' 01052116198695043.png', '4.png', '01052116198695044.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `let`
--
ALTER TABLE `let`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `let`
--
ALTER TABLE `let`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
