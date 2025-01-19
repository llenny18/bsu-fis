-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 10:17 AM
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
-- Table structure for table `pap`
--

CREATE TABLE `pap` (
  `id` int(11) NOT NULL,
  `strategy_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `performance_indicator` varchar(255) DEFAULT NULL,
  `personnel_office_concerned` varchar(255) DEFAULT NULL,
  `quarterly_target_q1` varchar(455) DEFAULT NULL,
  `quarterly_target_q2` varchar(455) DEFAULT NULL,
  `quarterly_target_q3` varchar(455) DEFAULT NULL,
  `quarterly_target_q4` varchar(455) DEFAULT NULL,
  `total_estimated_cost` decimal(10,2) DEFAULT NULL,
  `funding_source` varchar(255) DEFAULT NULL,
  `risks` text DEFAULT NULL,
  `assessment_of_risk` text DEFAULT NULL,
  `mitigating_activities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pap`
--

INSERT INTO `pap` (`id`, `strategy_id`, `name`, `performance_indicator`, `personnel_office_concerned`, `quarterly_target_q1`, `quarterly_target_q2`, `quarterly_target_q3`, `quarterly_target_q4`, `total_estimated_cost`, `funding_source`, `risks`, `assessment_of_risk`, `mitigating_activities`) VALUES
(1, 1, 'Small Business Grants', '1Number of businesses funded', 'Economic Development Office', '5456456', '60', '70', '802', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications'),
(2, 2, 'Expand Welfare Programs', 'Number of people enrolled', 'Social Welfare Office', '1000', '1200', '1400', '1600', 20000.00, 'International Aid', 'Underfunding', 'High', 'Seek additional donors'),
(3, 3, 'Upgrade Clinics', 'Number of clinics upgraded', 'Healthcare Department', '2000', '4000', '4000', '5000', 30000.00, 'Health Ministry', 'Construction delays', 'High', 'Secure early contractors'),
(4, 4, 'Install Solar Panels', 'Amount of energy saved', 'Environment Office', '500', '600', '700', '800', 10000.00, 'Private Sector', 'Regulatory hurdles', 'Moderate', 'Engage with local government'),
(5, 5, 'Online Learning Platforms', 'Number of students enrolled', 'Education Department', '300', '400', '500', '600', 15000.00, 'Government', 'Technology gaps', 'Low', 'Provide training programs'),
(6, 1, '6- 6- 6- S2mall Business Grants', 'Number of businesses funded', 'Economic Development Office', '2344', '600', '70', '80', 500.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications'),
(54, 9, '', '4', '6', '7', '7', '8', '9', 6.00, '666', '6', '7', '6'),
(55, 5, '', '1', '2', '3', '4', '5', '6', 7.00, '8', '9', '10', '11'),
(56, 1, 'papname', '11', '12', '11', '11', '11', '11', 111.00, '11', '11', '11', '11'),
(57, 1, 'palagaymuna', '3423', '4234234', NULL, '423', '234', '423423', 234.00, '234', '4234', '23423', '234234'),
(58, 1, 'try new', 'Number of businesses funded', 'Economic Development Office', '50', '600', '70', '80', 500.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications'),
(59, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', '5456456', '60', '70', '802', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pap`
--
ALTER TABLE `pap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `strategy_id` (`strategy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pap`
--
ALTER TABLE `pap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pap`
--
ALTER TABLE `pap`
  ADD CONSTRAINT `pap_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
