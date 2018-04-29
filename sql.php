-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2018 at 05:31 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dinnermatch`
--
CREATE DATABASE IF NOT EXISTS `dinnermatch` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `dinnermatch`;

-- --------------------------------------------------------

--
-- Table structure for table `happening`
--

CREATE TABLE IF NOT EXISTS `happening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preview_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `author` int(11) NOT NULL,
  `users_attending` text COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `happening`
--

INSERT INTO `happening` (`id`, `title`, `preview_text`, `text`, `date`, `author`, `users_attending`, `image`) VALUES
(18, 'Birthday party', 'We&#039;re having a birthday p...', 'We&#039;re having a birthday party for Hanna, come join us!', '2018-04-28', 3, 'Some People', '/dinner/images/farmer.jpeg'),
(20, 'Yoga!', 'Yoga is back online. \r\n\r\nWe wi...', 'Yoga is back online. \r\n\r\nWe will have the event next week instead, same venue and hopefully more people this time.', '2018-04-27', 2, 'Some People', '/dinner/images/pexels-photo-267967.jpeg'),
(22, 'Dinner with the crew', 'Come join us for a dinner with...', 'Come join us for a dinner with the crew inlcuding some fine ass wine and good drinks on the house!', '2018-04-26', 1, 'Some People', '/dinner/images/modaltest.jpeg'),
(23, 'Hanna ska fika', 'Kom och fika hos hanna, vi kan...', 'Kom och fika hos hanna, vi kanske bjuder p&aring; pizza', '2018-05-06', 2, 'Some other people', '/dinner/images/vandring.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `recent_happening`
--

CREATE TABLE IF NOT EXISTS `recent_happening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `preview_text` text COLLATE utf8_swedish_ci NOT NULL,
  `text` text COLLATE utf8_swedish_ci NOT NULL,
  `author` int(11) NOT NULL,
  `users_attending` text COLLATE utf8_swedish_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_level` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` text COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `username`, `password`, `auth_level`, `date_created`, `profile_image`, `full_name`, `email`, `active`) VALUES
(1, 'Maria123', 'test123', 4, '2018-04-08', '', 'Maria Mendez', '', 0),
(2, 'Raademar', 'Asd12345', 3, '2018-04-25', NULL, 'Mattias R&aring;demar', 'mattiasrademar@gmail.com', 0),
(3, 'Daniel', 'askldnaslkd', 3, '2018-04-26', NULL, 'anwdknawkld klnalwndlkanwd', 'aklnwdlkanwlkdn', 0),
(4, 'awdawd&#039;', 'awdawd', 3, '2018-04-26', NULL, 'awd awdawd', 'awdawd', 0),
