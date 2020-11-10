-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2020 at 08:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AtulSrivastavaIITB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title`, `description`, `date`) VALUES
(1, 'award api 1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document', '2020-10-26'),
(3, 'api award', 'api description', '2020-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`) VALUES
(4, 'News with no picture');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `place` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `sponser` varchar(200) DEFAULT NULL,
  `duration` varchar(20) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `place`, `role`, `sponser`, `duration`, `date_start`, `date_end`) VALUES
(1, 'api project test', 'place ', 'role ', 'sponser', 'duration', '2020-10-26', '2020-10-26'),
(3, 'api project 1', 'place ', 'role ', '', 'duration', '2020-10-15', '2020-10-15'),
(4, 'api title ', 'api place', 'api role', 'api sponser', 'api duration', '2020-10-26', '2020-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `type` set('article','book','journal','news','conference') NOT NULL DEFAULT 'article',
  `title` varchar(500) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `authors` varchar(200) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `type`, `title`, `description`, `place`, `authors`, `date`) VALUES
(1, 'book', 'book 1', 'null', 'place 1', 'shashank kumar, jigar makwana, anurag fogawat', '2020-10-24'),
(6, 'article', 'article1', 'desc1', 'place1', 'author1', '2020-10-22'),
(8, 'journal', 'journal1', 'desc1', 'place1', 'author1', '2020-10-22'),
(9, 'news', 'news1', 'desc1', 'place1', 'author1', '2020-10-22'),
(10, 'conference', 'news1', 'desc1', 'place1', 'author1', '2020-10-22'),
(11, 'article', 'api titile', 'api description', 'api place', 'api authors', '2020-10-26'),
(12, 'book', 'api titile', 'api description', 'api place', 'api authors', '2020-10-26'),
(13, 'conference', 'api titile', 'api description', 'api place', 'api authors', '2020-10-26'),
(14, 'journal', 'api titile', 'api description', 'api place', 'api authors', '2020-10-26'),
(15, 'news', 'api titile', 'api description', 'api place', 'api authors', '2020-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `degree` set('mtech','phd','post','') NOT NULL DEFAULT 'mtech',
  `title` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `designation`, `degree`, `title`, `description`, `is_active`) VALUES
(18, 'test', 'test', 'mtech', 'test', 'test', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
