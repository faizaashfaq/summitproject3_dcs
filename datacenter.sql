-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 08:46 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datacenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `corrective`
--

CREATE TABLE `corrective` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `requesttime` varchar(200) NOT NULL,
  `requestdate` varchar(200) NOT NULL,
  `requestfor` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nic` varchar(200) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `timein` varchar(200) NOT NULL,
  `timeout` varchar(200) NOT NULL,
  `officer` varchar(200) NOT NULL,
  `maintenance` varchar(200) NOT NULL,
  `tools` varchar(200) NOT NULL,
  `workedon` varchar(200) NOT NULL,
  `impact` varchar(200) NOT NULL,
  `riskfactor` varchar(200) NOT NULL,
  `equipmentmarked` varchar(200) NOT NULL,
  `mainbreaker` varchar(200) NOT NULL,
  `workcompletion` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `reason` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corrective`
--

INSERT INTO `corrective` (`id`, `clientid`, `requesttime`, `requestdate`, `requestfor`, `name`, `nic`, `vendor`, `timein`, `timeout`, `officer`, `maintenance`, `tools`, `workedon`, `impact`, `riskfactor`, `equipmentmarked`, `mainbreaker`, `workcompletion`, `status`, `reason`) VALUES
(1, 1, '12:57:22pm', '2017/07/07', 'Commercial Data Center Karachi', 'q', '1', '1', '07/21/2017 12:00 AM', '07/26/2017 12:01 AM', 'q', 'ww', 'ww', 'wwww', 'Yes', 'ww', 'Yes', 'Yes', 'ww', 'Accepted', NULL),
(2, 1, '11:29:15am', '2017/07/11', 'Commercial Data Center Karachi', 'name of visitor', '6110197288882', 'vendor', '07/11/2017 12:00 AM', '07/18/2017 12:00 AM', 'officer', 'maintenance', 'tools', 'creac worked on', 'Yes', 'risk factor', 'Yes', 'Yes', 'work completion', 'Rejected by DC', 'some reason');

-- --------------------------------------------------------

--
-- Table structure for table `customerrequest`
--

