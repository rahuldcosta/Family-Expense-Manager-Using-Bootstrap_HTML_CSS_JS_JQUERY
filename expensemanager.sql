-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 01:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expensemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `contact` varchar(15) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `type` int(5) NOT NULL DEFAULT '2',
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`contact`, `state`, `city`, `country`, `type`, `username`) VALUES
('17532323369', 'Goa', 'Pernem', 'India', 1, 'rd@gmail.com'),
('226262626567', 'Karnataka', ' Mollem', ' India', 1, 'ja12@yahoo.com'),
('23454235341', 'Goa', 'Santa Cruz', 'India', 1, 'ja@yahoo.com'),
('2454287781', 'Goa', 'Santa Cruz', 'India', 2, 'rd@gmail.com'),
('26606046468', 'Goa', ' Moira', ' India', 1, 'ja1@yahoo.com'),
('324454284481', 'Goa', ' Bardez', ' India', 1, 'rtf@gmail.com'),
('3453453422', 'Goa', 'Panjim', 'India', 2, 'ja@yahoo.com'),
('38469345', 'Goa', 'Ponda', 'India', 2, 'ja@yahoo.com'),
('481178117887', 'Maruia', 'State Highway', 'New Zealand', 2, 'ja@yahoo.com'),
('7878454124', 'Goa', 'Cuncolim', 'India', 2, 'ja@yahoo.com'),
('7897897856', 'Goa', 'Siolim', 'India', 2, 'ja@yahoo.com'),
('9198289298292', 'Goa', 'Colvale', 'India', 2, 'ja@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
`bugid` int(11) NOT NULL,
  `bdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maxbudget` decimal(11,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`bugid`, `bdate`, `maxbudget`) VALUES
(3, '2015-04-26 18:30:00', '6789'),
(22, '2015-06-26 18:30:00', '7542'),
(23, '2015-05-20 18:30:00', '80000'),
(25, '2015-08-14 18:30:00', '122222'),
(40, '2015-09-30 18:30:00', '1700'),
(41, '2015-05-05 11:51:34', '0'),
(43, '2015-05-04 18:30:00', '4000'),
(46, '2016-01-01 15:07:06', '4123'),
(47, '2015-05-05 17:50:02', '12000'),
(48, '2015-05-07 03:59:36', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `customertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`firstname`, `lastname`, `username`, `dob`, `location`, `family_name`, `password`, `country`, `state`, `customertype`) VALUES
('rahul', 'dias', 'mohit@gmail.com', '2015-05-28', 'Corgao', 'pondi_56', 'MTIzNA==', 'India', 'Goa', 1),
('Rahul', 'Dcosta', 'rahuldc999@gmail.com', '1990-11-16', 'Raia', 'dcostas_13', 'cmFodWx4MTF4', 'India', 'Goa', 1),
('Rohan ', 'Dcosta', 'ron@gmail.com', '2015-04-15', 'Verna', 'dcostas_13', 'MTIzNA==', 'India', 'Goa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `datesubtable`
--

CREATE TABLE IF NOT EXISTS `datesubtable` (
`d_id` int(11) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `c_username` varchar(200) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datesubtable`
--

INSERT INTO `datesubtable` (`d_id`, `tag`, `c_username`, `start_date`) VALUES
(141, 'Milk power', 'rahuldc999@gmail.com', '2015-04-25'),
(142, 'asdasd', 'rahuldc999@gmail.com', '2015-04-24'),
(143, 'Shoes', 'rahuldc999@gmail.com', '2015-04-25'),
(144, 'Rocksolid', 'rahuldc999@gmail.com', '2015-04-25'),
(145, 'Rocksolid', 'rahuldc999@gmail.com', '2015-04-26'),
(147, 'Food', 'rahuldc999@gmail.com', '2015-04-26'),
(152, 'uoop', 'rahuldc999@gmail.com', '2015-04-15'),
(153, 'uoop', 'rahuldc999@gmail.com', '2015-04-16'),
(154, 'uoop', 'rahuldc999@gmail.com', '2015-04-17'),
(155, 'uoop', 'rahuldc999@gmail.com', '2015-04-18'),
(157, 'asdasd', 'rahuldc999@gmail.com', '2015-04-25'),
(159, 'Milk power', 'rahuldc999@gmail.com', '2015-04-26'),
(161, 'sdfop', 'rahuldc999@gmail.com ', '2015-05-08'),
(162, 'sdf', 'rahuldc999@gmail.com', '2015-05-09'),
(163, 'sdf', 'rahuldc999@gmail.com', '2015-05-10'),
(164, 'sdfop', 'rahuldc999@gmail.com', '2015-05-09'),
(165, 'sdfop', 'rahuldc999@gmail.com', '2015-05-09'),
(166, 'adad', 'rahuldc999@gmail.com', '2015-05-11'),
(181, 'motrrr', 'rahuldc999@gmail.com', '2015-05-08'),
(182, 'motrrr', 'rahuldc999@gmail.com', '2015-05-11'),
(183, 'motrrr', 'rahuldc999@gmail.com', '2015-05-12'),
(184, 'rebook', 'rahuldc999@gmail.com', '2015-08-14'),
(185, 'Books', 'rahuldc999@gmail.com', '2015-04-29'),
(186, 'stocks', 'ron@gmail.com', '2015-04-29'),
(187, 'goop', 'ron@gmail.com', '2015-04-29'),
(189, 'adssssssssssssssssssss', 'rahuldc999@gmail.com', '2015-05-01'),
(190, 'rtyy', 'ron@gmail.com', '2015-05-01'),
(191, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-01'),
(192, 'roooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 'rahuldc999@gmail.com', '2015-04-21'),
(193, 'polish', 'rahuldc999@gmail.com', '2015-05-01'),
(194, 'polish', 'rahuldc999@gmail.com', '2015-05-02'),
(195, 'asdasd', 'rahuldc999@gmail.com', '2015-05-02'),
(196, 'asdasd', 'rahuldc999@gmail.com', '2015-05-03'),
(197, 'asdasd', 'rahuldc999@gmail.com', '2015-05-04'),
(198, 'asdasd', 'rahuldc999@gmail.com', '2015-05-05'),
(200, 'cadcaccddsfds4235', 'rahuldc999@gmail.com', '2015-05-03'),
(201, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-04'),
(202, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-05'),
(203, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-06'),
(204, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-07'),
(205, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-08'),
(206, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-09'),
(207, 'cadcaccdcdacd', 'ron@gmail.com', '2015-05-10'),
(208, 'fgdfgd', 'rahuldc999@gmail.com', '2015-05-03'),
(209, 'tyrtyfhfgh', 'familyexpensemanager1@gmail.com', '2015-05-05'),
(210, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-05'),
(211, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-06'),
(212, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-07'),
(213, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-08'),
(214, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-09'),
(215, 'Rufjsjddf', 'familyexpensemanager1@gmail.com', '2015-05-10'),
(216, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-05'),
(217, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-06'),
(218, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-07'),
(219, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-08'),
(220, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-09'),
(221, 'Broom', 'familyexpensemanager1@gmail.com', '2015-05-10'),
(222, 'asdadadad123', 'ron@gmail.com', '2015-05-02'),
(223, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-03'),
(224, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-04'),
(225, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-05'),
(226, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-06'),
(227, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-07'),
(228, 'asdadadad123', 'rahuldc999@gmail.com', '2015-05-08'),
(229, 'rugved', 'rahuldc999@gmail.com', '2015-05-06'),
(230, 'rugved', 'rahuldc999@gmail.com', '2015-05-07'),
(231, 'rugved', 'rahuldc999@gmail.com', '2015-05-08'),
(232, 'rugved', 'rahuldc999@gmail.com', '2015-05-09'),
(233, '456', 'ron@gmail.com', '2015-05-06'),
(234, '456', 'ron@gmail.com', '2015-05-07'),
(235, '456', 'ron@gmail.com', '2015-05-08'),
(236, '456', 'ron@gmail.com', '2015-05-09'),
(237, 'vbcvbcvbcb', 'ron@gmail.com', '2015-05-06'),
(238, 'vbcvbcvbcb', 'ron@gmail.com', '2015-05-07'),
(239, 'vbcvbcvbcb', 'ron@gmail.com', '2015-05-08'),
(240, 'vbcvbcvbcb', 'ron@gmail.com', '2015-05-09'),
(241, 'Milk', 'ron@gmail.com', '2015-05-06'),
(242, 'Milk', 'ron@gmail.com', '2015-05-07'),
(243, 'Milk', 'ron@gmail.com', '2015-05-08'),
(244, 'Milk', 'ron@gmail.com', '2015-05-09'),
(245, 'vookda', 'ron@gmail.com', '2015-05-06'),
(246, 'vookda', 'ron@gmail.com', '2015-05-07'),
(247, 'jatin', 'ron@gmail.com', '2015-05-07'),
(248, 'rugved', 'ron@gmail.com', '2015-05-06'),
(249, 'rugved', 'ron@gmail.com', '2015-05-07'),
(250, 'nandesh', 'ron@gmail.com', '2015-05-06'),
(251, 'nandesh', 'ron@gmail.com', '2015-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
`exp_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `end_date` date NOT NULL,
  `rstatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `date_id`, `price`, `description`, `end_date`, `rstatus`) VALUES
(124, 141, '2131', 'asdasd  ', '2015-04-25', 1),
(125, 142, '99', ' ', '2015-04-24', 0),
(126, 143, '345', '', '2015-04-25', 1),
(127, 144, '34', 'asda', '2015-04-25', 0),
(128, 145, '34', 'asda ', '2015-04-26', 1),
(130, 147, '123', '', '2015-04-26', 0),
(135, 152, '784', 'hjkhk', '2015-04-15', 0),
(136, 153, '784', 'hjkhk', '2015-04-16', 1),
(137, 154, '784', 'hjkhk', '2015-04-17', 1),
(138, 155, '784', 'hjkhk', '2015-04-18', 1),
(142, 161, '78', '    ', '2015-05-08', 0),
(143, 162, '78', '', '2015-05-09', 1),
(144, 163, '78', '', '2015-05-10', 1),
(159, 181, '452', '', '2015-05-08', 0),
(160, 182, '452', '', '2015-05-11', 1),
(161, 183, '452', '', '2015-05-12', 1),
(162, 184, '781', ' ', '2015-08-14', 0),
(163, 185, '29', 'adasdasd ', '2015-04-29', 0),
(164, 186, '44', 'asdasd', '2015-04-29', 0),
(165, 187, '21', '', '2015-04-29', 0),
(167, 189, '12', ' ', '2015-05-01', 0),
(168, 190, '3', '', '2015-05-01', 0),
(169, 191, '32', ' dasddd ', '2015-05-01', 0),
(170, 192, '45', '', '2015-04-21', 0),
(171, 193, '345', 'dfgdfgdfgdfgdfg', '2015-05-01', 0),
(172, 194, '345', 'dfgdfgdfgdfgdfg', '2015-05-02', 1),
(173, 195, '23', '', '2015-05-02', 0),
(174, 196, '23', '', '2015-05-03', 1),
(175, 197, '23', '', '2015-05-04', 1),
(176, 198, '23', '', '2015-05-05', 1),
(178, 200, '345', ' ', '2015-05-03', 0),
(179, 201, '345', '', '2015-05-04', 1),
(180, 202, '345', '', '2015-05-05', 1),
(181, 203, '345', '', '2015-05-06', 1),
(182, 204, '345', '', '2015-05-07', 1),
(183, 205, '345', '', '2015-05-08', 1),
(184, 206, '345', '', '2015-05-09', 1),
(185, 207, '345', '', '2015-05-10', 1),
(186, 208, '321', '', '2015-05-03', 0),
(187, 209, '32', ' adsadasdsagdasgdas,dasdjaskldasd', '2015-05-05', 0),
(188, 210, '567', 'Jricjfjf ', '2015-05-05', 0),
(189, 211, '567', 'Jricjfjf ', '2015-05-06', 1),
(190, 212, '567', 'Jricjfjf ', '2015-05-07', 1),
(191, 213, '567', 'Jricjfjf ', '2015-05-08', 1),
(192, 214, '567', 'Jricjfjf ', '2015-05-09', 1),
(193, 215, '567', 'Jricjfjf ', '2015-05-10', 1),
(194, 216, '147', 'Jdfjf', '2015-05-05', 0),
(195, 217, '147', 'Jdfjf', '2015-05-06', 1),
(196, 218, '147', 'Jdfjf', '2015-05-07', 1),
(197, 219, '147', 'Jdfjf', '2015-05-08', 1),
(198, 220, '147', 'Jdfjf', '2015-05-09', 1),
(199, 221, '147', 'Jdfjf', '2015-05-10', 1),
(200, 222, '32', ' dasddd  ', '2015-05-02', 1),
(201, 223, '32', ' dasddd ', '2015-05-03', 1),
(202, 224, '32', ' dasddd ', '2015-05-04', 1),
(203, 225, '32', ' dasddd ', '2015-05-05', 1),
(204, 226, '32', ' dasddd ', '2015-05-06', 1),
(205, 227, '32', ' dasddd ', '2015-05-07', 1),
(206, 228, '32', ' dasddd ', '2015-05-08', 1),
(207, 229, '34', '', '2015-05-06', 0),
(208, 230, '34', '', '2015-05-07', 1),
(209, 231, '34', '', '2015-05-08', 1),
(210, 232, '34', '', '2015-05-09', 1),
(211, 233, '23', '', '2015-05-06', 0),
(212, 234, '23', '', '2015-05-07', 1),
(213, 235, '23', '', '2015-05-08', 1),
(214, 236, '23', '', '2015-05-09', 1),
(215, 237, '45', 'fdgh', '2015-05-06', 0),
(216, 238, '45', 'fdgh', '2015-05-07', 1),
(217, 239, '45', 'fdgh', '2015-05-08', 1),
(218, 240, '45', 'fdgh', '2015-05-09', 1),
(219, 241, '56', '', '2015-05-06', 0),
(220, 242, '56', '', '2015-05-07', 1),
(221, 243, '56', '', '2015-05-08', 1),
(222, 244, '56', '', '2015-05-09', 1),
(223, 245, '12', 'fgdfgdfgdfgd', '2015-05-06', 0),
(224, 246, '12', 'fgdfgdfgdfgd', '2015-05-07', 1),
(225, 247, '324', '', '2015-05-07', 0),
(226, 248, '23', 'gffdg', '2015-05-06', 0),
(227, 249, '23', 'gffdg', '2015-05-07', 1),
(228, 250, '23', 'acdacdacd', '2015-05-06', 0),
(229, 251, '23', 'acdacdacd', '2015-05-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `family_name` varchar(50) NOT NULL,
  `bgid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_name`, `bgid`) VALUES
('dcostas_13', 3),
('dcostas_13', 22),
('dcostas_13', 23),
('dcostas_13', 25),
('dcostas_13', 40),
('pondi_56', 41),
('dcostas_13', 46);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
`offerid` int(11) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `branchno` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerid`, `startdate`, `enddate`, `tag`, `description`, `branchno`) VALUES
(18, '2015-04-30 18:30:00', '2015-04-30 18:30:00', 'towels', 'ghjhjghj', '38469345'),
(19, '2015-05-01 18:30:00', '2015-05-01 18:30:00', 'towels', 'ghjhjghj', '38469345'),
(20, '2015-05-02 18:30:00', '2015-05-02 18:30:00', 'towels', 'ghjhjghj', '38469345'),
(21, '2015-05-03 18:30:00', '2015-05-03 18:30:00', 'towels', 'ghjhjghj', '38469345'),
(22, '2015-05-04 18:30:00', '2015-05-04 18:30:00', 'towels', 'ghjhjghj', '38469345'),
(23, '2015-05-02 18:30:00', '2015-05-02 18:30:00', 'poyato12', 'dsa adsasdads  ', '9198289298292'),
(34, '2015-05-01 18:30:00', '2015-05-01 18:30:00', 'dfjhsdfhsdklfhsdlkfhsdlkfhsfkjlsfjlksdfsdfsdfsdfsd', 'fsdf  ', '7897897856'),
(35, '2015-05-02 19:16:00', '2015-05-02 19:16:00', 'shoes', 'dasdasdasdadasd', '17532323369'),
(36, '2015-05-02 18:30:00', '2015-05-02 18:30:00', 'Rebook', 'fghfhvbnvbnvnvnvnvnvnvnvnvbnvnvnvbn', '23454235341'),
(37, '2015-05-02 18:30:00', '2015-05-02 18:30:00', 'bedshits', 'dadasdas', '481178117887'),
(40, '2015-05-02 18:30:00', '2015-05-02 18:30:00', 'fish', '20% off', '23454235341'),
(41, '2015-05-03 18:30:00', '2015-05-03 18:30:00', 'shoes', '20% off rebook shoes', '23454235341'),
(42, '2015-05-04 18:30:00', '2015-05-04 18:30:00', 'shoes', '20% off rebook shoes', '23454235341'),
(43, '2015-05-05 18:30:00', '2015-05-05 18:30:00', 'shoes', '20% off rebook shoes', '23454235341'),
(44, '2015-05-06 18:30:00', '2015-05-06 18:30:00', 'shoes', '20% off rebook shoes', '23454235341'),
(45, '2015-05-07 18:30:00', '2015-05-07 18:30:00', 'shoes', '20% off rebook shoes', '23454235341'),
(46, '2015-05-03 18:30:00', '2015-05-03 18:30:00', 'bags', '50% off on ladies bag', '23454235341'),
(47, '2015-05-04 18:30:00', '2015-05-04 18:30:00', 'bags', '50% off on ladies bag', '23454235341'),
(48, '2015-05-05 18:30:00', '2015-05-05 18:30:00', 'bags', '50% off on ladies bag', '23454235341'),
(49, '2015-05-06 18:30:00', '2015-05-06 18:30:00', 'bags', '50% off on ladies bag', '23454235341'),
(50, '2015-05-07 18:30:00', '2015-05-07 18:30:00', 'bags', '50% off on ladies bag', '23454235341'),
(51, '2015-05-08 18:30:00', '2015-05-09 18:30:00', 'bags', '50% off on ladies bag ', '23454235341'),
(54, '2015-05-07 18:30:00', '2015-05-07 18:30:00', 'shoes', 'dsfdfsdfgv', '38469345'),
(55, '2015-05-07 18:30:00', '2015-05-07 18:30:00', 'fgjfhjffjgfjhfhg', 'j,lkj,kl', '481178117887'),
(56, '2015-05-05 18:30:00', '2015-05-05 18:30:00', 'Bikes', 'asdasdasdads', '2454287781'),
(57, '2015-05-06 18:30:00', '2015-05-06 18:30:00', 'Bikes', 'asdasdasdads', '2454287781'),
(58, '2015-05-07 18:30:00', '2015-05-07 18:30:00', 'Bikes', 'asdasdasdads', '2454287781'),
(59, '2015-05-08 18:30:00', '2015-05-08 18:30:00', 'Bikes', 'asdasdasdads', '2454287781'),
(60, '2015-05-09 18:30:00', '2015-05-09 18:30:00', 'Bikes', 'asdasdasdads', '2454287781'),
(61, '2015-05-05 18:30:00', '2015-05-05 18:30:00', 'koggggg', 'hfhfhfhfghfghfgh', '23454235341'),
(62, '2015-05-06 18:30:00', '2015-05-06 18:30:00', 'koggggg', 'hfhfhfhfghfghfgh', '23454235341');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `username` varchar(50) NOT NULL,
  `vendorname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`username`, `vendorname`, `password`, `date`) VALUES
('ja12@yahoo.com', 'jkhjkj', 'MjM0', '2015-05-22'),
('ja1@yahoo.com', 'gfhgfh', 'MTI=', '2015-05-22'),
('ja@yahoo.com', 'Jstores', 'MTIz', '2015-04-10'),
('jatinsharma698@gmail.com', 'jatin Sharma', 'MDEyMzY1NDc4OQ==', '1993-08-01'),
('rd@gmail.com', 'R traders', 'cmFodWw=', '1990-11-16'),
('rtf@gmail.com', 'Richie ', 'MTEx', '1996-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
 ADD PRIMARY KEY (`contact`), ADD KEY `username` (`username`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
 ADD PRIMARY KEY (`bugid`), ADD KEY `bugid` (`bugid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`username`), ADD KEY `family_name` (`family_name`);

--
-- Indexes for table `datesubtable`
--
ALTER TABLE `datesubtable`
 ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
 ADD PRIMARY KEY (`exp_id`), ADD KEY `date_id` (`date_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
 ADD PRIMARY KEY (`family_name`,`bgid`), ADD KEY `bgid` (`bgid`), ADD KEY `bgid_2` (`bgid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
 ADD PRIMARY KEY (`offerid`), ADD KEY `brancid` (`branchno`), ADD KEY `brancno` (`branchno`), ADD KEY `brancno_2` (`branchno`), ADD KEY `brancno_3` (`branchno`), ADD KEY `branchno` (`branchno`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
MODIFY `bugid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `datesubtable`
--
ALTER TABLE `datesubtable`
MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
MODIFY `offerid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
ADD CONSTRAINT `jop` FOREIGN KEY (`username`) REFERENCES `vendor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
ADD CONSTRAINT `kio` FOREIGN KEY (`date_id`) REFERENCES `datesubtable` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `family`
--
ALTER TABLE `family`
ADD CONSTRAINT `bkilkl` FOREIGN KEY (`bgid`) REFERENCES `budget` (`bugid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
ADD CONSTRAINT `dasd` FOREIGN KEY (`branchno`) REFERENCES `branch` (`contact`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
