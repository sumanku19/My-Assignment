-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 02:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suman`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `role_type` enum('Project manager','Admin','Task Manager','Client') COLLATE utf8_unicode_ci NOT NULL,
  `security_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `role_type`, `security_key`) VALUES
(19, 'Suman', 'Kushwaha', 'suman.k@gmail.com', '$2y$10$LLXI7y2HirgNGzxP6DQvee0ZQsTO0aTGo/L0h6bszxhzkBhHBHlC.', '12345', 'Project manager', '%C*F)J@NcRfUjXn2'),
(20, 'Suman1', 'Kushwaha', 'suman.k1@gmail.com', '$2y$10$28G.mSFt5YBqysiD3MKp/OToOJJ0Qpipv3rjG9tjz21jDafkil1CC', '12345', 'Project manager', '%C*F)J@NcRfUjXn2'),
(21, 'Suman2', 'Kushwaha', 'suman.k2@gmail.com', '$2y$10$B8uTR4DIDrQE4skwgFfig.WPPEI6jDEC9RA/HgCpHdxLdvTXA7QDy', '12345', 'Project manager', '%C*F)J@NcRfUjXn2'),
(22, 'Suman2', 'Kushwaha', 'suman.k4@gmail.com', '$2y$10$/22VCrteq9WQuMsPbY5lXONV3VTpHf2Agtypsii6YI9..cqL2mG2G', '12345', 'Project manager', '%C*F)J@NcRfUjXn2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
