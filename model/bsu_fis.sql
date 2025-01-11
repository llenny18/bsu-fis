-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 01:00 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `development_area`
--

CREATE TABLE `development_area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `development_area`
--

INSERT INTO `development_area` (`id`, `name`) VALUES
(1, 'Economic Development'),
(2, 'Healthcare Improvement'),
(3, 'Environmental Sustainability'),
(4, 'Education Quality'),
(5, 'Infrastructure Development');

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
(1, 1, 'Bachelors', 'University A', 'BS Computer Science', 'Software Engineering', '2018', 120),
(2, 2, 'Masters', 'University B', 'MA English Literature', 'American Literature', '2017', 36),
(3, 3, 'Doctorate', 'University C', 'PhD Mathematics', 'Applied Mathematics', '2019', 150),
(4, 4, 'Bachelors', 'University D', 'BA History', 'Modern History', '2016', 120),
(5, 5, 'Masters', 'University E', 'MS Biology', 'Genetics', '2015', 40),
(6, 1, 'Masters', 'University A', 'BS Computer Science', 'Software Engineering', '2018', 120);

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
  `e_type` enum('teaching','non-teaching') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`id`, `username`, `password_hashed`, `first_name`, `middle_name`, `last_name`, `sex`, `age`, `date_of_birth`, `place_of_origin`, `civil_status`, `contact_number`, `email`, `e_type`) VALUES
(1, 'employee1', 'hashed_password1', 'John', 'A', 'Doe', 'Male', 12, '1900-01-01', 'Unknown', 'Single', '1234567890', 'john.doe@example.com', 'teaching'),
(2, 'employee2', 'hashed_password2', 'Jane', 'B', 'Smith', 'Male', 45, '1900-01-01', 'Unknown', 'Single', '2345678901', 'jane.smith@example.com', 'teaching'),
(3, 'employee3', 'hashed_password3', 'Mike', 'C', 'Johnson', 'Male', 23, '1900-01-01', 'Unknown', 'Single', '3456789012', 'mike.johnson@example.com', 'teaching'),
(4, 'employee4', 'hashed_password4', 'Emily', 'D', 'Williams', 'Female', 6, '1900-01-01', 'Unknown', 'Single', '4567890123', 'emily.williams@example.com', 'teaching'),
(5, 'employee5', 'hashed_password5', 'David', 'E', 'Brown', 'Other', 3, '1900-01-01', 'Unknown', 'Single', '5678901234', 'david.brown@example.com', 'teaching');

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
(1, 1, 'License', 'Professional Educator License'),
(2, 2, 'Organization', 'National Teachers Association'),
(3, 3, 'License', 'Certified Public Accountant'),
(4, 4, 'Organization', 'Education Faculty Association'),
(5, 5, 'License', 'Medical License'),
(6, 1, 'License2', 'Professional Educator License2');

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
(5, 5, 2, 2, 'Number of people enrolled', '1100', 100.00, 'Meeting Q2 targets');

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
(5, 4, 'Improved Literacy Rates');

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
  `quarterly_target_q1` int(11) DEFAULT NULL,
  `quarterly_target_q2` int(11) DEFAULT NULL,
  `quarterly_target_q3` int(11) DEFAULT NULL,
  `quarterly_target_q4` int(11) DEFAULT NULL,
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
(1, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 50, 60, 70, 80, 50000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications'),
(2, 2, 'Expand Welfare Programs', 'Number of people enrolled', 'Social Welfare Office', 1000, 1200, 1400, 1600, 200000.00, 'International Aid', 'Underfunding', 'High', 'Seek additional donors'),
(3, 3, 'Upgrade Clinics', 'Number of clinics upgraded', 'Healthcare Department', 2, 3, 4, 5, 300000.00, 'Health Ministry', 'Construction delays', 'High', 'Secure early contractors'),
(4, 4, 'Install Solar Panels', 'Amount of energy saved', 'Environment Office', 500, 600, 700, 800, 100000.00, 'Private Sector', 'Regulatory hurdles', 'Moderate', 'Engage with local government'),
(5, 5, 'Online Learning Platforms', 'Number of students enrolled', 'Education Department', 300, 400, 500, 600, 150000.00, 'Government', 'Technology gaps', 'Low', 'Provide training programs');

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
(5, 5, 'Implement Digital Learning Tools');

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
(1, 1, 12, 6, 'Academic', 'CS101', 'Introduction to Computer Science', 3),
(2, 2, 9, 3, 'General', 'ENG201', 'Advanced English Literature', 2),
(3, 3, 15, 4, 'Academic', 'MATH301', 'Advanced Calculus', 4),
(4, 4, 8, 5, 'General', 'HIST102', 'World History', 3),
(5, 5, 14, 2, 'Academic', 'BIO405', 'Genetics', 3),
(6, 2, 9, 3, 'General', 'ENG2014', 'Advanced English Literature', 2),
(7, 1, 23, 12, 'General', 'CS1013', 'Introduction to Computer Science', 3);

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
(1, 1, '2022-01-01', 3, 'Full Time', 'Permanent', 'Assistant Professor II', 'Professor', 50000.00),
(2, 2, '2021-05-15', 4, 'Part Time', 'Contractual', 'Instructor II', 'Lecturer', 30000.00),
(3, 3, '2020-08-20', 5, 'Full Time', 'Permanent', 'Associate Professor I', 'Senior Lecturer', 60000.00),
(4, 4, '2019-11-10', 6, 'Part Time', 'Temporary', 'Assistant Professor III', 'Adjunct Faculty', 40000.00),
(5, 5, '2018-03-25', 7, 'Full Time', 'Permanent', 'Professor IV', 'Faculty Head', 70000.00);

-- --------------------------------------------------------

--
-- Structure for view `employee_full_data`
--
DROP TABLE IF EXISTS `employee_full_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_full_data`  AS SELECT `ea`.`id` AS `employee_id`, `ea`.`username` AS `username`, `ea`.`first_name` AS `first_name`, `ea`.`middle_name` AS `middle_name`, `ea`.`last_name` AS `last_name`, `ea`.`sex` AS `sex`, `ea`.`age` AS `age`, `ea`.`date_of_birth` AS `date_of_birth`, `ea`.`place_of_origin` AS `place_of_origin`, `ea`.`civil_status` AS `civil_status`, `ea`.`contact_number` AS `contact_number`, `ea`.`email` AS `email`, `wi`.`Date_of_Appointment` AS `Date_of_Appointment`, `wi`.`Years_in_Service` AS `Years_in_Service`, `wi`.`Appointment_Status` AS `Appointment_Status`, `wi`.`Tenure_of_Employment` AS `Tenure_of_Employment`, `wi`.`Faculty_Rank` AS `Faculty_Rank`, `wi`.`Designation` AS `Designation`, `wi`.`Annual_Salary` AS `Annual_Salary`, `lo`.`Type` AS `License_Or_Organization_Type`, `lo`.`Name` AS `License_Or_Organization_Name`, `tl`.`Academic_Load_Units` AS `Academic_Load_Units`, `tl`.`General_Education_Units` AS `General_Education_Units`, `tl`.`Course_Type` AS `Course_Type`, `tl`.`Course_Code` AS `Course_Code`, `tl`.`Course_Title` AS `Course_Title`, `tl`.`Units` AS `Teaching_Units`, `ed`.`Level` AS `Education_Level`, `ed`.`Institution` AS `Education_Institution`, `ed`.`Degree` AS `Education_Degree`, `ed`.`Major_Specialization` AS `Education_Major_Specialization`, `ed`.`Year_Graduated` AS `Education_Year_Graduated`, `ed`.`Units_Earned` AS `Education_Units_Earned` FROM ((((`employee_accounts` `ea` join `workinfo` `wi` on(`ea`.`id` = `wi`.`employee_id`)) left join `licensesandorganizations` `lo` on(`ea`.`id` = `lo`.`employee_id`)) left join `teachingload` `tl` on(`ea`.`id` = `tl`.`employee_id`)) left join `education` `ed` on(`ea`.`id` = `ed`.`employee_id`)) ;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `development_area_id` (`development_area_id`),
  ADD KEY `outcome_id` (`outcome_id`),
  ADD KEY `strategy_id` (`strategy_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licensesandorganizations`
--
ALTER TABLE `licensesandorganizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outcome`
--
ALTER TABLE `outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pap`
--
ALTER TABLE `pap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachingload`
--
ALTER TABLE `teachingload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workinfo`
--
ALTER TABLE `workinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_1` FOREIGN KEY (`development_area_id`) REFERENCES `development_area` (`id`),
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_2` FOREIGN KEY (`outcome_id`) REFERENCES `outcome` (`id`),
  ADD CONSTRAINT `operational_plan_monitoring_matrix_ibfk_3` FOREIGN KEY (`strategy_id`) REFERENCES `strategy` (`id`);

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
