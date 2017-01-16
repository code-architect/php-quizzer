-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 05:38 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `answer`) VALUES
(1, 1, 1, 'indranil'),
(2, 1, 0, 'Rajan'),
(3, 1, 0, 'Abhishek'),
(4, 2, 0, 'pink'),
(5, 2, 1, 'yellow'),
(6, 2, 0, 'green'),
(7, 3, 0, 'red'),
(8, 3, 1, 'colorless'),
(9, 3, 0, 'white'),
(10, 4, 0, 'black'),
(11, 4, 1, 'yellow'),
(12, 4, 0, 'orange'),
(13, 5, 1, 'to write'),
(14, 5, 0, 'burn'),
(15, 5, 0, 'kill'),
(16, 6, 0, 'black'),
(17, 6, 1, 'red'),
(18, 6, 0, 'violet'),
(19, 7, 0, 'to kill'),
(20, 7, 0, 'to play'),
(21, 7, 1, 'to cut'),
(22, 8, 0, 'The police'),
(23, 8, 1, 'the people'),
(24, 8, 0, 'the government'),
(25, 9, 1, 'warm'),
(26, 9, 0, 'cold'),
(27, 9, 0, 'nothing'),
(28, 10, 0, 'alligator '),
(29, 10, 0, 'dog'),
(30, 10, 1, 'bird');

-- --------------------------------------------------------

--
-- Table structure for table `english_question`
--

CREATE TABLE `english_question` (
  `question_number` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `english_question`
--

INSERT INTO `english_question` (`question_number`, `question`, `question_image`) VALUES
(1, 'What is your name?', 'example.jpg'),
(2, 'What is the color of the sun?', 'example.jpg'),
(3, 'What is the color of water?', 'example.jpg'),
(4, 'What is the color of banana?', 'example.jpg'),
(5, 'what is the use of pen?', 'example.jpg'),
(6, 'what is the color of apple?', 'example.jpg'),
(7, 'what do we do with knife?', 'example.jpg'),
(8, 'who is stupid?', 'example.jpg'),
(9, 'how do we feel near fire?', 'example.jpg'),
(10, 'which one fly?', 'example.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english_question`
--
ALTER TABLE `english_question`
  ADD PRIMARY KEY (`question_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
