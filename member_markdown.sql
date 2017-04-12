-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 11:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member_markdown`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `ref_user_id` varchar(20) NOT NULL,
  `log_message` varchar(200) DEFAULT NULL,
  `log_status` varchar(6) DEFAULT NULL,
  `log_date_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` varchar(20) NOT NULL,
  `user_pass` text NOT NULL,
  `user_email` text NOT NULL,
  `use_create_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_pass`, `user_email`, `use_create_date`) VALUES
('18032017005543', 'bldoWUtPRDJCSTd0U3BGVDRGSW1tQT09', 'TzV4NVBNZUx0U3lveWtWNVp6ZkZOVEx3ai9oNmpBdXgrVE5Od21tZmJQYz0=', '18-03-2017 00:55:42'),
('19032017002011', 'bldoWUtPRDJCSTd0U3BGVDRGSW1tQT09', 'aDgwQ2w1Q0l2UVBaZE5teVpUNGludz09', '19-03-2017 00:20:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD KEY `fk_log_user_user_account_idx` (`ref_user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_user`
--
ALTER TABLE `log_user`
  ADD CONSTRAINT `fk_log_user_user_account` FOREIGN KEY (`ref_user_id`) REFERENCES `user_account` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
