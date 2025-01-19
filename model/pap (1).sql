-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 11:22 AM
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
  `mitigating_activities` text DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pap`
--

INSERT INTO `pap` (`id`, `strategy_id`, `name`, `performance_indicator`, `personnel_office_concerned`, `quarterly_target_q1`, `quarterly_target_q2`, `quarterly_target_q3`, `quarterly_target_q4`, `total_estimated_cost`, `funding_source`, `risks`, `assessment_of_risk`, `mitigating_activities`, `date_time`) VALUES
(1, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 60 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-06 10:21:16'),
(2, 2, 'Expand Welfare Programs', 'Number of people enrolled', 'Social Welfare Office', 'Target 1: 1000 people', 'Target 2: 1200 people', 'Target 3: 1400 people', 'Target 4: 1600 people', 20000.00, 'International Aid', 'Underfunding', 'High', 'Seek additional donors', '2024-12-02 10:21:16'),
(3, 3, 'Upgrade Clinics', 'Number of clinics upgraded', 'Healthcare Department', 'Target 1: 10 clinics', 'Target 2: 15 clinics', 'Target 3: 20 clinics', 'Target 4: 25 clinics', 30000.00, 'Health Ministry', 'Construction delays', 'High', 'Secure early contractors', '2024-11-11 10:21:16'),
(4, 4, 'Install Solar Panels', 'Amount of energy saved (kWh)', 'Environment Office', 'Target 1: 5000 kWh', 'Target 2: 6000 kWh', 'Target 3: 7000 kWh', 'Target 4: 8000 kWh', 10000.00, 'Private Sector', 'Regulatory hurdles', 'Moderate', 'Engage with local government', '2024-12-30 10:21:16'),
(5, 5, 'Online Learning Platforms', 'Number of students enrolled', 'Education Department', 'Target 1: 300 students', 'Target 2: 400 students', 'Target 3: 500 students', 'Target 4: 600 students', 15000.00, 'Government', 'Technology gaps', 'Low', 'Provide training programs', '2025-01-19 10:21:16'),
(6, 1, 'Small Business Grants - Phase 2', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 100 businesses', 'Target 2: 200 businesses', 'Target 3: 300 businesses', 'Target 4: 400 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-11 10:21:16'),
(54, 9, 'Community Health Initiative', 'Number of health screenings conducted', 'Healthcare Department', 'Target 1: 100 screenings', 'Target 2: 150 screenings', 'Target 3: 200 screenings', 'Target 4: 250 screenings', 6000.00, 'Government', 'Lack of participation', 'Moderate', 'Increase community outreach', '2024-09-17 10:21:16'),
(55, 5, 'School Infrastructure Upgrades', 'Number of classrooms renovated', 'Education Department', 'Target 1: 5 classrooms', 'Target 2: 10 classrooms', 'Target 3: 15 classrooms', 'Target 4: 20 classrooms', 7000.00, 'Government', 'Supply chain delays', 'Low', 'Secure additional suppliers', '2024-11-03 10:21:16'),
(56, 1, 'Business Development Support', 'Number of businesses receiving support', 'Economic Development Office', 'Target 1: 20 businesses', 'Target 2: 30 businesses', 'Target 3: 40 businesses', 'Target 4: 50 businesses', 11000.00, 'Private Sector', 'Market volatility', 'High', 'Develop contingency plans', '2024-12-16 10:21:16'),
(57, 1, 'Skills Development Programs', 'Number of people trained', 'Labor and Employment Office', 'Target 1: 500 people', 'Target 2: 600 people', 'Target 3: 700 people', 'Target 4: 800 people', 24000.00, 'Government', 'Inadequate training resources', 'Moderate', 'Partner with training providers', '2024-12-23 10:21:16'),
(58, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 70 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-12-09 10:21:16'),
(59, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 60 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-03 10:21:16');

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
