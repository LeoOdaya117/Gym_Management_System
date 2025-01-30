-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 05:05 PM
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
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `IdNum` varchar(50) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(250) NOT NULL,
  `Username` varchar(34) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `AccountType` varchar(5) DEFAULT NULL,
  `membershipPlan` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `goalweight` float NOT NULL,
  `fitnessGoal` varchar(20) NOT NULL,
  `Height` int(123) DEFAULT NULL,
  `BMR` float DEFAULT NULL,
  `BMI` float NOT NULL,
  `DCT` float DEFAULT NULL,
  `ActLvl` varchar(250) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `qr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`IdNum`, `Firstname`, `Lastname`, `Username`, `Password`, `AccountType`, `membershipPlan`, `startDate`, `status`, `Age`, `Gender`, `Weight`, `goalweight`, `fitnessGoal`, `Height`, `BMR`, `BMI`, `DCT`, `ActLvl`, `photo`, `qr`) VALUES
('20240207001', 'Takumo', 'Odaya', '123@gmail.com', '$2y$10$ndpjB0TLsspDZ/gzQUqe9OJzKk/cCEBx0n3lBAZIFzMpaJOMvmG36', 'Admin', '', '0000-00-00', 'Active', 21, 'Male', 0, 0, '', 0, 0, 0, 0, '', 'img/uploads/371092194_2591406544369413_7783935305313956612_n.jpg', ''),
('20240207002', 'Leo', 'Odaya', '117@gmail.com', '$2y$10$nh./F3kMq00VYwSwSVg1Nu8Dlptnat9v.0nebOd6xd0INCFHSzz0.', 'User', '', '0000-00-00', 'Active', 22, 'Male', 96.3, 90, 'Loss Weight', 163, 2057.14, 35.5, 2468.56, 'Sedentary (little or no exercise)', 'img/uploads/IMG_20240122_192948.jpg', '../img/qr/20240207002.png'),
('20240207003', 'Noel', 'Hakobo', '1@gmail.com', '$2y$10$hBh6ZUg6w.aRu19Hc/9xrORZviE1x1lpGf5FY4O3447n2zbYy3Y7O', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207003.png'),
('20240207004', 'James', 'Bond', '456@gmail.com', '$2y$10$nireL04OCu47Fszu72HggOVQgMcUYsAIRGs9B43ryRzyCmimtSpVy', 'User', '', '0000-00-00', 'Active', 0, 'Male', 200, 0, '', 163, 0, 0, 0, '', 'img/17067760211804996097248656850938.jpg', '../img/qr/20240207004.png'),
('20240207005', 'Vino', 'Yambao', 'marvin_yambao@gmail.com', '$2y$10$zg0ltPC9tfXoqFLtz3glw.WgDAQgSqqRvNdLZrHZVwTumZCJurnkC', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207005.png'),
('20240207006', 'Arthur', 'Neri', 'arthur@gmail.com', '$2y$10$wlJurmm/jI8sDgnawANwNerF197Hqqqxe367I606HrbDJq/nxO9qG', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207006.png'),
('20240207007', 'allenix', 'laurel', 'allenix1117@gmail.com', '$2y$10$G0PDBF1m3XkNGMhWFQSSDe.cWddKC9t5CMLhz5rLc59H/Zsn/xgIq', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207007.png'),
('20240207008', 'John', 'Doe', 'bigtabobs04@gmail.com', '$2y$10$TMpmdcNgZ4qm/FvO3peiEOrMkRhQBxe6kAySCa/PV2kXx7.skzSUG', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207008.png'),
('20240207009', 'Jonathan', 'Lasti', 'Jojo@gmail.com', '$2y$10$kC7t0MyDHybq3PqPmpivgeSeUIAVEHaIZQDqwGDRlUcoD7JKFkO1C', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207009.png'),
('20240207010', 'LOYD', 'PAG ASA', 'gekoxa8829@ricorit.com', '$2y$10$PW2BqHLLlhQI7xwMm927cufxS54sw4ul67WAeFLNgVoEon/hCm666', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', 145, NULL, 0, NULL, '', '', '../img/qr/20240207010.png'),
('20240207011', 'Jolo', 'Pascual', '741@gmail.com', '$2y$10$bfGKzVchQO5GRv0z058uhuWVl.Hy4OFjog9GzueNF2rV.tu7yl8Nq', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207011.png'),
('20240207012', 'holand', 'laya', 'holand@gmail.com', '$2y$10$X8Rai77Ek28w4fdP8Kff9ey6rjswgjEf1h1P6RWlMfV2LD2A1QTei', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207012.png'),
('20240207013', 'jake', 'loto', 'gekoxa8829@ricorit.com', '$2y$10$1aI7U8LLEp4l9mMdYKNJueKmv5tUEYvgNT43k0HjHCcEFNdQm/Kn.', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240207013.png'),
('20240216014', 'George', 'Hernandez', '000@gmail.com', '$2y$10$uL6NgfRFlFdg3LGISavOfu3Jhby9LtrY2jsRWyiWshsugqHYyZUaK', 'User', '', '0000-00-00', 'Pending', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240216014.png'),
('20240217015', 'Jc', 'Nulial', 'jc.nulial@gmail.com', '$2y$10$M9//IOTfyCzsR7beJAuBqect17UwYCJxKWK1XpXFGfyBokKhq9pKm', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240217015.png'),
('20240219016', 'Don', 'Don', 'don@gmail.com', '$2y$10$vhBtiO7x1MjwcFe32oD1fuIH3IzeUCNSe5WFvX0PkoOXAibujzAIq', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', 'img/uploads/132-1327444_bart-simpson-spray-paint.png', '../img/qr/20240219016.png'),
('20240221017', 'Denver', 'Bundog', 'denverbundog0120@gmail.com', '$2y$10$PHUvrxn6EEUpqnhwMn30WuJRz4ZAsPiYB/i8StVAEMGQHQhlc6NBq', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', 'img/20240221017.png'),
('20240221018', 'Butch', 'Caramay', 'butchcaramay123@gmail.com', '$2y$10$abIK.o6j7w2SUm9mBMadi./u/Hia3RhnwJi5Sj.vyZ6mtEdJ75H7K', 'User', '', '0000-00-00', 'Active', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', 'img/uploads/1708521531781.jpg', '../img/qr/20240221018.png'),
('20240222019', 'Jessi', 'Carta', 'jessi1990@gmail.com', '$2y$10$j8Rmn2SpNO4XgdpZyqmEsOVszmz11ttHP38VDNhFr0p.IPZvNwfUq', 'User', '', '0000-00-00', 'Pending', NULL, NULL, NULL, 0, '', NULL, NULL, 0, NULL, '', '', '../img/qr/20240222019.png');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `FullName`, `timeIn`, `timeOut`) VALUES
(12, '20240207003', 'Noel Hakobo', '2024-02-07 15:59:16', '2024-02-07 16:00:20'),
(13, '20240219016', 'Arthur Neri', '2024-02-07 16:00:44', '2024-02-07 16:08:02'),
(14, '20240207007', 'allenix laurel', '2024-02-07 16:01:18', '0000-00-00 00:00:00'),
(15, '20240207008', 'John Doe', '2024-02-07 16:01:29', '0000-00-00 00:00:00'),
(16, '20240207009', 'Jonathan Lasti', '2024-02-07 16:01:38', '0000-00-00 00:00:00'),
(17, '20240207005', 'Vino Yambao', '2024-02-07 16:01:47', '0000-00-00 00:00:00'),
(18, '20240207010', 'LOYD PAG ASA', '2024-02-07 16:01:57', '0000-00-00 00:00:00'),
(19, '20240207012', 'holand laya', '2024-02-08 01:13:15', '2024-02-08 01:13:29'),
(20, '20240207004', 'James Bond', '2024-02-08 01:22:01', '0000-00-00 00:00:00'),
(22, '20240208015', 'Joland Jeez', '2024-02-08 09:21:28', '2024-02-08 09:21:40'),
(23, '20240207011', 'Jolo Pascual', '2024-02-14 08:48:03', '0000-00-00 00:00:00'),
(24, '20240219016', 'Arthur Neri', '2024-02-16 17:41:40', '0000-00-00 00:00:00'),
(26, '20240207004', 'James Bond', '2024-02-17 19:11:27', '0000-00-00 00:00:00'),
(27, '20240207004', 'James Bond', '2024-02-17 19:11:38', '0000-00-00 00:00:00'),
(29, '20240207004', 'James Bond', '2024-02-18 02:14:54', '2024-02-18 02:15:02'),
(414, '20240219016', 'Don Don', '2024-01-21 10:10:23', '2024-01-21 18:22:08'),
(415, '20240219016', 'Don Don', '2024-01-22 11:17:43', NULL),
(416, '20240219016', 'Don Don', '2024-01-23 18:40:00', NULL),
(417, '20240219016', 'Don Don', '2024-01-24 14:01:45', '2024-01-24 17:33:53'),
(418, '20240219016', 'Don Don', '2024-01-25 17:26:19', '2024-01-25 18:10:11'),
(419, '20240219016', 'Don Don', '2024-01-26 18:46:53', NULL),
(420, '20240219016', 'Don Don', '2024-01-27 12:46:46', '2024-01-27 18:19:33'),
(421, '20240219016', 'Don Don', '2024-01-28 13:50:33', '2024-01-28 17:42:05'),
(422, '20240219016', 'Don Don', '2024-01-29 09:05:10', '2024-01-29 18:46:03'),
(423, '20240219016', 'Don Don', '2024-01-30 12:45:10', NULL),
(424, '20240219016', 'Don Don', '2024-01-31 12:11:59', NULL),
(425, '20240219016', 'Don Don', '2024-02-01 18:49:45', NULL),
(426, '20240219016', 'Don Don', '2024-02-02 15:22:36', '2024-02-02 17:15:14'),
(427, '20240219016', 'Don Don', '2024-02-03 13:37:10', '2024-02-03 17:11:02'),
(428, '20240219016', 'Don Don', '2024-02-04 10:16:07', NULL),
(429, '20240219016', 'Don Don', '2024-02-05 13:23:07', NULL),
(430, '20240219016', 'Don Don', '2024-02-06 18:57:19', NULL),
(431, '20240219016', 'Don Don', '2024-02-07 12:05:08', NULL),
(432, '20240219016', 'Don Don', '2024-02-08 14:22:40', NULL),
(433, '20240219016', 'Don Don', '2024-02-09 12:42:27', NULL),
(434, '20240219016', 'Don Don', '2024-02-10 11:49:00', '2024-02-10 17:17:56'),
(435, '20240219016', 'Don Don', '2024-02-11 17:37:22', '2024-02-11 17:05:18'),
(436, '20240219016', 'Don Don', '2024-02-12 11:34:01', NULL),
(437, '20240219016', 'Don Don', '2024-02-13 11:06:16', '2024-02-13 17:08:44'),
(438, '20240219016', 'Don Don', '2024-02-14 17:00:37', '2024-02-14 17:06:15'),
(439, '20240219016', 'Don Don', '2024-02-15 11:33:32', NULL),
(440, '20240219016', 'Don Don', '2024-02-16 14:26:45', NULL),
(441, '20240219016', 'Don Don', '2024-02-17 10:27:05', NULL),
(442, '20240219016', 'Don Don', '2024-02-18 16:05:32', NULL),
(443, '20240219016', 'Don Don', '2024-02-19 14:08:56', NULL),
(444, '20240219016', 'Don Don', '2024-02-20 13:03:18', '2024-02-20 17:27:30'),
(445, '20240219016', 'Don Don', '2024-02-21 10:40:00', NULL),
(2147484055, '20240207002', 'Leo Odaya', '2023-12-21 09:09:45', NULL),
(2147484056, '20240207002', 'Leo Odaya', '2023-12-22 12:03:19', NULL),
(2147484057, '20240207002', 'Leo Odaya', '2023-12-23 15:02:10', NULL),
(2147484058, '20240207002', 'Leo Odaya', '2023-12-24 11:15:58', NULL),
(2147484060, '20240207002', 'Leo Odaya', '2023-12-26 16:51:30', '2023-12-26 17:43:01'),
(2147484061, '20240207002', 'Leo Odaya', '2023-12-27 18:12:54', '2023-12-27 18:18:13'),
(2147484062, '20240207002', 'Leo Odaya', '2023-12-28 15:27:35', NULL),
(2147484063, '20240207002', 'Leo Odaya', '2023-12-29 15:07:34', '2023-12-29 17:52:17'),
(2147484064, '20240207002', 'Leo Odaya', '2023-12-30 09:37:15', '2023-12-30 17:09:36'),
(2147484065, '20240207002', 'Leo Odaya', '2023-12-31 12:57:04', '2023-12-31 17:23:42'),
(2147484066, '20240207002', 'Leo Odaya', '2024-01-01 09:57:21', '2024-01-01 18:33:47'),
(2147484068, '20240207002', 'Leo Odaya', '2024-01-03 17:36:07', NULL),
(2147484069, '20240207002', 'Leo Odaya', '2024-01-04 12:11:02', '2024-01-04 18:43:03'),
(2147484070, '20240207002', 'Leo Odaya', '2024-01-05 13:28:18', '2024-01-05 17:04:59'),
(2147484072, '20240207002', 'Leo Odaya', '2024-01-07 15:29:59', NULL),
(2147484073, '20240207002', 'Leo Odaya', '2024-01-08 10:57:22', '2024-01-08 17:19:10'),
(2147484074, '20240207002', 'Leo Odaya', '2024-01-09 16:43:05', '2024-01-09 18:54:54'),
(2147484075, '20240207002', 'Leo Odaya', '2024-01-10 12:37:53', NULL),
(2147484076, '20240207002', 'Leo Odaya', '2024-01-11 16:25:23', '2024-01-11 17:05:09'),
(2147484077, '20240207002', 'Leo Odaya', '2024-01-12 16:18:25', NULL),
(2147484078, '20240207002', 'Leo Odaya', '2024-01-13 10:55:09', '2024-01-13 18:24:47'),
(2147484079, '20240207002', 'Leo Odaya', '2024-01-14 14:41:29', '2024-01-14 18:39:09'),
(2147484080, '20240207002', 'Leo Odaya', '2024-01-15 17:12:19', '2024-01-15 18:14:21'),
(2147484081, '20240207002', 'Leo Odaya', '2024-01-16 15:08:46', NULL),
(2147484082, '20240207002', 'Leo Odaya', '2024-01-17 14:44:03', NULL),
(2147484085, '20240207002', 'Leo Odaya', '2024-01-20 11:38:07', NULL),
(2147484087, '20240207002', 'Leo Odaya', '2024-01-22 15:59:50', NULL),
(2147484088, '20240207002', 'Leo Odaya', '2024-01-23 11:50:52', NULL),
(2147484089, '20240207002', 'Leo Odaya', '2024-01-24 14:48:18', '2024-01-24 17:29:48'),
(2147484090, '20240207002', 'Leo Odaya', '2024-01-25 15:15:05', '2024-01-25 18:58:19'),
(2147484091, '20240207002', 'Leo Odaya', '2024-01-26 14:14:41', '2024-01-26 18:09:42'),
(2147484092, '20240207002', 'Leo Odaya', '2024-01-27 12:22:31', '2024-01-27 18:25:59'),
(2147484093, '20240207002', 'Leo Odaya', '2024-01-28 09:31:03', NULL),
(2147484094, '20240207002', 'Leo Odaya', '2024-01-29 15:04:04', NULL),
(2147484095, '20240207002', 'Leo Odaya', '2024-01-30 11:01:19', '2024-01-30 18:10:22'),
(2147484096, '20240207002', 'Leo Odaya', '2024-01-31 09:24:47', NULL),
(2147484097, '20240207002', 'Leo Odaya', '2024-02-01 13:15:16', '2024-02-01 17:57:35'),
(2147484100, '20240207002', 'Leo Odaya', '2024-02-04 09:10:00', '2024-02-04 18:32:55'),
(2147484101, '20240207002', 'Leo Odaya', '2024-02-05 17:02:50', '2024-02-05 17:53:14'),
(2147484103, '20240207002', 'Leo Odaya', '2024-02-07 16:11:10', '2024-02-07 18:24:35'),
(2147484105, '20240207002', 'Leo Odaya', '2024-02-09 09:06:42', '2024-02-09 18:58:29'),
(2147484106, '20240207002', 'Leo Odaya', '2024-02-10 13:34:10', NULL),
(2147484111, '20240207002', 'Leo Odaya', '2024-02-15 09:21:30', '2024-02-15 17:38:52'),
(2147484112, '20240207002', 'Leo Odaya', '2024-02-16 17:03:49', NULL),
(2147484113, '20240207002', 'Leo Odaya', '2024-02-17 12:02:06', '2024-02-17 18:32:08'),
(2147484114, '20240207002', 'Leo Odaya', '2024-02-18 11:37:17', NULL),
(2147484115, '20240207002', 'Leo Odaya', '2024-02-19 16:04:22', NULL),
(2147484117, '20240207002', 'Leo Odaya', '2024-02-21 18:40:42', '2024-02-21 17:23:36'),
(2147484118, '20240221018', 'Butch Caramay', '2023-11-21 15:32:55', '2023-11-21 17:21:59'),
(2147484122, '20240221018', 'Butch Caramay', '2023-11-25 14:41:22', '2023-11-25 18:19:08'),
(2147484123, '20240221018', 'Butch Caramay', '2023-11-26 14:29:55', NULL),
(2147484124, '20240221018', 'Butch Caramay', '2023-11-27 16:29:32', '2023-11-27 18:28:29'),
(2147484125, '20240221018', 'Butch Caramay', '2023-11-28 18:10:58', NULL),
(2147484126, '20240221018', 'Butch Caramay', '2023-11-29 18:18:19', '2023-11-29 18:43:33'),
(2147484127, '20240221018', 'Butch Caramay', '2023-11-30 16:44:27', NULL),
(2147484128, '20240221018', 'Butch Caramay', '2023-12-01 16:48:29', NULL),
(2147484129, '20240221018', 'Butch Caramay', '2023-12-02 15:45:53', NULL),
(2147484130, '20240221018', 'Butch Caramay', '2023-12-03 17:36:40', NULL),
(2147484131, '20240221018', 'Butch Caramay', '2023-12-04 09:53:15', '2023-12-04 18:59:28'),
(2147484135, '20240221018', 'Butch Caramay', '2023-12-08 09:31:12', NULL),
(2147484137, '20240221018', 'Butch Caramay', '2023-12-10 16:41:05', '2023-12-10 18:50:41'),
(2147484138, '20240221018', 'Butch Caramay', '2023-12-11 16:15:29', '2023-12-11 18:35:07'),
(2147484139, '20240221018', 'Butch Caramay', '2023-12-12 10:17:50', NULL),
(2147484142, '20240221018', 'Butch Caramay', '2023-12-15 17:16:50', NULL),
(2147484143, '20240221018', 'Butch Caramay', '2023-12-16 12:19:55', NULL),
(2147484144, '20240221018', 'Butch Caramay', '2023-12-17 13:36:26', '2023-12-17 18:04:35'),
(2147484145, '20240221018', 'Butch Caramay', '2023-12-18 11:37:21', NULL),
(2147484148, '20240221018', 'Butch Caramay', '2023-12-21 11:00:22', NULL),
(2147484149, '20240221018', 'Butch Caramay', '2023-12-22 15:44:40', NULL),
(2147484151, '20240221018', 'Butch Caramay', '2023-12-24 14:11:20', '2023-12-24 18:32:00'),
(2147484153, '20240221018', 'Butch Caramay', '2023-12-26 18:58:28', NULL),
(2147484154, '20240221018', 'Butch Caramay', '2023-12-27 17:06:22', '2023-12-27 18:49:56'),
(2147484155, '20240221018', 'Butch Caramay', '2023-12-28 17:21:41', '2023-12-28 18:19:22'),
(2147484156, '20240221018', 'Butch Caramay', '2023-12-29 15:32:53', NULL),
(2147484157, '20240221018', 'Butch Caramay', '2023-12-30 10:40:41', NULL),
(2147484159, '20240221018', 'Butch Caramay', '2024-01-01 15:33:22', '2024-01-01 18:07:13'),
(2147484161, '20240221018', 'Butch Caramay', '2024-01-03 16:26:17', '2024-01-03 18:30:58'),
(2147484162, '20240221018', 'Butch Caramay', '2024-01-04 11:39:18', NULL),
(2147484164, '20240221018', 'Butch Caramay', '2024-01-06 17:24:45', '2024-01-06 17:23:25'),
(2147484165, '20240221018', 'Butch Caramay', '2024-01-07 10:44:53', '2024-01-07 17:03:46'),
(2147484166, '20240221018', 'Butch Caramay', '2024-01-08 13:43:45', NULL),
(2147484167, '20240221018', 'Butch Caramay', '2024-01-09 09:08:57', NULL),
(2147484169, '20240221018', 'Butch Caramay', '2024-01-11 09:54:00', '2024-01-11 18:22:14'),
(2147484170, '20240221018', 'Butch Caramay', '2024-01-12 15:36:18', '2024-01-12 17:39:03'),
(2147484171, '20240221018', 'Butch Caramay', '2024-01-13 12:21:25', '2024-01-13 17:58:16'),
(2147484172, '20240221018', 'Butch Caramay', '2024-01-14 13:07:53', NULL),
(2147484173, '20240221018', 'Butch Caramay', '2024-01-15 15:14:44', NULL),
(2147484174, '20240221018', 'Butch Caramay', '2024-01-16 11:06:16', '2024-01-16 17:13:58'),
(2147484175, '20240221018', 'Butch Caramay', '2024-01-17 10:44:34', '2024-01-17 17:52:23'),
(2147484176, '20240221018', 'Butch Caramay', '2024-01-18 10:51:27', '2024-01-18 18:53:32'),
(2147484177, '20240221018', 'Butch Caramay', '2024-01-19 18:17:03', '2024-01-19 18:52:24'),
(2147484178, '20240221018', 'Butch Caramay', '2024-01-20 13:26:19', NULL),
(2147484179, '20240221018', 'Butch Caramay', '2024-01-21 10:03:44', '2024-01-21 18:35:00'),
(2147484180, '20240221018', 'Butch Caramay', '2024-01-22 12:30:37', NULL),
(2147484181, '20240221018', 'Butch Caramay', '2024-01-23 11:05:20', '2024-01-23 18:40:55'),
(2147484182, '20240221018', 'Butch Caramay', '2024-01-24 13:33:55', '2024-01-24 18:02:50'),
(2147484185, '20240221018', 'Butch Caramay', '2024-01-27 17:54:27', '2024-01-27 17:45:35'),
(2147484186, '20240221018', 'Butch Caramay', '2024-01-28 17:28:50', NULL),
(2147484187, '20240221018', 'Butch Caramay', '2024-01-29 16:40:28', NULL),
(2147484188, '20240221018', 'Butch Caramay', '2024-01-30 10:42:35', NULL),
(2147484189, '20240221018', 'Butch Caramay', '2024-01-31 18:46:34', '2024-01-31 17:19:44'),
(2147484190, '20240221018', 'Butch Caramay', '2024-02-01 14:57:56', '2024-02-01 17:16:53'),
(2147484192, '20240221018', 'Butch Caramay', '2024-02-03 09:47:01', NULL),
(2147484193, '20240221018', 'Butch Caramay', '2024-02-04 16:54:59', '2024-02-04 18:26:37'),
(2147484194, '20240221018', 'Butch Caramay', '2024-02-05 16:29:04', NULL),
(2147484195, '20240221018', 'Butch Caramay', '2024-02-06 09:48:15', NULL),
(2147484196, '20240221018', 'Butch Caramay', '2024-02-07 16:08:18', '2024-02-07 18:28:43'),
(2147484197, '20240221018', 'Butch Caramay', '2024-02-08 17:43:40', '2024-02-08 18:49:55'),
(2147484198, '20240221018', 'Butch Caramay', '2024-02-09 10:02:24', '2024-02-09 17:28:35'),
(2147484199, '20240221018', 'Butch Caramay', '2024-02-10 17:16:14', NULL),
(2147484200, '20240221018', 'Butch Caramay', '2024-02-11 17:02:45', NULL),
(2147484201, '20240221018', 'Butch Caramay', '2024-02-12 16:07:05', NULL),
(2147484202, '20240221018', 'Butch Caramay', '2024-02-13 17:48:52', '2024-02-13 17:13:22'),
(2147484203, '20240221018', 'Butch Caramay', '2024-02-14 12:41:59', '2024-02-14 17:51:23'),
(2147484204, '20240221018', 'Butch Caramay', '2024-02-15 09:55:49', NULL),
(2147484205, '20240221018', 'Butch Caramay', '2024-02-16 11:50:32', NULL),
(2147484206, '20240221018', 'Butch Caramay', '2024-02-17 12:40:47', NULL),
(2147484207, '20240221018', 'Butch Caramay', '2024-02-18 14:23:00', NULL),
(2147484208, '20240221018', 'Butch Caramay', '2024-02-19 15:38:22', NULL),
(2147484209, '20240221018', 'Butch Caramay', '2024-02-20 12:14:12', '2024-02-20 17:04:14'),
(2147484210, '20240221018', 'Butch Caramay', '2024-02-21 11:18:11', '2024-02-21 18:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `id` int(11) NOT NULL,
  `IdNum` int(11) NOT NULL,
  `DietPlanID` int(11) NOT NULL,
  `planName` varchar(50) NOT NULL,
  `targetCalorie` float NOT NULL,
  `Day` int(11) NOT NULL,
  `mealType` varchar(20) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `Serving` int(11) NOT NULL,
  `DateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietplan`
--

INSERT INTO `dietplan` (`id`, `IdNum`, `DietPlanID`, `planName`, `targetCalorie`, `Day`, `mealType`, `FoodID`, `Serving`, `DateCreated`) VALUES
(1, 36, 1, '1', 2500, 1, 'breakfast', 232, 150, '2024-01-28'),
(2, 36, 1, '1', 2500, 1, 'lunch', 206, 150, '2024-01-28'),
(3, 36, 1, '1', 2500, 1, 'breakfast', 206, 150, '2024-01-28'),
(4, 36, 1, '1', 2500, 1, 'lunch', 282, 250, '2024-01-28'),
(5, 36, 1, '1', 2500, 1, 'dinner', 337, 250, '2024-01-28'),
(6, 36, 1, '1', 2500, 1, 'dinner', 206, 150, '2024-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plans`
--

