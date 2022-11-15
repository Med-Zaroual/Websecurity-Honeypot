-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2016 at 07:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
CREATE TABLE `login`.`Users` (
  `user_id` INT(11) GENERATED ALWAYS AS () VIRTUAL,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `user_type` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) VISIBLE)
ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `Users`
--

INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('1', 'admin', 'admin@admin.com', 'admin', 'admin123.');
INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('2', 'rozarot', 'med.zaroual.303@gmail.com', 'admin', 'rozarot123.');
INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('3', 'ebennezer', 'benny@gmail.com', 'admin', 'benny123.');
INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('4', 'jeffrey', 'jeffrey@gmail.com', 'admin', 'jeffrey123.');
INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('5', 'lecturer', 'lecturer@gmail.com', 'admin', 'lecturer123.');
INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('6', 'user1', 'user1@gmail.com', 'user', 'user1123.');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
