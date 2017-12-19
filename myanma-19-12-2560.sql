-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 07:47 AM
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
(304, 'passport of travel document of which validity is no less than 6 months', 177),
(305, 'visa application form completely filled in', 177),
(306, '2 recent colour photos (3.5 x 4.5 cm.)', 177),
(307, 'invitation letter (if any)', 177);

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
(59, 'appointment letter or certificate that applicant requires medical treatment in Thailand', 177);

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
(213, 'letter of employment (for employee) or company registration (for business owner)', 177),
(214, 'invitation letter (if any)', 177),
(215, 'confirmed round trip air ticket', 177);

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
(229, 'letter of employment (for employee) or', 177),
(230, 'company registration (for business owner) or', 177),
(231, 'guarantee/ invitation letter from company in Thailand (if any) or', 177),
(232, 'receipt or invoice from past procurement (if any)', 177);

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
(1, 'qrrr', 'johnn', '1917-08-28', 'Thai', 'Thai', '185445215454', 'thai', 'dd', 'Alive', 'sds', '3', '3', NULL, NULL, 1513580747, 1),
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
(1, 1, '2', '2', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-12-01', '', '1900-10-30', NULL, NULL, 1513133214, 1),
(2, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL);

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
(196, 'visa application form completely filled in', 177),
(197, 'visa issued by the country of destination (except traveling to own country)', 177);

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
(177, 'Miss.', 99111, '6', 'john', 'angle', 'brothor', 'american', 'single', '-', '-', '11/22/2017', '11/12/2017', '10/12/2017', '88/88 Bangkok Thailand', '0856654215', 'email@email.email', '88/88 dd555 Bangkok Thailand', '024545545454', 'no', '11/29/2017', 'Fly', 'ABC8899', '30', '11/21/2017', 'Thai', 'dd 58/8787 Bangkok', 'param 9', '0888888888', '-', '856412544665', '-', '-', '-', '11/01/2017', '2500', '5000', '-', '177.png', NULL, NULL, 1513134134, 1, 1, 'Diplomatic Official', 'surat', '054546454'),
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
-- Indexes for table `studied`
--
ALTER TABLE `studied`
  ADD PRIMARY KEY (`idstudied`),
  ADD KEY `fk_studied_passport1_idx` (`passport_idpassport`);

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
  MODIFY `idbasicDocuments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `criminalcivillaw`
--
ALTER TABLE `criminalcivillaw`
  MODIFY `idcriminalCivillaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documentapplicant`
--
ALTER TABLE `documentapplicant`
  MODIFY `iddocumentApplicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `documentfirsttime`
--
ALTER TABLE `documentfirsttime`
  MODIFY `iddocumentFirstTime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `documenttouristvisa`
--
ALTER TABLE `documenttouristvisa`
  MODIFY `iddocumentTouristVisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

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
-- AUTO_INCREMENT for table `studied`
--
ALTER TABLE `studied`
  MODIFY `idstudied` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transitvisathailand`
--
ALTER TABLE `transitvisathailand`
  MODIFY `idtransitVisaThailand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

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
