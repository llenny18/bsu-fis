-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 01:09 PM
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
  `development_area_id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `strategy_id` int(11) NOT NULL,
  `performance_indicator` varchar(255) DEFAULT NULL,
  `actual_accomplishments` text DEFAULT NULL,
  `variance` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operational_plan_monitoring_matrix`
--

INSERT INTO `operational_plan_monitoring_matrix` (`id`, `development_area_id`, `outcome_id`, `strategy_id`, `performance_indicator`, `actual_accomplishments`, `variance`, `remarks`) VALUES
(1, 1, 1, 1, 'Number of businesses funded', '40', 10.00, 'Underperformed in Q1'),
(2, 2, 3, 3, 'Number of clinics upgraded', '3', 1.00, 'On track for expansion'),
(3, 3, 4, 4, 'Amount of energy saved', '650', 150.00, 'Ahead of schedule'),
(4, 4, 5, 5, 'Number of students enrolled', '400', 100.00, 'On track for digital expansion'),
(5, 5, 2, 2, 'Number of people enrolled', '1100', 100.00, 'Meeting Q2 targets'),
(6, 5, 2, 2, 'Count of people enrolled', '1100', 100.00, 'Meeting Q2 targets');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `development_area_id` (`development_area_id`),
  ADD KEY `outcome_id` (`outcome_id`),
  ADD KEY `strategy_id` (`strategy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_1` FOREIGN KEY (`development_area_id`) REFERENCES `development_area` (`id`),
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_2` FOREIGN KEY (`outcome_id`) REFERENCES `outcome` (`id`),
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_3` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
