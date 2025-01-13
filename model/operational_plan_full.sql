-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 10:47 AM
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
-- Structure for view `operational_plan_full`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `operational_plan_full`  AS SELECT `da`.`id` AS `development_area_id`, `da`.`name` AS `development_area_name`, `o`.`id` AS `outcome_id`, `o`.`name` AS `outcome_name`, `s`.`id` AS `strategy_id`, `s`.`name` AS `strategy_name`, concat(`da`.`id`,'-',`o`.`id`,'-',`s`.`id`) AS `unique_id`, `p`.`id` AS `pap_id`, `p`.`name` AS `pap_name`, `p`.`performance_indicator` AS `performance_indicator`, `p`.`personnel_office_concerned` AS `personnel_office_concerned`, `p`.`quarterly_target_q1` AS `quarterly_target_q1`, `p`.`quarterly_target_q2` AS `quarterly_target_q2`, `p`.`quarterly_target_q3` AS `quarterly_target_q3`, `p`.`quarterly_target_q4` AS `quarterly_target_q4`, `p`.`total_estimated_cost` AS `total_estimated_cost`, `p`.`funding_source` AS `funding_source`, `p`.`risks` AS `risks`, `p`.`assessment_of_risk` AS `assessment_of_risk`, `p`.`mitigating_activities` AS `mitigating_activities` FROM (((`development_area` `da` left join `outcome` `o` on(`o`.`development_area_id` = `da`.`id`)) left join `strategy` `s` on(`s`.`outcome_id` = `o`.`id`)) left join `pap` `p` on(`p`.`strategy_id` = `s`.`id`)) ;

--
-- VIEW `operational_plan_full`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
