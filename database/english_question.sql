-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 08:01 AM
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
(10, 'which one fly?', 'example.jpg'),
(11, 'which one is the best language?', 'example.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `english_question`
--
ALTER TABLE `english_question`
  ADD PRIMARY KEY (`question_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
