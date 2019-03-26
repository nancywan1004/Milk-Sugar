-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 09:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `allUsers`
--

CREATE TABLE `allUsers` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(32) NOT NULL,
  `custID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allUsers`
--

INSERT INTO `allUsers` (`username`, `password`, `type`, `custID`) VALUES
('Amy', 'a106', 'c', 6),
('Armstrong', 'a104', 'c', 4),
('baker1', 'b101', 'b', NULL),
('baker2', 'b102', 'b', NULL),
('Jimmy', 'a101', 'c', 1),
('Kim', 'a105', 'c', 5),
('Lisa', 'a102', 'c', 2),
('Tom', 'a107', 'c', 7),
('Wolfman', 'a103', 'c', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Cake`
--

CREATE TABLE `Cake` (
  `cakeID` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `cname` char(30) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cake`
--

INSERT INTO `Cake` (`cakeID`, `size`, `cname`, `price`) VALUES
(1001, 6, 'Red Velvet', 35),
(1002, 8, 'Strawberry Shortcake', 50),
(1003, 8, 'Tiramisu', 48),
(1004, 10, 'Tiramisu', 60),
(1005, 6, 'Matcha Mousse', 28),
(1006, 8, 'Matcha Mousse', 46),
(1007, 10, 'Matcha Mousse', 58),
(1008, 8, 'Red Velvet', 55),
(1009, 6, 'Black Forest', 60),
(1010, 8, 'Black Forest', 100);

-- --------------------------------------------------------

--
-- Table structure for table `CakeOrder`
--

CREATE TABLE `CakeOrder` (
  `confirmNum` int(11) NOT NULL,
  `pquantity` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `totalPrice` double DEFAULT NULL,
  `cancelDate` date DEFAULT NULL,
  `status` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CakeOrder`
--

INSERT INTO `CakeOrder` (`confirmNum`, `pquantity`, `orderDate`, `totalPrice`, `cancelDate`, `status`) VALUES
(18, 2, '2018-05-01', 96, NULL, 'finished'),
(84, 4, '2019-01-21', 200, '2019-01-17', 'pending'),
(102, 3, '2019-02-01', 180, NULL, 'finished'),
(103, 10, '2019-01-13', 280, NULL, 'finished'),
(104, 1, '2019-02-01', 35, NULL, 'picked'),
(105, 2, '2019-02-02', 100, NULL, 'picked'),
(106, 3, '2019-02-03', 144, NULL, 'picked'),
(107, 4, '2019-02-04', 240, NULL, 'picked'),
(108, 100, '2019-02-28', 10000, '2019-03-01', 'pending'),
(142, 5, '2018-08-23', 175, NULL, 'finished');

-- --------------------------------------------------------

--
-- Table structure for table `CakeType`
--

CREATE TABLE `CakeType` (
  `cname` char(30) NOT NULL,
  `ingredients` char(100) DEFAULT NULL,
  `flavour` char(20) DEFAULT NULL,
  `topping` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CakeType`
--

INSERT INTO `CakeType` (`cname`, `ingredients`, `flavour`, `topping`) VALUES
('Black Forest', 'flour, sugar, vegetable oil, vanilla, salt, cream, chocolate, sour cherries', 'chocolate', NULL),
('Matcha Mousse', 'gelatin powder, egg yolks, water, sugar, milk, heavy cream, matcha powder', 'matcha', 'Strawberry'),
('Red Velvet', 'buttermilk, butter, cocoa, vinegar, and flour, beetroot', 'chocolate', 'Sprinkle'),
('Strawberry Shortcake', 'flour, sugar, butter, milk or cream, strawberry, vanilla', 'strawberry', 'Icing'),
('Tiramisu', 'savoiardi, egg yolks, mascarpone, cocoa, coffee', 'coffee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Contains`
--

CREATE TABLE `Contains` (
  `confirmNum` int(11) NOT NULL,
  `cakeID` int(11) NOT NULL,
  `custID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Contains`
--

INSERT INTO `Contains` (`confirmNum`, `cakeID`, `custID`) VALUES
(18, 1003, 3),
(84, 1002, 2),
(102, 1004, 4),
(103, 1005, 5),
(108, 1010, 7),
(142, 1001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Customer2`
--

CREATE TABLE `Customer2` (
  `custID` int(11) NOT NULL,
  `phoneNum` bigint(20) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `address` char(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer2`
--

INSERT INTO `Customer2` (`custID`, `phoneNum`, `name`, `address`, `pass`) VALUES
(1, 7780010001, 'Jimmy', '101 W 41st Ave Vancouver', 'a101'),
(2, 6040010002, 'Lisa', '2090 Main St Vancouver', 'a102'),
(3, 7780020002, 'Wolfman', '898 Dunbar St Vancouver', 'a103'),
(4, 6040020004, 'Armstrong', '4323 Sussex Ave Burnaby', 'a104'),
(5, 6040030005, 'Kim', '1001 Granville Ave Richmond', 'a105'),
(6, 7780000001, 'Amy', '3378 Wesbrook Mall, Vancouver', 'a106'),
(7, 7780000002, 'Tom', '5923 Berton Avenue\r\nVancouver', 'a107');

-- --------------------------------------------------------

--
-- Table structure for table `Delivery_Fulfill`
--

CREATE TABLE `Delivery_Fulfill` (
  `confirmNum` int(11) NOT NULL,
  `del_date` date DEFAULT NULL,
  `del_location` char(40) DEFAULT NULL,
  `phoneNum` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Delivery_Fulfill`
--

INSERT INTO `Delivery_Fulfill` (`confirmNum`, `del_date`, `del_location`, `phoneNum`) VALUES
(18, '2018-05-04', '898 Dunbar St Vancouver', 7789990002),
(102, '2019-02-05', '890 Wesbrook Mall Vancouver', 6049990002),
(103, '2018-08-24', '101 W 41st Ave Vancouver', 6049990001),
(142, '2018-08-24', '101 W 41st Ave Vancouver', 7789990001);

-- --------------------------------------------------------

--
-- Table structure for table `Delivery_Person`
--

CREATE TABLE `Delivery_Person` (
  `phoneNum` bigint(11) NOT NULL,
  `dname` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Delivery_Person`
--

INSERT INTO `Delivery_Person` (`phoneNum`, `dname`) VALUES
(6049990001, 'Jack'),
(6049990002, 'Connor'),
(7789990001, 'Oliver'),
(7789990002, 'Jake'),
(7789990003, 'Mason');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `lid` int(11) NOT NULL,
  `address` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`lid`, `address`) VALUES
(5, '310 Cambie St Richmond'),
(29, '100 Denman St Vancouver'),
(57, '415 Kingsway St Burnaby'),
(66, '520 Cambie St Richmond'),
(82, '205 Fraser St Vancouver');

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Paid1`
--

CREATE TABLE `Payment_Paid1` (
  `pid` int(11) NOT NULL,
  `pmethod` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment_Paid1`
--

INSERT INTO `Payment_Paid1` (`pid`, `pmethod`) VALUES
(1, 'Master Card'),
(2, 'Credit Card'),
(3, 'Credit Card'),
(4, 'Credit Card'),
(5, 'Master Card'),
(6, 'Master Card'),
(7, 'Master Card'),
(8, 'Master Card');

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Paid2`
--

CREATE TABLE `Payment_Paid2` (
  `confirmNum` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment_Paid2`
--

INSERT INTO `Payment_Paid2` (`confirmNum`, `pid`) VALUES
(18, 2),
(102, 3),
(103, 4),
(104, 5),
(105, 6),
(106, 7),
(107, 8),
(142, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PickUp_PickedAt`
--

CREATE TABLE `PickUp_PickedAt` (
  `confirmNum` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `pdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PickUp_PickedAt`
--

INSERT INTO `PickUp_PickedAt` (`confirmNum`, `lid`, `pdate`) VALUES
(104, 29, '2019-02-03'),
(105, 82, '2019-02-05'),
(106, 5, '2019-02-05'),
(107, 57, '2019-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `Review_Write`
--

CREATE TABLE `Review_Write` (
  `reviewID` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `custID` int(11) NOT NULL,
  `cname` char(30) NOT NULL,
  `comment` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review_Write`
--

INSERT INTO `Review_Write` (`reviewID`, `score`, `custID`, `cname`, `comment`) VALUES
(3, 1, 4, 'Matcha Mousse', 'Do not but this.'),
(15, 7, 3, 'Red Velvet', 'I will buy it again.'),
(29, 8, 5, 'Tiramisu', 'It was great.'),
(31, 10, 2, 'Strawberry Shortcake', 'Best thing ever.'),
(42, 2, 1, 'Tiramisu', 'It was horrible.');

-- --------------------------------------------------------

--
-- Table structure for table `Suggest_Cake`
--

CREATE TABLE `Suggest_Cake` (
  `fromcakeID` int(11) NOT NULL,
  `tocakeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Suggest_Cake`
--

INSERT INTO `Suggest_Cake` (`fromcakeID`, `tocakeID`) VALUES
(1001, 1004),
(1002, 1005),
(1003, 1001),
(1004, 1003),
(1005, 1001),
(1006, 1010),
(1007, 1009),
(1008, 1007),
(1009, 1001),
(1010, 1006);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allUsers`
--
ALTER TABLE `allUsers`
  ADD PRIMARY KEY (`username`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `Cake`
--
ALTER TABLE `Cake`
  ADD PRIMARY KEY (`cakeID`),
  ADD KEY `cname` (`cname`);

--
-- Indexes for table `CakeOrder`
--
ALTER TABLE `CakeOrder`
  ADD PRIMARY KEY (`confirmNum`);

--
-- Indexes for table `CakeType`
--
ALTER TABLE `CakeType`
  ADD PRIMARY KEY (`cname`);

--
-- Indexes for table `Contains`
--
ALTER TABLE `Contains`
  ADD PRIMARY KEY (`confirmNum`,`cakeID`,`custID`),
  ADD KEY `cakeID` (`cakeID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `Customer2`
--
ALTER TABLE `Customer2`
  ADD PRIMARY KEY (`custID`) USING BTREE,
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `Delivery_Fulfill`
--
ALTER TABLE `Delivery_Fulfill`
  ADD PRIMARY KEY (`confirmNum`),
  ADD KEY `phoneNum` (`phoneNum`);

--
-- Indexes for table `Delivery_Person`
--
ALTER TABLE `Delivery_Person`
  ADD PRIMARY KEY (`phoneNum`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `Payment_Paid1`
--
ALTER TABLE `Payment_Paid1`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `Payment_Paid2`
--
ALTER TABLE `Payment_Paid2`
  ADD PRIMARY KEY (`confirmNum`);

--
-- Indexes for table `PickUp_PickedAt`
--
ALTER TABLE `PickUp_PickedAt`
  ADD PRIMARY KEY (`confirmNum`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `Review_Write`
--
ALTER TABLE `Review_Write`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `cname` (`cname`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `Suggest_Cake`
--
ALTER TABLE `Suggest_Cake`
  ADD PRIMARY KEY (`fromcakeID`,`tocakeID`),
  ADD KEY `tocakeID` (`tocakeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allUsers`
--
ALTER TABLE `allUsers`
  ADD CONSTRAINT `allusers_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `Customer2` (`custID`);

--
-- Constraints for table `Cake`
--
ALTER TABLE `Cake`
  ADD CONSTRAINT `Cake_ibfk_1` FOREIGN KEY (`cname`) REFERENCES `CakeType` (`cname`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `Contains`
--
ALTER TABLE `Contains`
  ADD CONSTRAINT `Contains_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`),
  ADD CONSTRAINT `Contains_ibfk_2` FOREIGN KEY (`cakeID`) REFERENCES `Cake` (`cakeID`),
  ADD CONSTRAINT `Contains_ibfk_3` FOREIGN KEY (`custID`) REFERENCES `Customer2` (`custID`);

--
-- Constraints for table `Delivery_Fulfill`
--
ALTER TABLE `Delivery_Fulfill`
  ADD CONSTRAINT `Delivery_Fulfill_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Delivery_Fulfill_ibfk_2` FOREIGN KEY (`phoneNum`) REFERENCES `Delivery_Person` (`phoneNum`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `Payment_Paid2`
--
ALTER TABLE `Payment_Paid2`
  ADD CONSTRAINT `Payment_Paid2_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PickUp_PickedAt`
--
ALTER TABLE `PickUp_PickedAt`
  ADD CONSTRAINT `PickUp_PickedAt_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`),
  ADD CONSTRAINT `PickUp_PickedAt_ibfk_2` FOREIGN KEY (`lid`) REFERENCES `Location` (`lid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `Review_Write`
--
ALTER TABLE `Review_Write`
  ADD CONSTRAINT `Review_Write_ibfk_1` FOREIGN KEY (`cname`) REFERENCES `Cake` (`cname`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_Write_ibfk_2` FOREIGN KEY (`custID`) REFERENCES `Customer2` (`custID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `Suggest_Cake`
--
ALTER TABLE `Suggest_Cake`
  ADD CONSTRAINT `Suggest_Cake_ibfk_1` FOREIGN KEY (`fromcakeID`) REFERENCES `Cake` (`cakeID`),
  ADD CONSTRAINT `Suggest_Cake_ibfk_2` FOREIGN KEY (`tocakeID`) REFERENCES `Cake` (`cakeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
