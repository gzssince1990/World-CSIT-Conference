-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 08:54 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `identity` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `title` text NOT NULL,
  `company` text NOT NULL,
  `organization` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`user_id`, `username`, `password`, `identity`, `first_name`, `last_name`, `title`, `company`, `organization`, `address`, `phone_number`, `email`) VALUES
(16, 'zhisong', '$2y$10$VXwNNlOMSo26eP.9HPm5KeNmDyXfHVOW73LtwrprzD.j1B9QVSZ5O', 'Student', 'Zhisong', 'Ge', 'Intern', 'W2BI', 'ADVANTEST', '310 Cleveland Avenue', '2019121537', 'gez1@montclair.edu'),
(17, 'jobs', '$2y$10$2FDjwArpY7SnZWW6dc1jvOXSRCpBKAnKq7N1QxCrfiYPZU6o2LZ3K', 'Presenter', 'Jobs', 'Gee', 'CEO', 'Apple', 'Apple', '1 apple road', '1234567890', 'jobs@apple.com');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `comment` text NOT NULL,
  `phone_number` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_paper`
--

CREATE TABLE IF NOT EXISTS `group_paper` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_paper`
--

INSERT INTO `group_paper` (`id`, `group_id`, `paper_id`) VALUES
(34, 6, 6),
(35, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `paper_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `user_id`, `file_name`) VALUES
(6, 16, 'Receipt for Ticket Payment.pdf'),
(7, 16, 'Zhisong_Ge_App_Graduation-Final-Audit.pdf'),
(8, 17, 'JavaandHTML.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE IF NOT EXISTS `reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewer_id`, `first_name`, `last_name`, `username`, `password`) VALUES
(6, 'Zhisong', 'Ge', 'gez', 'gez'),
(7, 'Test', 'User', 'testuser', 'testuer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `group_paper`
--
ALTER TABLE `group_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group_paper`
--
ALTER TABLE `group_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
