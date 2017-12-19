-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 07:46 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myanma`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1508475483),
('Employee', '4', 1508378967),
('Employee', '5', 1508379139),
('Employee', '6', 1508379121),
('Management', '2', 1508378967),
('ManageUser', '3', 1508378967);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'สำหรับการดูแลระบบ', NULL, NULL, 1508378967, 1508378967),
('createVisa', 2, 'สร้าง visa', NULL, NULL, 1508378967, 1508378967),
('Employee', 1, 'พนักงาน', NULL, NULL, 1508378967, 1508378967),
('loginToBackend', 2, 'ล็อกอินเข้าใช้งานส่วน backend', NULL, NULL, 1508378967, 1508378967),
('Management', 1, 'จัดการข้อมูลผู้ใช้งานและบทความ', NULL, NULL, 1508378967, 1508378967),
('ManageUser', 1, 'จัดการข้อมูลผู้ใช้งาน', NULL, NULL, 1508378967, 1508378967),
('updateOwnPost', 2, 'แก้ไขบทความตัวเอง', 'isEmployee', NULL, 1508378967, 1508378967),
('updateVisa', 2, 'แก้ไข visa', NULL, NULL, 1508378967, 1508378967);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'Management'),
('Employee', 'createVisa'),
('Management', 'Employee'),
('Management', 'ManageUser'),
('ManageUser', 'Employee'),
('ManageUser', 'loginToBackend');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isEmployee', 0x4f3a32343a22636f6d6d6f6e5c726261635c456d706c6f79656552756c65223a333a7b733a343a226e616d65223b733a31303a226973456d706c6f796565223b733a393a22637265617465644174223b693a313530383337383936373b733a393a22757064617465644174223b693a313530383337383936373b7d, 1508378967, 1508378967);

-- --------------------------------------------------------

--
-- Table structure for table `basicdocuments`
--

CREATE TABLE `basicdocuments` (
  `idbasicDocuments` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visa_idvisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basicdocuments`
--

INSERT INTO `basicdocuments` (`idbasicDocuments`, `detail`, `visa_idvisa`) VALUES
(300, 'passport of travel document of which validity is no less than 6 months', 177),
(301, 'visa application form completely filled in', 177),
(302, '2 recent colour photos (3.5 x 4.5 cm.)', 177),
(303, 'invitation letter (if any)', 177);

-- --------------------------------------------------------

--
-- Table structure for table `criminalcivillaw`
--

CREATE TABLE `criminalcivillaw` (
  `idcriminalCivillaw` int(11) NOT NULL,
  `act` varchar(45) DEFAULT NULL,
  `punishment` varchar(45) DEFAULT NULL,
  `prison` varchar(45) DEFAULT NULL,
  `passport_idpassport` int(11) NOT NULL,
  `court` varchar(45) DEFAULT NULL,
  `periodFrom` varchar(45) DEFAULT NULL,
  `periodTo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criminalcivillaw`
--

INSERT INTO `criminalcivillaw` (`idcriminalCivillaw`, `act`, `punishment`, `prison`, `passport_idpassport`, `court`, `periodFrom`, `periodTo`) VALUES
(1, '7', '', '', 2, '9', '', '888'),
(2, '', '8', '887875', 2, '', '88', '');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `districtNameEN` varchar(255) NOT NULL,
  `districtNameMM` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `stateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtId`, `districtNameEN`, `districtNameMM`, `status`, `createdAt`, `updatedAt`, `stateId`) VALUES
(1, 'Hinthada', '1', 1, '2017-10-11', '2017-10-11', 1),
(2, 'Labutta', '2', 1, '2017-10-11', '2017-10-11', 1),
(3, 'Ma-ubin', '3', 1, '2017-10-11', '2017-10-11', 1),
(4, 'Myaungmya', '4', 1, '2017-10-11', '2017-10-11', 1),
(5, 'Pathein', '5', 1, '2017-10-11', '2017-10-11', 1),
(6, 'Pyapon', '6', 1, '2017-10-11', '2017-10-11', 1),
(7, 'Bago', '7', 1, '2017-10-11', '2017-10-11', 2),
(8, 'Taungoo', '8', 1, '2017-10-11', '2017-10-11', 2),
(9, 'Pyay', '9', 1, '2017-10-11', '2017-10-11', 3),
(10, 'Thayarwady', '10', 1, '2017-10-11', '2017-10-11', 3),
(11, 'Falam', '11', 1, '2017-10-11', '2017-10-11', 4),
(12, 'Hakha', '12', 1, '2017-10-11', '2017-10-11', 4),
(13, 'Mindat', '13', 1, '2017-10-11', '2017-10-11', 4),
(14, 'Bhamo', '14', 1, '2017-10-11', '2017-10-11', 5),
(15, 'Mohnyin', '15', 1, '2017-10-11', '2017-10-11', 5),
(16, 'Myitkyina', '16', 1, '2017-10-11', '2017-10-11', 5),
(17, 'Putao', '17', 1, '2017-10-11', '2017-10-11', 5),
(18, 'Bawlakh', '18', 1, '2017-10-11', '2017-10-11', 6),
(19, 'Loikaw', '19', 1, '2017-10-11', '2017-10-11', 6),
(20, 'Hpa-an', '20', 1, '2017-10-11', '2017-10-11', 7),
(21, 'Hpapun', '21', 1, '2017-10-11', '2017-10-11', 7),
(22, 'Kawkareik', '22', 1, '2017-10-11', '2017-10-11', 7),
(23, 'Myawaddy', '23', 1, '2017-10-11', '2017-10-11', 7),
(24, 'Gangaw', '24', 1, '2017-10-11', '2017-10-11', 8),
(25, 'Magway', '25', 1, '2017-10-11', '2017-10-11', 8),
(26, 'Minbu', '26', 1, '2017-10-11', '2017-10-11', 8),
(27, 'Pakokku', '27', 1, '2017-10-11', '2017-10-11', 8),
(28, 'Thayet', '28', 1, '2017-10-11', '2017-10-11', 8),
(29, 'Kyaukse', '29', 1, '2017-10-11', '2017-10-11', 9),
(30, 'Mandalay', '30', 1, '2017-10-11', '2017-10-11', 9),
(31, 'Meiktila', '31', 1, '2017-10-11', '2017-10-11', 9),
(32, 'Myingyan', '32', 1, '2017-10-11', '2017-10-11', 9),
(33, 'Naypyidaw', '33', 1, '2017-10-11', '2017-10-11', 9),
(34, 'Nyaung-U', '34', 1, '2017-10-11', '2017-10-11', 9),
(35, 'Pyinoolwin', '35', 1, '2017-10-11', '2017-10-11', 9),
(36, 'Yamethin', '36', 1, '2017-10-11', '2017-10-11', 9),
(37, 'Mawlamyine', '37', 1, '2017-10-11', '2017-10-11', 10),
(38, 'Thaton', '38', 1, '2017-10-11', '2017-10-11', 10),
(39, 'Kyaukpyu', '39', 1, '2017-10-11', '2017-10-11', 11),
(40, 'Maungdaw', '40', 1, '2017-10-11', '2017-10-11', 11),
(41, 'Sittwe', '41', 1, '2017-10-11', '2017-10-11', 11),
(42, 'Thandwe', '42', 1, '2017-10-11', '2017-10-11', 11),
(43, 'Mrauk-U', '43', 1, '2017-10-11', '2017-10-11', 11),
(44, 'Hkamti', '44', 1, '2017-10-11', '2017-10-11', 12),
(45, 'Kanbalu', '45', 1, '2017-10-11', '2017-10-11', 12),
(46, 'Kale', '46', 1, '2017-10-11', '2017-10-11', 12),
(47, 'Katha', '47', 1, '2017-10-11', '2017-10-11', 12),
(48, 'Mawlaik', '48', 1, '2017-10-11', '2017-10-11', 12),
(49, 'Monywa', '49', 1, '2017-10-11', '2017-10-11', 12),
(50, 'Sagaing', '50', 1, '2017-10-11', '2017-10-11', 12),
(51, 'Shwebo', '51', 1, '2017-10-11', '2017-10-11', 12),
(52, 'Tamu', '52', 1, '2017-10-11', '2017-10-11', 12),
(53, 'Yinmabin', '53', 1, '2017-10-11', '2017-10-11', 12),
(54, 'Kengtung', '54', 1, '2017-10-11', '2017-10-11', 13),
(55, 'Monghpyak', '55', 1, '2017-10-11', '2017-10-11', 13),
(56, 'Monghsat', '56', 1, '2017-10-11', '2017-10-11', 13),
(57, 'Tachileik', '57', 1, '2017-10-11', '2017-10-11', 13),
(58, 'Kunlong?', '58', 1, '2017-10-11', '2017-10-11', 14),
(59, 'Kyaukme', '59', 1, '2017-10-11', '2017-10-11', 14),
(60, 'Lashio', '60', 1, '2017-10-11', '2017-10-11', 14),
(61, 'Laukkaing', '61', 1, '2017-10-11', '2017-10-11', 14),
(62, 'Muse', '62', 1, '2017-10-11', '2017-10-11', 14),
(63, 'Hopang', '63', 1, '2017-10-11', '2017-10-11', 14),
(64, 'Matman', '64', 1, '2017-10-11', '2017-10-11', 14),
(65, 'Mongmit', '65', 1, '2017-10-11', '2017-10-11', 14),
(66, 'Langkho', '66', 1, '2017-10-11', '2017-10-11', 15),
(67, 'Loilen', '67', 1, '2017-10-11', '2017-10-11', 15),
(68, 'Taunggyi', '68', 1, '2017-10-11', '2017-10-11', 15),
(69, 'Dawei', '69', 1, '2017-10-11', '2017-10-11', 16),
(70, 'Kawthoung', '70', 1, '2017-10-11', '2017-10-11', 16),
(71, 'Myeik', '71', 1, '2017-10-11', '2017-10-11', 16),
(72, 'Yangon East', '72', 1, '2017-10-11', '2017-10-11', 17),
(73, 'Yangon North', '73', 1, '2017-10-11', '2017-10-11', 17),
(74, 'Yangon South', '74', 1, '2017-10-11', '2017-10-11', 17),
(75, 'Yangon West', '75', 1, '2017-10-11', '2017-10-11', 17);

