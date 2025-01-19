-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 10:21 AM
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
-- Table structure for table `operational_plan_monitoring_matrix`
--

CREATE TABLE `operational_plan_monitoring_matrix` (
  `id` int(11) NOT NULL,
  `opmm_fid` varchar(455) NOT NULL,
  `m_pap_id` int(11) NOT NULL,
  `actual_accomplishments` varchar(455) DEFAULT NULL,
  `variance` varchar(455) DEFAULT NULL,
  `remarks` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operational_plan_monitoring_matrix`
--

INSERT INTO `operational_plan_monitoring_matrix` (`id`, `opmm_fid`, `m_pap_id`, `actual_accomplishments`, `variance`, `remarks`) VALUES
(1, '1-1-1', 1, 'one accomp', '56756767', 'Ongoing'),
(2, '1-2-2', 2, '3', '1.00', 'Unmet'),
(3, '2-3-3', 3, '65034', '150.00', 'Met'),
(4, '1-2-2', 4, '400', '100.00', 'Not Applicable'),
(5, '4-5-5', 5, '1100', '100.00', 'Met'),
(6, '9-9-9', 9, '1100', '100.00', 'Partially Met'),
(7, '1-1-1', 6, '567567', '6756756', 'Met'),
(9, '1-1-1', 58, 'retaa', 'retvv', 'Unmet'),
(10, '1-1-1', 56, '12312', 'werewr', 'Not Applicable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
