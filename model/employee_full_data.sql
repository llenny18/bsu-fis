-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 06:36 AM
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
-- Structure for view `employee_full_data`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_full_data`  AS SELECT `ea`.`id` AS `employee_id`, `ea`.`username` AS `username`, `ea`.`first_name` AS `first_name`, `ea`.`middle_name` AS `middle_name`, `ea`.`last_name` AS `last_name`, `ea`.`sex` AS `sex`, `ea`.`age` AS `age`, `ea`.`date_of_birth` AS `date_of_birth`, `ea`.`place_of_origin` AS `place_of_origin`, `ea`.`civil_status` AS `civil_status`, `ea`.`contact_number` AS `contact_number`, `ea`.`email` AS `email`, `wi`.`Date_of_Appointment` AS `Date_of_Appointment`, `wi`.`Years_in_Service` AS `Years_in_Service`, `wi`.`Appointment_Status` AS `Appointment_Status`, `wi`.`Tenure_of_Employment` AS `Tenure_of_Employment`, `wi`.`Faculty_Rank` AS `Faculty_Rank`, `wi`.`Designation` AS `Designation`, `wi`.`Annual_Salary` AS `Annual_Salary`, `lo`.`Type` AS `License_Or_Organization_Type`, `lo`.`Name` AS `License_Or_Organization_Name`, `tl`.`Academic_Load_Units` AS `Academic_Load_Units`, `tl`.`General_Education_Units` AS `General_Education_Units`, `tl`.`Course_Type` AS `Course_Type`, `tl`.`Course_Code` AS `Course_Code`, `tl`.`Course_Title` AS `Course_Title`, `tl`.`Units` AS `Teaching_Units`, `ed`.`Level` AS `Education_Level`, `ed`.`Institution` AS `Education_Institution`, `ed`.`Degree` AS `Education_Degree`, `ed`.`Major_Specialization` AS `Education_Major_Specialization`, `ed`.`Year_Graduated` AS `Education_Year_Graduated`, `ed`.`Units_Earned` AS `Education_Units_Earned` FROM ((((`employee_accounts` `ea` join `workinfo` `wi` on(`ea`.`id` = `wi`.`employee_id`)) left join `licensesandorganizations` `lo` on(`ea`.`id` = `lo`.`employee_id`)) left join `teachingload` `tl` on(`ea`.`id` = `tl`.`employee_id`)) left join `education` `ed` on(`ea`.`id` = `ed`.`employee_id`)) ;

--
-- VIEW `employee_full_data`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
