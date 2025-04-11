-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 06:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `house_number` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `house_number`, `street`, `city`, `postcode`, `created_at`, `updated_at`) VALUES
(1, '456', 'Elm Street', 'Rivertown', 'NW1 6XE', '2025-04-11 15:13:42', '2025-04-11 15:13:42'),
(2, '789', 'Pine Avenue', 'Hillview', 'NW1 6XE', '2025-04-11 15:15:37', '2025-04-11 15:15:37'),
(3, '321 ', 'Maple Street', 'Lakewood', 'WA98 1ER', '2025-04-11 15:17:41', '2025-04-11 15:17:41'),
(4, '654', 'Cedar Drive', 'Northville', 'NY12 1ER', '2025-04-11 15:19:21', '2025-04-11 15:19:21'),
(5, '987', 'Oak Lane', 'Brooktown', 'FL32 3CV', '2025-04-11 15:20:59', '2025-04-11 15:20:59'),
(6, '135', 'Birch Boulevard', 'Greenfield', 'PA17 2RT', '2025-04-11 15:22:53', '2025-04-11 15:22:53'),
(7, '246', 'Fir Circle', 'Eastwood', 'NV89 5CD', '2025-04-11 15:24:52', '2025-04-11 15:24:52'),
(8, '357', 'Spruce Way', 'Southtown', 'NY11 9UY', '2025-04-11 15:26:49', '2025-04-11 15:26:49'),
(9, '468', 'Chestnut Street', 'Westport', 'TX 77002', '2025-04-11 15:28:28', '2025-04-11 15:28:28'),
(10, '579', 'Maplewood Drive', 'Hillcrest', 'CA91 2TH', '2025-04-11 15:29:48', '2025-04-11 15:29:48'),
(11, '680', 'Oakwood Avenue', 'Central City', 'OR97 0HB', '2025-04-11 15:31:26', '2025-04-11 15:31:26'),
(12, '791', 'Pinehill Road', 'Meadowbrook', 'FL32 1VB', '2025-04-11 15:32:54', '2025-04-11 15:32:54'),
(13, '802', 'Cedarwood Lane', 'Northville', 'TX75 0VB', '2025-04-11 15:34:31', '2025-04-11 15:34:31'),
(14, '913', 'Maple Avenue', 'Greenfield', 'PA17 2GH', '2025-04-11 15:35:56', '2025-04-11 15:35:56'),
(15, '124 ', 'Fir Street', 'Brooktown', 'FL32 1HY', '2025-04-11 15:38:12', '2025-04-11 15:38:12'),
(16, '235', 'Birch Boulevard', 'Hillview', 'NY11 5VD', '2025-04-11 15:40:28', '2025-04-11 15:40:28'),
(17, '346', 'Spruce Street', 'Eastwood', 'NY12 5VD', '2025-04-11 15:42:42', '2025-04-11 15:42:42'),
(18, '23', 'Elm Boulevard', 'Centralville', 'NY21 5VD', '2025-04-11 15:42:42', '2025-04-11 15:42:42'),
(19, '25', 'Oak Lane', 'Hillview', 'NY81 7VD', '2025-04-11 15:42:42', '2025-04-11 15:42:42'),
(20, '285', 'Boulevard', 'View', 'BG11 5VD', '2025-04-11 15:42:42', '2025-04-11 15:42:42'),
(21, '12 ', 'Oakridge Rd', 'Leeds', 'LS8 1RF', '2025-04-11 16:55:49', '2025-04-11 16:55:49'),
(22, '7 ', 'Meadow View', 'Bristol', 'BS5 9TL	', '2025-04-11 17:02:34', '2025-04-11 17:02:34'),
(23, '33', ' Kingsley St', 'Leicester', 'LE3 0QQ', '2025-04-11 17:05:11', '2025-04-11 17:05:11'),
(24, '8 ', 'Rosebank Ave', 'Manchester', 'M16 9PJ	', '2025-04-11 17:08:06', '2025-04-11 17:08:06'),
(25, '21 ', 'Sycamore Rd', 'Nottingham', 'NG5 6HN', '2025-04-11 17:10:34', '2025-04-11 17:10:34'),
(26, '45 ', 'Greenhill Dr', 'Birmingham', 'B13 8YD', '2025-04-11 17:13:08', '2025-04-11 17:13:08'),
(27, '18 ', 'Riverside Close', 'Cardiff', 'CF14 3ED', '2025-04-11 17:15:53', '2025-04-11 17:15:53'),
(28, '92 ', 'Penarth Rd', ' Cardiff', 'CF10 5HR', '2025-04-11 17:18:27', '2025-04-11 17:18:27'),
(29, '14 ', 'Lavender Way', 'London', 'N12 8HF', '2025-04-11 17:20:43', '2025-04-11 17:20:43'),
(30, '5 ', 'Fox Hollow', 'Sheffield', 'S7 2QE', '2025-04-11 17:23:10', '2025-04-11 17:23:10'),
(31, '66 ', 'Windmill Lane', 'Luton', 'LU2 0PT', '2025-04-11 17:25:28', '2025-04-11 17:25:28'),
(32, '39', 'Elm Grove, ', 'Coventry, ', 'CV3 5BQ', '2025-04-11 17:30:09', '2025-04-11 17:30:09'),
(33, '23 ', 'Bridge Lane', 'Oxford', 'OX2 6DG', '2025-04-11 17:32:45', '2025-04-11 17:32:45'),
(34, '71 ', 'Poplar St', 'Glasgow', 'G41 3AS', '2025-04-11 17:35:08', '2025-04-11 17:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(15) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `building` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `current_capacity` int(11) NOT NULL CHECK (`current_capacity` <= `capacity`),
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `class_name`, `building`, `capacity`, `current_capacity`, `teacher_id`, `created_at`, `updated_at`) VALUES
(5, '1', 'Reception_01', 'B01', 30, 27, 1, '2025-04-11 16:41:46', '2025-04-11 16:55:49'),
(6, '2', 'Year One_01', 'B01', 30, 29, 2, '2025-04-11 16:42:27', '2025-04-11 17:05:11'),
(7, '3', 'Year Two_01', 'B01', 30, 24, 3, '2025-04-11 16:43:08', '2025-04-11 17:20:43'),
(8, '3', 'Year Two_02', 'B02', 30, 30, 4, '2025-04-11 16:43:32', '2025-04-11 17:32:45'),
(9, '4', 'Year Three_01', 'B01', 30, 30, 5, '2025-04-11 16:43:58', '2025-04-11 17:15:53'),
(10, '5', 'Year Four_02', 'B02', 30, 28, 6, '2025-04-11 16:44:22', '2025-04-11 17:35:08'),
(11, '6', 'Year Five_02', 'B02', 30, 30, 7, '2025-04-11 16:45:22', '2025-04-11 17:02:34'),
(12, '7', 'Year Six_01', 'B01', 30, 24, 8, '2025-04-11 16:45:50', '2025-04-11 17:18:27'),
(13, '7', 'Year Six_02', 'B02', 30, 22, 9, '2025-04-11 16:46:33', '2025-04-11 16:46:33'),
(14, '1', 'Reception_02', 'B02', 30, 30, 10, '2025-04-11 16:47:26', '2025-04-11 16:47:26'),
(15, '6', 'Year Five_01', 'B01', 30, 30, 15, '2025-04-11 16:48:12', '2025-04-11 16:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `class_year`
--

CREATE TABLE `class_year` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_year`
--

INSERT INTO `class_year` (`id`, `class`) VALUES
(1, 'Reception Year'),
(6, 'Year Five'),
(5, 'Year Four'),
(2, 'Year One'),
(7, 'Year Six'),
(4, 'Year Three'),
(3, 'Year Two');

-- --------------------------------------------------------

--
-- Table structure for table `parent_guardians`
--

CREATE TABLE `parent_guardians` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `guardian_telephone` varchar(20) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_guardians`
--

INSERT INTO `parent_guardians` (`id`, `first_name`, `last_name`, `guardian_email`, `guardian_telephone`, `address_id`, `created_at`, `updated_at`) VALUES
(1, 'Sarah ', 'Carter', 'sarah.carter@fakemail.co.uk', '07845 223301', 21, '2025-04-11 16:55:49', '2025-04-11 16:55:49'),
(2, 'Dave', 'Carther', 'dave.carter@fakemail.co.uk', '07845 223302', 21, '2025-04-11 16:55:49', '2025-04-11 16:55:49'),
(3, 'Dacid', 'Brown', 'david.brown7@fakemail.co.uk', '07712 334522', 22, '2025-04-11 17:02:34', '2025-04-11 17:02:34'),
(4, 'Lucy', 'Brown', 'lucy.brown7@fakemail.co.uk', '07712 334523', 22, '2025-04-11 17:02:34', '2025-04-11 17:02:34'),
(5, 'Girish', 'Patel', 'girish.patel33@fakemail.co.uk', '07411 678922', 23, '2025-04-11 17:05:11', '2025-04-11 17:05:11'),
(6, 'Neha', 'Patel', 'neha.patel33@fakemail.co.uk', '07411 678923', 23, '2025-04-11 17:05:11', '2025-04-11 17:05:11'),
(7, 'James', 'Thompson', 'james.thompson8@fakemail.co.uk', '07678 554331', 24, '2025-04-11 17:08:06', '2025-04-11 17:08:06'),
(8, 'Emma', 'Thompson', 'emma.thompson8@fakemail.co.uk', '07678 554332', 24, '2025-04-11 17:08:06', '2025-04-11 17:08:06'),
(9, 'Claire', 'Walker', 'claire.walker21@fakemail.co.uk', '07523 989455', 25, '2025-04-11 17:10:34', '2025-04-11 17:10:34'),
(10, 'John', 'Walker', 'john.walker21@fakemail.co.uk', '07523 989456', 25, '2025-04-11 17:10:34', '2025-04-11 17:10:34'),
(11, 'Aarti', 'Khan', 'aarti.khan45@fakemail.co.uk', '07987 456122', 26, '2025-04-11 17:13:08', '2025-04-11 17:13:08'),
(12, 'Farah', 'Khan', 'farah.khan45@fakemail.co.uk', '07987 456123', 26, '2025-04-11 17:13:08', '2025-04-11 17:13:08'),
(13, 'Megan', 'Evans', 'megan.evans18@fakemail.co.uk', '07866 334498', 27, '2025-04-11 17:15:53', '2025-04-11 17:15:53'),
(14, 'George', 'Evans', 'george.evans18@fakemail.co.uk', '07866 334499', 27, '2025-04-11 17:15:53', '2025-04-11 17:15:53'),
(15, 'Claire', 'O\'Neill', 'claire.oneill92@fakemail.co.uk', '07098 765332', 28, '2025-04-11 17:18:27', '2025-04-11 17:18:27'),
(16, 'Tom', 'O\'Neill', 'tom.oneill92@fakemail.co.uk', '07098 765333', 28, '2025-04-11 17:18:27', '2025-04-11 17:18:27'),
(17, 'Rachel', 'Wright', 'rachel.wright14@fakemail.co.uk', '07711 555847', 29, '2025-04-11 17:20:43', '2025-04-11 17:20:43'),
(18, 'Bill', 'Wright', 'bill.wright14@fakemail.co.uk', '07711 555848', 29, '2025-04-11 17:20:43', '2025-04-11 17:20:43'),
(19, 'Hannah ', 'Green', 'hannah.green5@fakemail.co.uk', '07322 144653', 30, '2025-04-11 17:23:10', '2025-04-11 17:23:10'),
(20, 'Cornel', 'Green', 'cornel.green5@fakemail.co.uk', '07322 144654', 30, '2025-04-11 17:23:10', '2025-04-11 17:23:10'),
(21, 'Yasmin', 'Ahmed', 'yasmin.ahmed66@fakemail.co.uk', '07901 232454', 31, '2025-04-11 17:25:28', '2025-04-11 17:25:28'),
(22, 'Mohad', 'Ahmed', 'mohad.ahmed66@fakemail.co.uk', '07901 232455', 31, '2025-04-11 17:25:28', '2025-04-11 17:25:28'),
(23, 'Helen ', 'Robinson', 'helen.robinson39@fakemail.co.uk', '07654 122876', 32, '2025-04-11 17:30:09', '2025-04-11 17:30:09'),
(24, 'Michael', 'Robinson', 'mike.robinson39@fakemail.co.uk', '07654 122877', 32, '2025-04-11 17:30:09', '2025-04-11 17:30:09'),
(25, 'Laura ', 'Murphy', 'laura.murphy23@fakemail.co.uk', '07123 889400', 33, '2025-04-11 17:32:45', '2025-04-11 17:32:45'),
(26, 'John', 'Murphy', 'john.murphy23@fakemail.co.uk', '07123 889401', 33, '2025-04-11 17:32:45', '2025-04-11 17:32:45'),
(27, 'Victoria ', 'Hall', 'victoria.hall71@fakemail.co.uk', '07832 765992', 34, '2025-04-11 17:35:08', '2025-04-11 17:35:08'),
(28, 'Dave', 'Hall', 'dave.hall71@fakemail.co.uk', '07832 765993', 34, '2025-04-11 17:35:08', '2025-04-11 17:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `parent_one` int(11) DEFAULT NULL,
  `parent_two` int(11) DEFAULT NULL,
  `medical_information` text DEFAULT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `pupil_email` varchar(255) NOT NULL,
  `pupil_ID` varchar(10) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`id`, `first_name`, `last_name`, `address_id`, `parent_one`, `parent_two`, `medical_information`, `class_name`, `birth_date`, `sex`, `pupil_email`, `pupil_ID`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Amelia', 'Carter', 21, 1, 2, 'n/a', 'Reception_01', '2021-02-01', 'Female', 'amelia.carter12@fakemail.co.uk', 'P01', '07456 890321', '2025-04-11 16:55:49', '2025-04-11 16:55:49'),
(2, 'Ethan ', 'Brown', 22, 3, 4, 'n/a', 'Year Five_02', '2018-03-01', 'Male', 'ethan.brown7@fakemail.co.uk', 'P02', '07544 213876	', '2025-04-11 17:02:34', '2025-04-11 17:02:34'),
(3, 'Isla', 'Patel	', 23, 5, 6, 'nuts allergy', 'Year One_01', '2020-04-03', 'Male', 'isla.patel33@fakemail.co.uk', 'P03', '07921 654098	', '2025-04-11 17:05:11', '2025-04-11 17:05:11'),
(4, 'Leo', 'Thompson', 24, 7, 8, '', 'Year Three_01', '2019-06-05', 'Male', 'leo.thompson8@fakemail.co.uk', 'P04', '07344 231090	', '2025-04-11 17:08:06', '2025-04-11 17:08:06'),
(5, 'Ava', 'Walker', 25, 9, 10, 'n/a', 'Year Two_01', '2018-03-01', 'Female', 'ava.walker21@fakemail.co.uk', 'P05', '07789 120034	', '2025-04-11 17:10:34', '2025-04-11 17:10:34'),
(6, 'Oliver', 'Khan', 26, 11, 12, 'n/a', 'Year Four_02', '2018-09-07', 'Male', 'oliver.khan45@fakemail.co.uk', 'P06', '07122 987654	', '2025-04-11 17:13:08', '2025-04-11 17:13:08'),
(7, 'Sophia', 'Evans', 27, 13, 14, 'n/a', 'Year Three_01', '2019-07-01', 'Female', 'sophia.evans18@fakemail.co.uk', 'P07', '07233 908711	', '2025-04-11 17:15:53', '2025-04-11 17:15:53'),
(8, 'Jacob', 'O\'Neill', 28, 15, 16, 'n/a', 'Year Six_01', '2017-04-23', 'Male', 'jacob.oneill92@fakemail.co.uk', 'P08', '07654 998211', '2025-04-11 17:18:27', '2025-04-11 17:18:27'),
(9, 'Emily ', 'Wright', 29, 17, 18, 'nuts allergy', 'Year Two_01', '2018-09-12', 'Female', 'emily.wright14@fakemail.co.uk', 'P09', '07512 110943	', '2025-04-11 17:20:43', '2025-04-11 17:20:43'),
(10, 'Noah', 'Green', 30, 19, 20, 'n/a', 'Year Two_02', '2019-12-17', 'Male', 'noah.green5@fakemail.co.uk', 'P10', '07998 200198', '2025-04-11 17:23:10', '2025-04-11 17:23:10'),
(11, 'Lily', 'Ahmed', 31, 21, 22, 'n/a', 'Year Two_02', '2019-07-21', 'Female', 'lily.ahmed66@fakemail.co.uk', 'P11', '07432 129440', '2025-04-11 17:25:28', '2025-04-11 17:25:28'),
(12, 'Grace', 'Robinson', 32, 23, 24, 'n/a', 'Year Four_02', '2018-12-11', 'Female', 'grace.robinson39@fakemail.co.uk', 'P13', '07345 900123', '2025-04-11 17:30:09', '2025-04-11 17:30:09'),
(13, 'Benjamin ', 'Murphy', 33, 25, 26, 'n/a', 'Year Two_02', '2020-05-30', 'Male', 'ben.murphy23@fakemail.co.uk', 'P14', '07456 334198', '2025-04-11 17:32:45', '2025-04-11 17:32:45'),
(14, 'Mia', 'Hall', 34, 27, 28, 'n/a', 'Year Four_02', '2018-08-17', 'Female', 'mia.hall71@fakemail.co.uk', 'P15', '07712 889000', '2025-04-11 17:35:08', '2025-04-11 17:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_telephone` varchar(20) NOT NULL,
  `annual_salary` decimal(10,2) NOT NULL,
  `background_check` tinyint(1) NOT NULL,
  `class` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `working_hours` int(11) NOT NULL,
  `educational_qualifications` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `address_id`, `teacher_email`, `teacher_telephone`, `annual_salary`, `background_check`, `class`, `birth_date`, `sex`, `working_hours`, `educational_qualifications`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Johnson', 1, 'johnj@gmail.com', '07700 900001', 5000.00, 1, '', '1978-11-22', 'Male', 30, 'M.A. in Education', '2025-04-11 15:13:42', '2025-04-11 15:13:42'),
(2, 'Maria', 'Garcia', 2, 'mariac@gmail.com', '07700 900004', 5000.00, 1, '', '1990-02-10', 'Female', 40, 'B.A. in Child Development', '2025-04-11 15:15:37', '2025-04-11 15:15:37'),
(3, 'David', 'Brown', 3, 'Davidb@gmail.com', '07700 900666', 5000.00, 1, '', '1980-04-05', 'Male', 40, 'B.S. in Biology', '2025-04-11 15:17:41', '2025-04-11 15:17:41'),
(4, 'Emily', 'Martinez', 4, 'EmilyM@gmail.com', '07555 906666', 5000.00, 1, '', '1988-09-12', 'Female', 40, 'B.A. in English', '2025-04-11 15:19:22', '2025-04-11 15:19:22'),
(5, 'Michael', 'Wilson', 5, 'michaelw@gmail.com', '07700 900005', 5000.00, 1, '', '1975-07-30', 'Male', 40, 'M.S. in Mathematics', '2025-04-11 15:20:59', '2025-04-11 15:20:59'),
(6, 'Jessica', 'Lee', 6, 'jessical@gmail.com', '07700 900006', 5000.00, 1, '', '1992-03-20', 'Female', 40, 'B.A. in Education', '2025-04-11 15:22:53', '2025-04-11 15:22:53'),
(7, 'Christopher', 'Taylor', 7, 'christ@gmail.com', '07700 900008', 5000.00, 1, '', '1983-01-15', 'Male', 40, 'M.A. in History', '2025-04-11 15:24:52', '2025-04-11 15:24:52'),
(8, 'Ashley', 'White', 8, 'ashley@gmail.com', '07700 900009', 50000.00, 1, '', '1995-06-05', 'Female', 40, 'B.A. in Early Childhood Education', '2025-04-11 15:26:49', '2025-04-11 15:26:49'),
(9, 'Daniel', 'Harris', 9, 'danielh@gmail.com', '07700 900010', 50000.00, 1, '', '1976-12-14', 'Male', 40, 'M.S. in Physics', '2025-04-11 15:28:28', '2025-04-11 15:28:28'),
(10, 'Rachel', 'Clark', 10, 'rachelc@gmail.com', '07700 900012', 50000.00, 1, '', '1987-08-09', 'Female', 40, 'B.A. in Literature', '2025-04-11 15:29:48', '2025-04-11 15:29:48'),
(11, 'Kevin', 'Young', 11, 'Keviny@gmail.com', '07700 900013', 50000.00, 1, '', '1981-10-25', 'Male', 40, 'M.S. in Chemistry', '2025-04-11 15:31:26', '2025-04-11 15:31:26'),
(12, 'Megan', 'King', 12, 'megank@gmail.com', '07700 900014', 50000.00, 1, '', '1991-04-18', 'Female', 40, 'B.A. in Mathematics', '2025-04-11 15:32:55', '2025-04-11 15:32:55'),
(13, 'Anthony', 'Lewis', 13, 'antl@gmail.com', '07700 900020', 50000.00, 1, '', '1984-04-03', 'Male', 40, 'M.S. in Biology', '2025-04-11 15:34:31', '2025-04-11 15:34:31'),
(14, 'Laura', 'Walker', 14, 'lauraw@gmail.com', '07700 900019', 50000.00, 1, '', '1989-07-07', 'Female', 40, 'B.A. in Education', '2025-04-11 15:35:56', '2025-04-11 15:35:56'),
(15, 'Paul', 'Jackson', 15, 'paulj@gmail.com', '07700 900018', 50000.00, 1, '', '1979-02-12', 'Male', 40, 'M.A. in History', '2025-04-11 15:38:12', '2025-04-11 15:38:12'),
(16, 'Emily', 'Thompson', 15, 'emily.thompson@example.com', '07700 900001', 35000.00, 1, '', '1985-03-12', 'Female', 35, 'B.Ed Primary Education', '2025-04-11 15:46:57', '2025-04-11 15:48:45'),
(17, 'James', 'Walker', 16, 'james.walker@example.com', '07700 900002', 42000.00, 1, '', '1979-07-23', 'Male', 37, 'PGCE Secondary Science', '2025-04-11 15:46:57', '2025-04-11 15:48:45'),
(18, 'Sophie', 'Green', 17, 'sophie.green@example.com', '07700 900003', 39000.00, 1, '', '1990-11-05', 'Female', 36, 'BA Education Studies', '2025-04-11 15:46:57', '2025-04-11 15:48:45'),
(19, 'Oliver', 'Johnson', 18, 'oliver.johnson@example.com', '07700 900004', 45000.00, 1, '', '1982-01-19', 'Male', 40, 'PGCE Primary', '2025-04-11 15:46:57', '2025-04-11 15:48:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_name` (`class_name`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `class_year`
--
ALTER TABLE `class_year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class` (`class`);

--
-- Indexes for table `parent_guardians`
--
ALTER TABLE `parent_guardians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guardian_email` (`guardian_email`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pupil_email` (`pupil_email`),
  ADD UNIQUE KEY `pupil_ID` (`pupil_ID`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `parent_one` (`parent_one`),
  ADD KEY `parent_two` (`parent_two`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_year`
--
ALTER TABLE `class_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent_guardians`
--
ALTER TABLE `parent_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `parent_guardians`
--
ALTER TABLE `parent_guardians`
  ADD CONSTRAINT `parent_guardians_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `pupils_ibfk_2` FOREIGN KEY (`parent_one`) REFERENCES `parent_guardians` (`id`),
  ADD CONSTRAINT `pupils_ibfk_3` FOREIGN KEY (`parent_two`) REFERENCES `parent_guardians` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
