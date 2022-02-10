-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 07:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raahat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(10) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `role`, `password`) VALUES
(1, 'Rahul ', 8956231470, 'admin@raahat.com', 1, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Rahul', 'rahul@gmail.com', 1234567890, 'qwert'),
(2, 'ABC', 'abc@gmail.com', 987654321, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `message` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `uid`, `name`, `age`, `gender`, `location`, `phone`, `message`, `image_url`) VALUES
(1, 9, 'Rahul', 22, 'on', 'India', 2147483647, 'No', 'IMG61f04f29648de9.21008726.png'),
(2, 9, 'Rahul Kushwaha', 21, 'on', 'Kalewadi', 2147483647, 'Birthmark', 'IMG61f0550cc64f59.25810094.jpg'),
(3, 9, 'Alen sam', 20, 'on', 'Kalewadi', 2147483647, 'Birthmark', 'IMG61f11118bc4e37.77397000.jpg'),
(4, 11, 'Shantanu Patil', 20, 'on', 'Pune', 2147483647, 'No', 'IMG6204109a1c8647.50529775.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `password`) VALUES
(9, 'Rahul K', 'rahul@gmail.com', '9762590090', '$2y$10$SdjPSrZfIZf/EJyjyMN3r.OHptiR2WpvqBwOK3UjXH/Jw0YQbgxPu'),
(11, 'Moin Bagban', 'moin@gmail.com', '9876543210', '$2y$10$ZFYORIR67O1z6I8hrUSTNuTjeVVc4HahxnhTArbPF9eXskGSI4D3m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
