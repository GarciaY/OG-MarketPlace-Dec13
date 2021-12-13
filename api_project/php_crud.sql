-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 06:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `AUTOSTART`, `AUTOINC`, `AUTOEND`, `AUTOKEY`, `AUTONUM`) VALUES
(3, 'BOOBS', 12, 22, 'bumbai', 69),
(4, 'TITI', 12, 22, 'bumbai', 69),
(5, 'CAMPING', 12, 22, 'bumbai', 69),
(6, 'GRADE12', 12, 22, 'bumbai', 69),
(7, 'ROBOTICS', 12, 22, 'bumbai', 69),
(8, 'CAPSTONE', 12, 22, 'bumbai', 69),
(9, 'marilyn', 69, 69, 'my babes', 69),
(10, 'LINDA BABES', 69, 69, '', 69),
(13, 'LINDA BABES', 69, 69, '', 69),
(14, 'marilyn', 69, 69, '', 69),
(15, 'marilyn', 69, 69, '', 69),
(17, 'hubert', 69, 69, 'my babes', 69),
(18, 'linda', 69, 69, 'my babes', 69),
(19, 'little', 69, 69, 'my babes', 69),
(20, 'sexy hot ho', 69, 69, 'my babes', 69);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGID`, `CATEGORIES`, `USERID`) VALUES
(2, 'Meat', 0),
(3, 'Fish', 0),
(4, 'Vegetables', 0),
(6, 'Pringles', 0),
(7, 'Osus', 0),
(8, 'Scrotum', 0),
(9, 'mark zuckerberg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customerid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userphoto` varchar(255) NOT NULL,
  `datejoin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerid`, `firstname`, `lastname`, `email`, `contactnumber`, `address`, `password`, `userphoto`, `datejoin`) VALUES
