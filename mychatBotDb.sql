-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 11:06 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychatBotDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `s` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `user_message` text NOT NULL,
  `watson_response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `s`, `r`, `user_message`, `watson_response`) VALUES
(1, 'ilyes ouakouak', 'IlyBot', 'need some info', 'The official website of the university is <br> <a href="http://www.en.u-pec.fr/study-offer/courses-in-english/master-s-degree-of-science-msc-optics-image-vision-multimedia-international-biometrics-m1-m2--618255.kjsp?RH=WEBEN " target="_blank">The official university website</a><br> or you can check the official website of the master <br><a href="https://www.international-education-biometrics.org/" target="_blank">The official link of master<a/>');

-- --------------------------------------------------------

--
-- Table structure for table `messages2`
--

CREATE TABLE `messages2` (
  `id` int(11) NOT NULL,
  `s` varchar(255) NOT NULL,
  `r` varchar(255) NOT NULL,
  `user_message` text NOT NULL,
  `watson_response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages2`
--

INSERT INTO `messages2` (`id`, `s`, `r`, `user_message`, `watson_response`) VALUES
(1, 'ilyes ouakouak', 'IlyBot', 'please provide the exact title of this master', 'The head and responsible of the master is Professor Amine Nait-Ali '),
(2, 'ilyes ouakouak', 'IlyBot', 'hello', 'Hi, nice to meet you, how can i help you?');

-- --------------------------------------------------------

--
-- Table structure for table `receiveMessages`
--

CREATE TABLE `receiveMessages` (
  `r_id` int(11) NOT NULL,
  `r` varchar(255) NOT NULL,
  `received_message` text NOT NULL,
  `received_message_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SentMessages`
--

CREATE TABLE `SentMessages` (
  `id` int(11) NOT NULL,
  `s` varchar(255) NOT NULL,
  `user_message` text NOT NULL,
  `sent_message_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages2`
--
ALTER TABLE `messages2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiveMessages`
--
ALTER TABLE `receiveMessages`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `SentMessages`
--
ALTER TABLE `SentMessages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages2`
--
ALTER TABLE `messages2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receiveMessages`
--
ALTER TABLE `receiveMessages`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SentMessages`
--
ALTER TABLE `SentMessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
