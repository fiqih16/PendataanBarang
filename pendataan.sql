-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 08:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'sukronmaulana@landson.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idptn` int(11) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `expired` varchar(50) NOT NULL,
  `numberptn` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idptn`, `itemcode`, `description`, `batch`, `expired`, `numberptn`, `qty`, `status`) VALUES
(1, 'PPSN12-FGX', 'PASSION SACHET/6\'S-NIGERIA (100) HALAL', '24I001-A', '2021-12-07', '2021IF008', 97400, 'selesai'),
(3, 'COBA', 'PASSION SACHET/6\'S-NIGERIA (100) HALAL', '22313', '2021-12-06', '212', 225, 'selesai'),
(10, 'adwadaa', 'ss', '4', '2021-12-06', '212', 97400, 'selesai'),
(12, 'adwadaa', 'PASSION SACHET/6\'S-NIGERIA (100) HALAL', '5', '2021-12-14', '212', 12, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `passion`
--

CREATE TABLE `passion` (
  `idps` int(11) NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `expired` varchar(255) NOT NULL,
  `numberptn` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passion`
--

INSERT INTO `passion` (`idps`, `itemcode`, `description`, `batch`, `expired`, `numberptn`, `qty`, `status`) VALUES
(23, 'COBA', 'PASSION SACHET/6\'S-NIGERIA (100) HALAL', '7', '2021-12-07', '212', 12, 'selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idptn`),
  ADD UNIQUE KEY `batch` (`batch`);

--
-- Indexes for table `passion`
--
ALTER TABLE `passion`
  ADD PRIMARY KEY (`idps`),
  ADD UNIQUE KEY `batch` (`batch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `idptn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `passion`
--
ALTER TABLE `passion`
  MODIFY `idps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
