-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2017 at 02:14 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `10513907_POST`
--

-- --------------------------------------------------------

--
-- Table structure for table `Kategori`
--

CREATE TABLE `Kategori` (
  `IdKategori` varchar(4) NOT NULL,
  `NamaKategori` text NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Kategori`
--

INSERT INTO `Kategori` (`IdKategori`, `NamaKategori`, `Keterangan`) VALUES
('K001', 'True Story', '-'),
('K002', 'Travel', '-'),
('K003', 'News', '-');

-- --------------------------------------------------------

--
-- Table structure for table `Post1`
--

CREATE TABLE `Post1` (
  `IdPost` varchar(5) NOT NULL,
  `TglPost` datetime NOT NULL,
  `Judul` text NOT NULL,
  `IsiPost` text NOT NULL,
  `IdKategori` varchar(4) NOT NULL,
  `IdUser` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Post1`
--

INSERT INTO `Post1` (`IdPost`, `TglPost`, `Judul`, `IsiPost`, `IdKategori`, `IdUser`) VALUES
('Pt001', '2017-01-23 00:00:00', 'Tempat Liburan Seru', 'Dalam Perjalananku ke kota itu ...', 'K001', 'U001'),
('Pt002', '2017-01-23 00:00:00', 'Danau Yang Terlupakan', 'Daerah yang memang tak terjamah ...', 'K002', 'U003'),
('Pt003', '2017-02-24 00:00:00', 'Sejuk di atas gunung', 'Pagi hari yang cerah, gemercak ...', 'K002', 'U003');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `IdUser` varchar(4) NOT NULL,
  `NamaUser` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`IdUser`, `NamaUser`, `email`) VALUES
('U001', 'Robi', 'Rob.23@gmail.com'),
('U002', 'Maxman', 'maxman@gmail.com'),
('U003', 'Ghene', 'Ghene12@yahoo.co.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Kategori`
--
ALTER TABLE `Kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indexes for table `Post1`
--
ALTER TABLE `Post1`
  ADD PRIMARY KEY (`IdPost`),
  ADD KEY `IdKategori` (`IdKategori`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IdUser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Post1`
--
ALTER TABLE `Post1`
  ADD CONSTRAINT `IdKategori_fk` FOREIGN KEY (`IdKategori`) REFERENCES `Kategori` (`IdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdUser_fk` FOREIGN KEY (`IdUser`) REFERENCES `User` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
