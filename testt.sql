-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 11:07 PM
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
-- Database: `testt`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `pSkin` int(16) NOT NULL,
  `pScore` int(16) NOT NULL,
  `pMoney` int(16) NOT NULL,
  `pAdmin` int(11) NOT NULL,
  `pPassword` varchar(55) NOT NULL,
  `pVehicle_1` int(11) NOT NULL,
  `pVehicle_2` int(11) NOT NULL,
  `pVehicle_3` int(11) NOT NULL,
  `pVehicle_4` int(11) NOT NULL,
  `pVehicle_5` int(11) NOT NULL,
  `pVehicle_6` int(11) NOT NULL,
  `pAddress` varchar(55) NOT NULL,
  `pPincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `pSkin`, `pScore`, `pMoney`, `pAdmin`, `pPassword`, `pVehicle_1`, `pVehicle_2`, `pVehicle_3`, `pVehicle_4`, `pVehicle_5`, `pVehicle_6`, `pAddress`, `pPincode`) VALUES
(1, 'Ncode', 1, 99, 15000, 10, 'admin', 523, 0, 0, 0, 0, 0, 'byncodee@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