(1, 'Marc Allen', 'Maceda', 'marc@gmail.com', '09467897665', 'Matain, Zambales', 'marc123', 'test123', '2021-12-01'),
(9, 'Bill Christian', 'Panopio', 'bill@gmail.com', '0978564332', 'lincoln heights, Bataan', 'bill123', 'test123', '2021-11-30'),
(11, 'John Edwin', 'Serrano', 'ed@gmail.com', '097851234532', 'Olongapo City', 'ed123', 'ed.jpg', '2021-11-30'),
(12, 'Carene', 'Solano', 'carene@gmail.com', '09876543211', 'Bataan', 'korine123', 'korin.png', '2021-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ORDERID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `ORDEREDQTY` int(11) NOT NULL,
  `ORDEREDPRICE` double NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDERID`, `PROID`, `ORDEREDQTY`, `ORDEREDPRICE`, `ORDEREDNUM`, `USERID`) VALUES
(1, 1, 12, 150, 12, 5),
(2, 2, 12, 150, 12, 5),
(3, 12, 99395934, 243, 1232, 4),
(4, 4, 1200, 150, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `INGREDIENTS` varchar(255) NOT NULL,
  `PROQTY` int(11) DEFAULT NULL,
  `ORIGINALPRICE` double NOT NULL,
  `PROPRICE` double DEFAULT NULL,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `OWNERNAME` varchar(90) NOT NULL,
  `OWNERPHONE` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`PROID`, `PRODESC`, `INGREDIENTS`, `PROQTY`, `ORIGINALPRICE`, `PROPRICE`, `CATEGID`, `IMAGES`, `PROSTATS`, `OWNERNAME`, `OWNERPHONE`) VALUES
(1, 'Meat', 'balls', 5, 200, 150, 2, '', 'osus', '', ''),
(3, 'berwyn burat                      ', '', 50, 2500, 10, 4, 'uploaded_photos/bill_christian.png', 'Available', 'billy boorat', '102030123'),
(4, 'Fish with flying saucer', '', 15, 200, 150, 4, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'Billy Boo', '2348824'),
(5, 'Screenshot', '', 5, 100, 20, 2, 'uploaded_photos/maceda_marc_midterm_lab1.png', 'Available', 'Billy Boo', '83458348'),
(11, 'suso', '', 50, 50, 50, 3, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '934594'),
(13, 'ALLEN KALBO', '', 12, 50, 50, 6, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '435934'),
(14, 'OSUS', '', 50, 50, 50, 4, 'uploaded_photos/natatae na shrek.jpg', 'Available', '50', '29324'),
(15, '20', '', 120, 50, 50, 7, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '20'),
(16, 'OSUS', '', 20, 50, 50, 4, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'OSUS', '232'),
(17, 'allen kalbo', '', 20, 50, 50, 6, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '60'),
(18, 'allen kalbo', '', 40, 20, 30, 4, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '5050'),
(19, '30203', '', 50, 20, 20, 7, 'uploaded_photos/natatae na shrek.jpg', 'Available', '20', '20302'),
(20, '20', '', 20, 20, 20, 6, 'uploaded_photos/natatae na shrek.jpg', 'Available', '20', '20'),
(21, 'TITI KO MATIGAS', '', 40, 20, 20, 6, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'TITI KO MATIGAS', '69'),
(22, 'allen kalbo', '', 40, 20, 20, 4, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'allen KALBO', '6969'),
(23, 'tite ko matigas sing tigas ng tree', '', 20, 20, 20, 3, 'uploaded_photos/natatae na shrek.jpg', 'Available', 'tite', '593954');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromopro`
--

CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpromopro`
--

INSERT INTO `tblpromopro` (`PROMOID`, `PROID`, `PRODISCOUNT`, `PRODISPRICE`, `PROBANNER`, `PRONEW`) VALUES
(1, 2, 6.9, 69.9, 1, 2),
(2, 3, 6.9, 69.9, 1, 2),
(3, 4, 6.9, 69.9, 1, 2),
(6, 100, 6.9, 69.9, 1, 2),
(19, 0, 0, 30, 0, 0),
(20, 0, 0, 20, 0, 0),
(21, 0, 0, 20, 0, 0),
(22, 0, 0, 20, 0, 0),
(23, 0, 0, 20, 0, 0),
(24, 0, 0, 20, 0, 0),
(25, 0, 0, 20, 0, 0),
(26, 0, 0, 20, 0, 0),
(27, 0, 0, 20, 0, 0),
(28, 0, 0, 20, 0, 0),
(29, 0, 0, 20, 0, 0),
(30, 0, 0, 69, 0, 0),
(31, 0, 0, 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`SETTINGID`, `PLACE`, `BRGY`, `DELPRICE`) VALUES
(1, 'pluto', '', 0),
(2, 'melmark', '', 0),
(3, 'osus ', '', 0),
(4, 'Manila', '', 0),
(5, 'Manila', 'Olongapo', 0),
(6, 'waltermart', 'Subic', 0),
(7, 'SM', 'Olongapo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstockin`
--

CREATE TABLE `tblstockin` (
  `STOCKINID` int(11) NOT NULL,
  `STOCKDATE` datetime DEFAULT NULL,
  `PROID` int(11) DEFAULT NULL,
  `STOCKQTY` int(11) DEFAULT NULL,
  `STOCKPRICE` double DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstockin`
--

INSERT INTO `tblstockin` (`STOCKINID`, `STOCKDATE`, `PROID`, `STOCKQTY`, `STOCKPRICE`, `USERID`) VALUES
(1, '0000-00-00 00:00:00', 4, 50, 275.5, 4),
(3, '2021-03-14 00:00:00', 5, 50, 6000000.5, 0),
(4, '0000-00-00 00:00:00', 5, 50, 69, 3),
(5, '0000-00-00 00:00:00', 5, 50, 69, 3),
(6, '0000-00-00 00:00:00', 5, 50, 69, 3),
(7, '2021-12-25 00:00:00', 4, 50, 275.5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `SUMMARYID` int(11) NOT NULL,
  `ORDEREDDATE` datetime NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `DELFEE` datetime NOT NULL,
  `PAYMENT` double NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `ORDEREDSTATS` varchar(30) NOT NULL,
  `ORDEREDREMARKS` varchar(30) NOT NULL,
  `CLAIMEDDATE` datetime NOT NULL,
  `HVIEW` tinytext NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `U_NAME` varchar(255) NOT NULL,
  `U_USERNAME` varchar(255) NOT NULL,
  `U_PASS` varchar(255) NOT NULL,
  `U_ROLE` varchar(30) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `U_NAME`, `U_USERNAME`, `U_PASS`, `U_ROLE`, `USERIMAGE`) VALUES
(4, 'allen', 'allenkalbo', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', ''),
(5, 'allenburaat', 'allen123', '456', 'Administrator', 'testing.png'),
(6, 'ALLEN KALBO', 'allen@kalbo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', ''),
(7, 'MELMARK BURAT', 'ed', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlist`
--

CREATE TABLE `tblwishlist` (
  `id` int(11) NOT NULL,
  `CUSID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `WISHDATE` date NOT NULL,
  `WISHSTATS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwishlist`
--

INSERT INTO `tblwishlist` (`id`, `CUSID`, `PROID`, `WISHDATE`, `WISHSTATS`) VALUES
(1, 5, 5, '2021-01-30', ''),
(4, 5, 5, '2021-01-30', 'PAHINGI NGA NG ISANG SEMFRED SA PASKO'),
(5, 2, 69, '1999-01-01', 'PUKE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDERID`),
  ADD KEY `PROID` (`PROID`),
  ADD KEY `ORDEREDNUM` (`ORDEREDNUM`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`PROID`),
  ADD KEY `INDEX` (`CATEGID`);

--
-- Indexes for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  ADD PRIMARY KEY (`PROMOID`),
  ADD KEY `PROID` (`PROID`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`SETTINGID`);

--
-- Indexes for table `tblstockin`
--
ALTER TABLE `tblstockin`
  ADD PRIMARY KEY (`STOCKINID`),
  ADD KEY `PROID` (`PROID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD KEY `CUSTOMERID` (`CUSTOMERID`),
  ADD KEY `ORDEREDNUM` (`ORDEREDNUM`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `PROID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  MODIFY `PROMOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `SETTINGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstockin`
--
ALTER TABLE `tblstockin`
  MODIFY `STOCKINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
