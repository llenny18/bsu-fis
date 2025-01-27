-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 06:08 AM
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
  `password_hashed` varchar(255) NOT NULL,
  `status` enum('saved','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `full_name`, `username`, `password_hashed`, `status`) VALUES
(1, 'Fname12', 'admin1', 'ZFVoU1lTcFBreTAvVW9QanpPY2hyUT09OjoYqj8sGcDBsx14ui2i9zDA', 'archived'),
(2, 'Fname2', 'admin2', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(3, 'Fname3', 'admin3', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(4, 'Fname4', 'admin4', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(7, 'Fname7', 'admin7', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(8, 'Fname8', 'admin8', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(9, 'Fname9', 'admin9', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(10, 'Fname10', 'admin10', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(11, 'Fname11', 'admin11', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(12, 'Fname12', 'admin12', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(13, 'Fname13', 'admin13', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(14, 'Fname14', 'admin14', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved'),
(15, 'Fname15', 'admin15', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'saved');

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_by_remarks`
-- (See below for the actual view)
--
CREATE TABLE `count_by_remarks` (
`remarks` varchar(455)
,`remark_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `development_area`
--

CREATE TABLE `development_area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('saved','archived') NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `development_area`
--

INSERT INTO `development_area` (`id`, `name`, `status`, `date_time`) VALUES
(1, 'Economic Development', 'saved', '2025-01-24 14:54:29'),
(2, 'Healthcare Improvement', 'saved', '2025-01-24 14:54:29'),
(3, 'Environmental Sustainability', 'saved', '2025-01-24 14:54:29'),
(4, 'Education Quality', 'saved', '2025-01-24 14:54:29'),
(9, 'School Activities', 'saved', '2025-01-24 14:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `Level` enum('Bachelors','Masters','Doctorate') NOT NULL,
  `Institution` varchar(255) NOT NULL,
  `Degree` varchar(255) NOT NULL,
  `Major_Specialization` varchar(255) NOT NULL,
  `Year_Graduated` year(4) NOT NULL,
  `Units_Earned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `employee_id`, `Level`, `Institution`, `Degree`, `Major_Specialization`, `Year_Graduated`, `Units_Earned`) VALUES
(1, 1, 'Doctorate', 'University A', 'BS Computer Science', 'Software Engineering', '2018', 120),
(2, 2, 'Masters', 'University B', 'MA English Literature', 'American Literature', '2017', 36),
(3, 3, 'Doctorate', 'University C', 'PhD Mathematics', 'Applied Mathematics', '2019', 150),
(4, 4, 'Bachelors', 'University D', 'BA History', 'Modern History', '2016', 120),
(5, 5, 'Masters', 'University E', 'MS Biology', 'Genetics', '2015', 40),
(6, 1, 'Bachelors', 'University A', 'BS Computer Science', 'Software Engineering', '2018', 120),
(12, 1, 'Bachelors', '345', '345', '435', '0000', 345),
(18, 472515, 'Masters', '1', '1', '1', '2001', 1),
(19, 54858, 'Doctorate', '2232', '23', '21', '0000', 123),
(20, 54858, 'Doctorate', '345', '345', '435', '0000', 0),
(21, 54858, 'Masters', 'rtyt', 'rty', 'tyrt', '0000', 342);

-- --------------------------------------------------------

--
-- Table structure for table `employee_accounts`
--

CREATE TABLE `employee_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hashed` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL DEFAULT 'Other',
  `age` int(3) NOT NULL DEFAULT 0,
  `date_of_birth` date NOT NULL DEFAULT '1900-01-01',
  `place_of_origin` varchar(255) NOT NULL DEFAULT 'Unknown',
  `civil_status` enum('Single','Married','Divorced','Separated','Widowed') DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `e_type` enum('teaching','non-teaching') NOT NULL,
  `status` enum('saved','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`id`, `username`, `password_hashed`, `first_name`, `middle_name`, `last_name`, `sex`, `age`, `date_of_birth`, `place_of_origin`, `civil_status`, `contact_number`, `email`, `e_type`, `status`) VALUES
(1, 'employee1', 'd3RtUmhscGVHdnBGODcyQXc2TVJpUT09OjoQzzGxx8PFH5rlg3wAwuW8', 'John', 'A', 'Doe', 'Male', 12, '1900-01-01', 'Unknown', 'Single', '1234567890', 'john.doe@example.com', 'teaching', 'saved'),
(2, 'employee2', 'cjNTc0Zucm9CZ3lLdEtDMlgwazRwUT09OjoDliekFBWujxB+7iokE91y', 'Jane', 'B', 'Smith', 'Male', 45, '1900-01-01', 'Unknown', 'Single', '2345678901', 'jane.smith@example.com', 'non-teaching', 'saved'),
(3, 'employee3', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'Mike', 'C', 'Johnson', 'Male', 23, '1900-01-01', 'Unknown', 'Single', '3456789012', 'mike.johnson@example.com', 'teaching', 'archived'),
(4, 'employee4', 'aTc4MXhWOW1DN0dWUGhrWTVib3Vhdz09OjrN1tKX6OVBFOs3vvSaxJVP', 'Emily', 'D', 'Williams', 'Female', 6, '2002-01-01', 'Unknown', 'Single', '09762331122', 'emily.williams@example.com', 'teaching', 'saved'),
(5, 'employee5', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'David', 'E', 'Brown', 'Other', 3, '1900-01-01', 'Unknown', 'Single', '5678901234', 'david.brown@example.com', 'teaching', 'saved'),
(54858, 'rtrtyrrt', 'cGVXb2Z0eDVWbTVIVTVrbWIwaVh3QT09OjoeBS544TmmYcOzrW7boZ3b', '34', '324', '23423', 'Female', 324, '2025-01-03', '324', 'Divorced', '34', '34324@emai.com', 'teaching', 'saved'),
(472515, '1', 'eHBZOXl6eDQ0dmpXNncyUWh6dWVrdz09OjqhXLePozrJCq/RnmtzB2R1', '1', '1', '1', 'Male', 1, '2025-01-09', '1', 'Married', '1', '12@email.com', 'non-teaching', 'saved');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_full_data`
-- (See below for the actual view)
--
CREATE TABLE `employee_full_data` (
`employee_id` int(11)
,`username` varchar(255)
,`first_name` varchar(255)
,`middle_name` varchar(255)
,`last_name` varchar(255)
,`password_hashed` varchar(255)
,`e_type` enum('teaching','non-teaching')
,`sex` enum('Male','Female','Other')
,`age` int(3)
,`date_of_birth` date
,`place_of_origin` varchar(255)
,`civil_status` enum('Single','Married','Divorced','Separated','Widowed')
,`contact_number` varchar(20)
,`email` varchar(255)
,`Date_of_Appointment` date
,`Years_in_Service` int(11)
,`Appointment_Status` enum('Full Time','Part Time')
,`Tenure_of_Employment` enum('Permanent','Temporary','Contractual','Guest Lecturer')
,`Faculty_Rank` enum('Instructor I','Instructor II','Instructor III','Assistant Professor II','Assistant Professor III','Assistant Professor IV','Associate Professor I','Associate Professor II','Associate Professor III','Associate Professor IV','Associate Professor V','Professor I','Professor II','Professor III','Professor IV','Professor V','Professor VI','College/University Professor','Lecturer I','Lecturer II','Lecturer III','Lecturer IV','Lecturer V','Lecturer VI','Senior Lecturer I','Senior Lecturer II','Senior Lecturer III','Senior Lecturer IV','Senior Lecturer V','Professorial Lecturer I','Professorial Lecturer II','Professorial Lecturer III','Professorial Lecturer IV','Professorial Lecturer V','Professorial Lecturer VI')
,`Designation` varchar(255)
,`Annual_Salary` decimal(15,2)
,`License_Or_Organization_Type` varchar(100)
,`License_Or_Organization_Name` varchar(255)
,`Academic_Load_Units` int(11)
,`General_Education_Units` int(11)
,`Course_Type` enum('Academic','General')
,`Course_Code` varchar(50)
,`Course_Title` varchar(255)
,`Teaching_Units` int(11)
,`Education_Level` enum('Bachelors','Masters','Doctorate')
,`Education_Institution` varchar(255)
,`Education_Degree` varchar(255)
,`Education_Major_Specialization` varchar(255)
,`Education_Year_Graduated` year(4)
,`Education_Units_Earned` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `licensesandorganizations`
--

CREATE TABLE `licensesandorganizations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `licensesandorganizations`
--

INSERT INTO `licensesandorganizations` (`id`, `employee_id`, `Type`, `Name`) VALUES
(1, 1, 'License2', 'Professional Educator License'),
(2, 2, 'Organization', 'National Teachers Association'),
(3, 3, 'License', 'Certified Public Accountant'),
(4, 4, 'Organization', 'Education Faculty Association'),
(5, 5, 'License', 'Medical License'),
(6, 1, 'License222', 'Professional Educator License2'),
(18, 472515, '1', '1'),
(19, 54858, '1231111', '213');

-- --------------------------------------------------------

--
-- Stand-in structure for view `month_year_costs`
-- (See below for the actual view)
--
CREATE TABLE `month_year_costs` (
`month_year` varchar(69)
,`total_estimated_cost` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_full`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_full` (
`status` enum('saved','archived')
,`development_area_id` int(11)
,`development_area_name` varchar(255)
,`outcome_id` int(11)
,`outcome_name` varchar(255)
,`strategy_id` int(11)
,`strategy_name` varchar(255)
,`unique_id` varchar(35)
,`pap_id` int(11)
,`pap_name` varchar(255)
,`performance_indicator` varchar(255)
,`personnel_office_concerned` varchar(255)
,`quarterly_target_q1` varchar(455)
,`quarterly_target_q2` varchar(455)
,`quarterly_target_q3` varchar(455)
,`quarterly_target_q4` varchar(455)
,`total_estimated_cost` decimal(10,2)
,`funding_source` varchar(255)
,`risks` text
,`assessment_of_risk` text
,`mitigating_activities` text
,`d_status` enum('saved','archived')
,`date_time` timestamp
,`m_year` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `operational_plan_monitoring_matrix`
--

CREATE TABLE `operational_plan_monitoring_matrix` (
  `id` int(11) NOT NULL,
  `opmm_fid` varchar(455) DEFAULT NULL,
  `m_pap_id` int(11) NOT NULL,
  `actual_accomplishments` varchar(455) DEFAULT NULL,
  `variance` varchar(455) DEFAULT NULL,
  `remarks` varchar(455) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('saved','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operational_plan_monitoring_matrix`
--

INSERT INTO `operational_plan_monitoring_matrix` (`id`, `opmm_fid`, `m_pap_id`, `actual_accomplishments`, `variance`, `remarks`, `timestamp`, `status`) VALUES
(2, '1-2-2', 2, 'Delivered 3 units', '1.00%', 'Unmet', '2024-10-09 09:44:09', 'archived'),
(3, '2-3-3', 3, 'Completed 65 tasks', '150.00%', 'Met', '2024-10-04 09:44:09', 'saved'),
(4, '1-2-2', 4, 'Achieved 400 milestones', '100.00%', 'Not Applicable', '2025-01-19 09:44:09', 'saved'),
(5, '4-5-5', 5, 'Delivered 1,100 units', '100.00%', 'Met', '2024-07-09 09:44:09', 'saved'),
(6, '9-9-9', 9, 'Processed 1,100 applications', '100.00%', 'Met', '2025-01-19 09:44:09', 'saved'),
(9, '1-1-1', 58, 'Reviewed 12 reports', '8.50%', 'Unmet', '2024-11-06 09:44:09', 'saved'),
(31, '1-2-2', 60, 'Delivered 5 units', '51.00%', 'Met', '2024-10-09 09:44:09', 'saved'),
(32, NULL, 62, '12', '121', '121212', '2025-01-24 12:51:06', 'saved'),
(33, NULL, 66, '212', '12', '121', '2025-01-24 12:51:06', 'saved'),
(34, NULL, 72, '12', '121', '212', '2025-01-24 12:51:06', 'saved'),
(35, NULL, 77, '211', '212', '121', '2025-01-24 12:51:06', 'saved');

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_quarterly_sums`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_quarterly_sums` (
`total_q1` double
,`total_q2` double
,`total_q3` double
,`total_q4` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_quarterly_sums_byd_name`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_quarterly_sums_byd_name` (
`development_area_name` varchar(255)
,`total_q1` double
,`total_q2` double
,`total_q3` double
,`total_q4` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_summary_by_development_area`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_summary_by_development_area` (
`development_area_id` int(11)
,`development_area_name` varchar(255)
,`status` enum('saved','archived')
,`m_year` int(5)
,`strategy_count` bigint(21)
,`outcome_count` bigint(21)
,`pap_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_view`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_view` (
`id` int(11)
,`opmm_fid` varchar(455)
,`m_pap_id` int(11)
,`actual_accomplishments` varchar(455)
,`variance` varchar(455)
,`remarks` varchar(455)
,`development_area_id` int(11)
,`development_area_name` varchar(255)
,`outcome_id` int(11)
,`outcome_name` varchar(255)
,`strategy_id` int(11)
,`strategy_name` varchar(255)
,`unique_id` varchar(35)
,`pap_id` int(11)
,`pap_name` varchar(255)
,`performance_indicator` varchar(255)
,`personnel_office_concerned` varchar(255)
,`quarterly_target_q1` varchar(455)
,`quarterly_target_q2` varchar(455)
,`quarterly_target_q3` varchar(455)
,`quarterly_target_q4` varchar(455)
,`total_estimated_cost` decimal(10,2)
,`funding_source` varchar(255)
,`risks` text
,`assessment_of_risk` text
,`mitigating_activities` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_view_matrix`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_view_matrix` (
`id` int(11)
,`opmm_fid` varchar(455)
,`m_pap_id` int(11)
,`actual_accomplishments` varchar(455)
,`variance` varchar(455)
,`remarks` varchar(455)
,`development_area_id` int(11)
,`development_area_name` varchar(255)
,`outcome_id` int(11)
,`outcome_name` varchar(255)
,`strategy_id` int(11)
,`strategy_name` varchar(255)
,`unique_id` varchar(35)
,`pap_id` int(11)
,`pap_name` varchar(255)
,`performance_indicator` varchar(255)
,`personnel_office_concerned` varchar(255)
,`quarterly_target_q1` varchar(455)
,`quarterly_target_q2` varchar(455)
,`quarterly_target_q3` varchar(455)
,`quarterly_target_q4` varchar(455)
,`total_estimated_cost` decimal(10,2)
,`funding_source` varchar(255)
,`risks` text
,`assessment_of_risk` text
,`mitigating_activities` text
,`pstatus` enum('saved','archived')
,`date_time` timestamp
,`m_year` int(5)
);

-- --------------------------------------------------------

--
-- Table structure for table `outcome`
--

CREATE TABLE `outcome` (
  `id` int(11) NOT NULL,
  `development_area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outcome`
--

INSERT INTO `outcome` (`id`, `development_area_id`, `name`) VALUES
(1, 1, 'Job Creation'),
(2, 1, 'Poverty Reduction'),
(3, 2, 'Access to Healthcare'),
(4, 3, 'Carbon Footprint Reduction'),
(5, 4, 'Improved Literacy Rates'),
(9, 9, 'Creative Illustrations');

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
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('saved','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pap`
--

INSERT INTO `pap` (`id`, `strategy_id`, `name`, `performance_indicator`, `personnel_office_concerned`, `quarterly_target_q1`, `quarterly_target_q2`, `quarterly_target_q3`, `quarterly_target_q4`, `total_estimated_cost`, `funding_source`, `risks`, `assessment_of_risk`, `mitigating_activities`, `date_time`, `status`) VALUES
(1, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 60 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-06 10:21:16', 'archived'),
(2, 2, 'Expand Welfare Programs', 'Number of people enrolled', 'Social Welfare Office', 'Target 1: 1000 people', 'Target 2: 1200 people', 'Target 3: 1400 people', 'Target 4: 1600 people', 20000.00, 'International Aid', 'Underfunding', 'High', 'Seek additional donors', '2024-12-02 10:21:16', 'saved'),
(3, 3, 'Upgrade Clinics', 'Number of clinics upgraded', 'Healthcare Department', 'Target 1: 10 clinics', 'Target 2: 15 clinics', 'Target 3: 20 clinics', 'Target 4: 25 clinics', 30000.00, 'Health Ministry', 'Construction delays', 'High', 'Secure early contractors', '2024-11-11 10:21:16', 'saved'),
(4, 4, 'Install Solar Panels', 'Amount of energy saved (kWh)', 'Environment Office', 'Target 1: 5000 kWh', 'Target 2: 6000 kWh', 'Target 3: 7000 kWh', 'Target 4: 8000 kWh', 10000.00, 'Private Sector', 'Regulatory hurdles', 'Moderate', 'Engage with local government', '2024-12-30 10:21:16', 'saved'),
(6, 1, 'Small Business Grants - Phase 2', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 100 businesses', 'Target 2: 200 businesses', 'Target 3: 300 businesses', 'Target 4: 400 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-11 10:21:16', 'saved'),
(54, 9, 'Community Health Initiative', 'Number of health screenings conducted', 'Healthcare Department', 'Target 1: 100 screenings', 'Target 2: 150 screenings', 'Target 3: 200 screenings', 'Target 4: 250 screenings', 6000.00, 'Government', 'Lack of participation', 'Moderate', 'Increase community outreach', '2024-09-17 10:21:16', 'saved'),
(56, 1, 'Business Development Support', 'Number of businesses receiving support', 'Economic Development Office', 'Target 1: 20 businesses', 'Target 2: 30 businesses', 'Target 3: 40 businesses', 'Target 4: 50 businesses', 11000.00, 'Private Sector', 'Market volatility', 'High', 'Develop contingency plans', '2024-12-16 10:21:16', 'archived'),
(57, 1, 'Skills Development Programs', 'Number of people trained', 'Labor and Employment Office', 'Target 1: 500 people', 'Target 2: 600 people', 'Target 3: 700 people', 'Target 4: 800 people', 24000.00, 'Government', 'Inadequate training resources', 'Moderate', 'Partner with training providers', '2024-12-23 10:21:16', 'saved'),
(58, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 70 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-12-09 10:21:16', 'saved'),
(59, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Target 1: 60 businesses', 'Target 2: 150 businesses', 'Target 3: 200 businesses', 'Target 4: 250 businesses', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications', '2024-11-03 10:21:16', 'saved'),
(60, 2, 'Health Outreach Programs', 'Number of people reached', 'Healthcare Department', 'Target 1: 200 people', 'Target 2: 400 people', 'Target 3: 600 people', 'Target 4: 800 people', 15000.00, 'International Aid', 'Community engagement issues', 'High', 'Increase marketing efforts', '2024-04-12 02:21:16', 'saved'),
(61, 3, 'Upgrade Hospitals', 'Number of hospitals upgraded', 'Healthcare Department', 'Target 1: 5 hospitals', 'Target 2: 10 hospitals', 'Target 3: 15 hospitals', 'Target 4: 20 hospitals', 40000.00, 'Health Ministry', 'Supply chain disruptions', 'High', 'Source from multiple suppliers', '2024-05-10 02:21:16', 'saved'),
(62, 4, 'Clean Energy Projects', 'Energy produced (kWh)', 'Environment Office', 'Target 1: 5000 kWh', 'Target 2: 10000 kWh', 'Target 3: 15000 kWh', 'Target 4: 20000 kWh', 20000.00, 'Private Sector', 'Regulatory challenges', 'Moderate', 'Work closely with local authorities', '2024-06-02 02:21:16', 'saved'),
(64, 1, 'Community Outreach Prograams', 'Number of communities reached', 'Economic Development Office', 'Target 1: 10 communities', 'Target 2: 20 communities', 'Target 3: 30 communities', 'Target 4: 40 communities', 5000.00, 'Government', 'Low participation', 'Moderate', 'Enhance communication strategies', '2024-08-10 02:21:16', 'saved'),
(65, 3, 'Digital Literacy Training', 'Number of people trained', 'Education Department', 'Target 1: 500 people', 'Target 2: 1000 people', 'Target 3: 1500 people', 'Target 4: 2000 people', 8000.00, 'Private Sector', 'Lack of resources', 'Low', 'Collaborate with tech companies', '2024-09-05 02:21:16', 'saved'),
(66, 4, 'Water Conservation Projects', 'Amount of water saved (liters)', 'Environment Office', 'Target 1: 10000 liters', 'Target 2: 20000 liters', 'Target 3: 30000 liters', 'Target 4: 40000 liters', 15000.00, 'Government', 'Limited access to water sources', 'Moderate', 'Develop local partnerships', '2024-09-20 02:21:16', 'saved'),
(67, 2, 'Youth Empowerment Programs', 'Number of youth enrolled', 'Social Welfare Office', 'Target 1: 200 youth', 'Target 2: 300 youth', 'Target 3: 400 youth', 'Target 4: 500 youth', 10000.00, 'International Aid', 'Cultural resistance', 'Moderate', 'Engage with local leaders', '2024-10-10 02:21:16', 'saved'),
(68, 1, 'Support for Small Businesses', 'Number of businesses supported', 'Economic Development Office', 'Target 1: 100 businesses', 'Target 2: 200 businesses', 'Target 3: 300 businesses', 'Target 4: 400 businesses', 5000.00, 'Private Sector', 'Economic downturn', 'High', 'Diversify funding sources', '2024-10-25 02:21:16', 'saved'),
(70, 3, 'Public Housing Improvements', 'Number of homes improved', 'Housing Office', 'Target 1: 50 homes', 'Target 2: 100 homes', 'Target 3: 150 homes', 'Target 4: 200 homes', 20000.00, 'Government', 'Budget constraints', 'High', 'Optimize resource allocation', '2024-11-18 02:21:16', 'saved'),
(71, 2, 'Welfare Support Programs', 'Number of people assisted', 'Social Welfare Office', 'Target 1: 500 people', 'Target 2: 1000 people', 'Target 3: 1500 people', 'Target 4: 2000 people', 15000.00, 'International Aid', 'Regulatory delays', 'High', 'Engage government agencies', '2024-11-22 02:21:16', 'saved'),
(72, 4, 'Reforestation Programs', 'Number of trees planted', 'Environment Office', 'Target 1: 5000 trees', 'Target 2: 10000 trees', 'Target 3: 15000 trees', 'Target 4: 20000 trees', 8000.00, 'Private Sector', 'Weather conditions', 'Moderate', 'Monitor climate forecasts', '2024-12-01 02:21:16', 'saved'),
(73, 1, 'Small Business Support Program', 'Number of businesses receiving aid', 'Economic Development Office', 'Target 1: 100 businesses', 'Target 2: 200 businesses', 'Target 3: 300 businesses', 'Target 4: 400 businesses', 10000.00, 'Government', 'Supply chain issues', 'Moderate', 'Strengthen logistics partnerships', '2024-12-03 02:21:16', 'saved'),
(75, 2, 'Community Health Campaigns', 'Number of people reached', 'Healthcare Department', 'Target 1: 2000 people', 'Target 2: 3000 people', 'Target 3: 4000 people', 'Target 4: 5000 people', 18000.00, 'Private Sector', 'Low awareness', 'High', 'Increase public service announcements', '2024-12-15 02:21:16', 'saved'),
(76, 3, 'Medical Equipment Donations', 'Amount of equipment donated', 'Healthcare Department', 'Target 1: 100 pieces', 'Target 2: 200 pieces', 'Target 3: 300 pieces', 'Target 4: 400 pieces', 12000.00, 'International Aid', 'Logistical challenges', 'Moderate', 'Improve supply chain management', '2024-12-22 02:21:16', 'saved'),
(77, 4, 'Waste Management Initiatives', 'Amount of waste recycled (tons)', 'Environment Office', 'Target 1: 500 tons', 'Target 2: 1000 tons', 'Target 3: 1500 tons', 'Target 4: 2000 tons', 14000.00, 'Private Sector', 'Regulatory approval delays', 'Low', 'Streamline approval processes', '2024-12-28 02:21:16', 'saved');

-- --------------------------------------------------------

--
-- Table structure for table `strategy`
--

CREATE TABLE `strategy` (
  `id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`id`, `outcome_id`, `name`) VALUES
(1, 1, 'Promote Entrepreneurship'),
(2, 2, 'Increase Social Safety Nets'),
(3, 3, 'Improve Rural Health Clinics'),
(4, 4, 'Adopt Renewable Energy'),
(9, 9, 'Make different timeframes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `target_vs_actual_cost`
-- (See below for the actual view)
--
CREATE TABLE `target_vs_actual_cost` (
`development_area_name` varchar(255)
,`target_cost` double
,`actual_cost` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `teachingload`
--

CREATE TABLE `teachingload` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `Academic_Load_Units` int(11) NOT NULL,
  `General_Education_Units` int(11) DEFAULT NULL,
  `Course_Type` enum('Academic','General') NOT NULL,
  `Course_Code` varchar(50) NOT NULL,
  `Course_Title` varchar(255) NOT NULL,
  `Units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachingload`
--

INSERT INTO `teachingload` (`id`, `employee_id`, `Academic_Load_Units`, `General_Education_Units`, `Course_Type`, `Course_Code`, `Course_Title`, `Units`) VALUES
(1, 1, 121, 61, 'Academic', 'CS1011', 'Introduction to Computer Science', 31),
(2, 2, 9, 3, 'General', 'ENG201', 'Advanced English Literature', 2),
(3, 3, 15, 4, 'Academic', 'MATH301', 'Advanced Calculus', 4),
(4, 4, 8, 5, 'Academic', 'HIST102', 'World History', 3),
(5, 5, 14, 2, 'Academic', 'BIO405', 'Genetics', 3),
(6, 2, 9, 3, 'General', 'ENG2014', 'Advanced English Literature', 2),
(7, 1, 121, 61, 'Academic', 'CS10131', 'Introduction to Computer Science', 31),
(8, 1, 121, 61, 'General', '12', '12', 12),
(11, 472515, 1, 1, 'Academic', '1', '1', 1),
(12, 54858, 2312, 213, 'Academic', '123', '213', 123);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_cost_per_area`
-- (See below for the actual view)
--
CREATE TABLE `total_cost_per_area` (
`development_area_name` varchar(255)
,`total_cost` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `workinfo`
--

CREATE TABLE `workinfo` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `Date_of_Appointment` date NOT NULL,
  `Years_in_Service` int(11) NOT NULL,
  `Appointment_Status` enum('Full Time','Part Time') NOT NULL,
  `Tenure_of_Employment` enum('Permanent','Temporary','Contractual','Guest Lecturer') NOT NULL,
  `Faculty_Rank` enum('Instructor I','Instructor II','Instructor III','Assistant Professor II','Assistant Professor III','Assistant Professor IV','Associate Professor I','Associate Professor II','Associate Professor III','Associate Professor IV','Associate Professor V','Professor I','Professor II','Professor III','Professor IV','Professor V','Professor VI','College/University Professor','Lecturer I','Lecturer II','Lecturer III','Lecturer IV','Lecturer V','Lecturer VI','Senior Lecturer I','Senior Lecturer II','Senior Lecturer III','Senior Lecturer IV','Senior Lecturer V','Professorial Lecturer I','Professorial Lecturer II','Professorial Lecturer III','Professorial Lecturer IV','Professorial Lecturer V','Professorial Lecturer VI') NOT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `Annual_Salary` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workinfo`
--

INSERT INTO `workinfo` (`id`, `employee_id`, `Date_of_Appointment`, `Years_in_Service`, `Appointment_Status`, `Tenure_of_Employment`, `Faculty_Rank`, `Designation`, `Annual_Salary`) VALUES
(1, 1, '2022-01-01', 32, 'Full Time', 'Contractual', 'Assistant Professor II', 'Professor', 520000.00),
(2, 2, '2021-05-15', 4, 'Part Time', 'Contractual', 'Instructor II', 'Lecturer', 30000.00),
(3, 3, '2020-08-20', 5, 'Full Time', 'Permanent', 'Associate Professor I', 'Senior Lecturer', 60000.00),
(4, 4, '2019-11-10', 6, 'Part Time', 'Temporary', 'Assistant Professor III', 'Adjunct Faculty', 40000.00),
(5, 5, '2018-03-25', 7, 'Full Time', 'Permanent', 'Professor IV', 'Faculty Head', 70000.00),
(8, 472515, '2025-01-24', 21, 'Full Time', 'Temporary', 'Professor V', 'gfgfh', 5455.00),
(9, 54858, '2025-01-23', 23, 'Full Time', 'Permanent', 'Professor V', '213', 23123.00);

-- --------------------------------------------------------

--
-- Structure for view `count_by_remarks`
--
DROP TABLE IF EXISTS `count_by_remarks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_by_remarks`  AS SELECT `operational_plan_view`.`remarks` AS `remarks`, count(0) AS `remark_count` FROM `operational_plan_view` GROUP BY `operational_plan_view`.`remarks` ORDER BY count(0) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `employee_full_data`
--
DROP TABLE IF EXISTS `employee_full_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_full_data`  AS SELECT `ea`.`id` AS `employee_id`, `ea`.`username` AS `username`, `ea`.`first_name` AS `first_name`, `ea`.`middle_name` AS `middle_name`, `ea`.`last_name` AS `last_name`, `ea`.`password_hashed` AS `password_hashed`, `ea`.`e_type` AS `e_type`, `ea`.`sex` AS `sex`, `ea`.`age` AS `age`, `ea`.`date_of_birth` AS `date_of_birth`, `ea`.`place_of_origin` AS `place_of_origin`, `ea`.`civil_status` AS `civil_status`, `ea`.`contact_number` AS `contact_number`, `ea`.`email` AS `email`, `wi`.`Date_of_Appointment` AS `Date_of_Appointment`, `wi`.`Years_in_Service` AS `Years_in_Service`, `wi`.`Appointment_Status` AS `Appointment_Status`, `wi`.`Tenure_of_Employment` AS `Tenure_of_Employment`, `wi`.`Faculty_Rank` AS `Faculty_Rank`, `wi`.`Designation` AS `Designation`, `wi`.`Annual_Salary` AS `Annual_Salary`, `lo`.`Type` AS `License_Or_Organization_Type`, `lo`.`Name` AS `License_Or_Organization_Name`, `tl`.`Academic_Load_Units` AS `Academic_Load_Units`, `tl`.`General_Education_Units` AS `General_Education_Units`, `tl`.`Course_Type` AS `Course_Type`, `tl`.`Course_Code` AS `Course_Code`, `tl`.`Course_Title` AS `Course_Title`, `tl`.`Units` AS `Teaching_Units`, `ed`.`Level` AS `Education_Level`, `ed`.`Institution` AS `Education_Institution`, `ed`.`Degree` AS `Education_Degree`, `ed`.`Major_Specialization` AS `Education_Major_Specialization`, `ed`.`Year_Graduated` AS `Education_Year_Graduated`, `ed`.`Units_Earned` AS `Education_Units_Earned` FROM ((((`employee_accounts` `ea` join `workinfo` `wi` on(`ea`.`id` = `wi`.`employee_id`)) left join `licensesandorganizations` `lo` on(`ea`.`id` = `lo`.`employee_id`)) left join `teachingload` `tl` on(`ea`.`id` = `tl`.`employee_id`)) left join `education` `ed` on(`ea`.`id` = `ed`.`employee_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `month_year_costs`
--
DROP TABLE IF EXISTS `month_year_costs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `month_year_costs`  AS SELECT date_format(`pap`.`date_time`,'%M %Y') AS `month_year`, sum(`pap`.`total_estimated_cost`) AS `total_estimated_cost` FROM `pap` GROUP BY year(`pap`.`date_time`), month(`pap`.`date_time`) ORDER BY year(`pap`.`date_time`) DESC, month(`pap`.`date_time`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_full`
--
DROP TABLE IF EXISTS `operational_plan_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_full`  AS SELECT `p`.`status` AS `status`, `da`.`id` AS `development_area_id`, `da`.`name` AS `development_area_name`, `o`.`id` AS `outcome_id`, `o`.`name` AS `outcome_name`, `s`.`id` AS `strategy_id`, `s`.`name` AS `strategy_name`, concat(`da`.`id`,'-',`o`.`id`,'-',`s`.`id`) AS `unique_id`, `p`.`id` AS `pap_id`, `p`.`name` AS `pap_name`, `p`.`performance_indicator` AS `performance_indicator`, `p`.`personnel_office_concerned` AS `personnel_office_concerned`, `p`.`quarterly_target_q1` AS `quarterly_target_q1`, `p`.`quarterly_target_q2` AS `quarterly_target_q2`, `p`.`quarterly_target_q3` AS `quarterly_target_q3`, `p`.`quarterly_target_q4` AS `quarterly_target_q4`, `p`.`total_estimated_cost` AS `total_estimated_cost`, `p`.`funding_source` AS `funding_source`, `p`.`risks` AS `risks`, `p`.`assessment_of_risk` AS `assessment_of_risk`, `p`.`mitigating_activities` AS `mitigating_activities`, `da`.`status` AS `d_status`, `p`.`date_time` AS `date_time`, year(`p`.`date_time`) AS `m_year` FROM (((`development_area` `da` left join `outcome` `o` on(`o`.`development_area_id` = `da`.`id`)) left join `strategy` `s` on(`s`.`outcome_id` = `o`.`id`)) left join `pap` `p` on(`p`.`strategy_id` = `s`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_quarterly_sums`
--
DROP TABLE IF EXISTS `operational_plan_quarterly_sums`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_quarterly_sums`  AS SELECT sum(`p`.`quarterly_target_q1`) AS `total_q1`, sum(`p`.`quarterly_target_q2`) AS `total_q2`, sum(`p`.`quarterly_target_q3`) AS `total_q3`, sum(`p`.`quarterly_target_q4`) AS `total_q4` FROM `operational_plan_full` AS `p` ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_quarterly_sums_byd_name`
--
DROP TABLE IF EXISTS `operational_plan_quarterly_sums_byd_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_quarterly_sums_byd_name`  AS SELECT `p`.`development_area_name` AS `development_area_name`, sum(`p`.`quarterly_target_q1`) AS `total_q1`, sum(`p`.`quarterly_target_q2`) AS `total_q2`, sum(`p`.`quarterly_target_q3`) AS `total_q3`, sum(`p`.`quarterly_target_q4`) AS `total_q4` FROM `operational_plan_full` AS `p` GROUP BY `p`.`development_area_name` ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_summary_by_development_area`
--
DROP TABLE IF EXISTS `operational_plan_summary_by_development_area`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_summary_by_development_area`  AS SELECT `operational_plan_full`.`development_area_id` AS `development_area_id`, `operational_plan_full`.`development_area_name` AS `development_area_name`, `operational_plan_full`.`d_status` AS `status`, `operational_plan_full`.`m_year` AS `m_year`, count(distinct `operational_plan_full`.`strategy_id`) AS `strategy_count`, count(distinct `operational_plan_full`.`outcome_id`) AS `outcome_count`, count(distinct `operational_plan_full`.`pap_id`) AS `pap_count` FROM (`operational_plan_full` left join `operational_plan_monitoring_matrix` on(`operational_plan_monitoring_matrix`.`opmm_fid` = `operational_plan_full`.`unique_id`)) GROUP BY `operational_plan_full`.`development_area_id`, `operational_plan_full`.`development_area_name` ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_view`
--
DROP TABLE IF EXISTS `operational_plan_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_view`  AS SELECT `operational_plan_monitoring_matrix`.`id` AS `id`, `operational_plan_monitoring_matrix`.`opmm_fid` AS `opmm_fid`, `operational_plan_monitoring_matrix`.`m_pap_id` AS `m_pap_id`, `operational_plan_monitoring_matrix`.`actual_accomplishments` AS `actual_accomplishments`, `operational_plan_monitoring_matrix`.`variance` AS `variance`, `operational_plan_monitoring_matrix`.`remarks` AS `remarks`, `operational_plan_full`.`development_area_id` AS `development_area_id`, `operational_plan_full`.`development_area_name` AS `development_area_name`, `operational_plan_full`.`outcome_id` AS `outcome_id`, `operational_plan_full`.`outcome_name` AS `outcome_name`, `operational_plan_full`.`strategy_id` AS `strategy_id`, `operational_plan_full`.`strategy_name` AS `strategy_name`, `operational_plan_full`.`unique_id` AS `unique_id`, `operational_plan_full`.`pap_id` AS `pap_id`, `operational_plan_full`.`pap_name` AS `pap_name`, `operational_plan_full`.`performance_indicator` AS `performance_indicator`, `operational_plan_full`.`personnel_office_concerned` AS `personnel_office_concerned`, `operational_plan_full`.`quarterly_target_q1` AS `quarterly_target_q1`, `operational_plan_full`.`quarterly_target_q2` AS `quarterly_target_q2`, `operational_plan_full`.`quarterly_target_q3` AS `quarterly_target_q3`, `operational_plan_full`.`quarterly_target_q4` AS `quarterly_target_q4`, `operational_plan_full`.`total_estimated_cost` AS `total_estimated_cost`, `operational_plan_full`.`funding_source` AS `funding_source`, `operational_plan_full`.`risks` AS `risks`, `operational_plan_full`.`assessment_of_risk` AS `assessment_of_risk`, `operational_plan_full`.`mitigating_activities` AS `mitigating_activities` FROM (`operational_plan_monitoring_matrix` join `operational_plan_full` on(`operational_plan_full`.`unique_id` = `operational_plan_monitoring_matrix`.`opmm_fid`)) WHERE `operational_plan_monitoring_matrix`.`m_pap_id` = `operational_plan_full`.`pap_id` ;

-- --------------------------------------------------------

--
-- Structure for view `operational_plan_view_matrix`
--
DROP TABLE IF EXISTS `operational_plan_view_matrix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_view_matrix`  AS SELECT `operational_plan_monitoring_matrix`.`id` AS `id`, `operational_plan_monitoring_matrix`.`opmm_fid` AS `opmm_fid`, `operational_plan_monitoring_matrix`.`m_pap_id` AS `m_pap_id`, `operational_plan_monitoring_matrix`.`actual_accomplishments` AS `actual_accomplishments`, `operational_plan_monitoring_matrix`.`variance` AS `variance`, `operational_plan_monitoring_matrix`.`remarks` AS `remarks`, `operational_plan_full`.`development_area_id` AS `development_area_id`, `operational_plan_full`.`development_area_name` AS `development_area_name`, `operational_plan_full`.`outcome_id` AS `outcome_id`, `operational_plan_full`.`outcome_name` AS `outcome_name`, `operational_plan_full`.`strategy_id` AS `strategy_id`, `operational_plan_full`.`strategy_name` AS `strategy_name`, `operational_plan_full`.`unique_id` AS `unique_id`, `operational_plan_full`.`pap_id` AS `pap_id`, `operational_plan_full`.`pap_name` AS `pap_name`, `operational_plan_full`.`performance_indicator` AS `performance_indicator`, `operational_plan_full`.`personnel_office_concerned` AS `personnel_office_concerned`, `operational_plan_full`.`quarterly_target_q1` AS `quarterly_target_q1`, `operational_plan_full`.`quarterly_target_q2` AS `quarterly_target_q2`, `operational_plan_full`.`quarterly_target_q3` AS `quarterly_target_q3`, `operational_plan_full`.`quarterly_target_q4` AS `quarterly_target_q4`, `operational_plan_full`.`total_estimated_cost` AS `total_estimated_cost`, `operational_plan_full`.`funding_source` AS `funding_source`, `operational_plan_full`.`risks` AS `risks`, `operational_plan_full`.`assessment_of_risk` AS `assessment_of_risk`, `operational_plan_full`.`mitigating_activities` AS `mitigating_activities`, `operational_plan_full`.`status` AS `pstatus`, `operational_plan_monitoring_matrix`.`timestamp` AS `date_time`, year(`operational_plan_monitoring_matrix`.`timestamp`) AS `m_year` FROM (`operational_plan_full` left join `operational_plan_monitoring_matrix` on(`operational_plan_monitoring_matrix`.`m_pap_id` = `operational_plan_full`.`pap_id`)) GROUP BY `operational_plan_full`.`pap_id` ORDER BY `operational_plan_full`.`development_area_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `target_vs_actual_cost`
--
DROP TABLE IF EXISTS `target_vs_actual_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `target_vs_actual_cost`  AS SELECT `operational_plan_full`.`development_area_name` AS `development_area_name`, sum(`operational_plan_full`.`quarterly_target_q1` + `operational_plan_full`.`quarterly_target_q2` + `operational_plan_full`.`quarterly_target_q3` + `operational_plan_full`.`quarterly_target_q4`) AS `target_cost`, sum(`operational_plan_full`.`total_estimated_cost`) AS `actual_cost` FROM `operational_plan_full` GROUP BY `operational_plan_full`.`development_area_name` ;

-- --------------------------------------------------------

--
-- Structure for view `total_cost_per_area`
--
DROP TABLE IF EXISTS `total_cost_per_area`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_cost_per_area`  AS SELECT `operational_plan_full`.`development_area_name` AS `development_area_name`, sum(`operational_plan_full`.`total_estimated_cost`) AS `total_cost` FROM `operational_plan_full` GROUP BY `operational_plan_full`.`development_area_name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `development_area`
--
ALTER TABLE `development_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licensesandorganizations`
--
ALTER TABLE `licensesandorganizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcome`
--
ALTER TABLE `outcome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `development_area_id` (`development_area_id`);

--
-- Indexes for table `pap`
--
ALTER TABLE `pap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `strategy_id` (`strategy_id`);

--
-- Indexes for table `strategy`
--
ALTER TABLE `strategy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outcome_id` (`outcome_id`);

--
-- Indexes for table `teachingload`
--
ALTER TABLE `teachingload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `workinfo`
--
ALTER TABLE `workinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `development_area`
--
ALTER TABLE `development_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725234;

--
-- AUTO_INCREMENT for table `licensesandorganizations`
--
ALTER TABLE `licensesandorganizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `outcome`
--
ALTER TABLE `outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pap`
--
ALTER TABLE `pap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachingload`
--
ALTER TABLE `teachingload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workinfo`
--
ALTER TABLE `workinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `licensesandorganizations`
--
ALTER TABLE `licensesandorganizations`
  ADD CONSTRAINT `licensesandorganizations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outcome`
--
ALTER TABLE `outcome`
  ADD CONSTRAINT `outcome_ibfk_1` FOREIGN KEY (`development_area_id`) REFERENCES `development_area` (`id`);

--
-- Constraints for table `pap`
--
ALTER TABLE `pap`
  ADD CONSTRAINT `pap_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`);

--
-- Constraints for table `strategy`
--
ALTER TABLE `strategy`
  ADD CONSTRAINT `strategy_ibfk_1` FOREIGN KEY (`outcome_id`) REFERENCES `outcome` (`id`);

--
-- Constraints for table `teachingload`
--
ALTER TABLE `teachingload`
  ADD CONSTRAINT `teachingload_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workinfo`
--
ALTER TABLE `workinfo`
  ADD CONSTRAINT `workinfo_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
