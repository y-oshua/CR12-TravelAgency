-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 05:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr12_mount_everest_joshuapowell`
--
CREATE DATABASE IF NOT EXISTS `be15_cr12_mount_everest_joshuapowell` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr12_mount_everest_joshuapowell`;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `price`, `description`, `latitude`, `longitude`, `image`) VALUES
(1, 'Vienna', 120, 'Vienna is often said to the world\'s capital of music since its cultural life has been connected with music for the last five centuries. This historic city is a truly glorious one, a cradle of European music and theater, architecture and literature.', '48.21003300', '16.36344900', 'vienna.jpg'),
(2, 'Paris', 120, 'For many centuries Paris has been considered to be a cultural and fashion capital of the continent, with a large number of fashion designers, makeup and beauty specialists, artists, cinema and music related specialists living and working in the city.', '48.86471600', '2.34901400', 'paris.jpg'),
(3, 'Rio de Janeiro', 52, 'Rio de Janeiro is a principal center of the cultural and business life of the country, but especially a tourist spot, with millions and millions of people visiting the city year-round, but especially during the season of traditional Brazilian carnivals.', '-22.90833300', '-43.19638800', 'rio.jpg'),
(4, 'Sydney', 88, 'Sydney is the largest and the most populous city of the Australian continent, located on the Tasmanian Sea coast, and it is also the capital of New South Wales. The area has been inhabited since the early ages, way before the European colonizers\' arrival.', '-33.86514300', '151.20990000', 'sydney.jpg'),
(5, 'Tokyo', 94, 'Tokyo is the largest city in the world, as well as the capital city of Japan and the capital of the same name prefecture. It is a huge metropolis located in the southern coastal area of Honshu island.', '35.65283200', '139.83947800', 'tokyo.jpg'),
(6, 'New York', 196, 'New York City is one of the most known cities-symbols of the USA located in the northeastern part of the country, on the Atlantic coast. It is known as a global business capital and one of the most populous, innovative, and bustling cities of the world.', '40.73061000', '-73.93524200', 'newyork.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
