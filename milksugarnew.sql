-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-03-28 05:52:35
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `milksugarnew`
--

-- --------------------------------------------------------

--
-- 表的结构 `allUsers`
--

CREATE TABLE `allUsers` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `allUsers`
--

INSERT INTO `allUsers` (`username`, `password`, `type`) VALUES
('baker1', 'b101', 'b'),
('baker2', 'b102', 'b'),
('delivery1', 'd101', 'd'),
('manager1', 'm101', 'm'),
('manager2', 'm102', 'm');

-- --------------------------------------------------------

--
-- 表的结构 `Cake`
--

CREATE TABLE `Cake` (
  `cakeID` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `cname` char(30) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cake`
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
-- 表的结构 `CakeOrder`
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
-- 转存表中的数据 `CakeOrder`
--

INSERT INTO `CakeOrder` (`confirmNum`, `pquantity`, `orderDate`, `totalPrice`, `cancelDate`, `status`) VALUES
(18, 2, '2018-05-01', 96, '2019-03-28', 'cancelled'),
(102, 3, '2019-02-01', 180, '2019-03-28', 'cancelled'),
(103, 10, '2019-01-13', 280, NULL, 'finished'),
(104, 1, '2019-02-01', 35, NULL, 'picked'),
(105, 2, '2019-02-02', 100, NULL, 'picked'),
(106, 3, '2019-02-03', 144, NULL, 'picked'),
(107, 4, '2019-02-04', 240, NULL, 'picked'),
(142, 5, '2018-08-23', 175, NULL, 'finished'),
(201, 1, '2019-03-27', 35, NULL, 'Cake is ready.'),
(202, 1, '2019-03-27', 50, NULL, 'pending'),
(203, 1, '2019-03-27', 48, NULL, 'pending'),
(204, 1, '2019-03-27', 60, NULL, 'pending'),
(205, 1, '2019-03-27', 28, NULL, 'pending'),
(206, 1, '2019-03-27', 46, NULL, 'pending'),
(207, 1, '2019-03-27', 58, NULL, 'pending'),
(208, 1, '2019-03-27', 55, NULL, 'pending'),
(209, 1, '2019-03-27', 60, NULL, 'pending'),
(210, 1, '2019-03-27', 100, NULL, 'pending');

-- --------------------------------------------------------

--
-- 表的结构 `CakeType`
--

CREATE TABLE `CakeType` (
  `cname` char(30) NOT NULL,
  `ingredients` char(100) DEFAULT NULL,
  `flavour` char(20) DEFAULT NULL,
  `topping` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `CakeType`
--

INSERT INTO `CakeType` (`cname`, `ingredients`, `flavour`, `topping`) VALUES
('Black Forest', 'flour, sugar, vegetable oil, vanilla, salt, cream, chocolate, sour cherries', 'chocolate', NULL),
('Matcha Mousse', 'gelatin powder, egg yolks, water, sugar, milk, heavy cream, matcha powder', 'matcha', 'Strawberry'),
('Red Velvet', 'buttermilk, butter, cocoa, vinegar, and flour, beetroot', 'chocolate', 'Sprinkle'),
('Strawberry Shortcake', 'flour, sugar, butter, milk or cream, strawberry, vanilla', 'strawberry', 'Icing'),
('Tiramisu', 'savoiardi, egg yolks, mascarpone, cocoa, coffee', 'coffee', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `Contains`
--

CREATE TABLE `Contains` (
  `confirmNum` int(11) NOT NULL,
  `cakeID` int(11) NOT NULL,
  `custID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Contains`
--

INSERT INTO `Contains` (`confirmNum`, `cakeID`, `custID`) VALUES
(18, 1003, 3),
(102, 1004, 4),
(103, 1005, 5),
(104, 1003, 1),
(105, 1010, 6),
(106, 1006, 3),
(107, 1009, 2),
(142, 1001, 1),
(201, 1001, 1),
(202, 1002, 1),
(203, 1003, 1),
(204, 1004, 1),
(205, 1005, 1),
(206, 1006, 1),
(207, 1007, 1),
(208, 1008, 1),
(209, 1009, 1),
(210, 1010, 1);

-- --------------------------------------------------------

--
-- 表的结构 `Customer2`
--

CREATE TABLE `Customer2` (
  `custID` int(11) NOT NULL,
  `phoneNum` bigint(20) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `address` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Customer2`
--

INSERT INTO `Customer2` (`custID`, `phoneNum`, `name`, `address`) VALUES
(1, 7780010001, 'Jimmy', '101 W 41st Ave Vancouver'),
(2, 6040010002, 'Lisa', '2090 Main St Vancouver'),
(3, 7780020002, 'Wolfman', '898 Dunbar St Vancouver'),
(4, 6040020004, 'Armstrong', '4323 Sussex Ave Burnaby'),
(5, 6040030005, 'Kim', '1001 Granville Ave Richmond'),
(6, 7780000001, 'Amy', '3378 Wesbrook Mall, Vancouver'),
(7, 7780000002, 'Tom', '5923 Berton Avenue\r\nVancouver');

-- --------------------------------------------------------

--
-- 表的结构 `Delivery_Fulfill`
--

CREATE TABLE `Delivery_Fulfill` (
  `confirmNum` int(11) NOT NULL,
  `del_date` date DEFAULT NULL,
  `del_location` char(40) DEFAULT NULL,
  `phoneNum` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Delivery_Fulfill`
--

INSERT INTO `Delivery_Fulfill` (`confirmNum`, `del_date`, `del_location`, `phoneNum`) VALUES
(18, '2018-05-04', '898 Dunbar St Vancouver', 7789990002),
(102, '2019-02-05', '890 Wesbrook Mall Vancouver', 6049990002),
(103, '2018-08-24', '101 W 41st Ave Vancouver', 1231231234),
(142, '2018-08-24', '101 W 41st Ave Vancouver', 7789990001),
(201, '2019-03-28', 'UBC', 1111111111),
(202, '2019-03-28', 'UBC', 1111111111),
(203, '2019-03-29', 'UBC', 1111111111),
(204, '2019-03-29', 'UBC', 1111111111),
(205, '2019-03-29', 'UBC', 1111111111),
(206, '2019-03-29', 'UBC', 1111111111),
(207, '2019-03-30', 'UBC', 1111111111),
(208, '2019-03-30', 'UBC', 1111111111),
(209, '2019-03-30', 'UBC', 1111111111),
(210, '2019-03-30', 'UBC', 1111111111);

-- --------------------------------------------------------

--
-- 表的结构 `Delivery_Person`
--

CREATE TABLE `Delivery_Person` (
  `phoneNum` bigint(11) NOT NULL,
  `dname` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Delivery_Person`
--

INSERT INTO `Delivery_Person` (`phoneNum`, `dname`) VALUES
(1111111111, 'kevin'),
(1231231234, 'Jack'),
(6049990002, 'Connor'),
(7789990001, 'Oliver'),
(7789990002, 'Jake'),
(7789990003, 'Mason');

-- --------------------------------------------------------

--
-- 表的结构 `Location`
--

CREATE TABLE `Location` (
  `lid` int(11) NOT NULL,
  `address` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Location`
--

INSERT INTO `Location` (`lid`, `address`) VALUES
(5, '310 Cambie St Richmond'),
(29, '100 Denman St Vancouver'),
(57, '415 Kingsway St Burnaby'),
(66, '520 Cambie St Richmond'),
(82, '205 Fraser St Vancouver');

-- --------------------------------------------------------

--
-- 表的结构 `Payment_Paid1`
--

CREATE TABLE `Payment_Paid1` (
  `pid` int(11) NOT NULL,
  `pmethod` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Payment_Paid1`
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
-- 表的结构 `Payment_Paid2`
--

CREATE TABLE `Payment_Paid2` (
  `confirmNum` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `method` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Payment_Paid2`
--

INSERT INTO `Payment_Paid2` (`confirmNum`, `pid`, `method`) VALUES
(18, 2, 'Pickup'),
(102, 3, 'Home Delivery'),
(103, 4, 'Home Delivery'),
(104, 5, 'Pickup'),
(105, 6, 'Pickup'),
(106, 7, 'Home Delivery'),
(107, 8, 'Home Delivery'),
(142, 1, 'Pickup');

-- --------------------------------------------------------

--
-- 表的结构 `PickUp_PickedAt`
--

CREATE TABLE `PickUp_PickedAt` (
  `confirmNum` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `pdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `PickUp_PickedAt`
--

INSERT INTO `PickUp_PickedAt` (`confirmNum`, `lid`, `pdate`) VALUES
(104, 29, '2019-02-03'),
(105, 82, '2019-02-05'),
(106, 5, '2019-02-05'),
(107, 57, '2019-02-08');

-- --------------------------------------------------------

--
-- 表的结构 `Review_Write`
--

CREATE TABLE `Review_Write` (
  `reviewID` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `custID` int(11) NOT NULL,
  `cname` char(30) NOT NULL,
  `comment` char(50) DEFAULT NULL,
  `cakeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Review_Write`
--

INSERT INTO `Review_Write` (`reviewID`, `score`, `custID`, `cname`, `comment`, `cakeID`) VALUES
(3, 1, 4, 'Matcha Mousse', 'Do not but this.', 1006),
(15, 7, 3, 'Red Velvet', 'I will buy it again.', 1008),
(29, 8, 5, 'Tiramisu', 'It was great.', 1003),
(31, 10, 2, 'Strawberry Shortcake', 'Best thing ever.', 1002),
(42, 2, 1, 'Tiramisu', 'It was horrible.', 1004);

-- --------------------------------------------------------

--
-- 表的结构 `Suggest_Cake`
--

CREATE TABLE `Suggest_Cake` (
  `fromcakeID` int(11) NOT NULL,
  `tocakeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Suggest_Cake`
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
-- 转储表的索引
--

--
-- 表的索引 `allUsers`
--
ALTER TABLE `allUsers`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `Cake`
--
ALTER TABLE `Cake`
  ADD PRIMARY KEY (`cakeID`),
  ADD KEY `cname` (`cname`);

--
-- 表的索引 `CakeOrder`
--
ALTER TABLE `CakeOrder`
  ADD PRIMARY KEY (`confirmNum`);

--
-- 表的索引 `CakeType`
--
ALTER TABLE `CakeType`
  ADD PRIMARY KEY (`cname`);

--
-- 表的索引 `Contains`
--
ALTER TABLE `Contains`
  ADD PRIMARY KEY (`confirmNum`,`cakeID`,`custID`),
  ADD KEY `cakeID` (`cakeID`),
  ADD KEY `custID` (`custID`);

--
-- 表的索引 `Customer2`
--
ALTER TABLE `Customer2`
  ADD PRIMARY KEY (`custID`) USING BTREE,
  ADD UNIQUE KEY `name` (`name`);

--
-- 表的索引 `Delivery_Fulfill`
--
ALTER TABLE `Delivery_Fulfill`
  ADD PRIMARY KEY (`confirmNum`),
  ADD KEY `phoneNum` (`phoneNum`);

--
-- 表的索引 `Delivery_Person`
--
ALTER TABLE `Delivery_Person`
  ADD PRIMARY KEY (`phoneNum`);

--
-- 表的索引 `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`lid`);

--
-- 表的索引 `Payment_Paid1`
--
ALTER TABLE `Payment_Paid1`
  ADD PRIMARY KEY (`pid`);

--
-- 表的索引 `Payment_Paid2`
--
ALTER TABLE `Payment_Paid2`
  ADD PRIMARY KEY (`confirmNum`);

--
-- 表的索引 `PickUp_PickedAt`
--
ALTER TABLE `PickUp_PickedAt`
  ADD PRIMARY KEY (`confirmNum`),
  ADD KEY `lid` (`lid`);

--
-- 表的索引 `Review_Write`
--
ALTER TABLE `Review_Write`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `cname` (`cname`),
  ADD KEY `custID` (`custID`),
  ADD KEY `Review_Write_ibfk_3` (`cakeID`);

--
-- 表的索引 `Suggest_Cake`
--
ALTER TABLE `Suggest_Cake`
  ADD PRIMARY KEY (`fromcakeID`,`tocakeID`),
  ADD KEY `tocakeID` (`tocakeID`);

--
-- 限制导出的表
--

--
-- 限制表 `Cake`
--
ALTER TABLE `Cake`
  ADD CONSTRAINT `Cake_ibfk_1` FOREIGN KEY (`cname`) REFERENCES `CakeType` (`cname`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- 限制表 `Contains`
--
ALTER TABLE `Contains`
  ADD CONSTRAINT `Contains_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`) ON DELETE CASCADE,
  ADD CONSTRAINT `Contains_ibfk_2` FOREIGN KEY (`cakeID`) REFERENCES `Cake` (`cakeID`),
  ADD CONSTRAINT `Contains_ibfk_3` FOREIGN KEY (`custID`) REFERENCES `Customer2` (`custID`);

--
-- 限制表 `Delivery_Fulfill`
--
ALTER TABLE `Delivery_Fulfill`
  ADD CONSTRAINT `Delivery_Fulfill_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Delivery_Fulfill_ibfk_2` FOREIGN KEY (`phoneNum`) REFERENCES `Delivery_Person` (`phoneNum`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- 限制表 `Payment_Paid2`
--
ALTER TABLE `Payment_Paid2`
  ADD CONSTRAINT `Payment_Paid2_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `PickUp_PickedAt`
--
ALTER TABLE `PickUp_PickedAt`
  ADD CONSTRAINT `PickUp_PickedAt_ibfk_1` FOREIGN KEY (`confirmNum`) REFERENCES `CakeOrder` (`confirmNum`),
  ADD CONSTRAINT `PickUp_PickedAt_ibfk_2` FOREIGN KEY (`lid`) REFERENCES `Location` (`lid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- 限制表 `Review_Write`
--
ALTER TABLE `Review_Write`
  ADD CONSTRAINT `Review_Write_ibfk_1` FOREIGN KEY (`cname`) REFERENCES `Cake` (`cname`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_Write_ibfk_2` FOREIGN KEY (`custID`) REFERENCES `Customer2` (`custID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_Write_ibfk_3` FOREIGN KEY (`cakeID`) REFERENCES `Cake` (`cakeID`) ON DELETE CASCADE;

--
-- 限制表 `Suggest_Cake`
--
ALTER TABLE `Suggest_Cake`
  ADD CONSTRAINT `Suggest_Cake_ibfk_1` FOREIGN KEY (`fromcakeID`) REFERENCES `Cake` (`cakeID`),
  ADD CONSTRAINT `Suggest_Cake_ibfk_2` FOREIGN KEY (`tocakeID`) REFERENCES `Cake` (`cakeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
