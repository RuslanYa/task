-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2019 at 03:27 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1-log
-- PHP Version: 7.3.6-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Не выполнено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `email`, `text`, `status`) VALUES
(5, 'cccccccccccccc', 'qwq', '    qwqw', 'Выполнено'),
(8, 'dddd', 'qwq', '  qwqw', 'Выполнено'),
(9, 'cccccccccccccc', 'qwq', 'hh', 'Выполнено'),
(11, 'dsdsd', 'qwq', 'sds', 'Выполнено'),
(12, 'ddddddddddddddd', 'qwq', '   qwqw', 'Выполнено'),
(13, 'cccccccccccccc', 'qwq', '  qwqw', 'Выполнено'),
(15, 'rrrrrrrrrrrrr', 'rrrrrrrrrrrrrrr', ' rrrrrrrrrrrrrrr', 'Выполнено'),
(16, 'dddddddddddddd', 'ddddddddddddddddd', ' dddddddddddddddddddd', 'Не выполнено'),
(17, 'jjjjjjjjjjj', 'jjjjjjjjjjjjj', ' jjjjjjjjjjjjjjjjjjj', 'Не выполнено'),
(18, 'ывывф', 'вфвфв', ' фывфв', 'Не выполнено'),
(19, 'sdadas', 'sadasdad', ' asdasdasda', 'Не выполнено'),
(20, 'sdasd', 'dasdasds', 'dasdasd ', 'Не выполнено'),
(21, 'wdsds', 'sdadasd', ' asdasdasd', 'Не выполнено'),
(22, 'ooooooooooooo', 'ooooooooooooooooooo', '  ooooooooooooooo', 'Выполнено'),
(24, 'вввввввввв', 'ввввввввввввв', ' ввввввввввв', 'Не выполнено');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
