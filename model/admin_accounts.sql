-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 03:43 PM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsu_fis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(455) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hashed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `full_name`, `username`, `password_hashed`) VALUES
(1, 'Fname1', 'admin1', 'hashed_password1'),
(2, 'Fname2', 'admin2', 'hashed_password2'),
(3, 'Fname3', 'admin3', 'hashed_password3'),
(4, 'Fname4', 'admin4', 'hashed_password4'),
(5, 'Fname5', 'admin5', 'hashed_password5'),
(6, 'Fname6', 'admin6', 'hashed_password6'),
(7, 'Fname7', 'admin7', 'hashed_password7'),
(8, 'Fname8', 'admin8', 'hashed_password8'),
(9, 'Fname9', 'admin9', 'hashed_password9'),
(10, 'Fname10', 'admin10', 'hashed_password10'),
(11, 'Fname11', 'admin11', 'hashed_password11'),
(12, 'Fname12', 'admin12', 'hashed_password12'),
(13, 'Fname13', 'admin13', 'hashed_password13'),
(14, 'Fname14', 'admin14', 'hashed_password14'),
(15, 'Fname15', 'admin15', 'hashed_password15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
