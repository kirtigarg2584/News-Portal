-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2014 at 06:34 AM
-- Server version: 5.5.36-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indiaping_blkwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(128) NOT NULL DEFAULT '',
  `login_id` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `date_of_birth` date NOT NULL,
  `charges` int(8) NOT NULL,
  `profilename` varchar(255) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `active_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(8) NOT NULL DEFAULT '0',
  `device_name` varchar(255) DEFAULT NULL,
  `imei` varchar(255) DEFAULT NULL,
  `expiry_date` datetime NOT NULL,
  `last_seen` text,
  `AddBy` varchar(100) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sno`, `customer_name`, `login_id`, `password`, `date_of_birth`, `charges`, `profilename`, `uid`, `active_date`, `status`, `device_name`, `imei`, `expiry_date`, `last_seen`, `AddBy`, `online`) VALUES
(137, 'Kamal', 'kamal', '1234', '2014-12-01', 500, 'rahul', 'kxs01q', '2014-12-15 14:26:52', 0, 'XT1033', '', '2015-01-15 23:59:59', '17-12-2014 06:15:14', 'adminajay', 0),
(133, 'rahul', 'rahul2', '11111', '2014-12-31', 11, 'rahul', '0v2szv', '2014-12-05 17:55:54', 1, NULL, NULL, '2015-12-24 23:59:59', NULL, 'adminajay', 0),
(139, 'test123', 'test4321', '12345', '0000-00-00', 1000, 'my', 'bn4k7o', '2014-12-18 17:55:01', 0, 'C2305', '', '2014-12-27 23:59:59', '21-12-2014 12:58:00', 'admin', 0),
(136, 'dummy', 'dm', '12345', '0000-00-00', 1000, 'my', 'tbzvs7', '2014-12-21 08:05:42', 1, 'C2305', '', '2014-12-31 23:59:59', '21-12-2014 13:29:15', 'admin', 0),
(128, 'Anshul', 'ansh', '1234', '2014-11-02', 0, 'my', 'moesru', '2014-11-27 19:23:52', 1, 'XT1033', '355004052623942', '2015-11-27 23:59:59', '19-12-2014 19:28:58', 'admin', 0),
(140, 'fas', 'das', '12345', '0000-00-00', 1000, 'my', 'w0ftr7', '2014-12-21 19:58:53', 0, 'C2305', '', '2014-12-31 23:59:59', '21-12-2014 13:02:14', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

CREATE TABLE IF NOT EXISTS `gcm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `uid`, `gcm_regid`, `name`, `created_at`) VALUES
(3, 'tbzvs7', 'APA91bFwEgPTuGf-GuSPz03uO8MqnZj4mk01RnmN5tWNxt9_7ltshQola5dW4tDYYxfp0GINR7PJYsDAYdHGC1UUq747HGGFGIjsD25gnWbBpw93mFMRitKnGWReFjv9CqS3eKbRDIplN0s9cv_u_77m4J38airSLZr9mgdwxS8OTBUA01DsbOM', 'dm', '2014-12-21 13:14:17'),
(4, 'bn4k7o', 'APA91bE34iVpibW9izNkpRcu0z7AMwVA3rmuzf023WXc4R7XS1nBxwc3TrE5YbIy_hJR4HoAhcm6IsThJyn35x1savtQsQRhVLt8LcWcn4Fms5lVHwFtsgz3q0oI0KYR8MmssF8oGhq-IavktTLMb1vr1EotyFzFxw5JV5rY0rP4mKzEHFHLWxA', 'test4321', '2014-12-18 11:12:30'),
(5, 'moesru', 'APA91bF8WLr59ZqFqYSw8ZSyj7qFbccAcfNQaC6lT8MnOV4tStfVg5Do1MHAzUaCM8D6BpAocTaWpEXq7p_owRABdI2AB0pPd9lnXBkp5smh_vz6BlVxarUseUvfSsiNQ2JJCsjm6krwjsIwlfTUcdH4j-EjESeyN6SkYVT17vIBsho7b4H_1YA', 'ansh', '2014-12-19 19:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `grouptable`
--

CREATE TABLE IF NOT EXISTS `grouptable` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(8) NOT NULL,
  `AddBy` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `grouptable`
--

INSERT INTO `grouptable` (`sno`, `group_name`, `date`, `status`, `AddBy`) VALUES
(149, 'rahul', '2014-12-15 14:22:43', 1, 'adminajay'),
(146, 'my', '2014-11-27 12:23:16', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `metals`
--

CREATE TABLE IF NOT EXISTS `metals` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `metal_name` varchar(128) NOT NULL,
  `active_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(8) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `news` varchar(128) DEFAULT NULL,
  `active_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(8) NOT NULL,
  `AddBy` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`sno`, `news`, `active_date`, `status`, `AddBy`) VALUES
(26, 'New updates', '2014-12-21 19:52:57', 0, 'adminajay');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `result_text` varchar(255) NOT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `active_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `charges` int(8) NOT NULL,
  `status` int(8) NOT NULL DEFAULT '1',
  `assigned_id` varchar(255) NOT NULL,
  `AddBy` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=519 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sno`, `result_text`, `profile_name`, `active_date`, `charges`, `status`, `assigned_id`, `AddBy`) VALUES
(514, '124456', 'rahul', '2014-12-17 06:13:22', 0, 1, 'q4y04p', 'adminajay'),
(518, '108109', 'my', '2014-12-19 19:30:03', 0, 1, 'a3plha', 'admin'),
(504, 'test1', 'my', '2014-12-15 08:09:47', 0, 1, 'y3xx39', 'admin'),
(499, 'Sggggv', 'rahul', '2014-12-15 07:47:32', 0, 1, 'l2lumt', 'adminajay'),
(476, 'Check in', 'my', '2014-11-27 12:24:27', 0, 1, 'he4pgv', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `result_assign`
--

CREATE TABLE IF NOT EXISTS `result_assign` (
  `sno` int(8) NOT NULL AUTO_INCREMENT,
  `result_text` varchar(255) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `assigned_id` varchar(255) NOT NULL,
  `status` int(8) NOT NULL DEFAULT '1',
  `AddBy` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=651 ;

--
-- Dumping data for table `result_assign`
--

INSERT INTO `result_assign` (`sno`, `result_text`, `profile_name`, `assigned_id`, `status`, `AddBy`) VALUES
(646, '124456', 'rahul', 'q4y04p', 1, 'adminajay'),
(650, '108109', 'my', 'a3plha', 1, 'admin'),
(636, 'test1', 'my', 'y3xx39', 1, 'admin'),
(631, 'Sggggv', 'rahul', 'l2lumt', 1, 'adminajay'),
(608, 'Check in', 'my', 'he4pgv', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_info1`
--

CREATE TABLE IF NOT EXISTS `user_info1` (
  `user_id` varchar(16) NOT NULL DEFAULT '',
  `user_pwd` varchar(16) DEFAULT NULL,
  `last_logged_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info1`
--

INSERT INTO `user_info1` (`user_id`, `user_pwd`, `last_logged_on`) VALUES
('admin', 'gold987', '2014-12-21 12:13:51'),
('adminajay', '12345', '2014-12-19 19:32:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