CREATE TABLE `customerrequest` (
  `id` int(50) NOT NULL,
  `clientid` int(11) NOT NULL,
  `requesttime` varchar(20) NOT NULL,
  `requestdate` date NOT NULL,
  `requestfor` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `timein` varchar(200) NOT NULL,
  `timeout` varchar(200) NOT NULL,
  `workdetails` text NOT NULL,
  `equipments` text NOT NULL,
  `workedon` text NOT NULL,
  `shutdown` varchar(10) NOT NULL,
  `software` varchar(10) NOT NULL,
  `hardware` varchar(100) NOT NULL,
  `maintanence` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `KAM` varchar(200) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `enviornment` varchar(10) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `reason` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerrequest`
--

INSERT INTO `customerrequest` (`id`, `clientid`, `requesttime`, `requestdate`, `requestfor`, `name`, `nic`, `company`, `timein`, `timeout`, `workdetails`, `equipments`, `workedon`, `shutdown`, `software`, `hardware`, `maintanence`, `status`, `KAM`, `permission`, `enviornment`, `remarks`, `reason`) VALUES
(37, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/10/2017 12:00 PM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Rejected by DC', 'KAM1', 'option1', 'option1', '', NULL),
(36, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Rejected by KAM', 'KAM1', 'option1', 'option1', '', 'somemem'),
(35, 1, '09:37:36am', '2017-07-05', 'Commercial Data Center Lahore', 'faiza', '6110197288882', 'PTCL', '07/05/2017 12:00 AM', '07/13/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from DC', 'KAM1', 'Yes', 'Yes', '', NULL),
(55, 1, '10:05:19am', '2017-07-04', 'Commecial Data Center Karachi', 'Faiza Ashfaq', '6110197288882', 'PTCL', '07/26/2017 12:00 AM', '07/28/2017 11:30 PM', 'qwert', 'hgf', 'kig', 'Yes', 'Yes', 'Yes', 'Yes', 'Accepted', 'Ali', '', '', '', NULL),
(33, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Accepted', 'KAM1', 'option1', 'option1', '', NULL),
(34, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from DC', 'KAM1', 'option1', 'option1', '', NULL),
(28, 1, '09:37:36am', '2017-07-05', 'Commercial Data Center Lahore', 'faiza', '6110197288882', 'PTCL', '07/05/2017 12:00 AM', '07/13/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from DC', 'KAM1', 'Yes', 'Yes', '', NULL),
(31, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from DC', 'KAM1', 'option1', 'option1', '', NULL),
(25, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Rejected by DC', 'KAM1', 'option1', 'option1', '', NULL),
(29, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'option1', 'option1', '', NULL),
(30, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'option1', 'option1', '', NULL),
(38, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'option1', 'option1', '', NULL),
(39, 1, '11:27:32pm', '2017-07-04', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'll', '07/04/2017 12:00 AM', '07/18/2017 12:00 AM', 'jjj', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'option1', 'option1', '', NULL),
(40, 1, '02:30:49pm', '2017-07-05', 'Commercial Data Center Karachi', 'jjj', '6110197288882', 'kkk', '07/06/2017 12:00 AM', '07/11/2017 12:01 AM', 'kkk', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(41, 1, '02:33:06pm', '2017-07-05', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'pt', '07/27/2017 12:00 AM', '07/27/2017 12:01 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(42, 1, '02:34:41pm', '2017-07-05', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'PTCL', '07/13/2017 12:00 AM', '07/16/2017 12:01 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(43, 1, '02:36:07pm', '2017-07-05', 'Commercial Data Center Karachi', 'a', '6110197288882', 'a', '07/14/2017 12:00 AM', '07/17/2017 12:01 AM', 'a\r\n', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(44, 1, '02:36:50pm', '2017-07-05', 'Commercial Data Center Karachi', 'a', '6110197288882', 'PTCL', '07/05/2017 12:00 AM', '07/10/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(45, 1, '02:49:13pm', '2017-07-05', 'Commercial Data Center Karachi', 'nn', '6110197288882', 'p', '07/05/2017 12:00 AM', '07/18/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(46, 1, '02:58:29pm', '2017-07-05', 'Commercial Data Center Karachi', 'faiza', '6110197288882', 'PTCL', '07/05/2017 12:00 AM', '07/18/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(47, 1, '03:01:00pm', '2017-07-05', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(48, 1, '03:10:31pm', '2017-07-05', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(49, 1, '03:12:08pm', '2017-07-05', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(50, 1, '03:12:42pm', '2017-07-05', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(51, 1, '03:14:27pm', '2017-07-05', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(52, 1, '12:58:01pm', '2017-07-06', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(53, 1, '12:58:09pm', '2017-07-06', 'Commercial Data Center Karachi', 'kj', '58', 'k', '07/05/2017 12:00 AM', '07/12/2017 12:00 AM', '', '', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(54, 1, '12:13:20pm', '2017-07-07', 'Commercial Data Center Karachi', 'a', '6110197288882', 'a', '07/13/2017 12:00 AM', '07/13/2017 12:10 AM', 'a', 'a', 'a', '', '', '', 'Yes', 'Awaiting approval from KAM', '', '', '', 'a', NULL),
(56, 8, '10:17:11am', '2017-08-05', 'Commercial Data Center Karachi', 'Faiza', '4220185473357', 'PTCL', '08/05/2017 12:00 AM', '08/31/2017 12:00 AM', 'oaidhf', 'oiahf', 'oaidhf', 'Yes', 'Yes', 'Hardware Replacement', 'Equipment Maintanence', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(57, 8, '12:53:50pm', '2017-08-08', 'Commercial Data Center Karachi', 'sf', '4220185473357', 'sgsf', '08/08/2017 12:00 AM', '09/07/2017 12:00 AM', 'fgdsf', 'sgsg', 'sdgs', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(58, 8, '01:04:01pm', '2017-08-08', 'Commercial Data Center Karachi', 'dflihsad', '4220185473357', 'onadfoikn', '08/08/2017 12:00 AM', '09/06/2017 12:00 AM', 'oiandf', 'obndofind', 'iinvposij', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(59, 8, '01:05:49pm', '2017-08-08', 'Commercial Data Center Karachi', 'afkjadbf', '4220185473357', 'dfsdpf9', '08/08/2017 12:00 AM', '09/05/2017 12:00 AM', 'osidnf', 'oifgvq', 'oing', 'Yes', 'Yes', 'Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(60, 8, '01:06:49pm', '2017-08-08', 'Commercial Data Center Karachi', 'asolfn', '4220185473357', 'onfokdanf', '08/08/2017 12:00 AM', '09/07/2017 12:00 AM', 'iisndfikndsf', 'pinsdfpn', 'pnpvn', 'Yes', 'Yes', 'Array', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(61, 8, '01:11:25pm', '2017-08-08', 'Commercial Data Center Karachi', 'asdsa', '4220185473357', 'onfdo', '08/08/2017 12:00 AM', '08/30/2017 12:00 AM', 'oindfio', 'oifoidsnf', 'sdfln', 'Yes', 'Yes', 'Hardware Installation Hardware Replacement Yes', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(62, 8, '01:13:28pm', '2017-08-08', 'Commercial Data Center Karachi', 'aofuhd', '4220185473357', 'odnfodnf', '09/06/2017 12:00 AM', '10/07/2017 12:01 AM', 'oisndvoinsf', 'insdiovn', 'soidjvos', 'Yes', 'Yes', 'Hardware Installation Hardware Replacement', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(63, 8, '01:17:14pm', '2017-08-08', 'Commercial Data Center Karachi', 'aodnj', '4220185473357', 'jjdnfo', '08/08/2017 12:00 AM', '09/07/2017 12:00 AM', 'osndfon', 'ondsofin', 'oinodnf', 'Yes', 'Yes', '', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(64, 8, '01:17:58pm', '2017-08-08', 'Commercial Data Center Karachi', 'aodnj', '4220185473357', 'jjdnfo', '08/08/2017 12:00 AM', '09/07/2017 12:00 AM', 'osndfon', 'ondsofin', 'oinodnf', 'Yes', 'Yes', 'No', 'Yes', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL),
(65, 8, '01:19:57pm', '2017-08-08', 'Commercial Data Center Karachi', 'ando', '4220185473357', 'anf', '09/08/2017 12:00 AM', '10/21/2017 12:01 AM', 'oanfd', 'oinadf', 'oinf', 'Yes', 'Yes', 'Hardware Installation Hardware Replacement', 'Server Maintanence Equipment Maintanence', 'Awaiting approval from KAM', 'KAM1', 'Yes', 'Yes', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dccost`
--

CREATE TABLE `dccost` (
  `id` int(20) NOT NULL,
  `clientid` int(20) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `dc` varchar(30) NOT NULL,
  `company` varchar(20) NOT NULL,
  `costtype` varchar(30) NOT NULL,
  `costtitle` varchar(30) NOT NULL,
  `costdate` date NOT NULL,
  `costinfo` varchar(50) NOT NULL,
  `costvalue` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dccost`
--

INSERT INTO `dccost` (`id`, `clientid`, `date`, `file`, `dc`, `company`, `costtype`, `costtitle`, `costdate`, `costinfo`, `costvalue`) VALUES
(1, 4, '2017-08-01', 'New Doc 2017-07-22.pdf', '', 'ptcl', 'Capex', 'KE Bill', '2017-08-23', 'sdfsdf', 0),
(2, 4, '2017-08-01', 'New Doc 2017-07-22.pdf', 'Commercial Data Center Karachi', 'ptcl', 'Capex', 'KE Bill', '2017-09-01', 'apsifh', 0),
(3, 4, '2017-08-04', '0400002818866_420005419834.pdf', 'Commercial Data Center Karachi', 'ptcl', 'Capex', 'KE Bill', '2017-08-12', 'Bill to be paid.', 0),
(4, 4, '2017-08-05', 'IBA_ADM_LETT.pdf', 'Commercial Data Center Karachi', 'ptcl', 'Opex', 'Wapda', '2017-08-31', 'asdasdaf', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `dc` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `clientid`, `name`, `date`, `file`, `dc`, `company`, `comments`) VALUES
(5, 1, 'jjj', '2017/07/26', 'CRM_CTI_PROD1.ptcl.net.pk-1691-SH_2017_07_25_12_20_40_288.pdf', 'Commercial Data Center Karachi', '', 'hhhh'),
(6, 1, 'jjjjjjjj', '2017/07/26', 'Mid Year Review 2017 - User Manual.pdf', 'Commercial Data Center Karachi', 'ptcl', 'adlij'),
(7, 1, 'new', '2017/07/27', 'Shrew VPN Conf-v-1 03.pdf', 'Commercial Data Center Karachi', 'ptcl', 'oihfs'),
(8, 8, 'Kazim', '2017/08/01', 'New Doc 2017-07-22.pdf', 'Commercial Data Center Karachi', 'ptcl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internaldocuments`
--

CREATE TABLE `internaldocuments` (
  `id` int(10) NOT NULL,
  `dcid` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internaldocuments`
--

INSERT INTO `internaldocuments` (`id`, `dcid`, `date`, `file`, `title`, `comments`) VALUES
(1, 'Commercial Data Center Karachi', '2017-08-09', 'KE Bill', 'KE bill', ''),
(2, 'Commercial Data Center Karachi', '2017-08-07', 'IBA_ADM_FEE.pdf', 'asfdasd', '');

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `id` int(20) NOT NULL,
  `requestfor` varchar(200) NOT NULL,
  `requesttime` varchar(50) NOT NULL,
  `requestdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `timein` varchar(50) NOT NULL,
  `timeout` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `equipmentname` varchar(100) NOT NULL,
  `power` varchar(50) NOT NULL,
  `serialno` varchar(100) NOT NULL,
  `rack` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `KAM` varchar(50) NOT NULL,
  `clientid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`id`, `requestfor`, `requesttime`, `requestdate`, `name`, `nic`, `company`, `timein`, `timeout`, `manufacturer`, `equipmentname`, `power`, `serialno`, `rack`, `status`, `KAM`, `clientid`) VALUES
(4, 'Commercial Data Center Karachi', '01:16:07am', '2017-08-18', 'Kazim', '4220185473357', 'PTCL', '08/31/2017 12:00 AM', '08/31/2017 12:01 AM', 'HP', 'Proliant ', '1231', '31231', '234', 'Awaiting approval from KAM', 'KAM1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `addedby` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `role`, `Name`, `company`, `addedby`) VALUES
(1, 'faiza@gmail.com', '1234', '0', 'Faiza Ashfaq', 'ptcl', NULL),
(2, 'ldcadmin@gmail.com', '1234', '1', 'ABC', 'ptcl', NULL),
(3, 'idcadmin@gmail.com', '1234', '2', 'XYZ', 'ptcl', NULL),
(4, 'kdccadmin@gmail.com', '1234', '3', 'qwe', 'ptcl', NULL),
(5, 'kdcitadmin@gmail.con', '1234', '4', 'iop', 'ptcl', NULL),
(6, 'KAM1@gmail.com', '1234', '5', 'KAM1', 'ptcl', NULL),
(7, 'KAM2@gmail.com', '1234', '5', 'KAM2', 'ptcl', NULL),
(8, 'kazim@gmail.com', '1234', '0', 'Kazim', 'ptcl', NULL),
(9, 'kazimjamal@hotmail.com', '', '0', '', 'idjf', 'KAM1'),
(10, 'Kazim.Jamal@ptcl.net.pk', '', '0', 'Kazim Jamal', 'apiefjaf', 'KAM1'),
(11, 'Kazim.Jamal@ptcl.net.pk', '', '0', 'Syed Kazim Jamal', 'PTCL', 'KAM1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corrective`
--
ALTER TABLE `corrective`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerrequest`
--
ALTER TABLE `customerrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dccost`
--
ALTER TABLE `dccost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internaldocuments`
--
ALTER TABLE `internaldocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corrective`
--
ALTER TABLE `corrective`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customerrequest`
--
ALTER TABLE `customerrequest`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `dccost`
--
ALTER TABLE `dccost`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `internaldocuments`
--
ALTER TABLE `internaldocuments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
