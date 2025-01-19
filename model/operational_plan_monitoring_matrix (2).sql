-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 10:48 AM
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
  `remarks` varchar(455) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operational_plan_monitoring_matrix`
--

INSERT INTO `operational_plan_monitoring_matrix` (`id`, `opmm_fid`, `m_pap_id`, `actual_accomplishments`, `variance`, `remarks`, `timestamp`) VALUES
(1, '1-1-1', 1, 'Completed phase 1', '5.67%', 'Ongoing', '2024-09-18 09:44:09'),
(2, '1-2-2', 2, 'Delivered 3 units', '1.00%', 'Unmet', '2024-10-09 09:44:09'),
(3, '2-3-3', 3, 'Completed 65 tasks', '150.00%', 'Met', '2024-10-04 09:44:09'),
(4, '1-2-2', 4, 'Achieved 400 milestones', '100.00%', 'Not Applicable', '2025-01-19 09:44:09'),
(5, '4-5-5', 5, 'Delivered 1,100 units', '100.00%', 'Met', '2024-07-09 09:44:09'),
(6, '9-9-9', 9, 'Processed 1,100 applications', '100.00%', 'Partially Met', '2025-01-19 09:44:09'),
(7, '1-1-1', 6, 'Completed 567 tasks', '67.57%', 'Met', '2025-01-19 09:44:09'),
(9, '1-1-1', 58, 'Reviewed 12 reports', '8.50%', 'Unmet', '2024-11-06 09:44:09'),
(10, '1-1-1', 56, 'Validated 1,231 entries', '7.50%', 'Not Applicable', '2024-10-02 09:44:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
