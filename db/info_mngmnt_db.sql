-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 03:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_mngmnt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerFName` varchar(255) NOT NULL,
  `customerLName` varchar(255) NOT NULL,
  `dateofBirth` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `contactNo` char(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerFName`, `customerLName`, `dateofBirth`, `gender`, `contactNo`, `email`) VALUES
(2, 'Joes', 'Wilson', '1994-03-13', 'M', '09279428400', 'luigirixon@yahoo.com'),
(3, 'Jan', 'Grey', '1993-01-27', 'M', '09959227500', 'luigirixon@yahoo.com'),
(4, 'Dani', 'Ponder', '1986-10-16', 'F', '09178653211', 'luna_lurege7@gmail.com'),
(5, 'Lola', 'Luciana', '1996-06-24', 'F', '09274852399', 'luigirixon@yahoo.com'),
(6, 'Carlos', 'Webber', '1984-11-09', 'M', '09272126349', 'carloswebbet@gmail.com'),
(7, 'Maria', 'Reed', '1974-06-03', 'F', '09273205350', 'luigirixon@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `street` varchar(35) DEFAULT NULL,
  `barangay` varchar(35) DEFAULT NULL,
  `city` varchar(35) NOT NULL,
  `region` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `zip` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressID`, `customerID`, `street`, `barangay`, `city`, `region`, `country`, `zip`) VALUES
(1, 2, 'Reina Regente Street', 'Amparos', 'Cebu City', 'Central Visayas', 'Philippines', '6002'),
(2, 3, 'Roosevelt Avenue', 'San Juan', 'Tacloban City', 'Central Visayas', 'Philippines', '6500'),
(3, 4, 'Roosevelt Avenue', 'Taguig', 'Carmen', 'Central Visayas', 'Philippines', '6319'),
(4, 5, 'Roxas Boulevard', 'Pasay', 'Quezon City', 'Metro Manila', 'Philippines', '1008'),
(5, 6, 'Boni Avenue', 'Marikina', 'Cagayan de Oro', 'Northern Mindanao', 'Philippines', '9000'),
(6, 7, 'De la Rosa Street', 'Pasig', 'Tagbilaran City', 'Central Visayas', 'Philippines', '6300');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_users`
--

CREATE TABLE `inventory_users` (
  `userID` int(11) NOT NULL,
  `userType` enum('Manager','User') NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_users`
--

INSERT INTO `inventory_users` (`userID`, `userType`, `userFirstName`, `userLastName`, `userName`, `email`, `password`) VALUES
(1, 'Manager', 'Marjorie', 'Tumapon', 'marge123', 'marge.tumapon@gmail.com', 'margepassword'),
(2, 'User', 'Luigi', 'Rixon', 'luirix21', 'luigirixon@yahoo.com', 'luigipassword'),
(3, 'User', 'Luna', 'Lurege', 'lurluna7', 'luna_lurege7@gmail.com', 'lunapassword'),
(9, 'User', 'Van AJ', 'Vanguardia', 'vanaj', 'van@gmail.com', '$2y$10$a937SG2aEB8NrQuKumKY2.aVHxUEP3sWcKjW8xbErH.XvZ0swur/.'),
(10, 'User', 'CJ', 'Caburnay', 'cj123', 'cj@gmail.com', '$2y$10$kj4UW2oKB0tcTwVtVjpurOXsNk6khFMwEYT8psSb53C3mG1Kq5Hg.'),
(11, 'Manager', 'marge', 'Tumapon', 'marge123', 'marge@gmail.com', '$2y$10$iU3VRBWisi6HQ3nQAVbrk.nISGZmVIkLl6fhZM1J.4BhneNVfGZ/2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `orderStatus` enum('Awaiting-Approval','Awaiting-Payment','Processing-Order','Awaiting-Shipment','Awaiting-Pickup','Completed','Cancelled','Refunded','Manual-Verification-Required') NOT NULL,
  `shipRequiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `createdBy`, `approvedBy`, `orderDate`, `orderStatus`, `shipRequiredDate`) VALUES
(3, 4, 3, 1, '2021-11-15', 'Awaiting-Pickup', '2021-11-20'),
(5, 4, 3, 1, '2021-11-18', 'Awaiting-Shipment', '2021-11-23'),
(6, 5, 2, 1, '2021-11-20', 'Completed', '2021-11-25'),
(7, 7, 3, 1, '2021-11-22', 'Processing-Order', '2021-11-27'),
(8, 6, 2, 1, '2021-11-23', 'Awaiting-Shipment', '2021-11-28'),
(11, 4, 3, 1, '2021-11-26', 'Manual-Verification-Required', '2021-12-01'),
(16, 5, 3, 1, '2021-10-03', 'Completed', '2021-10-08'),
(24, 5, 3, 1, '2021-09-08', 'Completed', '2021-09-13'),
(25, 4, 3, 1, '2021-09-17', 'Completed', '2021-09-22'),
(26, 5, 3, 1, '2021-09-08', 'Completed', '2021-09-13'),
(27, 4, 3, 1, '2021-09-17', 'Completed', '2021-09-22'),
(29, 2, 3, NULL, '2021-12-01', 'Awaiting-Approval', '2021-12-23'),
(31, 2, 3, 1, '2021-01-03', 'Completed', '2021-01-10'),
(32, 5, 3, 1, '2021-01-04', 'Completed', '2021-01-12'),
(33, 3, 2, 1, '2021-01-06', 'Completed', '2021-01-15'),
(34, 7, 3, 1, '2021-01-08', 'Completed', '2021-01-17'),
(35, 4, 3, 1, '2021-01-12', 'Completed', '2021-01-20'),
(36, 2, 2, 1, '2021-01-12', 'Completed', '2021-01-18'),
(37, 3, 3, 1, '2021-01-13', 'Completed', '2021-01-20'),
(38, 5, 3, 1, '2021-01-15', 'Completed', '2021-01-22'),
(39, 7, 2, 1, '2021-01-16', 'Completed', '2021-01-23'),
(40, 6, 2, 1, '2021-01-18', 'Completed', '2021-01-25'),
(41, 4, 3, 1, '2021-01-19', 'Completed', '2021-01-25'),
(42, 3, 2, 1, '2021-01-22', 'Completed', '2021-01-28'),
(43, 3, 2, 1, '2021-01-23', 'Completed', '2021-01-27'),
(44, 7, 3, 1, '2021-01-25', 'Completed', '2021-01-29'),
(45, 6, 3, 1, '2021-01-29', 'Completed', '2021-01-30'),
(46, 3, 3, 1, '2021-02-03', 'Completed', '2021-02-10'),
(47, 3, 3, 1, '2021-02-04', 'Completed', '2021-02-12'),
(48, 6, 2, 1, '2021-02-06', 'Completed', '2021-02-15'),
(49, 5, 3, 1, '2021-02-08', 'Completed', '2021-02-17'),
(50, 4, 3, 1, '2021-02-13', 'Completed', '2021-02-20'),
(51, 2, 2, 1, '2021-02-14', 'Completed', '2021-02-18'),
(52, 3, 3, 1, '2021-02-14', 'Completed', '2021-02-20'),
(53, 2, 3, 1, '2021-02-15', 'Completed', '2021-02-22'),
(54, 2, 2, 1, '2021-02-17', 'Completed', '2021-02-23'),
(55, 6, 2, 1, '2021-02-17', 'Completed', '2021-02-25'),
(56, 4, 3, 1, '2021-02-19', 'Completed', '2021-02-25'),
(57, 7, 2, 1, '2021-02-20', 'Completed', '2021-02-28'),
(58, 5, 2, 1, '2021-02-21', 'Completed', '2021-02-27'),
(59, 3, 3, 1, '2021-03-01', 'Completed', '2021-02-10'),
(60, 3, 3, 1, '2021-03-04', 'Completed', '2021-02-12'),
(61, 6, 2, 1, '2021-03-04', 'Completed', '2021-02-11'),
(62, 5, 3, 1, '2021-03-05', 'Completed', '2021-02-13'),
(63, 4, 3, 1, '2021-03-07', 'Completed', '2021-02-14'),
(64, 2, 2, 1, '2021-03-08', 'Completed', '2021-02-14'),
(65, 3, 3, 1, '2021-03-08', 'Completed', '2021-02-15'),
(66, 2, 3, 1, '2021-03-11', 'Completed', '2021-02-17'),
(67, 2, 2, 1, '2021-03-13', 'Completed', '2021-02-19'),
(68, 6, 2, 1, '2021-03-13', 'Completed', '2021-02-18'),
(69, 4, 3, 1, '2021-03-14', 'Completed', '2021-02-20'),
(70, 7, 2, 1, '2021-03-15', 'Completed', '2021-02-22'),
(71, 5, 2, 1, '2021-03-17', 'Completed', '2021-02-23'),
(72, 4, 3, 1, '2021-03-18', 'Completed', '2021-02-24'),
(73, 7, 2, 1, '2021-03-20', 'Completed', '2021-02-24'),
(74, 5, 2, 1, '2021-03-20', 'Completed', '2021-02-25'),
(75, 4, 3, 1, '2021-03-21', 'Completed', '2021-02-27'),
(76, 7, 2, 1, '2021-03-22', 'Completed', '2021-02-27'),
(77, 5, 2, 1, '2021-03-24', 'Completed', '0000-00-00'),
(78, 5, 2, 1, '2021-03-26', 'Completed', '2021-04-05'),
(79, 4, 3, 1, '2021-03-28', 'Completed', '2021-04-04'),
(80, 7, 2, 1, '2021-03-30', 'Completed', '2021-04-08'),
(81, 3, 3, 1, '2021-04-01', 'Completed', '2021-04-10'),
(82, 3, 3, 1, '2021-04-04', 'Completed', '2021-04-12'),
(83, 6, 2, 1, '2021-04-04', 'Completed', '2021-04-14'),
(84, 5, 3, 1, '2021-04-07', 'Completed', '2021-04-14'),
(85, 4, 3, 1, '2021-04-09', 'Completed', '2021-04-19'),
(86, 2, 2, 1, '2021-04-13', 'Completed', '2021-04-20'),
(87, 3, 3, 1, '2021-04-15', 'Completed', '2021-04-22'),
(88, 2, 3, 1, '2021-04-19', 'Completed', '2021-04-25'),
(89, 2, 2, 1, '2021-04-20', 'Completed', '2021-04-27'),
(90, 6, 2, 1, '2021-04-22', 'Completed', '2021-04-27'),
(91, 4, 3, 1, '2021-04-24', 'Completed', '2021-04-28'),
(92, 7, 2, 1, '2021-04-24', 'Completed', '2021-04-29'),
(93, 5, 2, 1, '2021-04-27', 'Completed', '2021-05-04'),
(94, 4, 3, 1, '2021-04-29', 'Completed', '2021-05-05'),
(95, 2, 3, 1, '2021-05-01', 'Completed', '2021-05-10'),
(96, 3, 3, 1, '2021-05-04', 'Completed', '2021-05-12'),
(97, 6, 2, 1, '2021-05-05', 'Completed', '2021-05-14'),
(98, 5, 3, 1, '2021-05-08', 'Completed', '2021-05-14'),
(99, 4, 3, 1, '2021-05-09', 'Completed', '2021-05-17'),
(100, 2, 2, 1, '2021-05-12', 'Completed', '2021-05-22'),
(101, 4, 3, 1, '2021-05-13', 'Completed', '2021-05-22'),
(102, 7, 3, 1, '2021-05-18', 'Completed', '2021-05-28'),
(103, 6, 2, 1, '2021-05-27', 'Completed', '2021-05-30'),
(104, 2, 3, 1, '2021-06-01', 'Completed', '2021-06-10'),
(105, 3, 3, 1, '2021-06-04', 'Completed', '2021-06-12'),
(106, 6, 2, 1, '2021-06-05', 'Completed', '2021-06-14'),
(107, 5, 3, 1, '2021-06-08', 'Completed', '2021-06-14'),
(108, 4, 3, 1, '2021-06-09', 'Completed', '2021-06-16'),
(109, 3, 2, 1, '2021-06-12', 'Completed', '2021-06-19'),
(110, 4, 3, 1, '2021-06-13', 'Completed', '2021-06-22'),
(111, 7, 3, 1, '2021-06-18', 'Completed', '2021-06-25'),
(112, 5, 2, 1, '2021-06-20', 'Completed', '2021-06-28'),
(113, 6, 3, 1, '2021-06-24', 'Completed', '2021-06-29'),
(114, 3, 2, 1, '2021-06-27', 'Completed', '2021-07-08'),
(115, 7, 3, 1, '2021-06-27', 'Completed', '2021-07-07'),
(116, 5, 2, NULL, '2030-11-21', 'Awaiting-Approval', '2021-12-02'),
(117, 2, 3, 1, '2021-07-01', 'Completed', '2021-07-10'),
(118, 3, 3, 1, '2021-07-12', 'Completed', '2021-07-17'),
(119, 6, 2, 1, '2021-07-17', 'Completed', '2021-07-24'),
(120, 7, 3, 1, '2021-07-18', 'Completed', '2021-07-27'),
(121, 4, 3, 1, '2021-07-22', 'Completed', '2021-07-28'),
(122, 5, 2, 1, '2021-07-25', 'Completed', '2021-07-30'),
(123, 4, 3, 1, '2021-07-29', 'Completed', '2021-08-06'),
(124, 2, 3, 1, '2021-08-01', 'Completed', '2021-08-08'),
(125, 3, 3, 1, '2021-08-04', 'Completed', '2021-08-10'),
(126, 6, 2, 1, '2021-08-07', 'Completed', '2021-08-12'),
(127, 7, 3, 1, '2021-08-09', 'Completed', '2021-08-12'),
(128, 4, 3, 1, '2021-08-09', 'Completed', '2021-08-13'),
(129, 5, 2, 1, '2021-08-10', 'Completed', '2021-08-12'),
(130, 6, 3, 1, '2021-08-10', 'Completed', '2021-08-14'),
(131, 7, 3, 1, '2021-08-12', 'Completed', '2021-08-17'),
(132, 2, 3, 1, '2021-08-15', 'Completed', '2021-08-20'),
(133, 6, 2, 1, '2021-08-18', 'Completed', '2021-08-25'),
(134, 3, 3, 1, '2021-08-23', 'Completed', '2021-08-28'),
(135, 2, 3, 1, '2021-09-03', 'Completed', '2021-09-08'),
(136, 3, 3, 1, '2021-09-04', 'Completed', '2021-09-10'),
(137, 6, 2, 1, '2021-09-07', 'Completed', '2021-09-13'),
(138, 7, 3, 1, '2021-09-09', 'Completed', '2021-09-13'),
(139, 4, 3, 1, '2021-09-09', 'Completed', '2021-09-14'),
(140, 5, 2, 1, '2021-09-12', 'Completed', '2021-09-16'),
(141, 6, 3, 1, '2021-09-13', 'Completed', '2021-09-17'),
(142, 7, 3, 1, '2021-09-13', 'Completed', '2021-09-18'),
(143, 2, 3, 1, '2021-09-16', 'Completed', '2021-09-22'),
(144, 6, 2, 1, '2021-09-20', 'Completed', '2021-09-27'),
(145, 3, 3, 1, '2021-09-23', 'Completed', '2021-09-28'),
(146, 6, 2, 1, '2021-09-25', 'Completed', '2021-10-02'),
(147, 3, 3, 1, '2021-09-28', 'Completed', '2021-10-05'),
(148, 2, 2, 1, '2021-10-03', 'Completed', '2021-10-08'),
(149, 3, 3, 1, '2021-10-04', 'Completed', '2021-10-10'),
(150, 4, 2, 1, '2021-10-07', 'Completed', '2021-10-13'),
(151, 7, 3, 1, '2021-10-09', 'Completed', '2021-10-13'),
(152, 4, 2, 1, '2021-10-09', 'Completed', '2021-10-14'),
(153, 5, 3, 1, '2021-10-12', 'Completed', '2021-10-16'),
(154, 4, 3, 1, '2021-10-13', 'Completed', '2021-10-17'),
(155, 7, 2, 1, '2021-10-13', 'Completed', '2021-10-18'),
(156, 2, 2, 1, '2021-10-16', 'Completed', '2021-10-22'),
(157, 6, 3, 1, '2021-10-20', 'Completed', '2021-10-27'),
(158, 3, 3, 1, '2021-10-23', 'Completed', '2021-10-28'),
(159, 6, 2, 1, '2021-10-25', 'Completed', '2021-11-02'),
(160, 2, 2, 1, '2021-10-28', 'Completed', '2021-11-05'),
(161, 6, 2, 1, '2021-11-02', 'Refunded', '2021-11-06'),
(162, 5, 3, 1, '2021-11-04', 'Completed', '2021-11-08'),
(163, 2, 2, 1, '2021-11-06', 'Completed', '2021-11-11'),
(164, 7, 3, 1, '2021-11-09', 'Completed', '2021-11-14'),
(165, 3, 2, 1, '2021-11-10', 'Completed', '2021-11-16'),
(166, 2, 3, 1, '2021-11-11', 'Completed', '2021-11-17'),
(167, 6, 3, 1, '2021-11-12', 'Completed', '2021-11-17'),
(168, 5, 2, 1, '2021-11-12', 'Manual-Verification-Required', '2021-11-16'),
(169, 2, 2, 1, '2021-11-14', 'Completed', '2021-11-18'),
(170, 4, 3, 1, '2021-11-15', 'Completed', '2021-11-19'),
(171, 3, 3, 1, '2021-11-15', 'Completed', '2021-11-20'),
(172, 2, 2, 1, '2021-11-16', 'Cancelled', '2021-11-22'),
(173, 2, 2, 1, '2021-11-18', 'Awaiting-Shipment', '2021-11-24'),
(174, 5, 2, 1, '2021-11-20', 'Awaiting-Pickup', '2021-11-26'),
(175, 6, 3, 1, '2021-11-22', 'Refunded', '2021-11-28'),
(176, 4, 3, 1, '2021-11-23', 'Processing-Order', '2021-11-29'),
(177, 6, 2, 1, '2021-11-27', 'Processing-Order', '2021-11-30'),
(178, 4, 3, 1, '2021-11-30', 'Awaiting-Shipment', '2021-12-06'),
(180, 3, 2, NULL, '2021-11-30', 'Awaiting-Approval', '2021-12-06'),
(182, 2, 2, NULL, '2021-12-01', 'Awaiting-Payment', '2021-12-08'),
(184, 3, 2, NULL, '2021-12-01', 'Completed', '2021-12-08'),
(185, 5, 2, NULL, '2021-12-02', 'Completed', '2021-12-16'),
(186, 7, 2, NULL, '2021-12-02', 'Completed', '2021-12-09'),
(187, 2, 2, NULL, '2021-12-02', 'Cancelled', '2021-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `orderlineID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderlineID`, `orderID`, `productID`, `quantity`) VALUES
(3, 3, 7, 35),
(6, 5, 1, 25),
(7, 6, 1, 35),
(8, 7, 8, 15),
(9, 7, 2, 5),
(10, 8, 5, 25),
(13, 11, 6, 50),
(66, 27, 5, 120),
(67, 24, 5, 50),
(68, 27, 5, 120),
(69, 24, 5, 50),
(70, 27, 3, 120),
(71, 24, 2, 50),
(72, 6, 2, 80),
(73, 3, 6, 100),
(74, 26, 1, 150),
(76, 3, 8, 100),
(83, 11, 3, 100),
(84, 16, 5, 20),
(85, 7, 8, 50),
(86, 8, 5, 100),
(87, 5, 6, 120),
(97, 25, 6, 80),
(99, 3, 4, 130),
(100, 27, 3, 120),
(101, 24, 2, 50),
(102, 6, 2, 80),
(103, 3, 6, 100),
(104, 26, 1, 150),
(105, 25, 4, 200),
(106, 3, 8, 100),
(113, 11, 3, 100),
(114, 16, 5, 20),
(115, 7, 8, 50),
(116, 8, 5, 100),
(117, 5, 6, 120),
(127, 25, 6, 80),
(129, 3, 4, 130),
(132, 29, 2, 30),
(133, 29, 8, 80),
(136, 116, 4, 30),
(137, 116, 5, 10),
(138, 116, 7, 20),
(139, 116, 8, 5),
(140, 29, 7, 30),
(141, 180, 1, 10),
(142, 180, 5, 15),
(309, 31, 1, 10),
(310, 31, 8, 25),
(311, 32, 7, 30),
(312, 33, 4, 5),
(313, 34, 3, 10),
(314, 35, 2, 8),
(315, 36, 1, 5),
(316, 37, 5, 20),
(317, 37, 7, 22),
(318, 38, 6, 24),
(319, 38, 8, 16),
(320, 39, 3, 18),
(321, 40, 2, 15),
(322, 41, 4, 21),
(323, 42, 5, 27),
(324, 43, 6, 30),
(325, 44, 3, 10),
(326, 45, 4, 10),
(327, 46, 5, 5),
(328, 46, 8, 9),
(329, 47, 1, 10),
(330, 48, 1, 10),
(331, 49, 8, 5),
(332, 50, 8, 5),
(333, 51, 7, 22),
(334, 52, 2, 23),
(335, 53, 3, 10),
(336, 53, 4, 5),
(337, 54, 1, 5),
(338, 55, 5, 10),
(339, 56, 6, 10),
(340, 57, 6, 50),
(341, 58, 1, 25),
(342, 59, 1, 20),
(343, 60, 3, 20),
(344, 61, 4, 20),
(345, 62, 2, 40),
(346, 63, 2, 20),
(347, 64, 3, 20),
(348, 65, 5, 15),
(349, 66, 6, 5),
(350, 66, 6, 8),
(351, 67, 4, 40),
(352, 68, 2, 5),
(353, 69, 3, 10),
(354, 70, 3, 10),
(355, 70, 2, 40),
(356, 71, 4, 30),
(357, 72, 5, 10),
(358, 73, 5, 5),
(359, 74, 2, 5),
(360, 74, 2, 10),
(361, 75, 4, 20),
(362, 76, 4, 20),
(363, 76, 2, 10),
(364, 77, 8, 23),
(365, 78, 1, 26),
(366, 79, 7, 27),
(367, 80, 7, 22),
(368, 81, 5, 5),
(369, 82, 4, 10),
(370, 83, 3, 5),
(371, 84, 2, 1),
(372, 85, 1, 2),
(373, 86, 2, 10),
(374, 87, 6, 9),
(375, 88, 5, 8),
(376, 89, 4, 10),
(377, 90, 3, 13),
(378, 90, 2, 15),
(379, 90, 1, 20),
(380, 91, 1, 2),
(381, 92, 2, 3),
(382, 93, 5, 7),
(383, 94, 5, 8),
(384, 95, 3, 10),
(385, 96, 4, 30),
(386, 97, 4, 20),
(387, 98, 7, 10),
(388, 99, 7, 10),
(389, 100, 8, 5),
(390, 100, 3, 2),
(391, 101, 2, 3),
(392, 102, 1, 10),
(393, 103, 1, 30),
(394, 104, 4, 8),
(395, 105, 4, 10),
(396, 106, 7, 5),
(397, 107, 7, 15),
(398, 108, 5, 3),
(399, 109, 4, 4),
(400, 110, 4, 14),
(401, 111, 3, 21),
(402, 112, 2, 32),
(403, 113, 4, 10),
(404, 114, 5, 15),
(405, 115, 6, 19),
(406, 116, 8, 20),
(407, 117, 7, 25),
(408, 118, 7, 30),
(409, 119, 1, 8),
(410, 120, 2, 3),
(411, 121, 1, 30),
(412, 122, 8, 25),
(413, 123, 2, 21),
(414, 124, 3, 15),
(415, 125, 2, 18),
(416, 126, 3, 8),
(417, 127, 3, 10),
(418, 128, 4, 13),
(419, 129, 5, 15),
(420, 130, 4, 21),
(421, 130, 3, 23),
(422, 131, 2, 30),
(423, 131, 2, 21),
(424, 132, 1, 23),
(425, 133, 2, 27),
(426, 134, 3, 10),
(427, 135, 5, 5),
(428, 136, 5, 8),
(429, 137, 4, 10),
(430, 138, 7, 11),
(431, 139, 4, 5),
(432, 140, 3, 30),
(433, 141, 2, 20),
(434, 142, 1, 21),
(435, 143, 2, 10),
(436, 144, 4, 10),
(437, 145, 2, 20),
(438, 146, 4, 20),
(439, 147, 7, 3),
(440, 148, 6, 4),
(441, 149, 6, 20),
(442, 150, 4, 20),
(443, 151, 2, 23),
(444, 152, 1, 10),
(445, 153, 1, 5),
(446, 154, 2, 1),
(447, 155, 2, 2),
(448, 156, 3, 20),
(449, 157, 6, 20),
(450, 158, 7, 1),
(451, 159, 8, 6),
(452, 160, 6, 2),
(453, 160, 5, 20),
(454, 161, 4, 4),
(455, 162, 3, 20),
(456, 163, 2, 5),
(457, 164, 1, 3),
(458, 165, 1, 10),
(459, 166, 8, 27),
(460, 167, 6, 23),
(461, 168, 7, 20),
(462, 169, 8, 24),
(463, 169, 1, 20),
(464, 170, 2, 5),
(465, 171, 3, 8),
(466, 172, 4, 13),
(467, 173, 4, 12),
(468, 174, 5, 10),
(469, 175, 4, 5),
(470, 176, 2, 2),
(471, 177, 1, 1),
(472, 178, 8, 8),
(473, 182, 6, 10),
(476, 184, 1, 5),
(477, 184, 3, 5),
(478, 185, 1, 5),
(479, 185, 2, 5),
(480, 186, 1, 5),
(481, 187, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `tradeName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `dateContained` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `applicationType` varchar(255) NOT NULL,
  `cureTime` time NOT NULL,
  `color` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `packageType` varchar(255) NOT NULL,
  `packageSize` varchar(255) NOT NULL,
  `maxOperatingTemp` varchar(255) NOT NULL,
  `minOperatingTemp` varchar(255) NOT NULL,
  `viscosity` varchar(255) NOT NULL,
  `chemicalComposition` text NOT NULL,
  `operatingTempRange` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `inStock` int(11) NOT NULL,
  `minimumStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `tradeName`, `description`, `brandName`, `dateContained`, `price`, `applicationType`, `cureTime`, `color`, `form`, `packageType`, `packageSize`, `maxOperatingTemp`, `minOperatingTemp`, `viscosity`, `chemicalComposition`, `operatingTempRange`, `productImage`, `inStock`, `minimumStock`) VALUES
(1, 'Loctite 243', 'A general purpose, medium strength threadlocker with improved oil tolerance. For fasteners between 1/4\" and 3/4\" (6 to 20 mm) diameters.', 'Loctite', '2021-10-01', '652.40', 'Thread locking', '02:00:00', 'Blue', 'Liquid', 'Bottle', '10 ml', '+180°C', '-55°C', 'Thixotropic', 'Dimethacrylate Ester', '-55°C -> +180°C', 'loctite 243.jpg', 933, 100),
(2, 'Loctite 271', 'The Loctite 135381 is a 271™ series high strength threadlocker that comes in a 50 ml bottle. This material is designed for the permanent locking and sealing of threaded fasteners.', 'Loctite', '2021-10-01', '597.60', 'Thread locking', '24:00:00', 'Red', 'Liquid', 'Bottle', '50 ml', '+300°F', '>+50°F', 'Thixotropic', 'Methacrylate Ester', '-50°C -> +300°C', 'Loctite 271.jpg', 1784, 50),
(3, 'Loctite 242', 'The Loctite 135355 is a blue threadlocker that comes in a 50 ml bottle. This medium strength, mil spec threadlocker is designed for general purpose applications on fasteners between ¼\" and ¾\" diameters.', 'Loctite', '2021-10-01', '816.90', 'Thread locking', '24:00:00', 'Blue', 'Liquid', 'Bottle', '50 ml', '+300°F', '-65°F', 'Thixotropic', 'Dimethacrylate Ester', '-65°F -> +300°F', 'Loctite 242.jpg', 1447, 20),
(4, 'Loctite 545', 'The Loctite 135486 is a thread sealant that comes in a 50 ml bottle. This material is designed for the locking and sealing of small, fine threaded fittings particularly those used in hydraulic and pneumatic installations.', 'Loctite', '2021-10-02', '1343.20', 'Thread Sealing', '168:00:00', 'Purple', 'Liquid', 'Bottle', '50 ml', '+300°F', '-65°F', 'Thixotropic', 'Polyglycoldioctanoate, Polyglycol Dimethacrylate, 2-Hydroxyethyl Methacrylate, Silica, Amorphous, Fumed, Crystal-Free, Cumene Hydroperoxide, 1-Acetyl-2-Phenylhydrazine, Cumene, Methacrylic Acid', '-65°F -> +300°F', 'Loctite 545.jpg', 789, 80),
(5, 'Loctite 262', 'The Loctite 135374 is a high strength product that is applied to fasteners up to 3/4\" (20mm) in size before assembly. Localized heat and hand tools are required to separate parts;solvents will not weaken the adhesive bond. Approved for use in or around food processing areas.', 'Loctite', '2021-10-01', '422.20', 'Thread locking', '24:00:00', 'Red', 'Liquid', 'Bottle', '50 ml', '+300°F', '-65°F', 'Thixotropic', 'Dimethacrylate Ester', '-65°F -> +300°F', 'Loctite 262.jpg', 923, 50),
(6, 'Loctite 290', 'The Loctite 135392 is a medium-strength wicking grade threadlocker for pre-assembled bolts up to 1/2\" (12 mm). This material\'s capillary action allows it to wick between engaged threads elliminating the need to disassemble parts prior to application.', 'Loctite', '2021-10-01', '378.30', 'Thread locking', '24:00:00', 'Green', 'Liquid', 'Bottle', '50 ml', '+300°F', '-65°F', 'Thixotropic', 'Dimethacrylate Ester', '-65°F -> +300°F', 'Loctite 290.jpg', 1224, 20),
(7, 'Loctite 220', 'The Loctite 645093 is a wicking grade, medium strength threadlocker that comes in a 50 ml bottle. The low viscosity adhesive is designed for use on preassembled fasteners.', 'Loctite', '2021-10-01', '844.30', 'Thread locking', '24:00:00', 'Blue', 'Liquid', 'Bottle', '50 ml', '+300°F', '-65°F', 'Thixotropic', 'Dimethacrylate Ester', '-65°F -> +300°F', 'Loctite 220.jpg', 1324, 50),
(8, 'Loctite 263', 'The Loctite 1330585 is a high strength, permanent threadlocker for heavy duty applications. This material only works on both active metals such as brass and copper as well as passive substrates such as stainless steel.', 'Loctite', '2021-10-01', '756.60', 'Thread locking', '24:00:00', 'Red', 'Liquid', 'Liquid', '50 ml', '+360°F', '-65°F', 'Thixotropic', 'Dimethacrylate Ester', '-65°F -> +360°F', 'Loctite 263.jpg', 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `replenishment`
--

CREATE TABLE `replenishment` (
  `repOrderID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  `repOrderDate` date NOT NULL,
  `orderStatus` enum('Awaiting-Approval','Awaiting-Payment','Processing-Order','Awaiting-Shipment','Awaiting-Pickup','Completed','Cancelled','Refunded','Manual-Verification-Required') NOT NULL,
  `shipRequiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replenishment`
--

INSERT INTO `replenishment` (`repOrderID`, `supplierID`, `createdBy`, `approvedBy`, `repOrderDate`, `orderStatus`, `shipRequiredDate`) VALUES
(6, 3, 3, 1, '2021-11-21', 'Completed', '2021-11-28'),
(7, 2, 2, 1, '2021-11-22', 'Completed', '2021-11-30'),
(8, 3, 2, 1, '2021-11-28', 'Completed', '2021-12-04'),
(11, 2, 2, NULL, '2021-12-06', 'Awaiting-Approval', '2021-12-12'),
(13, 2, 2, NULL, '2021-11-23', 'Awaiting-Approval', '2021-11-19'),
(15, 3, 3, 1, '2021-11-27', 'Refunded', '2021-11-27'),
(16, 3, 2, 1, '2021-11-10', 'Completed', '2021-12-10'),
(17, 2, 2, 1, '2021-12-23', 'Refunded', '2021-12-31'),
(19, 3, 2, NULL, '2021-11-09', 'Awaiting-Approval', '2021-11-27'),
(20, 3, 2, 1, '2021-01-03', 'Completed', '2021-04-03'),
(21, 3, 2, 1, '2021-01-12', 'Awaiting-Shipment', '2021-04-12'),
(22, 3, 2, 1, '2021-01-18', 'Completed', '2021-04-18'),
(23, 3, 2, 1, '2021-01-23', 'Completed', '2021-04-23'),
(24, 3, 2, 1, '2021-01-30', 'Completed', '2021-04-30'),
(25, 3, 2, 1, '2021-02-03', 'Completed', '2021-05-03'),
(26, 3, 2, 1, '2021-02-12', 'Completed', '2021-05-12'),
(27, 3, 2, 1, '2021-02-18', 'Completed', '2021-05-18'),
(28, 3, 2, 1, '2021-03-02', 'Completed', '2021-06-03'),
(29, 2, 3, 1, '2021-03-10', 'Completed', '2021-06-10'),
(30, 3, 2, 1, '2021-03-16', 'Completed', '2021-06-16'),
(31, 2, 3, 1, '2021-03-20', 'Completed', '2021-06-20'),
(32, 2, 3, 1, '2021-03-26', 'Completed', '2021-06-26'),
(33, 2, 3, 1, '2021-04-02', 'Completed', '2021-07-02'),
(34, 3, 3, 1, '2021-04-12', 'Completed', '2021-07-12'),
(35, 3, 2, 1, '2021-04-15', 'Completed', '2021-07-15'),
(36, 2, 2, 1, '2021-04-21', 'Completed', '2021-07-21'),
(37, 2, 3, 1, '2021-05-02', 'Completed', '2021-08-02'),
(38, 3, 2, 1, '2021-05-12', 'Completed', '2021-08-12'),
(39, 2, 2, 1, '2021-05-27', 'Completed', '2021-08-27'),
(40, 2, 3, 1, '2021-06-05', 'Cancelled', '2021-09-05'),
(41, 3, 2, 1, '2021-06-13', 'Completed', '2021-09-13'),
(42, 2, 2, 1, '2021-06-18', 'Completed', '2021-09-18'),
(43, 3, 3, 1, '2021-06-23', 'Completed', '2021-09-23'),
(44, 2, 3, 1, '2021-06-30', 'Completed', '2021-09-30'),
(45, 3, 3, 1, '2021-07-01', 'Completed', '2021-10-01'),
(46, 3, 2, 1, '2021-07-14', 'Completed', '2021-10-14'),
(47, 2, 3, 1, '2021-07-16', 'Completed', '2021-10-16'),
(48, 2, 2, 1, '2021-07-27', 'Completed', '2021-10-27'),
(49, 3, 2, 1, '2021-08-01', 'Completed', '2021-11-01'),
(50, 2, 2, 1, '2021-08-09', 'Completed', '2021-11-09'),
(51, 2, 3, 1, '2021-08-15', 'Completed', '2021-11-15'),
(52, 2, 3, 1, '2021-08-24', 'Completed', '2021-11-24'),
(53, 2, 2, 1, '2021-08-29', 'Awaiting-Payment', '2021-11-29'),
(54, 3, 2, 1, '2021-09-01', 'Manual-Verification-Required', '2021-12-01'),
(55, 2, 2, 1, '2021-09-07', 'Cancelled', '2021-12-07'),
(56, 2, 3, 1, '2021-09-14', 'Refunded', '2021-12-14'),
(57, 3, 3, 1, '2021-09-21', 'Awaiting-Payment', '2021-12-21'),
(58, 2, 2, 1, '2021-09-26', 'Completed', '2021-12-26'),
(59, 3, 3, 1, '2021-09-30', 'Processing-Order', '2021-12-30'),
(60, 3, 2, 1, '2021-10-01', 'Cancelled', '2022-01-01'),
(61, 2, 2, 1, '2021-10-28', 'Awaiting-Shipment', '2022-01-28'),
(62, 3, 2, 1, '2021-11-01', 'Awaiting-Shipment', '2022-02-01'),
(63, 2, 3, 1, '2021-11-12', 'Awaiting-Pickup', '2022-02-12'),
(64, 3, 3, 1, '2021-11-21', 'Awaiting-Pickup', '2022-02-21'),
(65, 2, 2, 1, '2021-11-30', 'Processing-Order', '0000-00-00'),
(66, 2, 2, NULL, '2021-12-01', 'Awaiting-Approval', '2022-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `replenishment_line`
--

CREATE TABLE `replenishment_line` (
  `replenishmentLineID` int(11) NOT NULL,
  `repOrderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceEach` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replenishment_line`
--

INSERT INTO `replenishment_line` (`replenishmentLineID`, `repOrderID`, `productID`, `quantity`, `priceEach`) VALUES
(8, 6, 8, 50, '700.50'),
(9, 7, 7, 100, '780.40'),
(10, 8, 1, 120, '600.50'),
(13, 11, 6, 100, '328.30'),
(15, 13, 8, 20, '720.50'),
(16, 15, 8, 100, '725.80'),
(17, 15, 5, 40, '383.80'),
(20, 16, 8, 20, '709.50'),
(21, 16, 4, 5, '0.00'),
(22, 19, 1, 100, '0.00'),
(23, 65, 7, 30, '0.00'),
(24, 65, 3, 50, '0.00'),
(25, 20, 4, 100, '0.00'),
(26, 21, 1, 100, '0.00'),
(27, 22, 3, 120, '0.00'),
(28, 23, 2, 110, '0.00'),
(29, 24, 7, 80, '0.00'),
(30, 25, 8, 100, '0.00'),
(31, 26, 4, 70, '0.00'),
(32, 27, 3, 60, '0.00'),
(33, 28, 2, 100, '0.00'),
(34, 29, 1, 110, '0.00'),
(35, 30, 6, 70, '0.00'),
(36, 31, 7, 80, '0.00'),
(37, 32, 3, 150, '0.00'),
(38, 33, 4, 130, '0.00'),
(39, 34, 2, 120, '0.00'),
(40, 35, 5, 100, '0.00'),
(41, 36, 4, 90, '0.00'),
(42, 37, 3, 110, '0.00'),
(43, 38, 2, 50, '0.00'),
(44, 39, 1, 60, '0.00'),
(45, 40, 8, 80, '0.00'),
(46, 41, 6, 90, '0.00'),
(47, 42, 5, 100, '0.00'),
(48, 43, 3, 120, '0.00'),
(49, 44, 1, 80, '0.00'),
(50, 45, 2, 70, '0.00'),
(51, 46, 3, 60, '0.00'),
(52, 46, 8, 100, '0.00'),
(53, 47, 5, 80, '0.00'),
(54, 48, 3, 130, '0.00'),
(55, 49, 2, 140, '0.00'),
(56, 50, 3, 120, '0.00'),
(57, 51, 5, 80, '0.00'),
(58, 52, 6, 120, '0.00'),
(59, 53, 7, 90, '0.00'),
(60, 54, 2, 80, '0.00'),
(61, 55, 1, 60, '0.00'),
(62, 56, 4, 140, '0.00'),
(63, 57, 3, 110, '0.00'),
(64, 58, 2, 120, '0.00'),
(65, 59, 1, 110, '613.50'),
(66, 60, 8, 90, '710.20'),
(67, 61, 7, 80, '800.10'),
(68, 62, 5, 60, '400.20'),
(69, 63, 3, 80, '770.20'),
(70, 64, 4, 90, '1237.53'),
(71, 65, 2, 120, '550.97'),
(72, 66, 8, 50, '543.32');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `contactFName` varchar(255) NOT NULL,
  `contactLName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` char(15) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `companyName`, `contactFName`, `contactLName`, `email`, `contactNo`, `logo`) VALUES
(2, 'Loctite Cebu Inc.', 'Horeby', 'Barriga', 'loctite.cebu@gmail.com', '32-6784-5151', 'loctiteCBlogo.png'),
(3, 'Loctite Iloilo Inc.', 'Demosthenes', 'Arbiol', 'loctite.iloilo@gmail.com', '33-1500-7171', 'loctiteILlogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_address`
--

CREATE TABLE `supplier_address` (
  `addressID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `street` varchar(35) DEFAULT NULL,
  `barangay` varchar(35) DEFAULT NULL,
  `city` varchar(35) NOT NULL,
  `region` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `zip` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_address`
--

INSERT INTO `supplier_address` (`addressID`, `supplierID`, `street`, `barangay`, `city`, `region`, `country`, `zip`) VALUES
(5, 2, 'A. Soriano Avenue', 'Apas', 'Cebu City', 'Central Visayas', 'Philippines', '6000'),
(6, 3, '5th Main Avenue', 'Aguinaldo', 'Iloilo City', 'Western Visayas', 'Philippines', '5000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `customer_address_FK` (`customerID`);

--
-- Indexes for table `inventory_users`
--
ALTER TABLE `inventory_users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_FK3` (`createdBy`),
  ADD KEY `orders_FK1` (`customerID`),
  ADD KEY `approvedBy` (`approvedBy`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`orderlineID`),
  ADD KEY `order_line_FK1` (`orderID`),
  ADD KEY `order_line_FK2` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `replenishment`
--
ALTER TABLE `replenishment`
  ADD PRIMARY KEY (`repOrderID`),
  ADD KEY `replenishment_FK1` (`supplierID`),
  ADD KEY `replenishment_FK3` (`createdBy`),
  ADD KEY `approvedBy` (`approvedBy`);

--
-- Indexes for table `replenishment_line`
--
ALTER TABLE `replenishment_line`
  ADD PRIMARY KEY (`replenishmentLineID`),
  ADD KEY ` replenishment_line_FK1` (`productID`),
  ADD KEY ` replenishment_line_FK2` (`repOrderID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `supplier_address`
--
ALTER TABLE `supplier_address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `supplier_address_FK` (`supplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inventory_users`
--
ALTER TABLE `inventory_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `orderlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replenishment`
--
ALTER TABLE `replenishment`
  MODIFY `repOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `replenishment_line`
--
ALTER TABLE `replenishment_line`
  MODIFY `replenishmentLineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_address`
--
ALTER TABLE `supplier_address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_FK` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_FK1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_FK2` FOREIGN KEY (`createdBy`) REFERENCES `inventory_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_FK3` FOREIGN KEY (`approvedBy`) REFERENCES `inventory_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_FK1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_line_FK2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replenishment`
--
ALTER TABLE `replenishment`
  ADD CONSTRAINT `replenishment_FK1` FOREIGN KEY (`supplierID`) REFERENCES `supplier` (`supplierID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replenishment_FK2` FOREIGN KEY (`createdBy`) REFERENCES `inventory_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replenishment_FK3` FOREIGN KEY (`approvedBy`) REFERENCES `inventory_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replenishment_line`
--
ALTER TABLE `replenishment_line`
  ADD CONSTRAINT ` replenishment_line_FK1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ` replenishment_line_FK2` FOREIGN KEY (`repOrderID`) REFERENCES `replenishment` (`repOrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_address`
--
ALTER TABLE `supplier_address`
  ADD CONSTRAINT `supplier_address_FK` FOREIGN KEY (`supplierID`) REFERENCES `supplier` (`supplierID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
