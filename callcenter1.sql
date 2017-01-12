-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2015 at 12:24 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `callcenter1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerarchive`
--

CREATE TABLE IF NOT EXISTS `customerarchive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customermaster`
--

CREATE TABLE IF NOT EXISTS `customermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customermaster`
--

INSERT INTO `customermaster` (`id`, `customerid`, `customername`, `address`, `contactnumber`, `emailid`, `download`) VALUES
(4, 'C000003', 'Suriya', 'Tirupur', '9867525432', 's@mm.com', ''),
(5, 'C000004', 'Khan', 'Mumbai', '7437399000', 'k@mv.com', ''),
(6, 'C000001', 'Madhavan', 'Chennai', '8567323456', 'm@gm.com', ''),
(7, 'C000007', 'Madhavan', 'coimbatore', '7385234566', 'masdf@gm.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `downloadrequest`
--

CREATE TABLE IF NOT EXISTS `downloadrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `modelnumber` varchar(200) NOT NULL,
  `serialnumber` varchar(200) NOT NULL,
  `warrentytype` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `servicetype` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `engineerarchive`
--

CREATE TABLE IF NOT EXISTS `engineerarchive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engineerid` varchar(200) NOT NULL,
  `engineername` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `engineermaster`
--

CREATE TABLE IF NOT EXISTS `engineermaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engineerid` varchar(200) NOT NULL,
  `engineername` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `rangefrom` varchar(200) NOT NULL,
  `rangeto` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `engineermaster`
--

INSERT INTO `engineermaster` (`id`, `engineerid`, `engineername`, `position`, `contactnumber`, `emailid`, `rangefrom`, `rangeto`, `download`) VALUES
(2, 'ENG347', 'Ramesh', 'Service Engineer Grade-1', '7854323789', 'ram@ss.com', '100', '150', ''),
(3, 'ENG348', 'Suresh', 'Service Engineer Grade-2', '8655372212', 'suresh@gv.com', '151', '200', ''),
(6, 'ENG349', 'Rajesh', 'Service Engineer Grade-2', '8654399943', 'Rajesh@gs.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE IF NOT EXISTS `engineers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engineerid` varchar(200) NOT NULL,
  `engineername` varchar(200) NOT NULL,
  `uprange` varchar(200) NOT NULL,
  `downrange` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `engineerid`, `engineername`, `uprange`, `downrange`) VALUES
(1, 'ENG347', 'kumar', '200', '255'),
(2, 'ENG458', 'suresh', '100', '120');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestid` varchar(200) NOT NULL,
  `engineerid` varchar(200) NOT NULL,
  `itemname` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `view` varchar(200) NOT NULL,
  `value` varchar(200) NOT NULL,
  `assign` varchar(200) NOT NULL,
  `engineer` varchar(200) NOT NULL,
  `productview` varchar(200) NOT NULL,
  `report` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`, `view`, `value`, `assign`, `engineer`, `productview`, `report`, `invoice`, `name`, `location`) VALUES
(1, 'sathish', 'sathish', 'Online', 'c002', 'undefined', 'C004', 'ENG347', 'X001', 'C003', '19', '', ''),
(2, 'ENG347', 'ENG347', 'Offline', '', 'C001', 'C007', '', '', 'C001', '', '', ''),
(3, 'Manager', 'Manager', 'Offline', '5', '522', 'C002', 'ENG347', '8', 'C001', '', '', ''),
(4, 'ENG348', 'ENG348', 'Offline', '', 'C003', '22', '', '', 'C003', '', '', ''),
(5, 'Admin', 'Admin', 'Offline', 'Tablets', '', 'Touch Pen', '', '', '', '', '', ''),
(6, 'Developer', 'Developer', 'Offline', '', '', '', '', '', '', '', 'VBS', '../img/logo/Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newrequest`
--

CREATE TABLE IF NOT EXISTS `newrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginusername` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `modelnumber` varchar(200) NOT NULL,
  `serialnumber` varchar(200) NOT NULL,
  `warrentytype` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `servicetype` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `viewtable` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  `print` varchar(200) NOT NULL,
  `alert` varchar(200) NOT NULL,
  `amountpaid` varchar(200) NOT NULL,
  `balancedue` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=531 ;

--
-- Dumping data for table `newrequest`
--

INSERT INTO `newrequest` (`id`, `loginusername`, `customerid`, `customername`, `contactnumber`, `address`, `productid`, `productname`, `producttype`, `modelnumber`, `serialnumber`, `warrentytype`, `requestid`, `dated`, `timed`, `summary`, `servicetype`, `status`, `description`, `viewtable`, `download`, `print`, `alert`, `amountpaid`, `balancedue`) VALUES
(529, 'Manager', 'C000004', 'Khan', '7437399000', 'Mumbai', 'P0000006', 'Laptop', 'Laptop', 'mxt56 CF', '2345 675 567', 'Yes', 'C001', '2015/11/11', '10:26:00pm', 'Bios Problem', 'Service Type 2', 'Assigned', 'Flash Bios', '', '', '', '', '', ''),
(530, 'Manager', 'C000004', 'Khan', '7437399000', 'Mumbai', 'P0000006', 'Laptop', 'Laptop', 'mxt56 CF', '2345 675 567', 'Yes', 'C002', '2015/11/11', '11:10:21pm', 'Resolution Problem', 'Service Type 1', 'Assigned', 'Dislay Change', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `messagefor` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender`, `receiver`, `message`, `messagefor`, `dated`, `timed`, `status`) VALUES
(5, 'Manager', 'ENG347', 'New Task Assigned', 'newtask', '2015/11/11', '10:26:07pm', 'opened'),
(6, 'ENG347', 'manager', 'Spare Quotations', 'sparesrequired', '2015/11/11', '10:27:00pm', 'opened'),
(7, 'ENG347', 'manager', 'Spare Quotations', 'sparesrequired', '2015/11/11', '10:49:32pm', 'opened'),
(8, 'Manager', '', 'Spare Quotations', 'sparesquote', '2015/11/11', '11:03:07pm', 'notopened'),
(9, 'ENG347', 'manager', 'Spare Quotations', 'sparesrequired', '2015/11/11', '11:06:51pm', 'opened'),
(10, 'Manager', 'ENG347', 'Spare Quotations', 'sparesquote', '2015/11/11', '11:07:49pm', 'opened'),
(12, 'ENG347', 'manager', 'Spare Quotations', 'sparesrequired', '2015/11/11', '11:17:34pm', 'opened'),
(13, 'ENG347', 'manager', 'Spare Quotations', 'sparesrequired', '2015/11/11', '11:27:33pm', 'opened'),
(14, 'Manager', 'ENG347', 'Spare Quotations', 'sparequote', '2015/11/11', '11:28:00pm', 'opened');

-- --------------------------------------------------------

--
-- Table structure for table `productarchive`
--

CREATE TABLE IF NOT EXISTS `productarchive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `series` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE IF NOT EXISTS `productmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `series` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`id`, `productid`, `productname`, `producttype`, `category`, `series`, `download`) VALUES
(5, 'P0000007', 'Mobile Phones', 'Mobile Phones', 'Nokia', 'X1', ''),
(6, 'P0000004', 'Tablets', 'Tablets', 'Samsung', 'C2', ''),
(7, 'P0000005', 'Tablets', 'Tablets', 'Apple', ' C5', ''),
(8, 'P0000006', 'Laptop', 'Laptop', 'Apple', 'G Series', ''),
(9, 'P0000008', 'Mobile Phones', 'Mobile Phones', 'Sony', 'X3', ''),
(10, 'P0000009', 'Laptop', 'Laptop', 'Samsung', 'F Series,', ''),
(14, 'P0000010', 'Mobile Phones', 'Mobile Phones', 'Samsung', 'X4', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `engineerid` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `spare` varchar(200) NOT NULL,
  `mechanicalissues` varchar(200) NOT NULL,
  `electricalissues` varchar(200) NOT NULL,
  `otherissues` varchar(200) NOT NULL,
  `paymentstatus` varchar(200) NOT NULL,
  `paymentmethod` varchar(200) NOT NULL,
  `amountreceived` varchar(200) NOT NULL,
  `paymentoption` varchar(200) NOT NULL,
  `calibrationcertificate` varchar(200) NOT NULL,
  `engineercomments` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requestarchive`
--

CREATE TABLE IF NOT EXISTS `requestarchive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(200) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `producttype` varchar(200) NOT NULL,
  `modelnumber` varchar(200) NOT NULL,
  `serialnumber` varchar(200) NOT NULL,
  `warrentytype` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `servicetype` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sparearchive`
--

CREATE TABLE IF NOT EXISTS `sparearchive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spareid` varchar(200) NOT NULL,
  `sparetype` varchar(200) NOT NULL,
  `sparename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sparemaster`
--

CREATE TABLE IF NOT EXISTS `sparemaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spareid` varchar(200) NOT NULL,
  `sparetype` varchar(200) NOT NULL,
  `sparename` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sparemaster`
--

INSERT INTO `sparemaster` (`id`, `spareid`, `sparetype`, `sparename`, `download`) VALUES
(3, 'S00000002', 'Tablets', 'Touch Pen', ''),
(4, 'S00000003', 'Laptop', 'Battery', ''),
(5, 'S00000004', 'Tablets', 'ram', ''),
(6, 'S00000005', 'Laptop', 'Keyboard', ''),
(7, 'S00000006', 'Laptop', 'Mouse', ''),
(8, 'S00000007', 'Laptop', 'BIOS', ''),
(9, 'S00000008', 'Tablet', 'Keyboard', ''),
(10, 'S00000009', 'Tablet', 'BIOS', ''),
(11, 'S00000010', 'Mobile', 'Battery', ''),
(14, 'S00000001', 'Mobile ', 'Display Screen', '');

-- --------------------------------------------------------

--
-- Table structure for table `spares`
--

CREATE TABLE IF NOT EXISTS `spares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engineerid` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `productitem` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `unitcost` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `spares`
--

INSERT INTO `spares` (`id`, `engineerid`, `requestid`, `customerid`, `productitem`, `productid`, `quantity`, `invoice`, `unitcost`, `price`, `dated`, `timed`) VALUES
(78, 'ENG347', 'C002', 'C000003', 'dislay', '', '3', 'NO', '77', '', '2015/11/11', '11:28:00pm'),
(79, 'ENG347', 'C002', 'C000004', 'dislay', '', '', 'NO', '78', '', '2015/11/11', '11:28:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignedby` varchar(200) NOT NULL,
  `requestid` varchar(200) NOT NULL,
  `engineersid` varchar(200) NOT NULL,
  `taskstatus` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `timed` varchar(200) NOT NULL,
  `alert` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `requestalert` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `assignedby`, `requestid`, `engineersid`, `taskstatus`, `dated`, `timed`, `alert`, `invoice`, `requestalert`) VALUES
(26, '', 'C002', 'ENG347', '', '2015/11/11', '11:28:00pm', 'NO', 'NO', 'YES');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
