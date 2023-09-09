-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2023 at 06:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth_records`
--

CREATE TABLE `birth_records` (
  `id` int NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `place_of_birth_of_mother` varchar(255) NOT NULL,
  `mother_profession` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `place_of_birth_of_father` varchar(255) NOT NULL,
  `father_profession` varchar(255) NOT NULL,
  `resident_of_parents` varchar(255) NOT NULL,
  `declaration_trusth` varchar(255) NOT NULL,
  `qr_code_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(1, 'Kaitlin Garcia', 'lipesav@mailinator.com', 'Facilis debitis cons', '2023-09-07 12:45:38'),
(2, 'Wynne Vaughan', 'xijep@mailinator.com', 'Dolor voluptas quas ', '2023-09-07 12:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `missing_documents`
--

CREATE TABLE `missing_documents` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `missing_documents`
--

INSERT INTO `missing_documents` (`id`, `email`, `address`, `telephone`, `name`, `image`) VALUES
(1, 'tovocucapy@mailinator.com', 'Cum sed sint ipsam a', '+1 (327) 762-9892', 'Hector Noel', 'IMG-20220204-WA0012.jpg'),
(6, 'hopecugiga@mailinator.com', 'Aut animi nostrud e', '+1 (372) 573-5065', 'Madonna Mayo', 'WhatsApp Image 2023-08-21 at 14.37.04.jpg'),
(7, 'wysy@mailinator.com', 'Assumenda in rem nes', '+1 (489) 356-9421', 'Portia Reese', 'IMG-20220204-WA0011.jpg'),
(8, 'mogux@mailinator.com', 'Repellendus Volupta', '+1 (139) 822-2769', 'Ulric Hanson', 'IMG-20220204-WA0030.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `national_id_cards`
--

CREATE TABLE `national_id_cards` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `profession` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `national_id_cards`
--

INSERT INTO `national_id_cards` (`id`, `full_name`, `date_of_birth`, `gender`, `profession`, `mother_name`, `father_name`, `address`, `photo`) VALUES
(1, 'Rooney Kirk', '2020-03-05', 'female', 'Cum qui sed dolorem', 'Doris Curry', 'Coby Davis', 'Ex non corrupti nis', '64f99b2561280_IMG-20220204-WA0012.jpg'),
(2, 'Micah Larson', '2000-09-09', 'male', 'Aut minus odit corru', 'Fuller Dawson', 'Illiana Barrera', 'Voluptatem Placeat', '64f99dc832581_IMG-20220204-WA0026.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$eZcbE94f9YKKH26Snixr1OKA/wi0iQ4pdbzEsaTpVpWZX4phaOGki', 'super admin'),
(2, 'president', '$2y$10$NZIXDeJs8tn3DQaP8cSubOwMR9XJxeakc2LjMRuiejRHX/ePAnR3m', 'president of court'),
(3, 'register', '$2y$10$8PJ1lHN7hScLwIuk1wDhgekxyb5rUXADcu8hshO.9NMroERov6rCa', 'register of court'),
(4, 'police', '$2y$10$.jLymdY/tS7x0Lx/5TS3sevjUfvEZty7akmjpCimkPv23uE44r9QW', 'police officer'),
(5, 'sd', '$2y$10$rQGLklqRZ1M2TDVeUcLrquDakUWV5mWHEuGyfCxKaZTZLp66ifThy', 'SD officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth_records`
--
ALTER TABLE `birth_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_documents`
--
ALTER TABLE `missing_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_id_cards`
--
ALTER TABLE `national_id_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birth_records`
--
ALTER TABLE `birth_records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `missing_documents`
--
ALTER TABLE `missing_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `national_id_cards`
--
ALTER TABLE `national_id_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
