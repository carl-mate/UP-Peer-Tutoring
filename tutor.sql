-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 01:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_time`
--

CREATE TABLE `available_time` (
  `available_time_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_time`
--

INSERT INTO `available_time` (`available_time_id`, `date`, `start_time`, `end_time`) VALUES
(1, '2022-09-11', '13:52:46', '23:05:44'),
(2, '2022-03-17', '00:40:17', '03:30:56'),
(3, '2022-04-07', '07:59:07', '18:37:29'),
(4, '2022-04-22', '07:36:09', '11:04:58'),
(5, '2021-11-28', '08:00:50', '11:48:41'),
(6, '2022-06-16', '18:09:54', '19:49:58'),
(7, '2022-02-16', '02:33:09', '07:48:16'),
(8, '2021-12-10', '05:49:42', '21:04:49'),
(9, '2022-05-15', '03:53:13', '23:40:49'),
(10, '2022-02-06', '03:05:27', '16:27:40'),
(11, '2022-03-01', '11:16:01', '03:22:57'),
(12, '2021-12-07', '05:37:03', '04:34:58'),
(13, '2022-04-14', '06:41:43', '09:50:56'),
(14, '2022-03-10', '19:07:44', '18:02:52'),
(15, '2022-06-09', '16:32:14', '10:53:23'),
(16, '2022-04-15', '11:04:33', '23:52:27'),
(17, '2022-06-16', '11:58:16', '14:36:50'),
(18, '2022-05-21', '12:40:23', '02:35:41'),
(19, '2021-11-28', '16:05:59', '17:03:58'),
(20, '2022-11-06', '00:51:55', '16:33:43'),
(21, '2022-02-16', '21:04:51', '07:39:53'),
(22, '2022-06-28', '08:45:25', '06:48:49'),
(23, '2022-11-06', '15:00:23', '03:48:08'),
(24, '2021-12-18', '12:13:51', '23:04:48'),
(25, '2022-11-06', '11:37:55', '19:41:09'),
(26, '2022-05-15', '23:18:19', '08:27:12'),
(27, '2022-01-04', '11:45:51', '18:33:58'),
(28, '2022-09-19', '12:13:26', '23:52:25'),
(29, '2022-09-07', '09:25:49', '04:13:58'),
(30, '2022-05-08', '08:18:32', '18:45:43'),
(31, '2022-11-10', '07:53:24', '06:21:32'),
(32, '2021-12-04', '07:48:17', '07:21:22'),
(33, '2022-01-20', '01:25:16', '05:54:39'),
(34, '2022-02-25', '16:03:16', '07:32:58'),
(35, '2021-11-28', '20:43:51', '00:25:45'),
(36, '2022-04-05', '23:55:37', '21:00:02'),
(37, '2021-12-04', '02:41:39', '07:28:19'),
(38, '2022-02-07', '09:33:32', '15:46:07'),
(39, '2021-12-04', '07:07:48', '03:09:55'),
(40, '2021-11-25', '06:19:26', '20:30:49'),
(41, '2022-11-20', '05:27:44', '23:09:58'),
(42, '2022-05-21', '02:47:14', '01:11:23'),
(43, '2022-03-22', '04:44:07', '21:24:12'),
(44, '2022-09-05', '07:06:01', '10:05:42'),
(45, '2022-08-17', '04:49:47', '17:06:22'),
(46, '2022-04-15', '05:55:32', '09:00:44'),
(47, '2022-01-05', '18:54:01', '20:04:38'),
(48, '2022-10-02', '03:45:35', '00:25:24'),
(49, '2022-02-22', '04:21:00', '21:32:55'),
(50, '2022-02-12', '11:46:31', '00:56:53'),
(51, '2022-05-18', '16:36:34', '04:56:34'),
(52, '2022-09-20', '04:17:13', '02:36:58'),
(53, '2022-09-06', '05:48:13', '12:58:53'),
(54, '2022-03-15', '10:44:32', '15:29:10'),
(55, '2022-05-17', '23:02:51', '06:02:40'),
(56, '2022-01-18', '10:02:11', '14:03:36'),
(57, '2022-04-05', '07:23:34', '13:36:57'),
(58, '2022-05-15', '05:47:18', '16:41:49'),
(59, '2022-07-13', '23:42:21', '23:47:47'),
(60, '2022-04-03', '19:24:07', '22:02:10'),
(61, '2022-03-18', '05:15:34', '10:25:06'),
(62, '2022-05-27', '08:36:31', '23:12:13'),
(63, '2022-06-26', '20:23:45', '05:05:30'),
(64, '2022-01-21', '00:23:53', '12:05:40'),
(65, '2022-08-28', '10:13:49', '18:58:54'),
(66, '2022-08-27', '08:33:19', '04:28:29'),
(67, '2022-03-05', '15:49:07', '04:03:09'),
(68, '2022-07-16', '18:13:00', '23:08:30'),
(69, '2022-02-15', '09:58:27', '02:13:20'),
(70, '2022-08-26', '14:07:47', '18:51:20'),
(71, '2022-06-02', '12:24:29', '15:15:34'),
(72, '2022-10-02', '19:54:30', '19:40:56'),
(73, '2022-03-01', '23:18:48', '17:33:52'),
(74, '2022-08-20', '02:26:50', '18:20:23'),
(75, '2022-04-23', '23:27:53', '01:46:01'),
(76, '2022-08-25', '01:41:57', '18:16:18'),
(77, '2022-02-26', '21:15:23', '09:04:29'),
(78, '2022-07-15', '09:47:27', '04:57:49'),
(79, '2022-03-27', '22:08:35', '06:03:21'),
(80, '2022-04-12', '22:48:52', '19:03:31'),
(81, '2022-10-12', '08:16:26', '13:50:07'),
(82, '2022-06-02', '06:32:20', '12:00:58'),
(83, '2022-04-04', '08:56:40', '11:41:18'),
(84, '2022-07-31', '06:22:37', '00:51:53'),
(85, '2022-04-20', '23:10:03', '03:03:45'),
(86, '2022-07-25', '22:11:28', '05:24:06'),
(87, '2022-05-06', '11:49:08', '23:43:12'),
(88, '2022-09-22', '21:06:48', '19:26:35'),
(89, '2021-12-01', '18:23:48', '12:51:36'),
(90, '2021-12-07', '21:57:02', '08:34:30'),
(91, '2022-07-02', '03:18:32', '06:25:53'),
(92, '2022-08-01', '00:13:53', '04:57:28'),
(93, '2022-10-13', '22:02:30', '11:25:58'),
(94, '2022-01-23', '11:36:36', '20:42:48'),
(95, '2022-02-17', '15:43:19', '23:31:19'),
(96, '2022-08-28', '03:18:06', '06:19:21'),
(97, '2022-09-14', '15:51:51', '15:19:37'),
(98, '2022-01-24', '00:12:53', '18:48:50'),
(99, '2022-04-22', '08:23:27', '07:13:02'),
(100, '2022-01-01', '02:42:06', '13:56:01'),
(101, '2021-12-30', '08:00:00', '10:30:00'),
(102, '2022-05-24', '11:30:00', '12:45:00'),
(103, '2021-11-29', '10:00:00', '12:00:00'),
(104, '2022-08-26', '14:30:00', '16:30:00'),
(105, '2022-10-14', '13:00:00', '15:00:00'),
(106, '2022-12-31', '12:30:00', '01:30:00'),
(107, '2022-08-24', '14:30:00', '15:30:00'),
(108, '2022-06-20', '15:30:00', '17:00:00'),
(109, '2022-12-12', '11:00:00', '12:30:00'),
(110, '2022-11-14', '13:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `title`, `program`) VALUES
(1, 'MATH 55', 'BS in Computer Science'),
(2, 'PHYSICS 71', 'BS in Computer Science'),
(3, 'CMSC 123', 'BS in Computer Science'),
(4, 'CMSC 127', 'BS in Computer Science'),
(5, 'CMSC 124', 'BS in Computer Science'),
(6, 'EVOLUTION 101', 'BS in Biology'),
(7, 'METEOROLOGY 128', 'BS in Biology'),
(8, 'BIOPHYSICS 10', 'BS in Biology'),
(9, 'ZOOLOGY 24', 'BS in Biology'),
(10, 'MOLECULAR BIOLOGY 35', 'BS in Biology');

-- --------------------------------------------------------

--
-- Table structure for table `tutee`
--

CREATE TABLE `tutee` (
  `tutee_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `upmail` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `year_level` int(1) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutee`
--

INSERT INTO `tutee` (`tutee_id`, `first_name`, `last_name`, `upmail`, `program`, `year_level`, `password`) VALUES
(1, 'Carl', 'Mate', 'cpmate@up.edu.ph', 'BS in Computer Science', 3, '202cb962ac59075b964b07152d234b70'),
(2, 'Random', 'Bio', 'rbio@up.edu.ph', 'BS in Biology', 4, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `first_name`, `last_name`, `upmail`, `program`, `year_level`) VALUES
(1, 'Ethan', 'Schroeder', 'russel.era@example.net', ' BS in Biology', 1),
(2, 'Maryjane', 'Kuhlman', 'uconn@example.net', 'BS in Computer Science', 4),
(3, 'Maida', 'O\'Conner', 'urban55@example.net', 'BS in Computer Science', 3),
(4, 'Nora', 'Mante', 'maci49@example.org', ' BS in Biology', 3),
(5, 'Loy', 'Grant', 'erdman.gladyce@example.net', 'BS in Computer Science', 3),
(6, 'Hope', 'Abernathy', 'sabina96@example.com', ' BS in Biology', 3),
(7, 'Destany', 'Wiegand', 'harvey.mariano@example.net', ' BS in Biology', 4),
(8, 'Laurianne', 'Jerde', 'adelle17@example.com', 'BS in Computer Science', 3),
(9, 'Andy', 'Howe', 'abbott.alaina@example.com', ' BS in Biology', 3),
(10, 'Keven', 'Deckow', 'tkozey@example.net', 'BS in Computer Science', 2),
(11, 'Damion', 'West', 'braun.daphney@example.com', ' BS in Biology', 2),
(12, 'Henderson', 'Littel', 'langworth.astrid@example.com', ' BS in Biology', 2),
(13, 'Thelma', 'Lubowitz', 'koby.lockman@example.com', 'BS in Computer Science', 4),
(14, 'Carmine', 'Adams', 'carrie.runolfsdottir@example.com', ' BS in Biology', 3),
(15, 'Brook', 'Williamson', 'ian.yost@example.org', ' BS in Biology', 4),
(16, 'Hubert', 'Emmerich', 'hoberbrunner@example.com', 'BS in Computer Science', 4),
(17, 'Newton', 'Durgan', 'jacey.dooley@example.com', 'BS in Computer Science', 4),
(18, 'Delfina', 'Dibbert', 'ywolff@example.net', 'BS in Computer Science', 1),
(19, 'Lelah', 'Kerluke', 'shana73@example.org', ' BS in Biology', 3),
(20, 'Afton', 'Hane', 'effertz.gilbert@example.org', 'BS in Computer Science', 4),
(21, 'Kendra', 'Ondricka', 'leatha.smith@example.org', 'BS in Computer Science', 3),
(22, 'Lauren', 'Walter', 'tyree87@example.net', ' BS in Biology', 4),
(23, 'Gonzalo', 'Mayert', 'rhaag@example.com', ' BS in Biology', 3),
(24, 'Valentin', 'Pagac', 'maximillia.kiehn@example.org', ' BS in Biology', 3),
(25, 'Brannon', 'Romaguera', 'ischimmel@example.org', 'BS in Computer Science', 4),
(26, 'Deanna', 'Nienow', 'amber.funk@example.org', ' BS in Biology', 2),
(27, 'Kiana', 'Johnston', 'amelie.hoppe@example.org', ' BS in Biology', 3),
(28, 'Aglae', 'Kilback', 'alessia.becker@example.net', ' BS in Biology', 4),
(29, 'Breanna', 'Simonis', 'lukas37@example.org', ' BS in Biology', 1),
(30, 'Rubye', 'Kuvalis', 'ebotsford@example.com', ' BS in Biology', 2),
(31, 'Jaylen', 'Kutch', 'skertzmann@example.com', 'BS in Computer Science', 3),
(32, 'Kody', 'Parisian', 'fstamm@example.net', ' BS in Biology', 2),
(33, 'Lucile', 'Heathcote', 'kemmerich@example.net', ' BS in Biology', 4),
(34, 'Haylie', 'Ryan', 'demarcus68@example.net', ' BS in Biology', 4),
(35, 'Jared', 'Willms', 'freida71@example.org', 'BS in Computer Science', 3),
(36, 'Skyla', 'Yundt', 'hane.jody@example.net', 'BS in Computer Science', 3),
(37, 'Tyreek', 'Waelchi', 'pbosco@example.net', ' BS in Biology', 1),
(38, 'Hilton', 'Pagac', 'jwisoky@example.org', ' BS in Biology', 4),
(39, 'Tanner', 'McDermott', 'mireya43@example.com', ' BS in Biology', 1),
(40, 'Macey', 'Stracke', 'billie98@example.com', ' BS in Biology', 1),
(41, 'Mara', 'Pouros', 'fharvey@example.com', ' BS in Biology', 1),
(42, 'Consuelo', 'Gerhold', 'yazmin56@example.com', ' BS in Biology', 2),
(43, 'Marlon', 'Gislason', 'donna09@example.net', 'BS in Computer Science', 3),
(44, 'Yesenia', 'Schultz', 'olin.bayer@example.net', 'BS in Computer Science', 2),
(45, 'Allison', 'Dickens', 'madyson20@example.com', ' BS in Biology', 3),
(46, 'Ambrose', 'Mayert', 'wanderson@example.org', 'BS in Computer Science', 4),
(47, 'Julius', 'Boyer', 'bonnie.hagenes@example.net', ' BS in Biology', 2),
(48, 'Bettie', 'Trantow', 'efrain.west@example.com', 'BS in Computer Science', 3),
(49, 'Trey', 'Krajcik', 'shanahan.kris@example.net', ' BS in Biology', 3),
(50, 'Abagail', 'Haag', 'sstehr@example.org', 'BS in Computer Science', 2),
(51, 'Diana', 'Ziemann', 'darby.kozey@example.org', 'BS in Computer Science', 1),
(52, 'Ashlynn', 'Hudson', 'lina42@example.org', ' BS in Biology', 1),
(53, 'Ila', 'Barton', 'plangosh@example.org', 'BS in Computer Science', 1),
(54, 'Trinity', 'DuBuque', 'dcartwright@example.org', 'BS in Computer Science', 2),
(55, 'Brian', 'Balistreri', 'alehner@example.org', 'BS in Computer Science', 3),
(56, 'Reynold', 'Lemke', 'kgerhold@example.net', ' BS in Biology', 1),
(57, 'Alessia', 'Lind', 'ankunding.diego@example.org', 'BS in Computer Science', 3),
(58, 'Malachi', 'Cremin', 'skiles.marta@example.net', ' BS in Biology', 1),
(59, 'Maribel', 'Hirthe', 'pschaden@example.com', ' BS in Biology', 1),
(60, 'Candida', 'Johnson', 'spurdy@example.org', ' BS in Biology', 2),
(61, 'Kacey', 'Quitzon', 'lfeil@example.org', ' BS in Biology', 1),
(62, 'Ferne', 'Wiza', 'victor03@example.net', ' BS in Biology', 3),
(63, 'Malachi', 'Jaskolski', 'tromp.lonzo@example.com', ' BS in Biology', 2),
(64, 'Charley', 'Goldner', 'athena.kunde@example.com', ' BS in Biology', 2),
(65, 'Elisha', 'Will', 'ko\'reilly@example.com', 'BS in Computer Science', 3),
(66, 'Emerald', 'Harris', 'berneice54@example.net', 'BS in Computer Science', 2),
(67, 'Emilie', 'Cormier', 'brittany.ortiz@example.net', 'BS in Computer Science', 4),
(68, 'Earnest', 'Koepp', 'angelo.beier@example.net', 'BS in Computer Science', 4),
(69, 'Kris', 'Harber', 'laurie.wilderman@example.net', 'BS in Computer Science', 3),
(70, 'Keshaun', 'Steuber', 'eliezer16@example.com', ' BS in Biology', 1),
(71, 'Wilma', 'Waelchi', 'patricia.grimes@example.org', 'BS in Computer Science', 2),
(72, 'Ava', 'Kulas', 'johanna34@example.com', ' BS in Biology', 4),
(73, 'Gladys', 'Mayer', 'marcellus13@example.com', 'BS in Computer Science', 2),
(74, 'Itzel', 'Green', 'rcasper@example.com', 'BS in Computer Science', 1),
(75, 'Jerel', 'Zemlak', 'pauer@example.org', 'BS in Computer Science', 1),
(76, 'Cathryn', 'Leuschke', 'krajcik.murl@example.net', ' BS in Biology', 1),
(77, 'Alexis', 'Waters', 'gboyer@example.org', ' BS in Biology', 3),
(78, 'Barney', 'Rosenbaum', 'citlalli.schamberger@example.org', 'BS in Computer Science', 4),
(79, 'Erwin', 'Marvin', 'jakob93@example.org', 'BS in Computer Science', 4),
(80, 'Greg', 'Kohler', 'schmidt.keshawn@example.com', 'BS in Computer Science', 1),
(81, 'Serenity', 'Abshire', 'lschuster@example.com', 'BS in Computer Science', 2),
(82, 'Maggie', 'Bradtke', 'gibson.blaise@example.org', ' BS in Biology', 1),
(83, 'Tony', 'Dickens', 'liam36@example.net', 'BS in Computer Science', 1),
(84, 'Alisa', 'Turcotte', 'koelpin.amely@example.com', ' BS in Biology', 2),
(85, 'Alberta', 'Jast', 'willis04@example.com', 'BS in Computer Science', 2),
(86, 'Frederic', 'Wilderman', 'conn.maxwell@example.net', ' BS in Biology', 4),
(87, 'Garry', 'Bartell', 'jermain59@example.org', ' BS in Biology', 2),
(88, 'Leo', 'Reichel', 'ruth89@example.com', ' BS in Biology', 3),
(89, 'Alexanne', 'Kuphal', 'george.kilback@example.com', 'BS in Computer Science', 1),
(90, 'Gage', 'Leannon', 'shanna.kris@example.org', 'BS in Computer Science', 4),
(91, 'Wendy', 'Luettgen', 'markus03@example.com', ' BS in Biology', 3),
(92, 'Cindy', 'Bayer', 'wfarrell@example.com', ' BS in Biology', 1),
(93, 'Devon', 'Luettgen', 'fiona.kessler@example.com', 'BS in Computer Science', 3),
(94, 'Lionel', 'McGlynn', 'kennedi.hoppe@example.org', 'BS in Computer Science', 3),
(95, 'Percy', 'Dietrich', 'lang.nova@example.org', ' BS in Biology', 3),
(96, 'Lilla', 'Dare', 'winfield23@example.net', 'BS in Computer Science', 3),
(97, 'Karson', 'Satterfield', 'harmon.gusikowski@example.net', 'BS in Computer Science', 3),
(98, 'Shanon', 'Jerde', 'omer.abbott@example.net', 'BS in Computer Science', 2),
(99, 'Rozella', 'Smith', 'adams.melody@example.net', ' BS in Biology', 2),
(100, 'Michelle', 'Rogahn', 'stanley.deckow@example.org', ' BS in Biology', 4),
(101, 'Jarred', 'Acedillo', 'jaacedillo@up.edu.ph', ' BS in Computer Science', 3),
(102, 'Carl', 'Mate', 'cpmate@up.edu.ph', ' BS in Computer Science', 3),
(103, 'Sophia', 'Casas', 'sccasas@up.edu.ph', ' BS in Computer Science', 3),
(104, 'Florian', 'Alterado', 'fdalterado@up.edu.ph', ' BS in Biology', 3),
(105, 'Miki', 'Baquilod', 'mgbaquilod@up.edu.ph', ' BS in Biology', 3),
(106, 'Rovene', 'Ramos', 'rvramos@up.edu.ph', ' BS in Biology', 3),
(107, 'Rian', 'Mascari├▒as', 'romascarinas@up.edu.ph', ' BS in Biology', 2),
(108, 'Leo', 'Macalalag', 'lmacalalag@up.edu.ph', ' BS in Biology', 2),
(109, 'Frederick', 'Hampton', 'frhampton@up.edu.ph', ' BS in Computer Science', 1),
(110, 'Joshua', 'Orais', 'mjorais@up.edu.ph', ' BS in Computer Science', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_session`
--

