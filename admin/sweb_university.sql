-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 04:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweb_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_contact`
--

CREATE TABLE `cs_contact` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(50) NOT NULL,
  `con_email` varchar(50) NOT NULL,
  `con_sub` varchar(250) NOT NULL,
  `con_mess` text NOT NULL,
  `con_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cs_role`
--

CREATE TABLE `cs_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_role`
--

INSERT INTO `cs_role` (`role_id`, `role_name`) VALUES
(2, 'Admin'),
(3, 'Author'),
(4, 'Editor'),
(5, 'Subscriber'),
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `cs_user`
--

CREATE TABLE `cs_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_user`
--

INSERT INTO `cs_user` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_username`, `user_password`, `role_id`, `user_photo`) VALUES
(1, 'Creative', '01710726035', 'admin@gmail.com', 'admin', '6512bd43d9caa6e02c990b0a82652dca', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_contact`
--
ALTER TABLE `cs_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `cs_role`
--
ALTER TABLE `cs_role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `cs_user`
--
ALTER TABLE `cs_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cs_contact`
--
ALTER TABLE `cs_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_role`
--
ALTER TABLE `cs_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cs_user`
--
ALTER TABLE `cs_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cs_user`
--
ALTER TABLE `cs_user`
  ADD CONSTRAINT `cs_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `cs_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
