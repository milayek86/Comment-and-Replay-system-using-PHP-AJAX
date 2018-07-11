-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 06:59 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Your DB name here`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmt_all`
--

CREATE TABLE `cmt_all` (
  `id` int(50) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `usr_id` varchar(100) NOT NULL,
  `commentdata` longtext NOT NULL,
  `timeOfCmt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateOfCmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmt_all`
--

INSERT INTO `cmt_all` (`id`, `post_id`, `usr_id`, `commentdata`, `timeOfCmt`, `DateOfCmt`) VALUES
(12, 'p3', 'usr_id', 'sd\n', '2018-07-10 14:03:39', '0000-00-00'),
(13, 'p3', 'usr_id', 'dfdf rtrtr', '2018-07-10 14:04:08', '0000-00-00'),
(14, 'p3', 'usr_id', 'sghbfgcn\nfdhtfg', '2018-07-10 14:15:19', '0000-00-00'),
(15, 'p4', 'usr_id', 'ggnhhn\njnfvvvv ', '2018-07-10 14:19:53', '0000-00-00'),
(16, 'p5', 'usr_id', 'vvv', '2018-07-10 14:23:30', '0000-00-00'),
(17, 'p6', 'usr_id', 'ee', '2018-07-10 14:24:19', '0000-00-00'),
(18, 'p7', 'usr_id', 'rohan', '2018-07-10 14:26:36', '0000-00-00'),
(19, 'p8', 'usr_id', 'aa', '2018-07-10 14:36:36', '0000-00-00'),
(20, 'p9', 'usr_id', 'rumman', '2018-07-10 14:42:33', '0000-00-00'),
(21, 'p9', 'usr_id', 'sssssssss', '2018-07-10 14:43:58', '0000-00-00'),
(22, 'p10', 'usr_id', 'zzz', '2018-07-10 14:48:17', '0000-00-00'),
(23, 'p11', 'usr_id', 'aaa', '2018-07-10 15:12:10', '0000-00-00'),
(24, 'p11', 'usr_id', 'gatha', '2018-07-10 15:13:10', '0000-00-00'),
(25, 'p12', 'usr_id', 'aa', '2018-07-10 15:14:16', '0000-00-00'),
(26, 'p12', 'usr_id', 'ss', '2018-07-10 15:14:22', '0000-00-00'),
(27, 'p13', 'usr_id', 'aa', '2018-07-10 15:17:29', '0000-00-00'),
(28, 'p13', 'usr_id', 'eee', '2018-07-10 15:17:38', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

CREATE TABLE `replay` (
  `id` int(11) NOT NULL,
  `replayUserId` mediumtext NOT NULL,
  `commentID` longtext NOT NULL,
  `replaydata` longtext NOT NULL,
  `replaytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`id`, `replayUserId`, `commentID`, `replaydata`, `replaytime`) VALUES
(11, 'usr_id', '12', 'dfdfd', '2018-07-10 14:04:16'),
(12, 'usr_id', '12', '#include&lt;stdio.h&gt;', '2018-07-10 14:09:42'),
(13, 'usr_id', '12', '&lt;pre&gt;\n#include&lt;stdio.h&gt;\n&lt;/pre&gt;', '2018-07-10 14:10:07'),
(14, 'usr_id', '12', 'dsvgfhvm\ngvbngvng', '2018-07-10 14:13:09'),
(15, 'usr_id', '12', 'vcbcv', '2018-07-10 14:18:23'),
(16, 'usr_id', '1', 'ccccccccccccccdcdc d', '2018-07-10 14:19:59'),
(17, 'usr_id', '15', 'vvvvvvvvv', '2018-07-10 14:21:37'),
(18, 'usr_id', '15', 'bbb', '2018-07-10 14:22:07'),
(19, 'usr_id', '16', 'vvvv', '2018-07-10 14:23:35'),
(20, 'usr_id', '1', 'fgfgg', '2018-07-10 14:24:30'),
(21, 'usr_id', '19', 'sdvvcv\nfcbgb', '2018-07-10 14:36:47'),
(22, 'usr_id', '20', 'cc', '2018-07-10 14:43:45'),
(23, 'usr_id', '21', 'tttt', '2018-07-10 14:44:18'),
(24, 'usr_id', '21', 'ffffffffff', '2018-07-10 14:45:06'),
(25, 'usr_id', '21', 'fdds', '2018-07-10 14:45:08'),
(26, 'usr_id', '21', 'ffsfsdfc', '2018-07-10 14:45:10'),
(27, 'usr_id', '23', 'www', '2018-07-10 15:12:16'),
(28, 'usr_id', '25', 'aa', '2018-07-10 15:14:19'),
(29, 'usr_id', '27', 'xx', '2018-07-10 15:17:32'),
(30, 'usr_id', '27', 'sxcdcdsxdc', '2018-07-10 15:17:34'),
(31, 'usr_id', '28', 'rtygf', '2018-07-10 15:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmt_all`
--
ALTER TABLE `cmt_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmt_all`
--
ALTER TABLE `cmt_all`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