CREATE TABLE `diet_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `calories` float DEFAULT NULL,
  `weight_goal` varchar(255) DEFAULT NULL,
  `diet_type` varchar(255) DEFAULT NULL,
  `diet_plan` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet_plans`
--

INSERT INTO `diet_plans` (`id`, `user_id`, `calories`, `weight_goal`, `diet_type`, `diet_plan`, `created_at`) VALUES
(12, 117, 2500, 'Lose Weight', 'Vegetarian', 'a:21:{i:0;a:3:{i:0;a:9:{s:2:\"id\";i:204;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:234;s:4:\"name\";s:13:\"Avocado Toast\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:5;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:202;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:1;a:3:{i:0;a:9:{s:2:\"id\";i:279;s:4:\"name\";s:5:\"Adobo\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:18;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:281;s:4:\"name\";s:17:\"Sinigang na Baboy\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:2;a:2:{i:0;a:9:{s:2:\"id\";i:314;s:4:\"name\";s:15:\"Ginataang Gulay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:327;s:4:\"name\";s:27:\"Tinolang Manok sa Malunggay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:3;a:3:{i:0;a:9:{s:2:\"id\";i:248;s:4:\"name\";s:35:\"Chickpea and Spinach Breakfast Bowl\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:245;s:4:\"name\";s:17:\"Sweet Potato Hash\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:5;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}}i:4;a:4:{i:0;a:9:{s:2:\"id\";i:280;s:4:\"name\";s:13:\"Lechon Kawali\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:420;s:7:\"protein\";d:25;s:3:\"fat\";d:30;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:196;s:4:\"name\";s:5:\"Mango\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:1;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:38;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:209;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:5;a:2:{i:0;a:9:{s:2:\"id\";i:324;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:327;s:4:\"name\";s:27:\"Tinolang Manok sa Malunggay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:6;a:4:{i:0;a:9:{s:2:\"id\";i:256;s:4:\"name\";s:25:\"Pandesal with Kesong Puti\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:7;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:216;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:238;s:4:\"name\";s:13:\"Smoothie Bowl\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:5;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:7;a:3:{i:0;a:9:{s:2:\"id\";i:282;s:4:\"name\";s:9:\"Kare-Kare\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:20;s:3:\"fat\";d:28;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:308;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:223;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:8;a:3:{i:0;a:9:{s:2:\"id\";i:335;s:4:\"name\";s:8:\"Pinakbet\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:12;s:3:\"fat\";d:24;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:215;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}}i:9;a:3:{i:0;a:9:{s:2:\"id\";i:270;s:4:\"name\";s:12:\"Adobo Flakes\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:242;s:4:\"name\";s:29:\"Spinach and Mushroom Frittata\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:10;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}}i:10;a:5:{i:0;a:9:{s:2:\"id\";i:286;s:4:\"name\";s:17:\"Ginisang Ampalaya\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:210;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:221;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:298;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:4;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:11;a:2:{i:0;a:9:{s:2:\"id\";i:323;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:18;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:226;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:6;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:70;s:7:\"serving\";d:300;}}i:12;a:4:{i:0;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:203;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:247;s:4:\"name\";s:14:\"Vegan Pancakes\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:5;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:266;s:4:\"name\";s:25:\"Pandesal with Kesong Puti\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:7;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}}i:13;a:4:{i:0;a:9:{s:2:\"id\";i:223;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:298;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:440;s:7:\"protein\";d:16;s:3:\"fat\";d:24;s:13:\"carbohydrates\";d:60;s:7:\"serving\";d:500;}i:2;a:9:{s:2:\"id\";i:210;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:14;a:2:{i:0;a:9:{s:2:\"id\";i:321;s:4:\"name\";s:13:\"Pork Sinigang\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:340;s:7:\"protein\";d:20;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:210;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:54;s:7:\"serving\";d:300;}}i:15;a:4:{i:0;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:252;s:4:\"name\";s:11:\"Arroz Caldo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:261;s:4:\"name\";s:10:\"Champorado\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:16;a:3:{i:0;a:9:{s:2:\"id\";i:291;s:4:\"name\";s:13:\"Pork Sinigang\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:288;s:4:\"name\";s:16:\"Adobong Kangkong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:6;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:284;s:4:\"name\";s:5:\"Laing\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}}i:17;a:1:{i:0;a:9:{s:2:\"id\";i:317;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:520;s:7:\"protein\";d:20;s:3:\"fat\";d:30;s:13:\"carbohydrates\";d:60;s:7:\"serving\";d:500;}}i:18;a:3:{i:0;a:9:{s:2:\"id\";i:273;s:4:\"name\";s:6:\"Tinapa\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:234;s:4:\"name\";s:13:\"Avocado Toast\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:5;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:19;a:3:{i:0;a:9:{s:2:\"id\";i:287;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:207;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:282;s:4:\"name\";s:9:\"Kare-Kare\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:20;s:3:\"fat\";d:28;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}i:20;a:2:{i:0;a:9:{s:2:\"id\";i:335;s:4:\"name\";s:8:\"Pinakbet\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:12;s:3:\"fat\";d:24;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:325;s:4:\"name\";s:14:\"Ginataang Mais\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:5;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:250;}}}', '2023-10-30 07:16:23'),
(13, 117, 2325, 'Lose Weight', 'Random Diet', 'a:21:{i:0;a:4:{i:0;a:9:{s:2:\"id\";i:250;s:4:\"name\";s:23:\"Vegan Breakfast Burrito\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:12;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:219;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:1;a:5:{i:0;a:9:{s:2:\"id\";i:288;s:4:\"name\";s:16:\"Adobong Kangkong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:6;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:304;s:4:\"name\";s:14:\"Ginataang Mais\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:5;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:225;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}i:4;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:2;a:2:{i:0;a:9:{s:2:\"id\";i:226;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:6;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:70;s:7:\"serving\";d:300;}i:1;a:9:{s:2:\"id\";i:214;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:3;a:4:{i:0;a:9:{s:2:\"id\";i:220;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:201;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:249;s:4:\"name\";s:19:\"Vegan Smoothie Bowl\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:5;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:193;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:4;a:5:{i:0;a:9:{s:2:\"id\";i:195;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:295;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:206;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:164;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:44;s:7:\"serving\";d:300;}i:4;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:5;a:2:{i:0;a:9:{s:2:\"id\";i:226;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:332;s:4:\"name\";s:10:\"Tuna Steak\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:360;s:7:\"protein\";d:22;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:250;}}i:6;a:4:{i:0;a:9:{s:2:\"id\";i:202;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:237;s:4:\"name\";s:12:\"Chia Pudding\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:3;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:250;s:4:\"name\";s:23:\"Vegan Breakfast Burrito\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:12;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:7;a:4:{i:0;a:9:{s:2:\"id\";i:308;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:304;s:4:\"name\";s:14:\"Ginataang Mais\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:5;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:221;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:8;a:2:{i:0;a:9:{s:2:\"id\";i:314;s:4:\"name\";s:15:\"Ginataang Gulay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:336;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}i:9;a:3:{i:0;a:9:{s:2:\"id\";i:259;s:4:\"name\";s:14:\"Pancit Malabon\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:239;s:4:\"name\";s:13:\"Tofu Scramble\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:10;s:3:\"fat\";d:7;s:13:\"carbohydrates\";d:15;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:233;s:4:\"name\";s:12:\"Greek Yogurt\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:100;s:7:\"protein\";d:10;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:15;s:7:\"serving\";d:150;}}i:10;a:3:{i:0;a:9:{s:2:\"id\";i:294;s:4:\"name\";s:13:\"Bicol Express\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:12;s:3:\"fat\";d:18;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:302;s:4:\"name\";s:14:\"Pancit Malabon\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:340;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:11;a:3:{i:0;a:9:{s:2:\"id\";i:211;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:215;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:328;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}i:12;a:4:{i:0;a:9:{s:2:\"id\";i:268;s:4:\"name\";s:4:\"Taho\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:203;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:190;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:13;a:4:{i:0;a:9:{s:2:\"id\";i:279;s:4:\"name\";s:5:\"Adobo\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:18;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:209;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:196;s:4:\"name\";s:5:\"Mango\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:1;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:38;s:7:\"serving\";d:150;}}i:14;a:1:{i:0;a:9:{s:2:\"id\";i:310;s:4:\"name\";s:13:\"Lechon Kawali\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:450;s:7:\"protein\";d:28;s:3:\"fat\";d:35;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:15;a:4:{i:0;a:9:{s:2:\"id\";i:193;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:259;s:4:\"name\";s:14:\"Pancit Malabon\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:16;a:4:{i:0;a:9:{s:2:\"id\";i:224;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:281;s:4:\"name\";s:17:\"Sinigang na Baboy\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:208;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:17;a:1:{i:0;a:9:{s:2:\"id\";i:310;s:4:\"name\";s:13:\"Lechon Kawali\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:450;s:7:\"protein\";d:28;s:3:\"fat\";d:35;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:18;a:4:{i:0;a:9:{s:2:\"id\";i:263;s:4:\"name\";s:9:\"Halo-Halo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:4;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:267;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:193;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:19;a:3:{i:0;a:9:{s:2:\"id\";i:295;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:290;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:18;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:164;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:44;s:7:\"serving\";d:300;}}i:20;a:2:{i:0;a:9:{s:2:\"id\";i:316;s:4:\"name\";s:8:\"Pinakbet\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:12;s:3:\"fat\";d:24;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:212;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}}', '2023-10-30 17:56:40'),
(14, 117, 2440, 'Lose Weight', 'Random Diet', 'a:21:{i:0;a:2:{i:0;a:9:{s:2:\"id\";i:272;s:4:\"name\";s:19:\"Chicken Arroz Caldo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:12;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:270;s:4:\"name\";s:12:\"Adobo Flakes\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}}i:1;a:4:{i:0;a:9:{s:2:\"id\";i:222;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:293;s:4:\"name\";s:13:\"Chicken Adobo\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:360;s:7:\"protein\";d:20;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:224;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:2;a:2:{i:0;a:9:{s:2:\"id\";i:311;s:4:\"name\";s:5:\"Adobo\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:18;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:213;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:3;a:2:{i:0;a:9:{s:2:\"id\";i:239;s:4:\"name\";s:13:\"Tofu Scramble\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:400;s:7:\"protein\";d:20;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:300;}i:1;a:9:{s:2:\"id\";i:265;s:4:\"name\";s:5:\"Lugaw\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}}i:4;a:4:{i:0;a:9:{s:2:\"id\";i:283;s:4:\"name\";s:13:\"Pancit Canton\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:350;s:7:\"protein\";d:12;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:303;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:18;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:195;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:5;a:3:{i:0;a:9:{s:2:\"id\";i:230;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:337;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:227;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:6;a:3:{i:0;a:9:{s:2:\"id\";i:219;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:262;s:4:\"name\";s:11:\"Arroz Caldo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:244;s:4:\"name\";s:25:\"Coconut Milk Rice Pudding\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:4;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:7;a:5:{i:0;a:9:{s:2:\"id\";i:303;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:18;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:208;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:197;s:4:\"name\";s:6:\"Papaya\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:119;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:225;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:4;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:8;a:2:{i:0;a:9:{s:2:\"id\";i:334;s:4:\"name\";s:18:\"Ginataang Kalabasa\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:230;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:4;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:70;s:7:\"serving\";d:300;}}i:9;a:4:{i:0;a:9:{s:2:\"id\";i:202;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:240;s:4:\"name\";s:23:\"Vegan Breakfast Burrito\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:15;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:257;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:10;a:4:{i:0;a:9:{s:2:\"id\";i:297;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:308;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:209;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:195;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}}i:11;a:3:{i:0;a:9:{s:2:\"id\";i:323;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:18;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:227;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}}i:12;a:3:{i:0;a:9:{s:2:\"id\";i:261;s:4:\"name\";s:10:\"Champorado\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:278;s:4:\"name\";s:5:\"Lugaw\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:250;s:4:\"name\";s:23:\"Vegan Breakfast Burrito\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:12;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}}i:13;a:4:{i:0;a:9:{s:2:\"id\";i:197;s:4:\"name\";s:6:\"Papaya\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:119;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:299;s:4:\"name\";s:9:\"Kaldereta\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:350;s:7:\"protein\";d:18;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:308;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}}i:14;a:2:{i:0;a:9:{s:2:\"id\";i:333;s:4:\"name\";s:14:\"Beef Caldereta\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:420;s:7:\"protein\";d:25;s:3:\"fat\";d:30;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:212;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:15;a:3:{i:0;a:9:{s:2:\"id\";i:273;s:4:\"name\";s:6:\"Tinapa\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:242;s:4:\"name\";s:29:\"Spinach and Mushroom Frittata\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:10;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:233;s:4:\"name\";s:12:\"Greek Yogurt\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:100;s:7:\"protein\";d:10;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:15;s:7:\"serving\";d:150;}}i:16;a:4:{i:0;a:9:{s:2:\"id\";i:225;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:286;s:4:\"name\";s:17:\"Ginisang Ampalaya\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:287;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:3;a:9:{s:2:\"id\";i:222;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:17;a:2:{i:0;a:9:{s:2:\"id\";i:328;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:315;s:4:\"name\";s:5:\"Laing\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:12;s:3:\"fat\";d:22;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}i:18;a:3:{i:0;a:9:{s:2:\"id\";i:259;s:4:\"name\";s:14:\"Pancit Malabon\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:253;s:4:\"name\";s:9:\"Halo-Halo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:4;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:19;a:4:{i:0;a:9:{s:2:\"id\";i:279;s:4:\"name\";s:5:\"Adobo\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:18;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:210;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:196;s:4:\"name\";s:5:\"Mango\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:1;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:38;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:20;a:2:{i:0;a:9:{s:2:\"id\";i:212;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:335;s:4:\"name\";s:8:\"Pinakbet\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:12;s:3:\"fat\";d:24;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}}', '2023-10-30 18:15:40');
INSERT INTO `diet_plans` (`id`, `user_id`, `calories`, `weight_goal`, `diet_type`, `diet_plan`, `created_at`) VALUES
(15, 117, 1852, 'Maintain Weight', 'Random Diet', 'a:21:{i:0;a:5:{i:0;a:9:{s:2:\"id\";i:260;s:4:\"name\";s:12:\"Puto Bumbong\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:210;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:266;s:4:\"name\";s:25:\"Pandesal with Kesong Puti\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:7;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:193;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}i:4;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:6;s:7:\"protein\";d:6;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:6;s:7:\"serving\";d:6;}}i:1;a:4:{i:0;a:9:{s:2:\"id\";i:298;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:12;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}i:2;a:9:{s:2:\"id\";i:306;s:4:\"name\";s:5:\"Laing\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:3;a:9:{s:2:\"id\";i:222;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:2;a:2:{i:0;a:9:{s:2:\"id\";i:331;s:4:\"name\";s:13:\"Pancit Canton\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:350;s:7:\"protein\";d:12;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:227;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:3;a:3:{i:0;a:9:{s:2:\"id\";i:272;s:4:\"name\";s:19:\"Chicken Arroz Caldo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:12;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:263;s:4:\"name\";s:9:\"Halo-Halo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:4;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:25;s:7:\"protein\";d:25;s:3:\"fat\";d:25;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:25;}}i:4;a:3:{i:0;a:9:{s:2:\"id\";i:223;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:308;s:4:\"name\";s:16:\"Ginataang Langka\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:260;s:7:\"protein\";d:8;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:285;s:4:\"name\";s:8:\"Pinakbet\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:5;a:2:{i:0;a:9:{s:2:\"id\";i:337;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:334;s:4:\"name\";s:18:\"Ginataang Kalabasa\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}}i:6;a:5:{i:0;a:9:{s:2:\"id\";i:247;s:4:\"name\";s:14:\"Vegan Pancakes\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:180;s:7:\"protein\";d:5;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:220;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:219;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:194;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:37;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:9;s:7:\"serving\";d:150;}i:4;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:28;s:7:\"protein\";d:28;s:3:\"fat\";d:28;s:13:\"carbohydrates\";d:28;s:7:\"serving\";d:28;}}i:7;a:4:{i:0;a:9:{s:2:\"id\";i:297;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:221;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:207;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:224;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}}i:8;a:2:{i:0;a:9:{s:2:\"id\";i:310;s:4:\"name\";s:13:\"Lechon Kawali\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:450;s:7:\"protein\";d:28;s:3:\"fat\";d:35;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}}i:9;a:4:{i:0;a:9:{s:2:\"id\";i:265;s:4:\"name\";s:5:\"Lugaw\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:263;s:4:\"name\";s:9:\"Halo-Halo\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:4;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:45;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:267;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:35;s:7:\"protein\";d:35;s:3:\"fat\";d:35;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:35;}}i:10;a:3:{i:0;a:9:{s:2:\"id\";i:297;s:4:\"name\";s:14:\"Tortang Talong\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:250;s:7:\"protein\";d:10;s:3:\"fat\";d:15;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:281;s:4:\"name\";s:17:\"Sinigang na Baboy\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:164;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:44;s:7:\"serving\";d:300;}}i:11;a:2:{i:0;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:210;s:7:\"protein\";d:2;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:54;s:7:\"serving\";d:300;}i:1;a:9:{s:2:\"id\";i:327;s:4:\"name\";s:27:\"Tinolang Manok sa Malunggay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:12;a:4:{i:0;a:9:{s:2:\"id\";i:259;s:4:\"name\";s:14:\"Pancit Malabon\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:240;s:7:\"protein\";d:8;s:3:\"fat\";d:6;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:237;s:4:\"name\";s:12:\"Chia Pudding\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:3;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:20;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:219;s:4:\"name\";s:16:\"Sinandomeng Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:35;s:7:\"protein\";d:35;s:3:\"fat\";d:35;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:35;}}i:13;a:4:{i:0;a:9:{s:2:\"id\";i:225;s:4:\"name\";s:14:\"Jasponica Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:2;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:289;s:4:\"name\";s:13:\"Bicol Express\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:350;s:7:\"protein\";d:18;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:2;a:9:{s:2:\"id\";i:223;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:14;a:3:{i:0;a:9:{s:2:\"id\";i:323;s:4:\"name\";s:7:\"Kilawin\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:300;s:7:\"protein\";d:18;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:226;s:4:\"name\";s:10:\"White Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:3;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:200;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}}i:15;a:5:{i:0;a:9:{s:2:\"id\";i:217;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:190;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:261;s:4:\"name\";s:10:\"Champorado\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:200;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:8;s:7:\"protein\";d:8;s:3:\"fat\";d:8;s:13:\"carbohydrates\";d:8;s:7:\"serving\";d:8;}i:4;a:9:{s:2:\"id\";i:193;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:16;a:4:{i:0;a:9:{s:2:\"id\";i:300;s:4:\"name\";s:16:\"Pork Binagoongan\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:380;s:7:\"protein\";d:20;s:3:\"fat\";d:28;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:195;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:223;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:3;s:3:\"fat\";d:2;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:198;s:4:\"name\";s:9:\"Pineapple\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:82;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:22;s:7:\"serving\";d:150;}}i:17;a:2:{i:0;a:9:{s:2:\"id\";i:212;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:327;s:4:\"name\";s:27:\"Tinolang Manok sa Malunggay\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:15;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:40;s:7:\"serving\";d:250;}}i:18;a:4:{i:0;a:9:{s:2:\"id\";i:270;s:4:\"name\";s:12:\"Adobo Flakes\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:14:\"Non-Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:15;s:3:\"fat\";d:10;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:1;a:9:{s:2:\"id\";i:267;s:4:\"name\";s:6:\"Atsara\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:120;s:7:\"protein\";d:1;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:25;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:231;s:4:\"name\";s:7:\"Oatmeal\";s:4:\"meal\";s:9:\"breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:150;s:7:\"protein\";d:5;s:3:\"fat\";d:3;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:341;s:4:\"name\";s:6:\"hakdog\";s:4:\"meal\";s:9:\"Breakfast\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:5;s:7:\"protein\";d:5;s:3:\"fat\";d:5;s:13:\"carbohydrates\";d:5;s:7:\"serving\";d:5;}}i:19;a:5:{i:0;a:9:{s:2:\"id\";i:284;s:4:\"name\";s:5:\"Laing\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:280;s:7:\"protein\";d:10;s:3:\"fat\";d:20;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:250;}i:1;a:9:{s:2:\"id\";i:207;s:4:\"name\";s:10:\"Brown Rice\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:160;s:7:\"protein\";d:4;s:3:\"fat\";d:1;s:13:\"carbohydrates\";d:35;s:7:\"serving\";d:150;}i:2;a:9:{s:2:\"id\";i:197;s:4:\"name\";s:6:\"Papaya\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:119;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:150;}i:3;a:9:{s:2:\"id\";i:195;s:4:\"name\";s:6:\"Banana\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:105;s:7:\"protein\";d:1;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:27;s:7:\"serving\";d:150;}i:4;a:9:{s:2:\"id\";i:199;s:4:\"name\";s:5:\"Guava\";s:4:\"meal\";s:5:\"lunch\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:74;s:7:\"protein\";d:4;s:3:\"fat\";d:0;s:13:\"carbohydrates\";d:18;s:7:\"serving\";d:300;}}i:20;a:2:{i:0;a:9:{s:2:\"id\";i:213;s:4:\"name\";s:5:\"Adlai\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:320;s:7:\"protein\";d:6;s:3:\"fat\";d:4;s:13:\"carbohydrates\";d:70;s:7:\"serving\";d:300;}i:1;a:9:{s:2:\"id\";i:337;s:4:\"name\";s:13:\"Adobong Sitaw\";s:4:\"meal\";s:6:\"dinner\";s:4:\"diet\";s:10:\"Vegetarian\";s:8:\"calories\";d:220;s:7:\"protein\";d:8;s:3:\"fat\";d:14;s:13:\"carbohydrates\";d:30;s:7:\"serving\";d:250;}}}', '2023-11-22 23:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `duedate_reminder`
--

CREATE TABLE `duedate_reminder` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `lastreminderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duedate_reminder`
--

INSERT INTO `duedate_reminder` (`id`, `user_id`, `lastreminderdate`) VALUES
(3, '20240217015', '2024-02-25'),
(5, '20240207013', '2024-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentID` int(11) NOT NULL,
  `equipmentName` varchar(50) NOT NULL,
  `equipmentDescription` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `equipmentName`, `equipmentDescription`, `image`) VALUES
(1, 'Treadmill', 'Cardio machine for running or walking indoors.', 'treadmill.jpg.jtml'),
(2, 'Stationary Bike', 'Stationary exercise bike for cardiovascular workouts.', 'stationary_bike.jpg'),
(3, 'Dumbbells', 'Free weights for strength training exercises.', 'dumbbells.jpg'),
(4, 'Bench Press', 'Weight lifting bench for chest exercises.', 'bench_press.jpg'),
(5, 'Smith Machine', 'Weight lifting machine for various strength training exercises.', 'smith_machine.jpg'),
(6, 'Leg Press Machine', 'Machine for lower body strength training, targeting quadriceps, hamstrings, and glutes.', 'leg_press_machine.jpg'),
(7, 'Rowing Machine', 'Cardio machine simulating rowing motion, engaging various muscle groups.', 'rowing_machine.jpg'),
(8, 'Pull-up Bar', 'Bar for performing pull-up and chin-up exercises, targeting back and arms.', 'pull_up_bar.jpg'),
(9, 'Yoga Mat', 'Mat for practicing yoga and other floor exercises.', 'yoga_mat.jpg'),
(10, 'Kettlebells', 'Weight training equipment for dynamic exercises targeting multiple muscle groups.', 'kettlebells.jpg'),
(11, 'Jump Rope', 'Cardio equipment for skipping exercises, improving coordination and cardiovascular health.', 'jump_rope.jpg'),
(12, 'Medicine Ball', 'Weighted ball used for strength training, core exercises, and rehabilitation.', 'medicine_ball.jpg'),
(13, 'Cable Machine', 'Resistance machine with pulleys and cables for various strength exercises.', 'cable_machine.jpg'),
(14, 'Battle Ropes', 'Heavy ropes used for high-intensity interval training (HIIT) and strength exercises.', 'battle_ropes.jpg'),
(15, 'TRX Suspension Trainer', 'Suspension training system using straps for bodyweight exercises targeting strength, balance, and flexibility.', 'trx_suspension_trainer.jpg'),
(16, 'Stepper Machine', 'Cardio equipment simulating stair climbing motion.', 'stepper_machine.jpg'),
(17, 'Leg Extension Machine', 'Machine for isolating and strengthening quadriceps muscles.', 'leg_extension_machine.jpg'),
(18, 'Lat Pulldown Machine', 'Machine for strengthening latissimus dorsi and other back muscles.', 'lat_pulldown_machine.jpg'),
(19, 'Ab Roller', 'Device for performing abdominal exercises, particularly targeting the rectus abdominis.', 'ab_roller.jpg'),
(20, 'Adjustable Dumbbell Set', 'Set of dumbbells with adjustable weight plates for versatile strength training.', 'adjustable_dumbbell_set.jpg'),
(21, 'Elliptical Trainer', 'Low-impact cardio machine simulating walking, running, or stair climbing motions.', 'elliptical_trainer.jpg'),
(22, 'Leg Curl Machine', 'Machine for targeting hamstring muscles through leg curl exercises.', 'leg_curl_machine.jpg'),
(23, 'Chest Press Machine', 'Machine for strengthening chest muscles through pressing motions.', 'chest_press_machine.jpg'),
(24, 'Abdominal Crunch Machine', 'Machine for targeting abdominal muscles through crunching motions.', 'abdominal_crunch_machine.jpg'),
(25, 'Cable Crossover Machine', 'Machine with adjustable cables for various upper body exercises.', 'cable_crossover_machine.jpg'),
(26, 'Roman Chair', 'Equipment for strengthening lower back, glutes, and core muscles through hyperextension exercises.', 'roman_chair.jpg'),
(27, 'Power Rack', 'Versatile strength training equipment with adjustable safety bars for various exercises.', 'power_rack.jpg'),
(28, 'Stepmill', 'Cardio machine simulating stairs for lower body workout.', 'stepmill.jpg'),
(29, 'Smith Machine', 'Weight lifting machine for various strength training exercises.', 'smith_machine.jpg'),
(30, 'Battle Ropes', 'Heavy ropes used for high-intensity interval training (HIIT) and strength exercises.', 'battle_ropes.jpg'),
(31, 'Leg Press Machine', 'Machine for lower body strength training, targeting quadriceps, hamstrings, and glutes.', 'leg_press_machine.jpg'),
(32, 'Yoga Ball', 'Large inflatable ball used for stability and core exercises.', 'yoga_ball.jpg'),
(33, 'Adjustable Bench', 'Bench with adjustable incline/decline positions for various strength exercises.', 'adjustable_bench.jpg'),
(34, 'Plyo Box', 'Box used for plyometric exercises to improve power and agility.', 'plyo_box.jpg'),
(35, 'Suspension Trainer', 'Training system using straps for bodyweight exercises targeting strength, balance, and flexibility.', 'suspension_trainer.jpg'),
(36, 'Battle Ropes', 'Heavy ropes used for high-intensity interval training (HIIT) and strength exercises.', 'battle_ropes.jpg'),
(37, 'Leg Extension Machine', 'Machine for isolating and strengthening quadriceps muscles.', 'leg_extension_machine.jpg'),
(38, 'Lat Pulldown Machine', 'Machine for strengthening latissimus dorsi and other back muscles.', 'lat_pulldown_machine.jpg'),
(39, 'Ab Roller', 'Device for performing abdominal exercises, particularly targeting the rectus abdominis.', 'ab_roller.jpg'),
(40, 'Adjustable Dumbbell Set', 'Set of dumbbells with adjustable weight plates for versatile strength training.', 'adjustable_dumbbell_set.jpg'),
(41, 'Cable Pulley Machine', 'Versatile machine with adjustable pulleys for various strength exercises.', 'cable_pulley_machine.jpg'),
(42, 'Ab Coaster', 'Machine for targeting abdominal muscles through a controlled crunching motion.', 'ab_coaster.jpg'),
(43, 'Smith Machine', 'Weight lifting machine for various strength training exercises.', 'smith_machine.jpg'),
(44, 'Glute Ham Developer (GHD)', 'Equipment for strengthening lower back, hamstrings, and glutes through hyperextension and sit-up exercises.', 'glute_ham_developer.jpg'),
(45, 'Resistance Bands', 'Elastic bands used for resistance training, rehabilitation, and stretching exercises.', 'resistance_bands.jpg'),
(46, 'Foam Roller', 'Cylindrical foam used for self-myofascial release and muscle recovery.', 'foam_roller.jpg'),
(47, 'Ab Wheel', 'Simple equipment for performing advanced abdominal exercises, especially targeting the core and upper body.', 'ab_wheel.jpg'),
(48, 'Battle Ropes', 'Heavy ropes used for high-intensity interval training (HIIT) and strength exercises.', 'battle_ropes.jpg'),
(49, 'Weighted Vest', 'Vest with added weight for bodyweight exercises and resistance training.', 'weighted_vest.jpg'),
(50, 'Foam Plyometric Box', 'Plyometric box made of foam for safer jumping exercises.', 'foam_plyometric_box.jpg'),
(51, 'Dumbbells (5 lbs)', 'Pair of dumbbells weighing 5 pounds each, suitable for light resistance training.', 'dumbbells_5lbs.jpg'),
(52, 'Dumbbells (10 lbs)', 'Pair of dumbbells weighing 10 pounds each, suitable for moderate resistance training.', 'dumbbells_10lbs.jpg'),
(53, 'Dumbbells (15 lbs)', 'Pair of dumbbells weighing 15 pounds each, suitable for intermediate resistance training.', 'dumbbells_15lbs.jpg'),
(54, 'Dumbbells (20 lbs)', 'Pair of dumbbells weighing 20 pounds each, suitable for advanced resistance training.', 'dumbbells_20lbs.jpg'),
(55, 'Dumbbells (25 lbs)', 'Pair of dumbbells weighing 25 pounds each, suitable for heavy resistance training.', 'dumbbells_25lbs.jpg'),
(56, 'Dumbbells (30 lbs)', 'Pair of dumbbells weighing 30 pounds each, suitable for heavy resistance training.', 'dumbbells_30lbs.jpg'),
(57, 'Dumbbells (35 lbs)', 'Pair of dumbbells weighing 35 pounds each, suitable for heavy resistance training.', 'dumbbells_35lbs.jpg'),
(58, 'Dumbbells (40 lbs)', 'Pair of dumbbells weighing 40 pounds each, suitable for heavy resistance training.', 'dumbbells_40lbs.jpg'),
(59, 'Dumbbells (45 lbs)', 'Pair of dumbbells weighing 45 pounds each, suitable for heavy resistance training.', 'dumbbells_45lbs.jpg'),
(60, 'Dumbbells (50 lbs)', 'Pair of dumbbells weighing 50 pounds each, suitable for heavy resistance training.', 'dumbbells_50lbs.jpg'),
(61, 'Dumbbells (55 lbs)', 'Pair of dumbbells weighing 55 pounds each, suitable for heavy resistance training.', 'dumbbells_55lbs.jpg'),
(62, 'Dumbbells (60 lbs)', 'Pair of dumbbells weighing 60 pounds each, suitable for heavy resistance training.', 'dumbbells_60lbs.jpg'),
(63, 'Dumbbells (65 lbs)', 'Pair of dumbbells weighing 65 pounds each, suitable for heavy resistance training.', 'dumbbells_65lbs.jpg'),
(64, 'Dumbbells (70 lbs)', 'Pair of dumbbells weighing 70 pounds each, suitable for heavy resistance training.', 'dumbbells_70lbs.jpg'),
(65, 'Dumbbells (75 lbs)', 'Pair of dumbbells weighing 75 pounds each, suitable for heavy resistance training.', 'dumbbells_75lbs.jpg'),
(66, 'Dumbbells (80 lbs)', 'Pair of dumbbells weighing 80 pounds each, suitable for heavy resistance training.', 'dumbbells_80lbs.jpg'),
(67, 'Dumbbells (85 lbs)', 'Pair of dumbbells weighing 85 pounds each, suitable for heavy resistance training.', 'dumbbells_85lbs.jpg'),
(68, 'Dumbbells (90 lbs)', 'Pair of dumbbells weighing 90 pounds each, suitable for heavy resistance training.', 'dumbbells_90lbs.jpg'),
(69, 'Dumbbells (95 lbs)', 'Pair of dumbbells weighing 95 pounds each, suitable for heavy resistance training.', 'dumbbells_95lbs.jpg'),
(70, 'Dumbbells (100 lbs)', 'Pair of dumbbells weighing 100 pounds each, suitable for heavy resistance training.', 'dumbbells_100lbs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `ExerciseID` int(2) NOT NULL,
  `ExerciseName` varchar(32) DEFAULT NULL,
  `Description` varchar(82) DEFAULT NULL,
  `CalorieBurnRate` int(2) DEFAULT NULL,
  `MuscleBuilding` int(1) DEFAULT NULL,
  `CategoryID` int(1) DEFAULT NULL,
  `PartOfBody` varchar(4) DEFAULT NULL,
  `EquipmentID` varchar(34) DEFAULT NULL,
  `Difficulty` varchar(12) DEFAULT NULL,
  `Instructions` varchar(380) DEFAULT NULL,
  `ImageURL` varchar(82) DEFAULT NULL,
  `VideoURL` varchar(41) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`ExerciseID`, `ExerciseName`, `Description`, `CalorieBurnRate`, `MuscleBuilding`, `CategoryID`, `PartOfBody`, `EquipmentID`, `Difficulty`, `Instructions`, `ImageURL`, `VideoURL`) VALUES
(27, 'Push-Up', 'A classic bodyweight exercise that targets the chest, shoulders, and triceps', 50, 1, 1, 'Core', 'None', 'BEGINNER', 'Start in a plank position with your hands shoulder-width apart.\r\nLower your body until your chest nearly touches the floor.\r\nPush back up to the starting position.\r\nRepeat for 10-15 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(28, 'Squat', 'A lower body exercise that targets the quadriceps, hamstrings, and glutes.', 6, 1, 1, '0', 'None', 'INTERMEDIATE', 'Stand with your feet shoulder-width apart.\r\nLower your body by bending your knees and hips, as if you\'re sitting back into a chair.\r\nKeep your back straight and chest up.\r\nReturn to the starting position.\r\nRepeat for 12-15 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(29, 'Plank', 'A core-strengthening exercise that also engages the shoulders and back.', 4, 1, 2, '0', 'None', 'BEGINNER', 'Start in a push-up position but with your weight on your forearms instead of your hands.\r\nKeep your body in a straight line from head to heels, engaging your core muscles.\r\nHold this position for 30-60 seconds.\r\nRepeat for 2-3 sets.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(30, 'Jumping Jacks', 'A cardiovascular exercise that also works the legs and shoulders.', 7, 0, 3, '0', 'None', 'BEGINNER', 'Start with your feet together and arms at your sides.\r\nJump your feet out to the sides while raising your arms overhead.\r\nReturn to the starting position.\r\nRepeat for 30 seconds to 1 minute.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(31, 'Lunges', 'A lower body exercise that targets the quadriceps, hamstrings, and glutes.', 5, 1, 2, '0', 'None', 'BEGINNER', 'Stand with your feet together.\r\nTake a step forward with one foot and lower your body until both knees are bent at a 90-degree angle.\r\nReturn to the starting position.\r\nRepeat on the other leg.\r\nContinue alternating for 12-15 repetitions on each leg.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(32, 'Bicycle Crunches', 'An abdominal exercise that engages the entire core.', 6, 1, 2, '0', 'None', 'INTERMEDIATE', 'Lie on your back with your hands behind your head.\r\nBring your right elbow and left knee toward each other while straightening your right leg.\r\nContinue in a pedaling motion, alternating sides.\r\nPerform 20-30 total repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(33, 'Dumbbell Bench Press', 'A chest exercise that requires dumbbells and targets the pectoral muscles.', 6, 1, 2, '0', 'Dumbbells, Bench', 'BEGINNER', 'Lie on a bench with a dumbbell in each hand, arms extended above your chest.\r\nLower the dumbbells to chest level.\r\nPush the dumbbells back up to the starting position.\r\nRepeat for 10-12 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(34, 'High Knees', 'A high-intensity cardiovascular exercise that engages the core and legs.', 8, 1, 1, '0', 'None', 'INTERMEDIATE', 'tand in place and jog in a way that brings your knees as high as possible with each step.\r\nMaintain a fast pace for 30 seconds to 1 minute.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(35, ' Russian Twists', 'An abdominal exercise that targets the obliques.', 5, 1, 2, '0', 'None', 'INTERMEDIATE', 'Sit on the floor with your knees bent and feet lifted off the ground.\r\nHold a weight or certain object with both hands, close to your chest.\r\nLean back slightly to engage your core.\r\n- Twist your torso to the right, bringing the object to the outside of your right hip.\r\n- Return to the center and then twist to the left.\r\n- Continue alternating sides for 20-30 total repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(36, 'Pull-Up', 'An upper body exercise that targets the back and biceps.', 4, 1, 2, '0', 'Pull-up bar', 'INTERMEDIATE', 'Hang from a pull-up bar with your palms facing away from your body.\r\nPull your body up towards the bar until your chin is above it.\r\nLower your body back down to the starting position.\r\nRepeat for 6-8 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(37, 'Burpees', 'A full-body, high-intensity exercise that combines a squat, push-up, and jump.', 10, 1, 3, '0', 'None', 'INTERMEDIATE', 'Start in a standing position.\r\nDrop into a squat position and place your hands on the floor.\r\nKick your feet back into a push-up position.\r\nPerform a push-up.\r\nJump your feet back to the squat position.\r\nExplode up into a jump, reaching your arms overhead.\r\nRepeat for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(38, 'Tricep Dips', 'An isolation exercise that targets the triceps.', 3, 1, 2, '0', 'Parallel bars or a sturdy surface.', 'INTERMEDIATE', 'Position your hands on parallel bars or a sturdy surface, shoulder-width apart.\r\nLower your body by bending your elbows until they are at a 90-degree angle.\r\nPush your body back up to the starting position.\r\nRepeat for 10-12 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(39, 'Mountain Climbers', 'A high-intensity cardiovascular exercise that engages the core and legs.', 8, 1, 3, '0', 'None', 'BEGINNER', 'Begin in a push-up position with your hands under your shoulders.\r\nBring your right knee toward your chest, then switch and bring the left knee toward your chest in a running motion.\r\nMaintain a fast pace for 30 seconds to 1 minute.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(40, 'Box Jumps', 'A plyometric exercise that builds leg strength and power.', 8, 1, 2, '0', 'Box or sturdy platform', 'INTERMEDIATE', 'Stand in front of a sturdy box or platform.\r\nJump onto the box, landing softly with both feet.\r\nStand up straight on top of the box.\r\nStep or jump back down to the starting position.\r\nRepeat for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(41, 'Kettlebell Swing', 'A dynamic full-body exercise that engages the hips and lower back.', 7, 1, 2, '0', 'Kettlebell', 'INTERMEDIATE', 'Stand with your feet shoulder-width apart, holding a kettlebell with both hands in front of you.\r\nBend at your hips and knees slightly while keeping your back straight.\r\nSwing the kettlebell between your legs.\r\nThrust your hips forward and swing the kettlebell up to shoulder height.\r\nRepeat for 12-15 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(42, 'Leg Raises', 'An abdominal exercise that targets the lower abs.', 4, 1, 1, '0', 'Mat or bench', 'INTERMEDIATE', 'Lie on your back with your legs extended and your hands under your hips.\r\nLift your legs off the ground, keeping them straight, until they are perpendicular to the floor.\r\nLower your legs back down without letting them touch the ground.\r\nRepeat for 12-15 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(43, 'Battle Ropes', 'A high-intensity cardiovascular exercise that works the arms, shoulders, and core.', 10, 0, 3, '0', 'Battle ropes', 'ADVANCED', 'Stand with your feet shoulder-width apart, holding one end of a battle rope in each hand.\r\nAlternate raising and lowering each arm rapidly to create waves in the ropes.\r\nMaintain a fast pace for 30 seconds to 1 minute.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(44, 'Plank Variations', ' Various plank variations that challenge the core and stability.', 5, 1, 2, '0', 'None', 'BEGINNER', 'Perform standard planks, side planks, and forearm planks for 30 seconds each, with a 10-second rest in between.\r\nRepeat for 2-3 sets.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(45, 'Romanian Deadlift', 'A variation of the deadlift that targets the hamstrings and lower back.', 6, 1, 2, '0', 'Barbell or Dumbbells', 'BEGINNER', 'Stand with your feet hip-width apart, holding a barbell or dumbbells in front of your thighs.\r\nBend at your hips while keeping your knees slightly bent and lower the weight as far as your flexibility allows.\r\nKeep your back straight and chest up.\r\nReturn to the starting position by thrusting your hips forward.\r\nRepeat for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(46, 'Box Squat', 'A squat variation that emphasizes the hips and glutes.', 6, 1, 2, '0', 'Box or bench', 'BEGINNER', 'Stand in front of a sturdy box or bench.\r\nLower your body by bending your hips and knees until you sit on the box.\r\nPause briefly, then stand back up.\r\nRepeat for 10-12 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(47, 'Russian Deadlift', 'A variation of the deadlift that targets the hamstrings and lower back.', 6, 1, 1, '0', 'Barbell or Dumbbells', 'ADVANCED', 'Stand with your feet hip-width apart, holding a barbell or dumbbells in front of your thighs.\r\nBend at your hips while keeping your knees slightly bent and lower the weight as far as your flexibility allows.\r\nKeep your back straight and chest up.\r\nReturn to the starting position by thrusting your hips forward.\r\nRepeat for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(48, 'Wall Sits', 'An isometric exercise that strengthens the quadriceps and lower body.', 3, 1, 2, '0', 'Wall or stable surface', 'BEGINNER', 'Stand with your back against a wall and your feet hip-width apart.\r\nSlide down the wall, bending your knees until they are at a 90-degree angle.\r\nHold this position for as long as you can, aiming for 30 seconds to 1 minute.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(49, 'Medicine Ball Slam', 'A high-intensity exercise that works the entire body and improves explosive power.', 8, 1, 2, '0', 'Medicine ball', 'INTERMEDIATE', 'Stand with your feet shoulder-width apart, holding a medicine ball overhead.\r\nSlam the ball into the ground with force.\r\nCatch the ball on the bounce and repeat for 12-15 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(50, 'Hanging Leg Raise', 'An advanced abdominal exercise that targets the lower abs.', 4, 1, 1, '0', 'Pull-up bar', 'ADVANCED', 'Hang from a pull-up bar with your palms facing away from your body.\r\nRaise your legs in front of you until they are parallel to the floor.\r\nLower your legs back down with control.\r\nRepeat for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(51, 'Reverse Lunge', 'A variation of the lunge that targets the quadriceps, hamstrings, and glutes.', 5, 1, 2, '0', 'None', 'INTERMEDIATE', 'Stand with your feet together.\r\nTake a step backward with one foot and lower your body until both knees are bent at a 90-degree angle.\r\nReturn to the starting position.\r\nRepeat on the other leg.\r\nContinue alternating for 12-15 repetitions on each leg.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(52, 'Bent-Over Row', 'An exercise that targets the upper back and biceps.', 4, 1, 2, '0', 'Barbell or Dumbbells', 'INTERMEDIATE', 'Stand with your feet hip-width apart, holding a barbell or dumbbells in front of your thighs.\r\nBend at your hips and knees slightly while keeping your back straight.\r\nPull the weight(s) toward your lower ribcage by bending your elbows.\r\nLower the weight(s) back down with control.\r\nRepeat for 10-12 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(53, 'Box Jumps with Burpees', 'A combination of box jumps and burpees for a challenging full-body workout.', 12, 0, 3, '0', 'Box or sturdy platform', 'BEGINNER', 'Perform a box jump onto a sturdy box or platform.\r\nImmediately follow it with a burpee.\r\nRepeat this combination for 8-10 repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw'),
(54, 'Russian Twist with Medicine Ball', ' An abdominal exercise that targets the obliques.', 6, 1, 2, '0', 'Medicine ball', 'BEGINNER', 'Sit on the floor with your knees bent and feet lifted off the ground, holding a medicine ball.\r\nLean back slightly to engage your core.\r\nTwist your torso to the right, bringing the medicine ball to the outside of your right hip.\r\nReturn to the center and then twist to the left.\r\nContinue alternating sides for 20-30 total repetitions.', 'https://www.inspireusafoundation.org/wp-content/uploads/2023/07/plank-benefits.png', 'https://www.youtube.com/embed/pSHjTRCQxIw');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `meal` varchar(255) NOT NULL,
  `diet` varchar(255) NOT NULL,
  `calories` float NOT NULL,
  `protein` float NOT NULL,
  `fat` float NOT NULL,
  `carbohydrates` float NOT NULL,
  `serving` float NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `meal`, `diet`, `calories`, `protein`, `fat`, `carbohydrates`, `serving`, `photo`) VALUES
(190, 'Banana', 'breakfast', 'Vegetarian', 105, 1, 0, 0, 150, 'https://images.immediate.co.uk/production/volatile/sites/30/2017/01/Bunch-of-bananas-67e91d5.jpg?qua'),
(191, 'Mango', 'breakfast', 'Vegetarian', 150, 1, 1, 0, 150, 'https://www.organics.ph/cdn/shop/products/mango-ripe-250grams-per-piece-fruits-vegetables-fresh-prod'),
(192, 'Papaya', 'breakfast', 'Vegetarian', 119, 1, 0, 0, 150, 'https://cdn-prod.medicalnewstoday.com/content/images/articles/275/275517/a-papaya-cut-in-half.jpg'),
(193, 'Pineapple', 'breakfast', 'Vegetarian', 82, 1, 0, 0, 150, 'https://i.ebayimg.com/images/g/T4QAAOSwnNBXcCng/s-l1200.webp'),
(194, 'Guava', 'breakfast', 'Vegetarian', 37, 2, 0, 0, 150, 'https://shop.wattsfarms.co.uk/cdn/shop/products/Guava-171575811_2122x1415_344d60c9-58c1-44ee-9f1a-8f'),
(195, 'Banana', 'lunch', 'Vegetarian', 105, 1, 0, 27, 150, 'https://images.immediate.co.uk/production/volatile/sites/30/2017/01/Bunch-of-bananas-67e91d5.jpg?qua'),
(196, 'Mango', 'lunch', 'Vegetarian', 150, 1, 1, 38, 150, 'https://www.organics.ph/cdn/shop/products/mango-ripe-250grams-per-piece-fruits-vegetables-fresh-prod'),
(197, 'Papaya', 'lunch', 'Vegetarian', 119, 1, 0, 30, 150, 'https://cdn-prod.medicalnewstoday.com/content/images/articles/275/275517/a-papaya-cut-in-half.jpg'),
(198, 'Pineapple', 'lunch', 'Vegetarian', 82, 1, 0, 22, 150, 'https://i.ebayimg.com/images/g/T4QAAOSwnNBXcCng/s-l1200.webp'),
(199, 'Guava', 'lunch', 'Vegetarian', 37, 2, 0, 9, 150, ''),
(200, 'Banana', 'dinner', 'Vegetarian', 105, 1, 0, 27, 150, 'https://images.immediate.co.uk/production/volatile/sites/30/2017/01/Bunch-of-bananas-67e91d5.jpg?qua'),
(202, 'Brown Rice', 'breakfast', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(203, 'Adlai', 'breakfast', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(204, 'Sinandomeng Rice', 'breakfast', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(206, 'White Rice', 'lunch', 'Vegetarian', 150, 3, 0, 35, 150, ''),
(207, 'Brown Rice', 'lunch', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(208, 'Adlai', 'lunch', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(209, 'Sinandomeng Rice', 'lunch', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(211, 'White Rice', 'dinner', 'Vegetarian', 150, 3, 0, 35, 150, ''),
(212, 'Brown Rice', 'dinner', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(213, 'Adlai', 'dinner', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(214, 'Sinandomeng Rice', 'dinner', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(216, 'White Rice', 'breakfast', 'Vegetarian', 150, 3, 0, 35, 150, ''),
(217, 'Brown Rice', 'breakfast', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(218, 'Adlai', 'breakfast', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(219, 'Sinandomeng Rice', 'breakfast', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(220, 'Jasponica Rice', 'breakfast', 'Vegetarian', 150, 2, 1, 35, 150, ''),
(221, 'White Rice', 'lunch', 'Vegetarian', 150, 3, 0, 35, 150, ''),
(222, 'Brown Rice', 'lunch', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(223, 'Adlai', 'lunch', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(224, 'Sinandomeng Rice', 'lunch', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(225, 'Jasponica Rice', 'lunch', 'Vegetarian', 150, 2, 1, 35, 150, ''),
(226, 'White Rice', 'dinner', 'Vegetarian', 150, 3, 0, 35, 150, ''),
(227, 'Brown Rice', 'dinner', 'Vegetarian', 160, 4, 1, 35, 150, ''),
(228, 'Adlai', 'dinner', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(229, 'Sinandomeng Rice', 'dinner', 'Vegetarian', 160, 3, 2, 35, 150, ''),
(230, 'Jasponica Rice', 'dinner', 'Vegetarian', 150, 2, 1, 35, 150, ''),
(231, 'Oatmeal', 'breakfast', 'Vegetarian', 150, 5, 3, 27, 150, ''),
(232, 'Egg White Omelette', 'breakfast', 'Vegetarian', 150, 20, 5, 2, 150, ''),
(233, 'Greek Yogurt', 'breakfast', 'Vegetarian', 100, 10, 0, 15, 150, ''),
(234, 'Avocado Toast', 'breakfast', 'Vegetarian', 250, 5, 15, 30, 150, ''),
(235, 'Quinoa Bowl', 'breakfast', 'Vegetarian', 300, 10, 5, 50, 150, ''),
(236, 'Whole Wheat Pancakes', 'breakfast', 'Vegetarian', 200, 5, 3, 40, 150, ''),
(237, 'Chia Pudding', 'breakfast', 'Vegetarian', 120, 3, 5, 20, 150, ''),
(238, 'Smoothie Bowl', 'breakfast', 'Vegetarian', 180, 5, 2, 35, 150, ''),
(239, 'Tofu Scramble', 'breakfast', 'Vegetarian', 200, 10, 7, 15, 150, ''),
(240, 'Vegan Breakfast Burrito', 'breakfast', 'Vegetarian', 250, 15, 10, 25, 150, ''),
(241, 'Salmon and Cream Cheese Bagel', 'breakfast', 'Vegetarian', 350, 15, 18, 40, 150, ''),
(242, 'Spinach and Mushroom Frittata', 'breakfast', 'Vegetarian', 200, 10, 8, 20, 150, ''),
(243, 'Peanut Butter Banana Toast', 'breakfast', 'Vegetarian', 250, 5, 12, 30, 150, ''),
(244, 'Coconut Milk Rice Pudding', 'breakfast', 'Vegetarian', 180, 4, 5, 35, 150, ''),
(245, 'Sweet Potato Hash', 'breakfast', 'Vegetarian', 220, 5, 10, 30, 150, ''),
(246, 'Vegan Tofu Scramble', 'breakfast', 'Vegetarian', 220, 15, 8, 15, 150, ''),
(247, 'Vegan Pancakes', 'breakfast', 'Vegetarian', 180, 5, 3, 35, 150, ''),
(248, 'Chickpea and Spinach Breakfast Bowl', 'breakfast', 'Vegetarian', 250, 10, 10, 30, 150, ''),
(249, 'Vegan Smoothie Bowl', 'breakfast', 'Vegetarian', 160, 5, 2, 30, 150, ''),
(250, 'Vegan Breakfast Burrito', 'breakfast', 'Vegetarian', 220, 12, 8, 20, 150, ''),
(251, 'Champorado', 'breakfast', 'Vegetarian', 200, 5, 5, 35, 150, ''),
(252, 'Arroz Caldo', 'breakfast', 'Vegetarian', 220, 8, 6, 35, 150, ''),
(253, 'Halo-Halo', 'breakfast', 'Vegetarian', 250, 4, 8, 45, 150, ''),
(254, 'Puto with Cheese', 'breakfast', 'Vegetarian', 180, 3, 5, 30, 150, ''),
(255, 'Lugaw', 'breakfast', 'Vegetarian', 150, 3, 2, 30, 150, ''),
(256, 'Pandesal with Kesong Puti', 'breakfast', 'Vegetarian', 220, 7, 8, 30, 150, ''),
(257, 'Atsara', 'breakfast', 'Vegetarian', 120, 1, 3, 25, 150, ''),
(258, 'Taho', 'breakfast', 'Vegetarian', 180, 5, 5, 35, 150, ''),
(259, 'Pancit Malabon', 'breakfast', 'Vegetarian', 240, 8, 6, 40, 150, ''),
(260, 'Puto Bumbong', 'breakfast', 'Vegetarian', 210, 5, 5, 40, 150, ''),
(261, 'Champorado', 'breakfast', 'Vegetarian', 200, 5, 5, 35, 150, ''),
(262, 'Arroz Caldo', 'breakfast', 'Non-Vegetarian', 220, 8, 6, 35, 150, ''),
(263, 'Halo-Halo', 'breakfast', 'Non-Vegetarian', 250, 4, 8, 45, 150, ''),
(264, 'Puto with Cheese', 'breakfast', 'Vegetarian', 180, 3, 5, 30, 150, ''),
(265, 'Lugaw', 'breakfast', 'Vegetarian', 150, 3, 2, 30, 150, ''),
(266, 'Pandesal with Kesong Puti', 'breakfast', 'Vegetarian', 220, 7, 8, 30, 150, ''),
(267, 'Atsara', 'breakfast', 'Vegetarian', 120, 1, 3, 25, 150, ''),
(268, 'Taho', 'breakfast', 'Vegetarian', 180, 5, 5, 35, 150, ''),
(269, 'Bangusilog', 'breakfast', 'Non-Vegetarian', 320, 20, 15, 30, 150, ''),
(270, 'Adobo Flakes', 'breakfast', 'Non-Vegetarian', 280, 15, 10, 25, 150, ''),
(271, 'Beef Tapa', 'breakfast', 'Non-Vegetarian', 350, 20, 18, 40, 150, ''),
(272, 'Chicken Arroz Caldo', 'breakfast', 'Non-Vegetarian', 280, 12, 10, 30, 150, ''),
(273, 'Tinapa', 'breakfast', 'Non-Vegetarian', 250, 10, 15, 30, 150, ''),
(274, 'Tapsilog', 'breakfast', 'Non-Vegetarian', 350, 20, 18, 40, 150, ''),
(275, 'Puto', 'breakfast', 'Vegetarian', 120, 3, 5, 20, 150, ''),
(276, 'Pandesal with Kesong Puti', 'breakfast', 'Vegetarian', 220, 7, 8, 30, 150, ''),
(277, 'Puto with Cheese', 'breakfast', 'Vegetarian', 180, 3, 5, 30, 150, ''),
(278, 'Lugaw', 'breakfast', 'Vegetarian', 150, 3, 2, 30, 150, ''),
(279, 'Adobo', 'lunch', 'Non-Vegetarian', 380, 18, 25, 30, 250, ''),
(280, 'Lechon Kawali', 'lunch', 'Non-Vegetarian', 420, 25, 30, 35, 250, ''),
(281, 'Sinigang na Baboy', 'lunch', 'Non-Vegetarian', 320, 15, 20, 35, 250, ''),
(282, 'Kare-Kare', 'lunch', 'Non-Vegetarian', 380, 20, 28, 30, 250, ''),
(283, 'Pancit Canton', 'lunch', 'Non-Vegetarian', 350, 12, 20, 40, 250, ''),
(284, 'Laing', 'lunch', 'Vegetarian', 280, 10, 20, 35, 250, ''),
(285, 'Pinakbet', 'lunch', 'Vegetarian', 300, 10, 20, 40, 250, ''),
(286, 'Ginisang Ampalaya', 'lunch', 'Vegetarian', 220, 8, 12, 30, 250, ''),
(287, 'Tortang Talong', 'lunch', 'Vegetarian', 240, 10, 15, 30, 250, ''),
(288, 'Adobong Kangkong', 'lunch', 'Vegetarian', 180, 6, 10, 25, 250, ''),
(289, 'Bicol Express', 'lunch', 'Non-Vegetarian', 350, 18, 20, 35, 250, ''),
(290, 'Kilawin', 'lunch', 'Non-Vegetarian', 280, 15, 18, 30, 250, ''),
(291, 'Pork Sinigang', 'lunch', 'Non-Vegetarian', 320, 15, 20, 30, 250, ''),
(292, 'Tinolang Manok', 'lunch', 'Non-Vegetarian', 340, 20, 22, 30, 250, ''),
(293, 'Chicken Adobo', 'lunch', 'Non-Vegetarian', 360, 20, 25, 30, 250, ''),
(294, 'Bicol Express', 'lunch', 'Vegetarian', 300, 12, 18, 35, 250, ''),
(295, 'Ginataang Langka', 'lunch', 'Vegetarian', 260, 8, 15, 40, 250, ''),
(296, 'Pinakbet', 'lunch', 'Vegetarian', 280, 10, 20, 35, 250, ''),
(297, 'Tortang Talong', 'lunch', 'Vegetarian', 250, 10, 15, 30, 250, ''),
(298, 'Adobong Sitaw', 'lunch', 'Vegetarian', 220, 8, 12, 30, 250, ''),
(299, 'Kaldereta', 'lunch', 'Non-Vegetarian', 350, 18, 25, 30, 250, ''),
(300, 'Pork Binagoongan', 'lunch', 'Non-Vegetarian', 380, 20, 28, 35, 250, ''),
(301, 'Inihaw na Liempo', 'lunch', 'Non-Vegetarian', 420, 25, 30, 35, 250, ''),
(302, 'Pancit Malabon', 'lunch', 'Non-Vegetarian', 340, 15, 20, 40, 250, ''),
(303, 'Kilawin', 'lunch', 'Non-Vegetarian', 280, 15, 18, 30, 250, ''),
(304, 'Ginataang Mais', 'lunch', 'Vegetarian', 260, 5, 12, 45, 250, ''),
(305, 'Ginataang Kalabasa', 'lunch', 'Vegetarian', 280, 8, 15, 40, 250, ''),
(306, 'Laing', 'lunch', 'Vegetarian', 280, 10, 20, 35, 250, ''),
(307, 'Tinolang Manok sa Malunggay', 'lunch', 'Vegetarian', 320, 15, 20, 40, 250, ''),
(308, 'Ginataang Langka', 'lunch', 'Vegetarian', 260, 8, 15, 40, 250, ''),
(309, 'Kare-Kare', 'dinner', 'Non-Vegetarian', 400, 22, 30, 35, 250, ''),
(310, 'Lechon Kawali', 'dinner', 'Non-Vegetarian', 450, 28, 35, 40, 250, ''),
(311, 'Adobo', 'dinner', 'Non-Vegetarian', 380, 18, 25, 30, 250, ''),
(312, 'Sinigang na Hipon', 'dinner', 'Non-Vegetarian', 350, 20, 18, 35, 250, ''),
(313, 'Pork Binagoongan', 'dinner', 'Non-Vegetarian', 420, 25, 30, 35, 250, ''),
(314, 'Ginataang Gulay', 'dinner', 'Vegetarian', 280, 10, 20, 35, 250, ''),
(315, 'Laing', 'dinner', 'Vegetarian', 300, 12, 22, 30, 250, ''),
(316, 'Pinakbet', 'dinner', 'Vegetarian', 320, 12, 24, 30, 250, ''),
(317, 'Tortang Talong', 'dinner', 'Vegetarian', 260, 10, 15, 30, 250, ''),
(318, 'Adobong Kangkong', 'dinner', 'Vegetarian', 220, 8, 14, 30, 250, ''),
(319, 'Pancit Malabon', 'dinner', 'Non-Vegetarian', 380, 15, 25, 40, 250, ''),
(320, 'Bicol Express', 'dinner', 'Non-Vegetarian', 360, 18, 28, 35, 250, ''),
(321, 'Pork Sinigang', 'dinner', 'Non-Vegetarian', 340, 20, 20, 30, 250, ''),
(322, 'Inihaw na Liempo', 'dinner', 'Non-Vegetarian', 420, 25, 30, 35, 250, ''),
(323, 'Kilawin', 'dinner', 'Non-Vegetarian', 300, 18, 20, 30, 250, ''),
(324, 'Ginataang Langka', 'dinner', 'Vegetarian', 280, 8, 15, 40, 250, ''),
(325, 'Ginataang Mais', 'dinner', 'Vegetarian', 260, 5, 12, 45, 250, ''),
(326, 'Ginataang Kalabasa', 'dinner', 'Vegetarian', 300, 10, 20, 35, 250, ''),
(327, 'Tinolang Manok sa Malunggay', 'dinner', 'Vegetarian', 320, 15, 20, 40, 250, ''),
(328, 'Adobong Sitaw', 'dinner', 'Vegetarian', 220, 8, 14, 30, 250, ''),
(329, 'Bangus Belly', 'dinner', 'Non-Vegetarian', 380, 22, 30, 25, 250, ''),
(330, 'Chicken Inasal', 'dinner', 'Non-Vegetarian', 400, 20, 28, 30, 250, ''),
(331, 'Pancit Canton', 'dinner', 'Non-Vegetarian', 350, 12, 20, 40, 250, ''),
(332, 'Tuna Steak', 'dinner', 'Non-Vegetarian', 360, 22, 25, 20, 250, ''),
(333, 'Beef Caldereta', 'dinner', 'Non-Vegetarian', 420, 25, 30, 35, 250, ''),
(334, 'Ginataang Kalabasa', 'dinner', 'Vegetarian', 280, 10, 20, 35, 250, ''),
(335, 'Pinakbet', 'dinner', 'Vegetarian', 320, 12, 24, 30, 250, ''),
(336, 'Tortang Talong', 'dinner', 'Vegetarian', 260, 10, 15, 30, 250, ''),
(337, 'Adobong Sitaw', 'dinner', 'Vegetarian', 220, 8, 14, 30, 250, ''),
(338, 'Ginataang Labong', 'dinner', 'Vegetarian', 300, 10, 18, 30, 250, '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membershipid` varchar(50) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membershipid`, `plan`, `startDate`, `dueDate`, `status`) VALUES
('', '15 Days', '2024-02-14', '2026-06-13', 'Active'),
('20240207002', '1 Month', '2024-01-23', '2025-06-06', 'Active'),
('20240207003', '1 Month', '2024-02-26', '2024-03-26', 'Active'),
('20240207004', '15 Days', '2024-02-14', '2024-02-29', 'Active'),
('20240207005', '6 Months', '2024-02-26', '2024-08-26', 'Active'),
('20240207006', '15 Days', '2024-02-17', '2024-03-18', 'Active'),
('20240207007', '1 Month', '2024-02-17', '2024-03-17', 'Active'),
('20240207010', '15 Days', '2024-02-07', '2024-04-06', 'Active'),
('20240207011', '15 Days', '2024-02-14', '2024-02-29', 'Active'),
('20240207012', '1 Month', '2024-02-08', '2024-06-23', 'Active'),
('20240207013', '15 Days', '2024-02-14', '2024-02-27', 'Active'),
('20240217015', '15 Days', '2024-02-19', '2024-02-27', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifID` int(11) NOT NULL,
  `IdNum` bigint(15) DEFAULT NULL,
  `messageCategory` varchar(50) NOT NULL,
  `messageContent` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `notifDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifID`, `IdNum`, `messageCategory`, `messageContent`, `status`, `notifDate`) VALUES
(1, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-11 00:00:00'),
(8, 20240207001, 'Subscription Request', 'Yet another subscription request has been received.', 'Read', '2024-02-12 00:00:00'),
(9, 20240207001, 'User Expiring Subscription', 'Yet another user\'s subscription is expiring soon.', 'Read', '2024-02-11 00:00:00'),
(11, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-16 23:41:36'),
(12, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 00:16:20'),
(13, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 00:23:26'),
(14, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 00:35:01'),
(15, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 00:49:09'),
(16, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-17 15:21:59'),
(17, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 15:39:32'),
(18, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-17 15:43:53'),
(19, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-18 23:34:24'),
(20, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-18 23:35:29'),
(21, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-18 23:49:49'),
(22, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:00:30'),
(23, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:01:57'),
(24, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:03:48'),
(25, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:05:36'),
(26, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:06:55'),
(27, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:11:20'),
(28, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:12:41'),
(29, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 00:14:05'),
(30, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-19 14:36:31'),
(31, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 15:48:05'),
(32, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 17:56:57'),
(33, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:42:08'),
(34, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:42:12'),
(35, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:50:00'),
(36, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:50:03'),
(37, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:59:32'),
(38, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 18:59:35'),
(39, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 19:19:00'),
(40, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 19:19:23'),
(41, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 19:35:35'),
(42, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 19:48:33'),
(43, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-19 22:02:24'),
(44, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-21 21:17:49'),
(45, 20240207001, 'Account Registration', 'A new user has registered.', 'Read', '2024-02-22 08:33:16'),
(46, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-22 08:34:59'),
(47, 20240207001, 'Subscription Request', 'A new subscription request has been received.', 'Read', '2024-02-22 09:09:20'),
(48, 20240207001, 'User Expiring Subscription', 'A member is approaching their membership due date.', 'Read', '2024-02-25 14:20:26'),
(49, 20240207001, 'User Expiring Subscription', 'A member is approaching their membership due date.', 'Read', '2024-02-25 14:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` varchar(50) NOT NULL,
  `IdNum` varchar(50) NOT NULL,
  `subscriptionID` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL,
  `payment` float DEFAULT NULL,
  `changeMoney` float DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `User` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `IdNum`, `subscriptionID`, `price`, `status`, `paymentMethod`, `payment`, `changeMoney`, `date_created`, `payment_date`, `User`) VALUES
('GYM202402070001', '20240207002', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-07 19:25:11', '2023-12-31 12:25:26', '20240207001'),
('GYM202402070002', '20240207010', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-07 19:34:35', '2024-01-08 12:35:03', '20240207001'),
('GYM202402070003', '20240207010', 2, 850, 'Complete', 'Cash', 900, 50, '2024-02-07 19:37:12', '2024-02-01 12:37:19', '20240207001'),
('GYM202402070004', '20240207010', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-07 19:37:48', '2024-02-07 12:37:57', '20240207001'),
('GYM202402080005', '20240207012', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-08 08:10:54', '2024-02-08 01:11:08', '20240207001'),
('GYM202402080006', '20240208015', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-08 16:22:05', '2024-02-08 09:22:34', '20240207001'),
('GYM202402110007', '20240207002', 5, 9700, 'Inactive', 'Cash', 0, 0, '2024-02-11 17:17:45', '0000-00-00 00:00:00', ''),
('GYM202402140008', '20240207012', 1, 300, 'Inactive', 'Cash', 0, 0, '2024-02-14 12:45:03', '2024-02-14 05:45:16', '20240207001'),
('GYM202402140009', '20240207012', 1, 300, 'Inactive', 'Cash', 0, 0, '2024-02-14 12:46:35', '2024-02-14 05:47:03', '20240207001'),
('GYM202402140010', '20240207012', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-14 12:49:30', '2024-02-14 05:50:25', '20240207001'),
('GYM202402140011', '20240207012', 2, 850, 'Complete', 'Cash', 1000, 150, '2024-02-14 12:53:43', '2024-02-14 12:54:31', '20240207001'),
('GYM202402140012', '20240207012', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-14 12:58:35', '0000-00-00 00:00:00', NULL),
('GYM202402140013', '20240207012', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-14 14:58:41', '0000-00-00 00:00:00', NULL),
('GYM202402140014', '20240207012', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-14 15:22:22', '2024-02-14 15:33:47', '20240207001'),
('GYM202402140015', '20240207012', 2, 850, 'Complete', 'Cash', 900, 50, '2024-02-14 15:40:39', '2024-02-14 15:41:07', '20240207001'),
('GYM202402140016', '20240207011', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-14 16:01:22', '2024-02-14 16:04:05', '20240207001'),
('GYM202402140017', '20240207013', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-14 16:07:49', '2024-02-14 16:07:49', '20240207001'),
('GYM202402140018', '20240207004', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-14 17:43:07', '2024-02-14 17:43:07', '20240207001'),
('GYM202402140019', '20240207013', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-14 18:58:48', NULL, NULL),
('GYM202402160023', '20240207006', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-17 00:24:08', '2024-02-17 00:24:08', '20240207001'),
('GYM202402160025', '20240207007', 2, 850, 'Complete', 'Cash', 1000, 150, '2024-02-17 00:39:56', '2024-02-17 00:39:56', '20240207001'),
('GYM202402170020', '20240207006', 3, 2450, 'Inactive', 'Cash', NULL, NULL, '2024-02-17 00:15:09', NULL, NULL),
('GYM202402170021', '20240207006', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-17 00:16:20', NULL, NULL),
('GYM202402170022', '20240207006', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-17 00:23:26', NULL, NULL),
('GYM202402170024', '20240207006', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-17 00:35:01', '2024-02-17 00:35:18', '20240207001'),
('GYM202402170026', '20240217015', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-17 15:39:32', NULL, NULL),
('GYM202402170027', '20240217015', 1, 300, 'Complete', 'Cash', 500, 200, '2024-02-17 15:43:53', '2024-02-19 15:39:51', '20240207001'),
('GYM202402180028', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-18 23:34:24', NULL, NULL),
('GYM202402180029', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-18 23:35:29', NULL, NULL),
('GYM202402180030', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-18 23:49:49', NULL, NULL),
('GYM202402190031', '20240207002', 5, 9700, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:00:30', NULL, NULL),
('GYM202402190032', '20240207002', 5, 9700, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:01:57', NULL, NULL),
('GYM202402190033', '20240207002', 4, 4800, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:03:48', NULL, NULL),
('GYM202402190034', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:05:36', NULL, NULL),
('GYM202402190035', '20240207002', 5, 9700, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:06:55', NULL, NULL),
('GYM202402190036', '20240207002', 4, 4800, 'SomeOtherStatus', 'GCash', NULL, NULL, '2024-02-19 00:11:20', NULL, NULL),
('GYM202402190037', '20240207002', 4, 4800, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 00:12:41', NULL, NULL),
('GYM202402190038', '20240207002', 2, 850, 'Complete', 'Cash', 900, 50, '2024-02-19 00:14:05', '2024-02-19 00:14:31', '20240207001'),
('GYM202402190039', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 15:48:05', NULL, NULL),
('GYM202402190040', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 17:56:57', NULL, NULL),
('GYM202402190041', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:42:08', NULL, NULL),
('GYM202402190042', '20240207002', 3, 2450, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:42:12', NULL, NULL),
('GYM202402190043', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:50:00', NULL, NULL),
('GYM202402190044', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:50:03', NULL, NULL),
('GYM202402190045', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:59:32', NULL, NULL),
('GYM202402190046', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 18:59:35', NULL, NULL),
('GYM202402190047', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 19:19:00', NULL, NULL),
('GYM202402190048', '20240207002', 2, 850, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 19:19:23', NULL, NULL),
('GYM202402190049', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 19:35:35', NULL, NULL),
('GYM202402190050', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 19:48:33', NULL, NULL),
('GYM202402190051', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-19 22:02:24', NULL, NULL),
('GYM202402220052', '20240207002', 1, 300, 'Inactive', 'Cash', NULL, NULL, '2024-02-22 08:34:59', NULL, NULL),
('GYM202402220053', '20240207002', 2, 850, 'Pending', 'Cash', NULL, NULL, '2024-02-22 09:09:20', NULL, NULL),
('GYM202402260054', '20240207005', 4, 4800, 'Complete', 'Cash', 5000, 200, '2024-02-26 21:35:42', '2024-02-26 21:35:42', '20240207001'),
('GYM202402260055', '20240207003', 2, 850, 'Complete', 'Cash', 1000, 150, '2024-02-26 21:38:02', '2024-02-26 21:38:02', '20240207001');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `subscriptionName` varchar(50) NOT NULL,
  `subscriptionDescription` varchar(200) NOT NULL,
  `Price` float NOT NULL,
  `numberOfDays` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `subscriptionName`, `subscriptionDescription`, `Price`, `numberOfDays`, `status`) VALUES
(1, '15 Days', '15 Days subscription for gym access	', 300, 15, 'Active'),
(2, '1 Month', 'Monthly subscription for gym access', 850, 30, 'Active'),
(3, '3 Months', 'Quarterly subscription for gym access', 2450, 90, 'Active'),
(4, '6 Months', 'Half-yearly subscription for gym access', 4800, 180, 'Active'),
(5, '1 Year', 'Annual subscription for gym access', 9700, 365, 'Active'),
(6, '7 Days', 'Access to the gym for 7 days', 120, 7, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `weightlog`
--

CREATE TABLE `weightlog` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weightlog`
--

INSERT INTO `weightlog` (`id`, `userid`, `weight`, `date`) VALUES
(1, '117@gmail.com', 95, '2024-01-25'),
(2, '117@gmail.com', 95.8, '2024-01-18'),
(3, '117@gmail.com', 96.6, '2024-01-11'),
(4, '117@gmail.com', 97, '2024-01-04'),
(5, '117@gmail.com', 97.89, '2023-12-28'),
(18, '117@gmail.com', 97.98, '2024-01-28'),
(19, '117@gmail.com', 97.89, '2024-01-31'),
(26, '117@gmail.com', 97, '2024-01-31'),
(27, '456@gmail.com', 97, '2024-01-31'),
(28, '456@gmail.com', 96, '2024-01-31'),
(29, '456@gmail.com', 100, '2024-01-31'),
(30, '456@gmail.com', 110, '2024-01-31'),
(31, '456@gmail.com', 200, '2024-01-31'),
(32, '117@gmail.com', 97, '2024-02-11'),
(36, 'arthur@gmail.com', 70, '2024-01-01'),
(37, 'arthur@gmail.com', 70.5, '2024-01-08'),
(38, 'arthur@gmail.com', 71, '2024-01-15'),
(39, 'arthur@gmail.com', 71.5, '2024-01-22'),
(40, 'arthur@gmail.com', 72, '2024-01-29'),
(41, 'arthur@gmail.com', 72.5, '2024-02-05'),
(42, 'arthur@gmail.com', 73, '2024-02-12'),
(43, 'arthur@gmail.com', 73.5, '2024-02-19'),
(44, '789@gmail.com', 73, '2024-02-21'),
(45, '789@gmail.com', 70, '2023-12-01'),
(46, '789@gmail.com', 71, '2023-12-08'),
(47, '789@gmail.com', 70.5, '2023-12-15'),
(48, '789@gmail.com', 70, '2023-12-22'),
(49, '789@gmail.com', 70.5, '2023-12-29'),
(50, '789@gmail.com', 71, '2024-01-05'),
(51, '789@gmail.com', 70.5, '2024-01-12'),
(52, '789@gmail.com', 70, '2024-01-19'),
(53, '789@gmail.com', 70.5, '2024-01-26'),
(54, '789@gmail.com', 71, '2024-02-02'),
(55, '789@gmail.com', 70.5, '2024-02-09'),
(56, '789@gmail.com', 70, '2024-02-16'),
(57, 'don@gmail.com', 70, '2023-08-01'),
(58, 'don@gmail.com', 71, '2023-08-08'),
(59, 'don@gmail.com', 70.5, '2023-08-15'),
(60, 'don@gmail.com', 70, '2023-08-22'),
(61, 'don@gmail.com', 70.5, '2023-08-29'),
(62, 'don@gmail.com', 71, '2023-09-05'),
(63, 'don@gmail.com', 70.5, '2023-09-12'),
(64, 'don@gmail.com', 70, '2023-09-19'),
(65, 'don@gmail.com', 70.5, '2023-09-26'),
(66, 'don@gmail.com', 71, '2023-10-03'),
(67, 'don@gmail.com', 70.5, '2023-10-10'),
(68, 'don@gmail.com', 70, '2023-10-17'),
(69, 'don@gmail.com', 70.5, '2023-10-24'),
(70, 'don@gmail.com', 71, '2023-10-31'),
(71, 'don@gmail.com', 70.5, '2023-11-07'),
(72, 'don@gmail.com', 70, '2023-11-14'),
(73, 'don@gmail.com', 70.5, '2023-11-21'),
(74, 'don@gmail.com', 71, '2023-11-28'),
(75, 'don@gmail.com', 70.5, '2023-12-05'),
(76, 'don@gmail.com', 70, '2023-12-12'),
(77, 'don@gmail.com', 70.5, '2023-12-19'),
(78, 'don@gmail.com', 71, '2023-12-26'),
(79, 'don@gmail.com', 70.5, '2024-01-02'),
(80, 'don@gmail.com', 70, '2024-01-09'),
(81, 'don@gmail.com', 70.5, '2024-01-16'),
(82, 'don@gmail.com', 71, '2024-01-23'),
(83, 'don@gmail.com', 70.5, '2024-01-30'),
(84, 'don@gmail.com', 70, '2024-02-06'),
(85, 'don@gmail.com', 70.5, '2024-02-13'),
(86, 'don@gmail.com', 71, '2024-02-20'),
(87, 'butchcaramay123@gmail.com', 45, '2023-12-01'),
(88, 'butchcaramay123@gmail.com', 45.5, '2023-12-08'),
(89, 'butchcaramay123@gmail.com', 46, '2023-12-15'),
(90, 'butchcaramay123@gmail.com', 46.3, '2023-12-22'),
(91, 'butchcaramay123@gmail.com', 45.5, '2023-12-29'),
(92, 'butchcaramay123@gmail.com', 45, '2024-01-05'),
(93, 'butchcaramay123@gmail.com', 45.5, '2024-01-12'),
(94, 'butchcaramay123@gmail.com', 46, '2024-01-19'),
(95, 'butchcaramay123@gmail.com', 46.5, '2024-01-26'),
(96, 'butchcaramay123@gmail.com', 47, '2024-02-02'),
(97, 'butchcaramay123@gmail.com', 47.9, '2024-02-09'),
(98, 'butchcaramay123@gmail.com', 48, '2024-02-16'),
(99, 'butchcaramay123@gmail.com', 44, '2024-02-21'),
(100, '117@gmail.com', 96.3, '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `workoutplan`
--

CREATE TABLE `workoutplan` (
  `id` int(11) NOT NULL,
  `IdNum` int(11) NOT NULL,
  `WorkoutPlanID` int(11) NOT NULL,
  `planName` varchar(50) NOT NULL,
  `goal` varchar(50) NOT NULL,
  `Day` int(11) NOT NULL,
  `Difficulty` varchar(50) NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  `DateCreated` date NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workout_plans`
--

CREATE TABLE `workout_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workout_goal` varchar(50) NOT NULL,
  `PartOfBody` varchar(50) NOT NULL,
  `Difficulty` varchar(20) NOT NULL,
  `workout_plan` varchar(500) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IdNum`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietplan`
--
ALTER TABLE `dietplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plans`
--
ALTER TABLE `diet_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duedate_reminder`
--
ALTER TABLE `duedate_reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`ExerciseID`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membershipid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weightlog`
--
ALTER TABLE `weightlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workoutplan`
--
ALTER TABLE `workoutplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_plans`
--
ALTER TABLE `workout_plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147484211;

--
-- AUTO_INCREMENT for table `dietplan`
--
ALTER TABLE `dietplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diet_plans`
--
ALTER TABLE `diet_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `duedate_reminder`
--
ALTER TABLE `duedate_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `ExerciseID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weightlog`
--
ALTER TABLE `weightlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `workoutplan`
--
ALTER TABLE `workoutplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workout_plans`
--
ALTER TABLE `workout_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
