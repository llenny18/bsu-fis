-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 10:28 AM
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
-- Stand-in structure for view `actual_accomplishments_vs_variance`
-- (See below for the actual view)
--
CREATE TABLE `actual_accomplishments_vs_variance` (
);

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
(1, 'Fname12', 'admin1', 'ZFVoU1lTcFBreTAvVW9QanpPY2hyUT09OjoYqj8sGcDBsx14ui2i9zDA'),
(2, 'Fname2', 'admin2', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(3, 'Fname3', 'admin3', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(4, 'Fname4', 'admin4', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(5, 'Fname5', 'admin5', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(6, 'Fname6', 'admin6', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(7, 'Fname7', 'admin7', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(8, 'Fname8', 'admin8', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(9, 'Fname9', 'admin9', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(10, 'Fname10', 'admin10', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(11, 'Fname11', 'admin11', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(12, 'Fname12', 'admin12', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(13, 'Fname13', 'admin13', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(14, 'Fname14', 'admin14', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz'),
(15, 'Fname15', 'admin15', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz');

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
(5, 'Infrastructure Development'),
(9, '2');

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
(14, 725233, 'Masters', '12', '12', '12', '2012', 12),
(15, 725233, 'Bachelors', '12', '12', '12', '2012', 12),
(16, 535950, 'Doctorate', 'qwe', 'qwe', 'qwe', '0000', 0),
(17, 535950, 'Masters', 'qwe', 'qwwqe', '213', '0000', 123);

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
(1, 'employee1', 'd3RtUmhscGVHdnBGODcyQXc2TVJpUT09OjoQzzGxx8PFH5rlg3wAwuW8', 'John', 'A', 'Doe', 'Male', 12, '1900-01-01', 'Unknown', 'Single', '1234567890', 'john.doe@example.com', 'teaching'),
(2, 'employee2', 'cjNTc0Zucm9CZ3lLdEtDMlgwazRwUT09OjoDliekFBWujxB+7iokE91y', 'Jane', 'B', 'Smith', 'Male', 45, '1900-01-01', 'Unknown', 'Single', '2345678901', 'jane.smith@example.com', 'non-teaching'),
(3, 'employee3', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'Mike', 'C', 'Johnson', 'Male', 23, '1900-01-01', 'Unknown', 'Single', '3456789012', 'mike.johnson@example.com', 'teaching'),
(4, 'employee4', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'Emily', 'D', 'Williams', 'Female', 6, '1900-01-01', 'Unknown', 'Single', '4567890123', 'emily.williams@example.com', 'teaching'),
(5, 'employee5', 'YzRpR0lSampybElPaXFUYVZ5eS9aZz09OjogiVxV7/ZeEqeeJBJATYpz', 'David', 'E', 'Brown', 'Other', 3, '1900-01-01', 'Unknown', 'Single', '5678901234', 'david.brown@example.com', 'teaching'),
(535950, '213', 'U0FxRHpDWXhHcU5YWW1wM0hIaEF4Zz09OjoJmdJf4RiQv0MXq+tOUyZp', '123', '12312', '1231', 'Female', 123, '2025-01-02', '213', 'Married', '123', '123@email.com', 'non-teaching'),
(725233, '12', 'UDdjTFZudHJicVBpb3ZNMlU5UXlVdz09OjpW3Av5qXskS9nWhm6Nx54M', '12', '12', '12', 'Female', 12, '2025-01-15', '12', 'Married', '12', '12@email.com', 'teaching');

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
(13, 1, '234', '345'),
(14, 725233, '12', '12'),
(15, 725233, '12', '12'),
(16, 535950, 'License22', '23'),
(17, 535950, '123', '23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `operational_plan_full`
-- (See below for the actual view)
--
CREATE TABLE `operational_plan_full` (
`development_area_id` int(11)
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
(10, '1-1-1', 7, '200 tasks completed', '100.00', 'Met'),
(11, '1-2-2', 8, '15 training sessions', '80.00', 'Ongoing'),
(12, '2-3-3', 9, '450 participants engaged', '50.00', 'Partially Met'),
(13, '4-5-5', 10, '1000 units delivered', '0.00', 'Met'),
(14, '9-9-9', 11, 'Project halted', '200.00', 'Unmet'),
(15, '1-1-1', 12, 'Site inspections conducted', '100.00', 'Met'),
(16, '1-2-2', 13, 'Reports finalized', '10.00', 'Unmet'),
(17, '2-3-3', 14, 'Testing phases executed', '20.00', 'Partially Met'),
(18, '4-5-5', 15, 'Deliverables reviewed', '30.00', 'Ongoing'),
(19, '9-9-9', 16, 'Materials sourced', '5.00', 'Met'),
(20, '1-1-1', 17, 'Data analysis completed', '12.00', 'Met'),
(21, '1-2-2', 18, 'Stakeholder meetings held', '15.00', 'Partially Met'),
(22, '2-3-3', 19, 'Marketing campaigns launched', '7.00', 'Ongoing'),
(23, '4-5-5', 20, 'Workshops facilitated', '100.00', 'Met'),
(24, '9-9-9', 21, 'Baseline surveys completed', '0.00', 'Not Applicable'),
(25, '1-1-1', 22, 'Technical evaluations done', '25.00', 'Unmet'),
(26, '1-2-2', 23, 'Budget utilization assessed', '40.00', 'Partially Met'),
(27, '2-3-3', 24, 'Community outreach conducted', '100.00', 'Met'),
(28, '4-5-5', 25, 'Infrastructure upgraded', '70.00', 'Ongoing'),
(29, '9-9-9', 26, 'Policy reviews completed', '0.00', 'Met');

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
(9, 9, '3'),
(11, 5, 'Carbon Footprint Reduction');

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
(1, 1, 'Small Business Grants', 'Number of businesses funded', 'Economic Development Office', 'Identify 50 eligible businesses', 'Approve 40 grants', 'Disburse funds to 35 businesses', 'Monitor performance of grantees', 5000.00, 'Government', 'Limited funding', 'Moderate', 'Increase grant applications'),
(2, 2, 'Expand Welfare Programs', 'Number of people enrolled', 'Social Welfare Office', 'Launch outreach campaigns', 'Register 200 individuals', 'Enroll 300 new beneficiaries', 'Evaluate program impact', 20000.00, 'International Aid', 'Underfunding', 'High', 'Seek additional donors'),
(3, 3, 'Upgrade Clinics', 'Number of clinics upgraded', 'Healthcare Department', 'Assess 10 clinics', 'Complete upgrades for 5 clinics', 'Initiate upgrades for 5 more clinics', 'Conduct quality checks', 30000.00, 'Health Ministry', 'Construction delays', 'High', 'Secure early contractors'),
(4, 4, 'Install Solar Panels', 'Amount of energy saved', 'Environment Office', 'Identify 10 locations', 'Install panels in 5 sites', 'Expand to 10 additional sites', 'Train local staff on maintenance', 10000.00, 'Private Sector', 'Regulatory hurdles', 'Moderate', 'Engage with local government'),
(5, 5, 'Online Learning Platforms', 'Number of students enrolled', 'Education Department', 'Develop curriculum', 'Train 50 teachers', 'Enroll 200 students', 'Evaluate student progress', 15000.00, 'Government', 'Technology gaps', 'Low', 'Provide training programs'),
(6, 1, 'Small Business Grants Phase 2', 'Number of businesses funded', 'Economic Development Office', 'Advertise program', 'Shortlist 30 businesses', 'Disburse grants to 20 businesses', 'Gather feedback', 6000.00, 'Private Sector', 'Limited funding', 'Moderate', 'Engage more private donors'),
(7, 3, 'Healthcare Training Programs', 'Number of healthcare workers trained', 'Healthcare Department', 'Design training modules', 'Conduct workshops for 50 workers', 'Expand to 100 workers', 'Assess skill improvement', 12000.00, 'Government', 'Lack of participation', 'Moderate', 'Offer incentives for attendance'),
(8, 4, 'Community Tree Planting', 'Number of trees planted', 'Environment Office', 'Coordinate with local NGOs', 'Plant 500 saplings', 'Maintain planted areas', 'Conduct growth assessment', 8000.00, 'Community Fund', 'Low community participation', 'Low', 'Organize awareness drives'),
(9, 2, 'Food Distribution Drives', 'Number of families supported', 'Social Welfare Office', 'Identify 100 families', 'Distribute food packs to 50 families', 'Expand to 150 families', 'Evaluate distribution impact', 10000.00, 'NGO Donations', 'Logistical challenges', 'Moderate', 'Partner with local suppliers'),
(10, 5, 'Digital Literacy Programs', 'Number of participants trained', 'Education Department', 'Recruit 100 participants', 'Conduct 5 workshops', 'Certify 80 participants', 'Collect feedback for improvement', 14000.00, 'Private Sector', 'Limited resources', 'Low', 'Collaborate with tech companies'),
(11, 1, 'Startup Incubation Support', 'Number of startups supported', 'Economic Development Office', 'Select 10 startups', 'Provide funding for 5 startups', 'Mentor 10 startups', 'Track startup growth', 18000.00, 'Venture Capital', 'High dropout rate', 'Moderate', 'Provide additional mentoring'),
(12, 2, 'Senior Citizen Welfare', 'Number of senior citizens assisted', 'Social Welfare Office', 'Survey 100 senior citizens', 'Provide services to 50 seniors', 'Expand to 150 seniors', 'Analyze feedback', 12000.00, 'Government', 'Low awareness', 'Low', 'Run awareness campaigns'),
(13, 3, 'Rural Health Clinics', 'Number of clinics operationalized', 'Healthcare Department', 'Identify rural locations', 'Set up 3 clinics', 'Train 10 staff per clinic', 'Evaluate patient feedback', 25000.00, 'Health Ministry', 'High operational costs', 'High', 'Optimize resource allocation'),
(14, 4, 'Water Conservation Programs', 'Amount of water saved', 'Environment Office', 'Conduct surveys', 'Install water-saving devices in 10 homes', 'Expand to 20 homes', 'Monitor usage patterns', 11000.00, 'International Aid', 'Community resistance', 'Moderate', 'Provide incentives for participation'),
(15, 5, 'School Meal Programs', 'Number of students fed', 'Education Department', 'Identify 5 schools', 'Distribute meals to 200 students', 'Expand to 500 students', 'Collect nutritional data', 20000.00, 'Government', 'Food supply issues', 'Moderate', 'Partner with local farms'),
(16, 1, 'Business Loan Program', 'Number of loans issued', 'Economic Development Office', 'Advertise program', 'Approve 30 applications', 'Disburse 20 loans', 'Monitor loan repayment', 15000.00, 'Banking Sector', 'Loan defaults', 'High', 'Provide financial literacy training'),
(17, 2, 'Emergency Relief Fund', 'Number of people assisted', 'Social Welfare Office', 'Set up helpline', 'Disburse funds to 50 families', 'Expand to 100 families', 'Audit fund usage', 18000.00, 'Government', 'Misuse of funds', 'High', 'Implement strict monitoring'),
(18, 3, 'Vaccination Drives', 'Number of people vaccinated', 'Healthcare Department', 'Identify target groups', 'Administer 500 vaccines', 'Expand to 1000 vaccines', 'Evaluate vaccination rates', 22000.00, 'Health Ministry', 'Vaccine hesitancy', 'Moderate', 'Run public awareness campaigns'),
(19, 4, 'Recycling Initiatives', 'Amount of waste recycled', 'Environment Office', 'Launch recycling campaign', 'Install 5 recycling bins', 'Collect and process waste', 'Report outcomes', 8000.00, 'Private Sector', 'Low participation', 'Low', 'Engage schools and communities'),
(20, 5, 'Teacher Training Programs', 'Number of teachers trained', 'Education Department', 'Identify training needs', 'Train 50 teachers', 'Expand training to 100 teachers', 'Assess teaching outcomes', 13000.00, 'Government', 'Limited budget', 'Moderate', 'Apply for grants');

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
(5, 5, 'Implement Digital Learning Tools'),
(9, 9, '3');

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
(4, 4, 8, 5, 'General', 'HIST102', 'World History', 3),
(5, 5, 14, 2, 'Academic', 'BIO405', 'Genetics', 3),
(6, 2, 9, 3, 'General', 'ENG2014', 'Advanced English Literature', 2),
(7, 1, 121, 61, 'Academic', 'CS10131', 'Introduction to Computer Science', 31),
(8, 1, 121, 61, 'General', '12', '12', 12),
(9, 725233, 12, 12, 'Academic', '12', '12', 12),
(10, 725233, 12, 12, 'Academic', '12', '12', 12);

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
(6, 725233, '2025-01-01', 12, 'Full Time', 'Temporary', 'Professor II', '12', 12.00),
(7, 535950, '2025-01-23', 12, 'Full Time', 'Temporary', 'Professor IV', '12', 12.00);

-- --------------------------------------------------------

--
-- Structure for view `actual_accomplishments_vs_variance`
--
DROP TABLE IF EXISTS `actual_accomplishments_vs_variance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `actual_accomplishments_vs_variance`  AS SELECT `operational_plan_view`.`development_area` AS `development_area`, sum(`operational_plan_view`.`actual_accomplishments`) AS `total_accomplishments`, sum(`operational_plan_view`.`variance`) AS `total_variance` FROM `operational_plan_view` GROUP BY `operational_plan_view`.`development_area` ;

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
-- Structure for view `operational_plan_full`
--
DROP TABLE IF EXISTS `operational_plan_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_full`  AS SELECT `da`.`id` AS `development_area_id`, `da`.`name` AS `development_area_name`, `o`.`id` AS `outcome_id`, `o`.`name` AS `outcome_name`, `s`.`id` AS `strategy_id`, `s`.`name` AS `strategy_name`, concat(`da`.`id`,'-',`o`.`id`,'-',`s`.`id`) AS `unique_id`, `p`.`id` AS `pap_id`, `p`.`name` AS `pap_name`, `p`.`performance_indicator` AS `performance_indicator`, `p`.`personnel_office_concerned` AS `personnel_office_concerned`, `p`.`quarterly_target_q1` AS `quarterly_target_q1`, `p`.`quarterly_target_q2` AS `quarterly_target_q2`, `p`.`quarterly_target_q3` AS `quarterly_target_q3`, `p`.`quarterly_target_q4` AS `quarterly_target_q4`, `p`.`total_estimated_cost` AS `total_estimated_cost`, `p`.`funding_source` AS `funding_source`, `p`.`risks` AS `risks`, `p`.`assessment_of_risk` AS `assessment_of_risk`, `p`.`mitigating_activities` AS `mitigating_activities` FROM (((`development_area` `da` left join `outcome` `o` on(`o`.`development_area_id` = `da`.`id`)) left join `strategy` `s` on(`s`.`outcome_id` = `o`.`id`)) left join `pap` `p` on(`p`.`strategy_id` = `s`.`id`)) ;

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
-- Structure for view `operational_plan_view`
--
DROP TABLE IF EXISTS `operational_plan_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_view`  AS SELECT `operational_plan_monitoring_matrix`.`id` AS `id`, `operational_plan_monitoring_matrix`.`opmm_fid` AS `opmm_fid`, `operational_plan_monitoring_matrix`.`m_pap_id` AS `m_pap_id`, `operational_plan_monitoring_matrix`.`actual_accomplishments` AS `actual_accomplishments`, `operational_plan_monitoring_matrix`.`variance` AS `variance`, `operational_plan_monitoring_matrix`.`remarks` AS `remarks`, `operational_plan_full`.`development_area_id` AS `development_area_id`, `operational_plan_full`.`development_area_name` AS `development_area_name`, `operational_plan_full`.`outcome_id` AS `outcome_id`, `operational_plan_full`.`outcome_name` AS `outcome_name`, `operational_plan_full`.`strategy_id` AS `strategy_id`, `operational_plan_full`.`strategy_name` AS `strategy_name`, `operational_plan_full`.`unique_id` AS `unique_id`, `operational_plan_full`.`pap_id` AS `pap_id`, `operational_plan_full`.`pap_name` AS `pap_name`, `operational_plan_full`.`performance_indicator` AS `performance_indicator`, `operational_plan_full`.`personnel_office_concerned` AS `personnel_office_concerned`, `operational_plan_full`.`quarterly_target_q1` AS `quarterly_target_q1`, `operational_plan_full`.`quarterly_target_q2` AS `quarterly_target_q2`, `operational_plan_full`.`quarterly_target_q3` AS `quarterly_target_q3`, `operational_plan_full`.`quarterly_target_q4` AS `quarterly_target_q4`, `operational_plan_full`.`total_estimated_cost` AS `total_estimated_cost`, `operational_plan_full`.`funding_source` AS `funding_source`, `operational_plan_full`.`risks` AS `risks`, `operational_plan_full`.`assessment_of_risk` AS `assessment_of_risk`, `operational_plan_full`.`mitigating_activities` AS `mitigating_activities` FROM (`operational_plan_monitoring_matrix` join `operational_plan_full` on(`operational_plan_full`.`unique_id` = `operational_plan_monitoring_matrix`.`opmm_fid`)) WHERE `operational_plan_monitoring_matrix`.`m_pap_id` = `operational_plan_full`.`pap_id` ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725234;

--
-- AUTO_INCREMENT for table `licensesandorganizations`
--
ALTER TABLE `licensesandorganizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `operational_plan_monitoring_matrix`
--
ALTER TABLE `operational_plan_monitoring_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `outcome`
--
ALTER TABLE `outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pap`
--
ALTER TABLE `pap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `strategy`
--
ALTER TABLE `strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachingload`
--
ALTER TABLE `teachingload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workinfo`
--
ALTER TABLE `workinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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