-- --------------------------------------------------------

--
-- Table structure for table `documentapplicant`
--

CREATE TABLE `documentapplicant` (
  `iddocumentApplicant` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visa_idvisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentapplicant`
--

INSERT INTO `documentapplicant` (`iddocumentApplicant`, `detail`, `visa_idvisa`) VALUES
(58, 'appointment letter or certificate that applicant requires medical treatment in Thailand', 177);

-- --------------------------------------------------------

--
-- Table structure for table `documentfirsttime`
--

CREATE TABLE `documentfirsttime` (
  `iddocumentFirstTime` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visa_idvisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentfirsttime`
--

INSERT INTO `documentfirsttime` (`iddocumentFirstTime`, `detail`, `visa_idvisa`) VALUES
(7, 'letter of employment (for employee) or company registration (for business owner)', 178),
(210, 'letter of employment (for employee) or company registration (for business owner)', 177),
(211, 'invitation letter (if any)', 177),
(212, 'confirmed round trip air ticket', 177);

-- --------------------------------------------------------

--
-- Table structure for table `documenttouristvisa`
--

CREATE TABLE `documenttouristvisa` (
  `iddocumentTouristVisa` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visa_idvisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documenttouristvisa`
--

INSERT INTO `documenttouristvisa` (`iddocumentTouristVisa`, `detail`, `visa_idvisa`) VALUES
(225, 'letter of employment (for employee) or', 177),
(226, 'company registration (for business owner) or', 177),
(227, 'guarantee/ invitation letter from company in Thailand (if any) or', 177),
(228, 'receipt or invoice from past procurement (if any)', 177);

-- --------------------------------------------------------

--
-- Table structure for table `familytree`
--

CREATE TABLE `familytree` (
  `idfamilytree` int(11) NOT NULL,
  `familytree` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dateOfBirth` varchar(45) DEFAULT NULL,
  `placeOfBirth` varchar(45) DEFAULT NULL,
  `raceNationality` varchar(45) DEFAULT NULL,
  `nrc` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `aliveOrDeath` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `father` varchar(45) DEFAULT NULL,
  `mother` varchar(45) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `familytree`
--

INSERT INTO `familytree` (`idfamilytree`, `familytree`, `name`, `dateOfBirth`, `placeOfBirth`, `raceNationality`, `nrc`, `region`, `occupation`, `aliveOrDeath`, `address`, `father`, `mother`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'qrrr', 'john', '12/02/1994', 'Thai', 'Thai', '185445215454', 'thai', 'dd', 'alive', 'sds', '3', '3', NULL, NULL, 1510283048, 1),
(3, '', 'ssss', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 1510281756, 1),
(4, 'hhh', '21', '', '12', '', '', '', '', '', '', '', '', NULL, NULL, 1510280860, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1507534342),
('m130524_201442_init', 1507534344),
('m140506_102106_rbac_init', 1507705837);

-- --------------------------------------------------------

--
-- Table structure for table `passport`
--

CREATE TABLE `passport` (
  `idpassport` int(11) NOT NULL,
  `familytree_idfamilytree` int(11) NOT NULL,
  `otherName` varchar(255) DEFAULT NULL,
  `identificationMark` varchar(255) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `presentOccupation` varchar(45) DEFAULT NULL,
  `presentOccupationAddress` varchar(45) DEFAULT NULL,
  `educationalQual` varchar(45) DEFAULT NULL,
  `citizenshipSecCardNo` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `eye` varchar(45) DEFAULT NULL,
  `hair` varchar(45) DEFAULT NULL,
  `spouseName` varchar(45) DEFAULT NULL,
  `spouseOccupation` varchar(45) DEFAULT NULL,
  `spouseOccupationAddress` varchar(45) DEFAULT NULL,
  `subjectTravelled` varchar(45) DEFAULT NULL,
  `countryApplied` varchar(45) DEFAULT NULL,
  `departmentTransferred` varchar(45) DEFAULT NULL,
  `departmentTransferredCurrent` varchar(45) DEFAULT NULL,
  `detailOfSiblingsApplicant` varchar(45) DEFAULT NULL,
  `detailOfSpouseApplicant` varchar(45) DEFAULT NULL,
  `detailOfChildrenApplicant` varchar(45) DEFAULT NULL,
  `detailOfSiblingsFather` varchar(45) DEFAULT NULL,
  `detailOfSiblingsMother` varchar(45) DEFAULT NULL,
  `detailOfSiblingsSpouse` varchar(45) DEFAULT NULL,
  `passportNo` varchar(45) DEFAULT NULL,
  `passportIssueDate` date DEFAULT NULL,
  `placeDeliveredPassport` varchar(45) DEFAULT NULL,
  `dateDeliveredPassport` date DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passport`
--

INSERT INTO `passport` (`idpassport`, `familytree_idfamilytree`, `otherName`, `identificationMark`, `sex`, `presentOccupation`, `presentOccupationAddress`, `educationalQual`, `citizenshipSecCardNo`, `height`, `eye`, `hair`, `spouseName`, `spouseOccupation`, `spouseOccupationAddress`, `subjectTravelled`, `countryApplied`, `departmentTransferred`, `departmentTransferredCurrent`, `detailOfSiblingsApplicant`, `detailOfSpouseApplicant`, `detailOfChildrenApplicant`, `detailOfSiblingsFather`, `detailOfSiblingsMother`, `detailOfSiblingsSpouse`, `passportNo`, `passportIssueDate`, `placeDeliveredPassport`, `dateDeliveredPassport`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2', '2', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 1510196011, 1),
(2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateId` int(11) NOT NULL,
  `stateNameEN` varchar(255) NOT NULL,
  `stateNameMM` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateNameEN`, `stateNameMM`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'Ayeyarwady', 'ဧရာဝတီ', 1, '2017-10-11', '2017-10-11'),
(2, 'Bago (East)', 'ပဲခူး (အရှေ့)', 1, '2017-10-11', '2017-10-11'),
(3, 'Bago (West)', 'ပဲခူး (အနောက်)', 1, '2017-10-11', '2017-10-11'),
(4, 'Chin', 'မေးစေ့', 1, '2017-10-11', '2017-10-11'),
(5, 'Kachin', 'ကချင်', 1, '2017-10-11', '2017-10-11'),
(6, 'Kayah', 'ကယား', 1, '2017-10-11', '2017-10-11'),
(7, 'Kayin', 'ကရင်', 1, '2017-10-11', '2017-10-11'),
(8, 'Magway', 'မကွေး', 1, '2017-10-11', '2017-10-11'),
(9, 'Mandalay', 'မန္တလေး', 1, '2017-10-11', '2017-10-11'),
(10, 'Mon', 'မွန်', 1, '2017-10-11', '2017-10-11'),
(11, 'Rakhine', 'ရခိုင်\r\n', 1, '2017-10-11', '2017-10-11'),
(12, 'Sagaing', 'စစ်ကိုင်း', 1, '2017-10-11', '2017-10-11'),
(13, 'Shan (East)', 'ရှမ်း (အရှေ့)', 1, '2017-10-11', '2017-10-11'),
(14, 'Shan (North)', 'ရှမ်း (မြောက်ပိုင်း)', 1, '2017-10-11', '2017-10-11'),
(15, 'Shan (South)', 'ရှမ်း (တောင်ပိုင်း)', 1, '2017-10-11', '2017-10-11'),
(16, 'Tanintharyi', 'တနင်္သာရီ', 1, '2017-10-11', '2017-10-11'),
(17, 'Yangon', 'ရန်ကုန်\r\n', 1, '2017-10-11', '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `studied`
--

CREATE TABLE `studied` (
  `idstudied` int(11) NOT NULL,
  `yearFrom` varchar(45) DEFAULT NULL,
  `yearTo` varchar(45) DEFAULT NULL,
  `nameSchool` varchar(45) DEFAULT NULL,
  `townshipWardVillage` varchar(45) DEFAULT NULL,
  `passport_idpassport` int(11) NOT NULL,
  `standardFrom` varchar(45) DEFAULT NULL,
  `standardTo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studied`
--

INSERT INTO `studied` (`idstudied`, `yearFrom`, `yearTo`, `nameSchool`, `townshipWardVillage`, `passport_idpassport`, `standardFrom`, `standardTo`) VALUES
(1, '1', '', '5', '', 2, '', ''),
(2, '', '2', '', '', 2, '', '4'),
(3, '', '', '', '6', 2, '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `townshipId` int(11) NOT NULL,
  `townshipNameEN` varchar(255) NOT NULL,
  `townshipNameMM` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  `districtId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`townshipId`, `townshipNameEN`, `townshipNameMM`, `status`, `createdAt`, `updatedAt`, `districtId`) VALUES
(1, 'Hinthada', '1', 1, '2017-10-11', '2017-10-11', 1),
(2, 'Ingapu', '2', 1, '2017-10-11', '2017-10-11', 1),
(3, 'Kyangin', '3', 1, '2017-10-11', '2017-10-11', 1),
(4, 'Lemyethna', '4', 1, '2017-10-11', '2017-10-11', 1),
(5, 'Myanaung', '5', 1, '2017-10-11', '2017-10-11', 1),
(6, 'Zalun', '6', 1, '2017-10-11', '2017-10-11', 1),
(7, 'Labutta', '7', 1, '2017-10-11', '2017-10-11', 2),
(8, 'Mawlamyinegyun', '8', 1, '2017-10-11', '2017-10-11', 2),
(9, 'Danubyu', '9', 1, '2017-10-11', '2017-10-11', 3),
(10, 'Maubin', '10', 1, '2017-10-11', '2017-10-11', 3),
(11, 'Nyaungdon', '11', 1, '2017-10-11', '2017-10-11', 3),
(12, 'Pantanaw', '12', 1, '2017-10-11', '2017-10-11', 3),
(13, 'Einme', '13', 1, '2017-10-11', '2017-10-11', 4),
(14, 'Myaungmya', '14', 1, '2017-10-11', '2017-10-11', 4),
(15, 'Wakema', '15', 1, '2017-10-11', '2017-10-11', 4),
(16, 'Kangyidaunt', '16', 1, '2017-10-11', '2017-10-11', 5),
(17, 'Kyaunggon', '17', 1, '2017-10-11', '2017-10-11', 5),
(18, 'Kyonpyaw', '18', 1, '2017-10-11', '2017-10-11', 5),
(19, 'Ngapudaw', '19', 1, '2017-10-11', '2017-10-11', 5),
(20, 'Pathein', '20', 1, '2017-10-11', '2017-10-11', 5),
(21, 'Thabaung', '21', 1, '2017-10-11', '2017-10-11', 5),
(22, 'Yegyi', '22', 1, '2017-10-11', '2017-10-11', 5),
(23, 'Bogale', '23', 1, '2017-10-11', '2017-10-11', 6),
(24, 'Dedaye', '24', 1, '2017-10-11', '2017-10-11', 6),
(25, 'Kyaiklat', '25', 1, '2017-10-11', '2017-10-11', 6),
(26, 'Pyapon', '26', 1, '2017-10-11', '2017-10-11', 6),
(27, 'Bago', '27', 1, '2017-10-11', '2017-10-11', 7),
(28, 'Daik-U', '28', 1, '2017-10-11', '2017-10-11', 7),
(29, 'Kawa', '29', 1, '2017-10-11', '2017-10-11', 7),
(30, 'Kyauktaga', '30', 1, '2017-10-11', '2017-10-11', 7),
(31, 'Nyaunglebin', '31', 1, '2017-10-11', '2017-10-11', 7),
(32, 'Shwegyin', '32', 1, '2017-10-11', '2017-10-11', 7),
(33, 'Thanatpin', '33', 1, '2017-10-11', '2017-10-11', 7),
(34, 'Waw', '34', 1, '2017-10-11', '2017-10-11', 7),
(35, 'Tantabin', '35', 1, '2017-10-11', '2017-10-11', 8),
(36, 'Kyaukkyi', '36', 1, '2017-10-11', '2017-10-11', 8),
(37, 'Oktwin', '37', 1, '2017-10-11', '2017-10-11', 8),
(38, 'Phyu', '38', 1, '2017-10-11', '2017-10-11', 8),
(39, 'Taungoo', '39', 1, '2017-10-11', '2017-10-11', 8),
(40, 'Yedashe', '40', 1, '2017-10-11', '2017-10-11', 8),
(41, 'Padaung', '41', 1, '2017-10-11', '2017-10-11', 9),
(42, 'Paukkhaung', '42', 1, '2017-10-11', '2017-10-11', 9),
(43, 'Paungde', '43', 1, '2017-10-11', '2017-10-11', 9),
(44, 'Pyay', '44', 1, '2017-10-11', '2017-10-11', 9),
(45, 'Shwedaung', '45', 1, '2017-10-11', '2017-10-11', 9),
(46, 'Thegon', '46', 1, '2017-10-11', '2017-10-11', 9),
(47, 'Gyobingauk', '47', 1, '2017-10-11', '2017-10-11', 10),
(48, 'Letpadan', '48', 1, '2017-10-11', '2017-10-11', 10),
(49, 'Minhla', '49', 1, '2017-10-11', '2017-10-11', 10),
(50, 'Monyo', '50', 1, '2017-10-11', '2017-10-11', 10),
(51, 'Nattalin', '51', 1, '2017-10-11', '2017-10-11', 10),
(52, 'Okpho', '52', 1, '2017-10-11', '2017-10-11', 10),
(53, 'Thayarwady', '53', 1, '2017-10-11', '2017-10-11', 10),
(54, 'Zigon', '54', 1, '2017-10-11', '2017-10-11', 10),
(55, 'Falam', '55', 1, '2017-10-11', '2017-10-11', 11),
(56, 'Tiddim', '56', 1, '2017-10-11', '2017-10-11', 11),
(57, 'Tonzang', '57', 1, '2017-10-11', '2017-10-11', 11),
(58, 'Hakha', '58', 1, '2017-10-11', '2017-10-11', 12),
(59, 'Htantlang', '59', 1, '2017-10-11', '2017-10-11', 12),
(60, 'Kanpetlet', '60', 1, '2017-10-11', '2017-10-11', 13),
(61, 'Madupi', '61', 1, '2017-10-11', '2017-10-11', 13),
(62, 'Mindat', '62', 1, '2017-10-11', '2017-10-11', 13),
(63, 'Paletwa', '63', 1, '2017-10-11', '2017-10-11', 13),
(64, 'Bhamo', '64', 1, '2017-10-11', '2017-10-11', 14),
(65, 'Mansi', '65', 1, '2017-10-11', '2017-10-11', 14),
(66, 'Momauk', '66', 1, '2017-10-11', '2017-10-11', 14),
(67, 'Shwegu', '67', 1, '2017-10-11', '2017-10-11', 14),
(68, 'Hpakant', '68', 1, '2017-10-11', '2017-10-11', 15),
(69, 'Mogaung', '69', 1, '2017-10-11', '2017-10-11', 15),
(70, 'Mohnyin', '70', 1, '2017-10-11', '2017-10-11', 15),
(71, 'Chipwi', '71', 1, '2017-10-11', '2017-10-11', 16),
(72, 'Injangyang', '72', 1, '2017-10-11', '2017-10-11', 16),
(73, 'Myitkyina', '73', 1, '2017-10-11', '2017-10-11', 16),
(74, 'Tanai', '74', 1, '2017-10-11', '2017-10-11', 16),
(75, 'Tsawlaw', '75', 1, '2017-10-11', '2017-10-11', 16),
(76, 'Waingmaw', '76', 1, '2017-10-11', '2017-10-11', 16),
(77, 'Khaunglanhpu', '77', 1, '2017-10-11', '2017-10-11', 17),
(78, 'Machanbaw', '78', 1, '2017-10-11', '2017-10-11', 17),
(79, 'Nawngmun', '79', 1, '2017-10-11', '2017-10-11', 17),
(80, 'Putao', '80', 1, '2017-10-11', '2017-10-11', 17),
(81, 'Sumprabum', '81', 1, '2017-10-11', '2017-10-11', 17),
(82, 'Bawlakhe', '82', 1, '2017-10-11', '2017-10-11', 18),
(83, 'Hpasawng', '83', 1, '2017-10-11', '2017-10-11', 18),
(84, 'Mese', '84', 1, '2017-10-11', '2017-10-11', 18),
(85, 'Demoso', '85', 1, '2017-10-11', '2017-10-11', 19),
(86, 'Hpruso', '86', 1, '2017-10-11', '2017-10-11', 19),
(87, 'Loikaw', '87', 1, '2017-10-11', '2017-10-11', 19),
(88, 'Shadaw', '88', 1, '2017-10-11', '2017-10-11', 19),
(89, 'Hlaingbwe', '89', 1, '2017-10-11', '2017-10-11', 20),
(90, 'Hpa-An', '90', 1, '2017-10-11', '2017-10-11', 20),
(91, 'Thandaunggyi', '91', 1, '2017-10-11', '2017-10-11', 20),
(92, 'Hpapun', '92', 1, '2017-10-11', '2017-10-11', 21),
(93, 'Kawkareik', '93', 1, '2017-10-11', '2017-10-11', 22),
(94, 'Kyainseikgyi', '94', 1, '2017-10-11', '2017-10-11', 22),
(95, 'Myawaddy', '95', 1, '2017-10-11', '2017-10-11', 23),
(96, 'Gangaw', '96', 1, '2017-10-11', '2017-10-11', 24),
(97, 'Saw', '97', 1, '2017-10-11', '2017-10-11', 24),
(98, 'Tilin', '98', 1, '2017-10-11', '2017-10-11', 24),
(99, 'Chauk', '99', 1, '2017-10-11', '2017-10-11', 25),
(100, 'Magway', '100', 1, '2017-10-11', '2017-10-11', 25),
(101, 'Myothit', '101', 1, '2017-10-11', '2017-10-11', 25),
(102, 'Natmauk', '102', 1, '2017-10-11', '2017-10-11', 25),
(103, 'Taungdwingyi', '103', 1, '2017-10-11', '2017-10-11', 25),
(104, 'Yenangyaung', '104', 1, '2017-10-11', '2017-10-11', 25),
(105, 'Minbu', '105', 1, '2017-10-11', '2017-10-11', 26),
(106, 'Ngape', '106', 1, '2017-10-11', '2017-10-11', 26),
(107, 'Pwintbyu', '107', 1, '2017-10-11', '2017-10-11', 26),
(108, 'Salin', '108', 1, '2017-10-11', '2017-10-11', 26),
(109, 'Sidoktaya', '109', 1, '2017-10-11', '2017-10-11', 26),
(110, 'Myaing', '110', 1, '2017-10-11', '2017-10-11', 27),
(111, 'Pakokku', '111', 1, '2017-10-11', '2017-10-11', 27),
(112, 'Pauk', '112', 1, '2017-10-11', '2017-10-11', 27),
(113, 'Seikphyu', '113', 1, '2017-10-11', '2017-10-11', 27),
(114, 'Yesagyo', '114', 1, '2017-10-11', '2017-10-11', 27),
(115, 'Aunglan', '115', 1, '2017-10-11', '2017-10-11', 28),
(116, 'Kamma', '116', 1, '2017-10-11', '2017-10-11', 28),
(117, 'Mindon', '117', 1, '2017-10-11', '2017-10-11', 28),
(118, 'Sinbaungwe', '118', 1, '2017-10-11', '2017-10-11', 28),
(119, 'Thayet', '119', 1, '2017-10-11', '2017-10-11', 28),
(120, 'Kyaukse', '120', 1, '2017-10-11', '2017-10-11', 29),
(121, 'Myittha', '121', 1, '2017-10-11', '2017-10-11', 29),
(122, 'Sintgaing', '122', 1, '2017-10-11', '2017-10-11', 29),
(123, 'Tada-U', '123', 1, '2017-10-11', '2017-10-11', 29),
(124, 'Amarapura', '124', 1, '2017-10-11', '2017-10-11', 30),
(125, 'Aungmyaythazan', '125', 1, '2017-10-11', '2017-10-11', 30),
(126, 'Chanayethazan', '126', 1, '2017-10-11', '2017-10-11', 30),
(127, 'Chanmyathazi', '127', 1, '2017-10-11', '2017-10-11', 30),
(128, 'Mahaaungmyay', '128', 1, '2017-10-11', '2017-10-11', 30),
(129, 'Patheingyi', '129', 1, '2017-10-11', '2017-10-11', 30),
(130, 'Pyigyitagon', '130', 1, '2017-10-11', '2017-10-11', 30),
(131, 'Mahlaing', '131', 1, '2017-10-11', '2017-10-11', 31),
(132, 'Meiktila', '132', 1, '2017-10-11', '2017-10-11', 31),
(133, 'Thazi', '133', 1, '2017-10-11', '2017-10-11', 31),
(134, 'Wundwin', '134', 1, '2017-10-11', '2017-10-11', 31),
(135, 'Myingyan', '135', 1, '2017-10-11', '2017-10-11', 32),
(136, 'Natogyi', '136', 1, '2017-10-11', '2017-10-11', 32),
(137, 'Ngazun', '137', 1, '2017-10-11', '2017-10-11', 32),
(138, 'Taungtha', '138', 1, '2017-10-11', '2017-10-11', 32),
(139, 'Lewe', '139', 1, '2017-10-11', '2017-10-11', 33),
(140, 'Pyinmana', '140', 1, '2017-10-11', '2017-10-11', 33),
(141, 'Tatkon', '141', 1, '2017-10-11', '2017-10-11', 33),
(142, 'Kyaukpadaung', '142', 1, '2017-10-11', '2017-10-11', 34),
(143, 'Nyaung-U', '143', 1, '2017-10-11', '2017-10-11', 34),
(144, 'Madaya', '144', 1, '2017-10-11', '2017-10-11', 35),
(145, 'Mogoke', '145', 1, '2017-10-11', '2017-10-11', 35),
(146, 'Pyinoolwin', '146', 1, '2017-10-11', '2017-10-11', 35),
(147, 'Singu', '147', 1, '2017-10-11', '2017-10-11', 35),
(148, 'Thabeikkyin', '148', 1, '2017-10-11', '2017-10-11', 35),
(149, 'Pyawbwe', '149', 1, '2017-10-11', '2017-10-11', 36),
(150, 'Yamethin', '150', 1, '2017-10-11', '2017-10-11', 36),
(151, 'Chaungzon', '151', 1, '2017-10-11', '2017-10-11', 37),
(152, 'Kyaikmaraw', '152', 1, '2017-10-11', '2017-10-11', 37),
(153, 'Mawlamyine', '153', 1, '2017-10-11', '2017-10-11', 37),
(154, 'Mudon', '154', 1, '2017-10-11', '2017-10-11', 37),
(155, 'Thanbyuzayat', '155', 1, '2017-10-11', '2017-10-11', 37),
(156, 'Ye', '156', 1, '2017-10-11', '2017-10-11', 37),
(157, 'Bilin', '157', 1, '2017-10-11', '2017-10-11', 38),
(158, 'Kyaikto', '158', 1, '2017-10-11', '2017-10-11', 38),
(159, 'Paung', '159', 1, '2017-10-11', '2017-10-11', 38),
(160, 'Thaton', '160', 1, '2017-10-11', '2017-10-11', 38),
(161, 'Ann', '161', 1, '2017-10-11', '2017-10-11', 39),
(162, 'Kyaukpyu', '162', 1, '2017-10-11', '2017-10-11', 39),
(163, 'Munaung', '163', 1, '2017-10-11', '2017-10-11', 39),
(164, 'Ramree', '164', 1, '2017-10-11', '2017-10-11', 39),
(165, 'Buthidaung', '165', 1, '2017-10-11', '2017-10-11', 40),
(166, 'Maungdaw', '166', 1, '2017-10-11', '2017-10-11', 40),
(167, 'Pauktaw', '167', 1, '2017-10-11', '2017-10-11', 41),
(168, 'Ponnagyun', '168', 1, '2017-10-11', '2017-10-11', 41),
(169, 'Rathedaung', '169', 1, '2017-10-11', '2017-10-11', 41),
(170, 'Sittwe', '170', 1, '2017-10-11', '2017-10-11', 41),
(171, 'Gwa', '171', 1, '2017-10-11', '2017-10-11', 42),
(172, 'Thandwe', '172', 1, '2017-10-11', '2017-10-11', 42),
(173, 'Toungup', '173', 1, '2017-10-11', '2017-10-11', 42),
(174, 'Kyauktaw', '174', 1, '2017-10-11', '2017-10-11', 43),
(175, 'Minbya', '175', 1, '2017-10-11', '2017-10-11', 43),
(176, 'Mrauk-U', '176', 1, '2017-10-11', '2017-10-11', 43),
(177, 'Myebon', '177', 1, '2017-10-11', '2017-10-11', 43),
(178, 'Hkamti', '178', 1, '2017-10-11', '2017-10-11', 44),
(179, 'Homalin', '179', 1, '2017-10-11', '2017-10-11', 44),
(180, 'Lahe', '180', 1, '2017-10-11', '2017-10-11', 44),
(181, 'Lay Shi', '181', 1, '2017-10-11', '2017-10-11', 44),
(182, 'Nanyun', '182', 1, '2017-10-11', '2017-10-11', 44),
(183, 'Kanbalu', '183', 1, '2017-10-11', '2017-10-11', 45),
(184, 'Kyunhla', '184', 1, '2017-10-11', '2017-10-11', 45),
(185, 'Taze', '185', 1, '2017-10-11', '2017-10-11', 45),
(186, 'Ye-U', '186', 1, '2017-10-11', '2017-10-11', 45),
(187, 'Kale', '187', 1, '2017-10-11', '2017-10-11', 46),
(188, 'Kalewa', '188', 1, '2017-10-11', '2017-10-11', 46),
(189, 'Mingin', '189', 1, '2017-10-11', '2017-10-11', 46),
(190, 'Banmauk', '190', 1, '2017-10-11', '2017-10-11', 47),
(191, 'Indaw', '191', 1, '2017-10-11', '2017-10-11', 47),
(192, 'Katha', '192', 1, '2017-10-11', '2017-10-11', 47),
(193, 'Kawlin', '193', 1, '2017-10-11', '2017-10-11', 47),
(194, 'Pinlebu', '194', 1, '2017-10-11', '2017-10-11', 47),
(195, 'Tigyaing', '195', 1, '2017-10-11', '2017-10-11', 47),
(196, 'Wuntho', '196', 1, '2017-10-11', '2017-10-11', 47),
(197, 'Mawlaik', '197', 1, '2017-10-11', '2017-10-11', 48),
(198, 'Paungbyin', '198', 1, '2017-10-11', '2017-10-11', 48),
(199, 'Ayadaw', '199', 1, '2017-10-11', '2017-10-11', 49),
(200, 'Budalin', '200', 1, '2017-10-11', '2017-10-11', 49),
(201, 'Chaung-U', '201', 1, '2017-10-11', '2017-10-11', 49),
(202, 'Monywa', '202', 1, '2017-10-11', '2017-10-11', 49),
(203, 'Myaung', '203', 1, '2017-10-11', '2017-10-11', 50),
(204, 'Myinmu', '204', 1, '2017-10-11', '2017-10-11', 50),
(205, 'Sagaing', '205', 1, '2017-10-11', '2017-10-11', 50),
(206, 'Khin-U', '206', 1, '2017-10-11', '2017-10-11', 51),
(207, 'Shwebo', '207', 1, '2017-10-11', '2017-10-11', 51),
(208, 'Tabayin', '208', 1, '2017-10-11', '2017-10-11', 51),
(209, 'Wetlet', '209', 1, '2017-10-11', '2017-10-11', 51),
(210, 'Tamu', '210', 1, '2017-10-11', '2017-10-11', 52),
(211, 'Kani', '211', 1, '2017-10-11', '2017-10-11', 53),
(212, 'Pale', '212', 1, '2017-10-11', '2017-10-11', 53),
(213, 'Salingyi', '213', 1, '2017-10-11', '2017-10-11', 53),
(214, 'Yinmabin', '214', 1, '2017-10-11', '2017-10-11', 53),
(215, 'Kengtung', '215', 1, '2017-10-11', '2017-10-11', 54),
(216, 'Mongkhet', '216', 1, '2017-10-11', '2017-10-11', 54),
(217, 'Mongla', '217', 1, '2017-10-11', '2017-10-11', 54),
(218, 'Mongyang', '218', 1, '2017-10-11', '2017-10-11', 54),
(219, 'Monghpyak', '219', 1, '2017-10-11', '2017-10-11', 55),
(220, 'Mongyawng', '220', 1, '2017-10-11', '2017-10-11', 55),
(221, 'Monghsat', '221', 1, '2017-10-11', '2017-10-11', 56),
(222, 'Mongping', '222', 1, '2017-10-11', '2017-10-11', 56),
(223, 'Mongton', '223', 1, '2017-10-11', '2017-10-11', 56),
(224, 'Tachileik', '224', 1, '2017-10-11', '2017-10-11', 57),
(225, 'Kunlong', '225', 1, '2017-10-11', '2017-10-11', 58),
(226, 'Hsipaw', '226', 1, '2017-10-11', '2017-10-11', 59),
(227, 'Kyaukme', '227', 1, '2017-10-11', '2017-10-11', 59),
(228, 'Manton', '228', 1, '2017-10-11', '2017-10-11', 59),
(229, 'Namhsan', '229', 1, '2017-10-11', '2017-10-11', 59),
(230, 'Namtu', '230', 1, '2017-10-11', '2017-10-11', 59),
(231, 'Nawnghkio', '231', 1, '2017-10-11', '2017-10-11', 59),
(232, 'Hseni', '232', 1, '2017-10-11', '2017-10-11', 60),
(233, 'Lashio', '233', 1, '2017-10-11', '2017-10-11', 60),
(234, 'Mongyai', '234', 1, '2017-10-11', '2017-10-11', 60),
(235, 'Tangyan', '235', 1, '2017-10-11', '2017-10-11', 60),
(236, 'Konkyan', '236', 1, '2017-10-11', '2017-10-11', 61),
(237, 'Laukkaing', '237', 1, '2017-10-11', '2017-10-11', 61),
(238, 'Kutkai', '238', 1, '2017-10-11', '2017-10-11', 62),
(239, 'Muse', '239', 1, '2017-10-11', '2017-10-11', 62),
(240, 'Namhkan', '240', 1, '2017-10-11', '2017-10-11', 62),
(241, 'Hopang', '241', 1, '2017-10-11', '2017-10-11', 63),
(242, 'Mongmao', '242', 1, '2017-10-11', '2017-10-11', 63),
(243, 'Pangwaun', '243', 1, '2017-10-11', '2017-10-11', 63),
(244, 'Matman', '244', 1, '2017-10-11', '2017-10-11', 64),
(245, 'Namphan', '245', 1, '2017-10-11', '2017-10-11', 64),
(246, 'Pangsang', '246', 1, '2017-10-11', '2017-10-11', 64),
(247, 'Mabein', '247', 1, '2017-10-11', '2017-10-11', 65),
(248, 'Mongmit', '248', 1, '2017-10-11', '2017-10-11', 65),
(249, 'Langkho', '249', 1, '2017-10-11', '2017-10-11', 66),
(250, 'Mawkmai', '250', 1, '2017-10-11', '2017-10-11', 66),
(251, 'Mongnai', '251', 1, '2017-10-11', '2017-10-11', 66),
(252, 'Mongpan', '252', 1, '2017-10-11', '2017-10-11', 66),
(253, 'Kunhing', '253', 1, '2017-10-11', '2017-10-11', 67),
(254, 'Kyethi', '254', 1, '2017-10-11', '2017-10-11', 67),
(255, 'Laihka', '255', 1, '2017-10-11', '2017-10-11', 67),
(256, 'Loilen', '256', 1, '2017-10-11', '2017-10-11', 67),
(257, 'Monghsu', '257', 1, '2017-10-11', '2017-10-11', 67),
(258, 'Mongkaung', '258', 1, '2017-10-11', '2017-10-11', 67),
(259, 'Nansang', '259', 1, '2017-10-11', '2017-10-11', 67),
(260, 'Hopong', '260', 1, '2017-10-11', '2017-10-11', 68),
(261, 'Hsihseng', '261', 1, '2017-10-11', '2017-10-11', 68),
(262, 'Kalaw', '262', 1, '2017-10-11', '2017-10-11', 68),
(263, 'Lawksawk', '263', 1, '2017-10-11', '2017-10-11', 68),
(264, 'Nyaungshwe', '264', 1, '2017-10-11', '2017-10-11', 68),
(265, 'Pekon', '265', 1, '2017-10-11', '2017-10-11', 68),
(266, 'Pindaya', '266', 1, '2017-10-11', '2017-10-11', 68),
(267, 'Pinlaung', '267', 1, '2017-10-11', '2017-10-11', 68),
(268, 'Taunggyi', '268', 1, '2017-10-11', '2017-10-11', 68),
(269, 'Ywangan', '269', 1, '2017-10-11', '2017-10-11', 68),
(270, 'Dawei', '270', 1, '2017-10-11', '2017-10-11', 69),
(271, 'Launglon', '271', 1, '2017-10-11', '2017-10-11', 69),
(272, 'Thayetchaung', '272', 1, '2017-10-11', '2017-10-11', 69),
(273, 'Yebyu', '273', 1, '2017-10-11', '2017-10-11', 69),
(274, 'Bokpyin', '274', 1, '2017-10-11', '2017-10-11', 70),
(275, 'Kawthoung', '275', 1, '2017-10-11', '2017-10-11', 70),
(276, 'Kyunsu', '276', 1, '2017-10-11', '2017-10-11', 71),
(277, 'Myeik', '277', 1, '2017-10-11', '2017-10-11', 71),
(278, 'Palaw', '278', 1, '2017-10-11', '2017-10-11', 71),
(279, 'Tanintharyi ', '279', 1, '2017-10-11', '2017-10-11', 71),
(280, 'Botahtaung', '280', 1, '2017-10-11', '2017-10-11', 72),
(281, 'Dagon Myothit (East)', '281', 1, '2017-10-11', '2017-10-11', 72),
(282, 'Dagon Myothit (North)', '282', 1, '2017-10-11', '2017-10-11', 72),
(283, 'Dagon Myothit (Seikkan)', '283', 1, '2017-10-11', '2017-10-11', 72),
(284, 'Dagon Myothit (South)', '284', 1, '2017-10-11', '2017-10-11', 72),
(285, 'Dawbon', '285', 1, '2017-10-11', '2017-10-11', 72),
(286, 'Mingalar Taungnyunt', '286', 1, '2017-10-11', '2017-10-11', 72),
(287, 'Okkalapa (North)', '287', 1, '2017-10-11', '2017-10-11', 72),
(288, 'Pazundaung', '288', 1, '2017-10-11', '2017-10-11', 72),
(289, 'Okkalapa (South )', '289', 1, '2017-10-11', '2017-10-11', 72),
(290, 'Tamwe', '290', 1, '2017-10-11', '2017-10-11', 72),
(291, 'Thaketa', '291', 1, '2017-10-11', '2017-10-11', 72),
(292, 'Thingangyun', '292', 1, '2017-10-11', '2017-10-11', 72),
(293, 'Yankin', '293', 1, '2017-10-11', '2017-10-11', 72),
(294, 'Hlaingtharya', '294', 1, '2017-10-11', '2017-10-11', 73),
(295, 'Hlegu', '295', 1, '2017-10-11', '2017-10-11', 73),
(296, 'Hmawbi', '296', 1, '2017-10-11', '2017-10-11', 73),
(297, 'Htantabin', '297', 1, '2017-10-11', '2017-10-11', 73),
(298, 'Insein', '298', 1, '2017-10-11', '2017-10-11', 73),
(299, 'Mingaladon', '299', 1, '2017-10-11', '2017-10-11', 73),
(300, 'Shwepyithar', '300', 1, '2017-10-11', '2017-10-11', 73),
(301, 'Taikkyi', '301', 1, '2017-10-11', '2017-10-11', 73),
(302, 'Cocokyun', '302', 1, '2017-10-11', '2017-10-11', 74),
(303, 'Dala', '303', 1, '2017-10-11', '2017-10-11', 74),
(304, 'Kawhmu', '304', 1, '2017-10-11', '2017-10-11', 74),
(305, 'Kayan', '305', 1, '2017-10-11', '2017-10-11', 74),
(306, 'Kyauktan', '306', 1, '2017-10-11', '2017-10-11', 74),
(307, 'Seikkyi Kanaungto ', '307', 1, '2017-10-11', '2017-10-11', 74),
(308, 'Thanlyin', '308', 1, '2017-10-11', '2017-10-11', 74),
(309, 'Thongwa', '309', 1, '2017-10-11', '2017-10-11', 74),
(310, 'Twantay', '310', 1, '2017-10-11', '2017-10-11', 74),
(311, 'Kungyangon', '311', 1, '2017-10-11', '2017-10-11', 74),
(312, 'Ahlone', '312', 1, '2017-10-11', '2017-10-11', 75),
(313, 'Bahan', '313', 1, '2017-10-11', '2017-10-11', 75),
(314, 'Dagon', '314', 1, '2017-10-11', '2017-10-11', 75),
(315, 'Hlaing', '315', 1, '2017-10-11', '2017-10-11', 75),
(316, 'Kamaryut', '316', 1, '2017-10-11', '2017-10-11', 75),
(317, 'Kyauktada', '317', 1, '2017-10-11', '2017-10-11', 75),
(318, 'Kyeemyindaing', '318', 1, '2017-10-11', '2017-10-11', 75),
(319, 'Lanmadaw', '319', 1, '2017-10-11', '2017-10-11', 75),
(320, 'Latha', '320', 1, '2017-10-11', '2017-10-11', 75),
(321, 'Mayangone', '321', 1, '2017-10-11', '2017-10-11', 75),
(322, 'Pabedan', '322', 1, '2017-10-11', '2017-10-11', 75),
(323, 'Sanchaung', '323', 1, '2017-10-11', '2017-10-11', 75),
(324, 'Seikkan', '324', 1, '2017-10-11', '2017-10-11', 75);

-- --------------------------------------------------------

--
-- Table structure for table `transitvisathailand`
--

CREATE TABLE `transitvisathailand` (
  `idtransitVisaThailand` int(11) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visa_idvisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transitvisathailand`
--

INSERT INTO `transitvisathailand` (`idtransitVisaThailand`, `detail`, `visa_idvisa`) VALUES
(6, 'visa issued by the country of destination (except traveling to own country)', 178),
(194, 'visa application form completely filled in', 177),
(195, 'visa issued by the country of destination (except traveling to own country)', 177);

-- --------------------------------------------------------

--
-- Table structure for table `typeofvisa`
--

CREATE TABLE `typeofvisa` (
  `idtypeOfVisa` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeofvisa`
--

INSERT INTO `typeofvisa` (`idtypeOfVisa`, `name`) VALUES
(1, 'Diplomatic Visa'),
(2, 'Official Visa'),
(3, 'Courtesy Visa'),
(4, 'Non-Immigrant Visa'),
(5, 'Tourist Visa'),
(6, 'Transit Visa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user-a', 'ViK_prhCJsjGLPAlOBjFgq4FOFs5d-4A', '$2y$13$BJ0hBx.1ZUAMT7Ii7DtvPuhUYyWuY3gh8pm61SdIuGYmIJfpe2Vke', NULL, 'user-aa@gmail.com', 10, 1507705740, 1509522426),
(2, 'user-b', 'DYs9lCs0i5KUa63pj6ZGk_4wHj6_PZAA', '$2y$13$5eOxPmovPtoCFBXnLP43seoN8gr/8Hp4nNjKWFPM/DJtGqUD9NRf2', NULL, 'user-b@gmail.com', 10, 1507705773, 1507705773),
(3, 'user-c', 'gkn6pFwxD4_fc6nXa6_BU2hZQ2IOX_Np', '$2y$13$/LQBAV1iJ6KzEdsdsqfvh.U1CCDpx2fQ/352EQrnDgRydhy/sRTqG', NULL, 'user-c@gmail.com', 10, 1507705802, 1507705802),
(4, 'user-d', 'ZKbqigYKqj49mm4zNNk68tO4lV0FfWHi', '$2y$13$MNXTvR5qcrwLMg88D11iH.USrDV05HZcOzVGO/X/JC3PWybbJjMFy', NULL, 'user-d@gmail.com', 10, 1507705814, 1507705814),
(5, 'user-e', 'egZWgXqNnmbP4_-RXTPjA78nRm07Z8zr', '$2y$13$Wkluovj7YM7b7zuqhQOYXO9GVx9U.vH5/vu/.oo9OAlEYxudkM53.', NULL, 'user-e@dd.dd', 10, 1507708439, 1508379139),
(6, 'user-f', 'JOaoDF20H__h1Kh4HkbSr1_gdif64gV5', '$2y$13$ANkC3wmDf3mCA0qBT5i.muWYqeJ4ltHD2SsnFRb2pwAq3ZiJ8.nWu', NULL, 'user-f@user-f.v', 10, 1507709262, 1508379121);

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `idvisa` int(11) NOT NULL,
  `prefix` varchar(45) DEFAULT 'คำนำหน้า',
  `numberRequested` int(11) DEFAULT NULL,
  `typeOfVisaRequest` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `familyName` varchar(45) DEFAULT NULL,
  `nationalityBirth` varchar(255) DEFAULT NULL,
  `maritalStatus` varchar(255) DEFAULT NULL,
  `TypeTravelDocument` varchar(255) DEFAULT NULL,
  `noPerson` varchar(255) DEFAULT NULL,
  `issuedAt` varchar(255) DEFAULT NULL,
  `dateIssue` varchar(255) DEFAULT NULL,
  `expiryDate` varchar(255) DEFAULT NULL,
  `currentAddress` varchar(255) DEFAULT NULL,
  `telPerson` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `permanentAddress` varchar(255) DEFAULT NULL,
  `telPermanent` varchar(255) DEFAULT NULL,
  `minorChildren` varchar(255) DEFAULT NULL,
  `dateOfArrival` varchar(255) DEFAULT NULL,
  `traveling` varchar(255) DEFAULT NULL,
  `flightNo` varchar(255) DEFAULT NULL,
  `durationOfProposedStay` varchar(255) DEFAULT NULL,
  `dateOfPrevious` varchar(255) DEFAULT NULL,
  `countriesForTravel` varchar(255) DEFAULT NULL,
  `proposedAddressThai` varchar(255) DEFAULT NULL,
  `nameAddressLocal` varchar(255) DEFAULT NULL,
  `telThai` varchar(255) DEFAULT NULL,
  `applicationNoOfficial` varchar(255) DEFAULT NULL,
  `visaNoOfficial` varchar(255) DEFAULT NULL,
  `typeOfVisaOfficial` varchar(45) DEFAULT NULL,
  `categoryOfEntries` varchar(45) DEFAULT NULL,
  `numberOfEntriesOfficial` varchar(255) DEFAULT NULL,
  `dateOfIssueOfficial` varchar(255) DEFAULT NULL,
  `feeOfficial` varchar(255) DEFAULT NULL,
  `expOfficial` varchar(255) DEFAULT NULL,
  `documentsOfficial` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างวันที่',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'แก้ไขวันที่',
  `updated_by` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  `familytree_idfamilytree` int(11) NOT NULL,
  `purposeOfVisit` varchar(45) DEFAULT NULL,
  `nameaddressGuarantor` varchar(255) DEFAULT NULL,
  `telGuarantor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`idvisa`, `prefix`, `numberRequested`, `typeOfVisaRequest`, `firstName`, `middleName`, `familyName`, `nationalityBirth`, `maritalStatus`, `TypeTravelDocument`, `noPerson`, `issuedAt`, `dateIssue`, `expiryDate`, `currentAddress`, `telPerson`, `email`, `permanentAddress`, `telPermanent`, `minorChildren`, `dateOfArrival`, `traveling`, `flightNo`, `durationOfProposedStay`, `dateOfPrevious`, `countriesForTravel`, `proposedAddressThai`, `nameAddressLocal`, `telThai`, `applicationNoOfficial`, `visaNoOfficial`, `typeOfVisaOfficial`, `categoryOfEntries`, `numberOfEntriesOfficial`, `dateOfIssueOfficial`, `feeOfficial`, `expOfficial`, `documentsOfficial`, `picture`, `created_at`, `created_by`, `updated_at`, `updated_by`, `familytree_idfamilytree`, `purposeOfVisit`, `nameaddressGuarantor`, `telGuarantor`) VALUES
(177, 'Miss.', 99111, '6', 'john', 'angle', 'brothor', 'american', 'single', '-', '-', '11/22/2017', '11/12/2017', '10/12/2017', '88/88 Bangkok Thailand', '0856654215', 'email@email.email', '88/88 dd555 Bangkok Thailand', '024545545454', 'no', '11/29/2017', 'Fly', 'ABC8899', '30', '11/21/2017', 'Thai', 'dd 58/8787 Bangkok', 'param 9', '0888888888', '-', '856412544665', '-', '-', '-', '11/01/2017', '2500', '5000', '-', '177.jpg', NULL, NULL, 1510194148, 1, 1, 'Diplomatic Official', 'surat', '054546454'),
(178, '1', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(179, '0', 222, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(180, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(181, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(182, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(183, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(184, '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, '', NULL, NULL),
(185, 'Mr.', 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1509683991, 1, 1509683991, 1, 1, '', '', ''),
(186, 'Mr.', 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1509684006, 1, 1509684139, 1, 1, '', '', ''),
(187, 'Mr.', 11, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1509684255, 1, 1509684660, 1, 1, '', '', ''),
(188, '', 1, '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1509684303, 1, 1509684752, 1, 1, '', '', ''),
(190, 'Mr.', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '190.jpg', 1509684785, 1, 1509684959, 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `whetheraboard`
--

CREATE TABLE `whetheraboard` (
  `idwhetheraboard` int(11) NOT NULL,
  `yearFrom` varchar(45) DEFAULT NULL,
  `yearTo` varchar(45) DEFAULT NULL,
  `subjectTravelled` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `passport_idpassport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `whetheraboard`
--

INSERT INTO `whetheraboard` (`idwhetheraboard`, `yearFrom`, `yearTo`, `subjectTravelled`, `country`, `remark`, `passport_idpassport`) VALUES
(1, '23423', '234234', '234234', '324', '234', 2),
(2, '234234', '234234', '23423', '', '234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `basicdocuments`
--
ALTER TABLE `basicdocuments`
  ADD PRIMARY KEY (`idbasicDocuments`,`visa_idvisa`),
  ADD KEY `fk_basicDocuments_visa1_idx` (`visa_idvisa`);

--
-- Indexes for table `criminalcivillaw`
--
ALTER TABLE `criminalcivillaw`
  ADD PRIMARY KEY (`idcriminalCivillaw`,`passport_idpassport`),
  ADD KEY `fk_criminalCivillaw_passport1_idx` (`passport_idpassport`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`,`stateId`),
  ADD UNIQUE KEY `districtNameEN_UNIQUE` (`districtNameEN`),
  ADD UNIQUE KEY `districtNameMM_UNIQUE` (`districtNameMM`),
  ADD KEY `fk_district_state1_idx` (`stateId`);

--
-- Indexes for table `documentapplicant`
--
ALTER TABLE `documentapplicant`
  ADD PRIMARY KEY (`iddocumentApplicant`,`visa_idvisa`),
  ADD KEY `fk_documentApplicant_visa1_idx` (`visa_idvisa`);

--
-- Indexes for table `documentfirsttime`
--
ALTER TABLE `documentfirsttime`
  ADD PRIMARY KEY (`iddocumentFirstTime`,`visa_idvisa`),
  ADD KEY `fk_documentFirstTime_visa1_idx` (`visa_idvisa`);

--
-- Indexes for table `documenttouristvisa`
--
ALTER TABLE `documenttouristvisa`
  ADD PRIMARY KEY (`iddocumentTouristVisa`,`visa_idvisa`),
  ADD KEY `fk_documentTouristVisa_visa1_idx` (`visa_idvisa`);

--
-- Indexes for table `familytree`
--
ALTER TABLE `familytree`
  ADD PRIMARY KEY (`idfamilytree`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`idpassport`),
  ADD KEY `fk_passport_familytree1_idx` (`familytree_idfamilytree`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateId`),
  ADD UNIQUE KEY `statename_UNIQUE` (`stateNameEN`);

--
-- Indexes for table `studied`
--
ALTER TABLE `studied`
  ADD PRIMARY KEY (`idstudied`),
  ADD KEY `fk_studied_passport1_idx` (`passport_idpassport`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`townshipId`,`districtId`),
  ADD UNIQUE KEY `townshipName_UNIQUE` (`townshipNameEN`),
  ADD UNIQUE KEY `townshipNameMM_UNIQUE` (`townshipNameMM`),
  ADD KEY `fk_township_district_idx` (`districtId`);

--
-- Indexes for table `transitvisathailand`
--
ALTER TABLE `transitvisathailand`
  ADD PRIMARY KEY (`idtransitVisaThailand`,`visa_idvisa`),
  ADD KEY `fk_transitVisaThailand_visa1_idx` (`visa_idvisa`);

--
-- Indexes for table `typeofvisa`
--
ALTER TABLE `typeofvisa`
  ADD PRIMARY KEY (`idtypeOfVisa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`idvisa`),
  ADD KEY `fk_visa_familytree1_idx` (`familytree_idfamilytree`);

--
-- Indexes for table `whetheraboard`
--
ALTER TABLE `whetheraboard`
  ADD PRIMARY KEY (`idwhetheraboard`,`passport_idpassport`),
  ADD KEY `fk_whetheraboard_passport1_idx` (`passport_idpassport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basicdocuments`
--
ALTER TABLE `basicdocuments`
  MODIFY `idbasicDocuments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `criminalcivillaw`
--
ALTER TABLE `criminalcivillaw`
  MODIFY `idcriminalCivillaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `documentapplicant`
--
ALTER TABLE `documentapplicant`
  MODIFY `iddocumentApplicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `documentfirsttime`
--
ALTER TABLE `documentfirsttime`
  MODIFY `iddocumentFirstTime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `documenttouristvisa`
--
ALTER TABLE `documenttouristvisa`
  MODIFY `iddocumentTouristVisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `familytree`
--
ALTER TABLE `familytree`
  MODIFY `idfamilytree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passport`
--
ALTER TABLE `passport`
  MODIFY `idpassport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studied`
--
ALTER TABLE `studied`
  MODIFY `idstudied` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `townshipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `transitvisathailand`
--
ALTER TABLE `transitvisathailand`
  MODIFY `idtransitVisaThailand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `typeofvisa`
--
ALTER TABLE `typeofvisa`
  MODIFY `idtypeOfVisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `idvisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `whetheraboard`
--
ALTER TABLE `whetheraboard`
  MODIFY `idwhetheraboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `basicdocuments`
--
ALTER TABLE `basicdocuments`
  ADD CONSTRAINT `fk_basicDocuments_visa1` FOREIGN KEY (`visa_idvisa`) REFERENCES `visa` (`idvisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `criminalcivillaw`
--
ALTER TABLE `criminalcivillaw`
  ADD CONSTRAINT `fk_criminalCivillaw_passport1` FOREIGN KEY (`passport_idpassport`) REFERENCES `passport` (`idpassport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_state1` FOREIGN KEY (`stateId`) REFERENCES `state` (`stateId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documentapplicant`
--
ALTER TABLE `documentapplicant`
  ADD CONSTRAINT `fk_documentApplicant_visa1` FOREIGN KEY (`visa_idvisa`) REFERENCES `visa` (`idvisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documentfirsttime`
--
ALTER TABLE `documentfirsttime`
  ADD CONSTRAINT `fk_documentFirstTime_visa1` FOREIGN KEY (`visa_idvisa`) REFERENCES `visa` (`idvisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documenttouristvisa`
--
ALTER TABLE `documenttouristvisa`
  ADD CONSTRAINT `fk_documentTouristVisa_visa1` FOREIGN KEY (`visa_idvisa`) REFERENCES `visa` (`idvisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passport`
--
ALTER TABLE `passport`
  ADD CONSTRAINT `fk_passport_familytree1` FOREIGN KEY (`familytree_idfamilytree`) REFERENCES `familytree` (`idfamilytree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studied`
--
ALTER TABLE `studied`
  ADD CONSTRAINT `fk_studied_passport1` FOREIGN KEY (`passport_idpassport`) REFERENCES `passport` (`idpassport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `township`
--
ALTER TABLE `township`
  ADD CONSTRAINT `fk_township_district` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transitvisathailand`
--
ALTER TABLE `transitvisathailand`
  ADD CONSTRAINT `fk_transitVisaThailand_visa1` FOREIGN KEY (`visa_idvisa`) REFERENCES `visa` (`idvisa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `fk_visa_familytree1` FOREIGN KEY (`familytree_idfamilytree`) REFERENCES `familytree` (`idfamilytree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `whetheraboard`
--
ALTER TABLE `whetheraboard`
  ADD CONSTRAINT `fk_whetheraboard_passport1` FOREIGN KEY (`passport_idpassport`) REFERENCES `passport` (`idpassport`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