CREATE TABLE `tutorial_session` (
  `tutor_id` int(11) NOT NULL,
  `tutee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial_session`
--

INSERT INTO `tutorial_session` (`tutor_id`, `tutee_id`, `date`, `start_time`, `end_time`, `subject`) VALUES
(81, 1, '2022-09-11', '13:52:46', '23:05:44', 'MATH 55'),
(81, 1, '2021-11-25', '18:13:00', '00:00:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:15:00', '06:45:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:20:00', '838:59:59', 'MATH 55'),
(102, 1, '2021-11-25', '18:23:00', '18:23:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:24:00', '18:24:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:26:00', '00:00:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:54:00', '07:24:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:55:00', '07:25:00', 'MATH 55'),
(81, 1, '2021-11-25', '18:56:00', '07:26:00', 'MATH 55'),
(81, 1, '2021-11-25', '19:13:00', '19:44:00', 'MATH 55'),
(81, 2, '2021-11-25', '20:44:00', '20:45:00', 'EVOLUTION 101');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_available_time`
--

CREATE TABLE `tutor_available_time` (
  `available_time_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_available_time`
--

INSERT INTO `tutor_available_time` (`available_time_id`, `tutor_id`) VALUES
(31, 1),
(29, 2),
(49, 3),
(20, 4),
(10, 5),
(51, 6),
(72, 7),
(20, 8),
(3, 9),
(74, 10),
(96, 11),
(48, 12),
(56, 13),
(79, 14),
(23, 15),
(70, 16),
(91, 17),
(62, 18),
(73, 19),
(95, 20),
(17, 21),
(46, 22),
(86, 23),
(8, 24),
(89, 25),
(22, 26),
(5, 27),
(28, 28),
(70, 29),
(86, 30),
(91, 31),
(1, 32),
(15, 33),
(40, 34),
(21, 35),
(25, 36),
(90, 37),
(92, 38),
(44, 39),
(92, 40),
(66, 41),
(40, 42),
(40, 43),
(21, 44),
(18, 45),
(62, 46),
(91, 47),
(9, 48),
(23, 49),
(63, 50),
(4, 51),
(39, 52),
(9, 53),
(89, 54),
(47, 55),
(97, 56),
(11, 57),
(51, 58),
(24, 59),
(80, 60),
(37, 61),
(15, 62),
(80, 63),
(52, 64),
(54, 65),
(1, 66),
(76, 67),
(43, 68),
(92, 69),
(20, 70),
(35, 71),
(57, 72),
(60, 73),
(74, 74),
(77, 75),
(78, 76),
(36, 77),
(67, 78),
(86, 79),
(58, 80),
(30, 81),
(90, 82),
(97, 83),
(38, 84),
(78, 85),
(44, 86),
(35, 87),
(89, 88),
(95, 89),
(59, 90),
(68, 91),
(31, 92),
(73, 93),
(48, 94),
(83, 95),
(26, 96),
(48, 97),
(59, 98),
(69, 99),
(40, 100),
(78, 1),
(3, 2),
(96, 3),
(38, 4),
(77, 5),
(73, 6),
(15, 7),
(12, 8),
(40, 9),
(1, 10),
(70, 11),
(69, 12),
(90, 13),
(67, 14),
(7, 15),
(68, 16),
(10, 17),
(41, 18),
(56, 19),
(4, 20),
(99, 21),
(23, 22),
(35, 23),
(71, 24),
(71, 25),
(17, 26),
(96, 27),
(19, 28),
(75, 29),
(64, 30),
(58, 31),
(53, 32),
(67, 33),
(53, 34),
(90, 35),
(43, 36),
(26, 37),
(5, 38),
(55, 39),
(65, 40),
(5, 41),
(25, 42),
(33, 43),
(94, 44),
(91, 45),
(39, 46),
(61, 47),
(1, 48),
(79, 49),
(16, 50),
(4, 51),
(78, 52),
(39, 53),
(39, 54),
(48, 55),
(9, 56),
(55, 57),
(44, 58),
(28, 59),
(30, 60),
(8, 61),
(85, 62),
(83, 63),
(74, 64),
(38, 65),
(73, 66),
(17, 67),
(63, 68),
(77, 69),
(72, 70),
(27, 71),
(81, 72),
(96, 73),
(60, 74),
(75, 75),
(87, 76),
(98, 77),
(35, 78),
(87, 79),
(77, 80),
(50, 81),
(91, 82),
(55, 83),
(89, 84),
(29, 85),
(2, 86),
(98, 87),
(84, 88),
(46, 89),
(25, 90),
(14, 91),
(53, 92),
(9, 93),
(97, 94),
(27, 95),
(46, 96),
(69, 97),
(44, 98),
(9, 99),
(46, 100),
(105, 101),
(103, 102),
(102, 103),
(110, 104),
(104, 105),
(109, 106),
(101, 107),
(106, 108),
(108, 109),
(107, 110);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_teaches`
--

CREATE TABLE `tutor_teaches` (
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_teaches`
--

INSERT INTO `tutor_teaches` (`tutor_id`, `subject_id`) VALUES
(25, 2),
(82, 8),
(47, 8),
(71, 4),
(45, 7),
(81, 1),
(10, 4),
(54, 2),
(35, 1),
(97, 3),
(58, 6),
(55, 3),
(38, 6),
(81, 3),
(14, 6),
(65, 4),
(97, 5),
(15, 6),
(19, 6),
(75, 7),
(55, 4),
(31, 3),
(94, 9),
(84, 3),
(58, 8),
(92, 9),
(20, 1),
(40, 6),
(71, 3),
(19, 9),
(54, 1),
(22, 8),
(31, 4),
(92, 7),
(22, 7),
(13, 2),
(20, 5),
(41, 2),
(27, 9),
(42, 9),
(4, 9),
(100, 10),
(79, 4),
(80, 5),
(60, 10),
(34, 9),
(82, 6),
(62, 2),
(92, 6),
(61, 8),
(19, 8),
(90, 4),
(17, 3),
(52, 9),
(53, 1),
(28, 2),
(27, 6),
(79, 1),
(66, 6),
(55, 1),
(57, 9),
(38, 8),
(44, 10),
(50, 4),
(52, 10),
(50, 8),
(84, 4),
(9, 10),
(68, 4),
(43, 3),
(54, 3),
(78, 8),
(97, 2),
(85, 7),
(15, 9),
(87, 8),
(28, 3),
(9, 8),
(24, 6),
(8, 2),
(69, 1),
(46, 4),
(95, 6),
(52, 7),
(14, 10),
(83, 1),
(65, 5),
(47, 7),
(16, 4),
(22, 6),
(71, 1),
(1, 10),
(34, 7),
(69, 2),
(68, 3),
(32, 6),
(33, 8),
(88, 9),
(32, 7),
(90, 5),
(101, 1),
(102, 3),
(103, 2),
(104, 10),
(105, 9),
(106, 7),
(107, 8),
(108, 6),
(109, 5),
(110, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_time`
--
ALTER TABLE `available_time`
  ADD PRIMARY KEY (`available_time_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutee`
--
ALTER TABLE `tutee`
  ADD PRIMARY KEY (`tutee_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `tutorial_session`
--
ALTER TABLE `tutorial_session`
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `tutee_id` (`tutee_id`);

--
-- Indexes for table `tutor_available_time`
--
ALTER TABLE `tutor_available_time`
  ADD KEY `available_time_id` (`available_time_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_time`
--
ALTER TABLE `available_time`
  MODIFY `available_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tutee`
--
ALTER TABLE `tutee`
  MODIFY `tutee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tutorial_session`
--
ALTER TABLE `tutorial_session`
  ADD CONSTRAINT `tutorial_session_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`),
  ADD CONSTRAINT `tutorial_session_ibfk_2` FOREIGN KEY (`tutee_id`) REFERENCES `tutee` (`tutee_id`);

--
-- Constraints for table `tutor_available_time`
--
ALTER TABLE `tutor_available_time`
  ADD CONSTRAINT `tutor_available_time_ibfk_1` FOREIGN KEY (`available_time_id`) REFERENCES `available_time` (`available_time_id`),
  ADD CONSTRAINT `tutor_available_time_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`);

--
-- Constraints for table `tutor_teaches`
--
ALTER TABLE `tutor_teaches`
  ADD CONSTRAINT `tutor_teaches_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`tutor_id`),
  ADD CONSTRAINT `tutor_teaches_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;