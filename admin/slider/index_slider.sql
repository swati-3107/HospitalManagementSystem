-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_admin`
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
  `compressed_image` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_slider`
--

INSERT INTO `index_slider` (`id`, `slider_caption`, `slider_date_from`, `slider_date_to`, `slider_image`, `compressed_image`, `date_added`) VALUES
(2, 'slider', '0000-00-00', '0000-00-00', '1551525399.jpg', '1551525399.webp', '2019-03-02 11:12:45');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
