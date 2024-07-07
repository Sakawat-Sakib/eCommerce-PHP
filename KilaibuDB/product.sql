-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 07:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kilaibu`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `description`, `status`) VALUES
(18, 32, 'Nike', 1500, 1200, 2, '45636054_3.jpg', 'New collection', 1),
(19, 28, 'Rolex', 123000, 120000, 12, '14030819_2.jpg', 'Premium collection.', 1),
(20, 31, 'Apple', 30000, 25000, 32, '86038944_17.jpg', 'null', 1),
(22, 28, 'Fast Track', 1400, 1200, 12, '62868194_11.jpg', 'null', 1),
(23, 28, 'G-Shock', 500, 300, 33, '30523629_1.jpg', 'null', 1),
(24, 30, 'Xaomi', 18000, 12000, 32, '79586531_23.jpg', 'null', 1),
(25, 30, 'Samsung', 32000, 30000, 32, '41242848_19.jpg', 'null', 0),
(26, 32, 'Adidas', 2000, 1900, 13, '87069847_4.jpg', 'null', 0),
(27, 32, 'Supreme', 3200, 3000, 32, '95364389_27.jpg', 'null', 1),
(28, 29, 'Ponix', 21000, 12000, 21, '64804851_12.jpg', 'null', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
