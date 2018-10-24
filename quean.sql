-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 10:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quean`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `answer_text`, `created_at`, `updated_at`, `author`) VALUES
(3, 2, 'Install composer first', '2018-10-22 13:37:51', '0000-00-00 00:00:00', 'Akhilesh Negi'),
(5, 2, 'check here is the link \r\nhttps://www.youtube.com/watch?v=dvgZkm1xWPE&start_radio=1&list=RDdvgZkm1xWPE', '2018-10-22 14:12:02', '0000-00-00 00:00:00', 'Rajat Batoe'),
(7, 1, 'Go to grunt.com and use various plugins available there.				', '2018-10-22 07:01:53', '0000-00-00 00:00:00', 'Satu Supari'),
(8, 2, 'just google first			', '2018-10-22 19:12:51', '0000-00-00 00:00:00', 'Akhilesh Negi');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `links` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `q_date` date NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `title`, `description`, `links`, `author`, `q_date`, `likes`, `dislikes`, `comments`) VALUES
(1, 'How to get with Grunt?', 'how to use grunt to uglify files of my project.', 'Grunt, Starting with Grunt', 'Akash Rawat', '2018-10-03', 17, 3, 1),
(2, 'How to use composer?', 'how to use composer in my project.', 'Composer, Starting with Composer', 'Rajat Batoe', '2018-10-18', 7, 1, 3),
(3, 'how to use bootstrap', 'want to add cards in a page', 'cards, bootstrap', 'Anuj Rawat', '2018-10-06', 13, 4, 0),
(5, 'How to get with SCSS?', 'a new type of css is hard to implement can someone tell me how to get started with it', 'SCSS, CSS, Bootstrap', 'Akhilesh Negi', '2018-08-01', 22, 5, 0),
(6, 'How to use fontawesome icons?', 'I want to use glypihcons on my website can someone help me with it?', 'Fontawesome, Glyphicons, bootstrap', 'Satu Supari', '2018-05-18', 3, 0, 0),
(7, 'How to get started with wordpress?', 'I want to host a website using wordpress.', 'wordpress', 'Satu Supari', '2018-10-22', 12, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` text NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `first_name`, `last_name`, `email`, `password`, `position`, `location`) VALUES
(1, 'Satu', 'Supari', 'satu@colored.com', 'satu123', 'Web Developer, ColoredCow', 'Gurgaon'),
(2, 'Akhilesh', 'Negi', 'akhileshnegi3.an3@gmail.com', 'Akki120', 'Software Developer, Wipro', 'Pune'),
(3, 'Akash', 'Rawat', 'akki@gmail.com', 'Akash123', 'CEO, T3P Studio', 'Mumbai'),
(4, 'Rajat', 'Batoe', 'rajat@gmail.com', 'Rajat123', 'App Developer, Apple', 'Delhi'),
(5, 'Anuj', 'Rawat', 'Anuj@gmail.com', 'Anuj123', 'Designer, T3P Studio', 'Mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
