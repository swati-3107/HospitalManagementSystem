-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 09:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigmarkmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `index_slider`
--

CREATE TABLE `index_slider` (
  `id` int(11) NOT NULL,
  `slider_caption` varchar(100) NOT NULL,
  `slider_date_from` date NOT NULL,
  `slider_date_to` date NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_slider`
--

INSERT INTO `index_slider` (`id`, `slider_caption`, `slider_date_from`, `slider_date_to`, `slider_image`, `date_added`) VALUES
(10, 'We have experts for every job.', '2018-12-18', '2019-05-01', '1545129006.png', '2018-12-17 22:00:06'),
(11, 'Logical Solutions that seamlessly make things fall in place.', '2018-12-18', '2019-05-01', '1545129071.png', '2018-12-17 22:01:11'),
(12, 'We Strive at all times..to help you achieve your goal.', '2018-12-18', '2019-05-01', '1545129116.png', '2018-12-17 22:01:56'),
(13, 'We help our clients enjoy the game names \'spend-less-gain-more\'', '2018-12-18', '2019-05-01', '1545129168.png', '2018-12-17 22:02:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `index_slider`
--
ALTER TABLE `index_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `index_slider`
--
ALTER TABLE `index_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
