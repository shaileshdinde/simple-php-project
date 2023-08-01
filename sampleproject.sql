-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 08:10 PM
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
-- Database: `sampleproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `username`, `mobile`, `status`) VALUES
(1, 'Shailesh Dinde', 'shdinde@gmail.com', '7f125dd8c17fc02ab20338fbcf27abfe', 'shailesh', '8888777765', 1);

-- --------------------------------------------------------

--
-- Table structure for table `caste`
--

CREATE TABLE `caste` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caste`
--

INSERT INTO `caste` (`id`, `name`, `status`) VALUES
(1, 'Maratha', 1),
(2, 'Jain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `status`) VALUES
(1, 'Kolhapur', 1),
(2, 'Sangli', 1),
(3, 'Pune', 1),
(4, 'Satara', 1),
(5, 'Raigad', 1),
(6, 'Mumbai', 1),
(7, 'Nashik', 1),
(8, 'Kagal', 1),
(9, 'Nagar', 1),
(10, 'Baramati', 1),
(11, 'Dhule', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `casteid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `familydetails` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `casteid`, `cityid`, `address`, `photo`, `dob`, `status`, `familydetails`, `description`, `password`) VALUES
(1, 'Shailesh Dinde', 'shdinde@gmail.com', '8888777767', 1, 2, 'Sane Guruji', '1.jpg', '2005-07-13', 1, 'demo details', 'abc', '7f125dd8c17fc02ab20338fbcf27abfe'),
(3, 'Shailesh', 'shdinde+1@gmail.com', '8888763563', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '1a2843f919af8ef7bb699b3000ae49f7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `caste`
--
ALTER TABLE `caste`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `photo` (`photo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `caste`
--
ALTER TABLE `caste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
