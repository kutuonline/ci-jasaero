-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 04:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id_app` int(5) NOT NULL,
  `app_name` varchar(50) NOT NULL,
  `app_desc` text NOT NULL,
  `app_url` varchar(50) NOT NULL,
  `app_icon` varchar(30) NOT NULL,
  `post_date_app` date NOT NULL,
  `post_time_app` time NOT NULL,
  `post_user_app` varchar(50) NOT NULL,
  `mod_date_app` date NOT NULL,
  `mod_time_app` time NOT NULL,
  `mod_user_app` varchar(50) NOT NULL,
  `isActiveApp` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id_app`, `app_name`, `app_desc`, `app_url`, `app_icon`, `post_date_app`, `post_time_app`, `post_user_app`, `mod_date_app`, `mod_time_app`, `mod_user_app`, `isActiveApp`) VALUES
(3, 'Inventory Gudang Berikat', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Storage of aircraft parts that involve the directorate general of customs and excise within a period of 1 year to be reissued with suspension of import duty.</span></span></p>', 'http://203.128.74.210:82/select.php', 'fa fa-university', '2018-09-07', '21:02:57', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(4, 'Tools Calibration System', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Checking and setting the accuracy of the measuring instrument by comparing it to the standard / benchmark.</span></span></p>', 'http://203.128.74.210:82/jasaerocal/', 'fa fa-adjust', '2018-09-07', '21:07:01', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(5, 'Safety Management System', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Record information about accidents and / or incidents to immediately get further treatment.</span></span></p>', 'http://203.128.74.210:82/jasaerosms/', 'fa fa-envelope', '2018-09-07', '21:11:06', 'Andriansyah Doni', '2018-09-07', '21:34:57', 'Andriansyah Doni', 'Y'),
(6, 'Quality Information System', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Ensure that every engineer and mechanic is trained and has good quality standards in carrying out aircraft maintenance.</span></span></p>', 'http://203.128.74.210:82/jasaeroaps/', 'line-chart', '2018-09-07', '21:15:39', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(8, 'CCTV Jakarta', '', 'http://202.92.201.50/doc/page/login.asp?_153654342', '', '2018-09-09', '14:54:38', 'Andriansyah Doni', '2018-09-10', '08:50:14', 'Andriansyah Doni', 'Y'),
(9, 'CCTV Surabaya', '', 'http://36.81.190.222:82', '', '2018-09-09', '15:27:12', 'Andriansyah Doni', '2018-09-09', '15:54:32', 'Andriansyah Doni', 'Y'),
(10, 'CCTV Denpasar', '', 'http://36.75.214.137/doc/page/login.asp', '', '2018-09-09', '15:34:14', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id_career` int(5) NOT NULL,
  `title_career` varchar(50) NOT NULL,
  `desc_career` text NOT NULL,
  `closing_date` date NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  `post_user` varchar(50) NOT NULL,
  `mod_date` date NOT NULL,
  `mod_time` time NOT NULL,
  `mod_user` varchar(50) NOT NULL,
  `isActiveCareer` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id_career`, `title_career`, `desc_career`, `closing_date`, `post_date`, `post_time`, `post_user`, `mod_date`, `mod_time`, `mod_user`, `isActiveCareer`) VALUES
(1, 'GSE Technician', '<p>Department: Line Support &amp; GSE CGK</p>\r\n<p><strong>Job Qualification:</strong></p>\r\n<ol>\r\n<li>Gender : Male</li>\r\n<li>Education : Vocational high school (SMK) / Diploma / Bachelor degree (sarjana)</li>\r\n<li>Working experience : 3 years (non-management &amp; non-supervisor)</li>\r\n</ol>\r\n<p><strong>Other Qualification</strong> (ability &amp; competencies) :</p>\r\n<ul>\r\n<li>Driving license A</li>\r\n<li>Fluent in English, both oral and written</li>\r\n<li>Able to work hard and under pressure</li>\r\n</ul>\r\n<p><strong>Job Description</strong>:</p>\r\n<p>Support day to day operations of GSE equipment to include the following :</p>\r\n<ol>\r\n<li>Keep monitoring of GSE equipment.</li>\r\n<li>Maintain GSE equipment service ability level.</li>\r\n<li>Coordinate GSE conditions among GSE station.</li>\r\n<li>Provide solution and rectification on defective GSE.</li>\r\n<li>Perform GSE maintenance as per maintenance program as per manufacture requirement and company policy.</li>\r\n<li>Liaise with GA and/or vendor on spare part request to kept GSE reliable.</li>\r\n</ol>\r\n<p>Work schedule : Monday to Friday</p>\r\n<p>Language : Bahasa Indonesia</p>\r\n<p>Allowance : Health insurance</p>\r\n<p>&nbsp;</p>\r\n<p>If you are suitable to our requirements, please send your application to our official Email address :</p>\r\n<p><strong><span style=\"color: #0000ff;\"><a style=\"color: #0000ff;\" title=\"Click to Send CV\" href=\"mailto:recruitment@jas-aero.com\">recruitment@jas-aero.com</a></span></strong></p>', '0000-00-00', '2018-09-01', '19:38:02', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `msg_status` enum('New','Read','Replied') NOT NULL DEFAULT 'New',
  `post_date_msg` date NOT NULL,
  `post_time_msg` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `full_name`, `email`, `msg`, `msg_status`, `post_date_msg`, `post_time_msg`) VALUES
(1, 'doni', 'andrean.devz@gmail.com', 'tes', 'New', '2018-09-13', '09:37:42'),
(2, 'doni andriansyah', 'andrean.devz@gmail.com', 'tess 2', 'New', '2018-09-13', '09:50:13'),
(3, 'ilman', 'ilman@jas-aero.com', 'tes', 'New', '2018-09-13', '09:51:08'),
(4, 'renata', 'andrean.devz@gmail.com', 'tea', 'New', '2018-09-13', '09:53:11'),
(5, 'doni', 'renata@gmail.com', 'ts', 'New', '2018-09-13', '09:54:28'),
(6, 'doni andriansyah', 'renata@gmail.com', 'tes', 'New', '2018-09-13', '09:56:49'),
(7, 'renata', 'renata@gmail.com', 'tes', 'New', '2018-09-13', '09:57:17'),
(8, 'reno', 'andrean.devz@gmail.com', 'tes', 'New', '2018-09-13', '09:58:25'),
(9, 'puput', 'puput@gmail.com', 'tes', 'New', '2018-09-13', '09:59:43'),
(10, 'doni andriansyah', 'aurel@gmail.com', 'tes', 'New', '2018-09-13', '10:00:36'),
(11, 'renata', 'renata@gmail.com', '[removed]tes[removed]', 'New', '2018-09-13', '10:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(5) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_logo` varchar(100) NOT NULL,
  `post_date_cust` date NOT NULL,
  `post_time_cust` time NOT NULL,
  `post_user_cust` varchar(50) NOT NULL,
  `mod_date_cust` date NOT NULL,
  `mod_time_cust` time NOT NULL,
  `mod_user_cust` varchar(50) NOT NULL,
  `isActiveCust` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cust`, `cust_name`, `cust_logo`, `post_date_cust`, `post_time_cust`, `post_user_cust`, `mod_date_cust`, `mod_time_cust`, `mod_user_cust`, `isActiveCust`) VALUES
(2, 'Air Asia Indonesia', 'file_1536132579.png', '2018-09-05', '14:29:39', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(3, 'Singapore Airlines', 'file_1536132756.png', '2018-09-05', '14:32:36', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(4, 'Singapore Airlines Cargo', 'file_1536133199.png', '2018-09-05', '14:39:59', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(5, 'Silk Air', 'file_1536133272.png', '2018-09-05', '14:41:12', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(6, 'Tiger Air', 'file_1536133369.png', '2018-09-05', '14:42:49', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(7, 'Etihad Airways', 'file_1536133407.png', '2018-09-05', '14:43:27', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(8, 'Qatar Airways', 'file_1536133467.png', '2018-09-05', '14:44:27', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(9, 'Emirates', 'file_1536133666.png', '2018-09-05', '14:47:46', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(10, 'Kuwait Airways', 'file_1536133694.png', '2018-09-05', '14:48:14', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(11, 'Egypt Air', 'file_1536133742.png', '2018-09-05', '14:49:02', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(12, 'Oman Air', 'file_1536133794.png', '2018-09-05', '14:49:54', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(13, 'Korean Air', 'file_1536133859.png', '2018-09-05', '14:50:59', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(14, 'Air Asia', 'file_1536133897.png', '2018-09-05', '14:51:37', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(15, 'Royal Brunei', 'file_1536133925.png', '2018-09-05', '14:52:05', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(16, 'Thai Airways', 'file_1536134009.png', '2018-09-05', '14:53:29', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(17, 'Eva Air', 'file_1536134055.png', '2018-09-05', '14:54:15', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(18, 'Jetstar Asia', 'file_1536134092.png', '2018-09-05', '14:54:52', 'Andriansyah Doni', '2018-09-05', '15:01:56', 'Andriansyah Doni', 'Y'),
(19, 'Philippine Airlines', 'file_1536134167.png', '2018-09-05', '14:56:07', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(20, 'Cebu Pacific', 'file_1536134293.png', '2018-09-05', '14:58:13', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(21, 'Vietnam Airlines', 'file_1536134326.png', '2018-09-05', '14:58:46', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(22, 'China Airlines', 'file_1536134351.jpg', '2018-09-05', '14:59:11', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(23, 'Malaysia Airlines', 'file_1536134447.jpg', '2018-09-05', '15:00:47', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(24, 'Jetstar', 'file_1536134507.png', '2018-09-05', '15:01:47', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(25, 'Air New Zealand', 'file_1536134540.png', '2018-09-05', '15:02:20', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(26, 'FedEx', 'file_1536134571.png', '2018-09-05', '15:02:51', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(27, 'Turkish Airlines', 'file_1536134603.png', '2018-09-05', '15:03:23', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(28, 'Hifly', 'file_1536134684.png', '2018-09-05', '15:04:44', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id_facility` int(5) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `desc_facility` text NOT NULL,
  `img_facility` varchar(100) NOT NULL,
  `cr_dt_facility` date NOT NULL,
  `cr_tm_facility` time NOT NULL,
  `cr_user_facility` varchar(50) NOT NULL,
  `mod_dt_facility` date NOT NULL,
  `mod_tm_facility` time NOT NULL,
  `mod_user_facility` varchar(50) NOT NULL,
  `isActiveFacility` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id_facility`, `facility_name`, `desc_facility`, `img_facility`, `cr_dt_facility`, `cr_tm_facility`, `cr_user_facility`, `mod_dt_facility`, `mod_tm_facility`, `mod_user_facility`, `isActiveFacility`) VALUES
(2, 'Bonded Store', '<p>JAE has bonded stores strategically within Operations in CGK, DPS and soon SUB airports to reduce spares transition time during replacement and has support from government agencies like customs to ensure secure environmentally controlled, storage facilities, minimize duty taxes and reduce import /export processing time. Maximum storage time is one (1) calendar year as per regulations. Expired spares will be returned to Airlines for renewal.</p>', '', '2018-08-31', '22:27:01', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_web`
--

CREATE TABLE `identitas_web` (
  `id_identitas` int(5) NOT NULL,
  `website_name` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `corp_name` varchar(50) NOT NULL,
  `corp_address` text NOT NULL,
  `postal_code` int(5) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `fax_no` varchar(25) NOT NULL,
  `pic_email1` varchar(50) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `pic_email2` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `pic_email3` varchar(50) NOT NULL,
  `email3` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `welcome_note` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `mod_dt_webid` date NOT NULL,
  `mod_tm_webid` time NOT NULL,
  `mod_user_webid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_web`
--

INSERT INTO `identitas_web` (`id_identitas`, `website_name`, `department`, `corp_name`, `corp_address`, `postal_code`, `phone_no`, `fax_no`, `pic_email1`, `email1`, `pic_email2`, `email2`, `pic_email3`, `email3`, `url`, `facebook`, `twitter`, `instagram`, `welcome_note`, `meta_desc`, `meta_keyword`, `mod_dt_webid`, `mod_tm_webid`, `mod_user_webid`) VALUES
(1, 'JAS Aero-Engineering Official Website', 'Marketing & Customer Relations Department', 'PT JAS Aero-Engineering Services', '<p>Wisma Soewarna 1st Floor, Soewarna Integrated Business Park, Soekarno-Hatta International Airport Cengkareng-Jakarta. Indonesia</p>', 19110, '+62 21 5591 1671-73', '+62 21 5591 3025', 'Indra', 'waskita@jas-aero.com', 'Irma', 'marketing@jas-aero.com', 'Ariesta', 'ariesta@jas-aero.com', 'https://jas-aero.com', '-', '-', '-', '<p>Provider of aircraft maintenance and repair services.</p>', '<p>jas aero, jas aero-engineering, jas aero-engineering services, jae, jas engineering, cas destination, ramp handling, ground support equipment, technical ramp, aircraft exterior interior cleaning, bonded store, DGCA Indonesia, FAA, EASA, CAAS, CASA, CAAM, CAAP, CAAT, CAASL, CAA ROC, MOLIT, UAE GCAA, QCAA, DGCA Turkish, PACA, Emirates Airline, Etihad Airline, Jetstar International, Jetstar Asia, Royal Brunei, Turkish Airline, Air New Zealand, Thai Airways, Indonesia Air Asia, Indonesia Air Asia X</p>', '<p>JAS, JAE, CAS, Engineering, Aircraft, Airline, Authorization, GSE, Aero, Emirates, Etihad, Brunei, Jetstar, Turkish, Airways, Indonesia, Thai, Asia, Air, ramp, handling, bonded, store, DGCA, FAA, EASA, CASA, MOLIT, UAE GCAA, CAAT, CAASL, PACA, QCAA, CAAS</p>', '2018-09-11', '13:36:32', 'Andriansyah Doni');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(5) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `news_slug` text NOT NULL,
  `desc_news` text NOT NULL,
  `vol_no_magz` varchar(30) NOT NULL,
  `img_news` varchar(100) NOT NULL,
  `post_date_news` date NOT NULL,
  `post_time_news` time NOT NULL,
  `post_user_news` varchar(50) NOT NULL,
  `mod_date_news` date NOT NULL,
  `mod_time_news` time NOT NULL,
  `mod_user_news` varchar(50) NOT NULL,
  `isActiveNews` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `headline`, `news_slug`, `desc_news`, `vol_no_magz`, `img_news`, `post_date_news`, `post_time_news`, `post_user_news`, `mod_date_news`, `mod_time_news`, `mod_user_news`, `isActiveNews`) VALUES
(2, 'Employee Profile - PLM', 'employee-profile-plm', '<p style=\"text-align: justify;\"><strong>Cecep Riswansyah - Station Superintendent PLM</strong></p>\r\n<p style=\"text-align: justify;\">Mr. Cecep joined with JAE since 6 May 2013 as Station Superintendent, before work in JAE Mr. Cecep was part of Batavia Air since 2005 until 2013. Where he worked in JAE PLM, Mr. Cecep only handled 2 airlines namely Indonesia Air Asia and Silk Air. Indonesia Air Asia added PLM station to their destinations ever since 2016. Jet Star Asia then followed suit with Scoot being the most current airline flying to PLM in November 2017.</p>\r\n<p style=\"text-align: justify;\">For this 14th anniversary, Mr. Cecep wished that for the next celebration the company will host the event in another station, and not only in CGK. They all want to experience the friendship and close bonding atmosphere together within our JAE family.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Nursam Rusman</strong> - <strong>Mechanic PLM</strong></p>\r\n<p style=\"text-align: justify;\">Nursam joined with JAE since 2015 and was directly assigned to Palembang (PLM) as a Mechanic. Nursam was a fresh graduate from Merpati Training Center when he joined with JAE. In this anniversary moment, Nursam wishes that JAE can add personnel to help PLM team to improve service handling because the flight frequency and number of customers is increasing.</p>', 'Aero News vol 8-2018', 'file_1536566186.jpg', '2018-09-01', '20:31:21', 'Andriansyah Doni', '2018-09-13', '13:19:20', 'Andriansyah Doni', 'Y'),
(3, 'Inaugural Flight of Scoot in PLM', 'inaugural-flight-of-scoot-in-plm', '<p style=\"text-align: justify;\">Tigerair was officially merged with Scoot on 25 July 2017 under the single brand of SCOOT. On 23 November 2017, Scoot officially landed in PLM with its A320 for the first time. The inaugural flight was handled smoothly with water cannons shooting over the aircraft welcoming Scoot&rsquo;s A320 as the aircraft taxied to the parking bay. Scoot added this new route from SIN to PLM with 4 scheduled flights a week on Tuesdays, Thursdays, Saturdays, and Sundays.</p>', 'Aero News vol 8-2018', 'file_1536566208.jpg', '2018-09-01', '20:27:35', 'Andriansyah Doni', '2018-09-13', '13:19:17', 'Andriansyah Doni', 'Y'),
(4, 'PT JAS Aero-Engineering Services Launched New Company Logo', 'pt-jas-aero-engineering-services-launched-new-company-logo', '<p style=\"text-align: justify;\">This year 2018, PT JAS Aero-Engineering Services (PTJAE) officially launched its new logo to strengthen the company identity, enhance the company&rsquo;s branding and add consistency according to existing regulations and legalities. We hope the new company logo will provide a positive impact to customers of PTJAE&rsquo;s identity as a significant Line Maintenance Handling Company and add to increased business growth. We are proud to be part of the PT JAE family, and an important member of the CAS Group and SIAEC.</p>', 'Aero News vol 8-2018', 'file_1536566227.jpg', '2018-09-01', '20:25:01', 'Andriansyah Doni', '2018-09-13', '13:19:12', 'Andriansyah Doni', 'Y'),
(5, 'Commercial Team Gathering with JAS, JAE, PMAD', 'commercial-team-gathering-with-jas-jae-pmad', '<p style=\"text-align: justify;\">On 17 January 2018, JAE and JAS were invited by PMAD for a CAS Group Commercial team lunch gathering which was held at the Purantara Building (PMAD). The purpose of this gathering was to enhance sharing between all CAS subsidiaries and business units (JAE, JAS, PMAD, CASB, CASC, and CASD). The gathering was hosted by Bapak Mingki F. Tanoed who is the PMAD Commercial Executive Director. The most interesting part was when PMAD brought everyone on a tour of their facility to introduce food processing for airlines standards which was led by Bapak Herman Sulaiman who is the PMAD Director of Operations. The tour was enlightening, entertaining and detailed. All participants learned much about Airline Catering processes and the strict hygiene standards required.</p>\r\n<p style=\"text-align: justify;\">Thank you PMAD for having us.</p>', 'Aero News vol 8-2018', 'file_1536566252.jpg', '2018-09-01', '20:22:22', 'Andriansyah Doni', '2018-09-13', '13:18:55', 'Andriansyah Doni', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(5) NOT NULL,
  `title_profile` varchar(50) NOT NULL,
  `desc_profile` text NOT NULL,
  `img_profile` varchar(100) NOT NULL,
  `cr_dt_profile` date NOT NULL,
  `cr_tm_profile` time NOT NULL,
  `cr_user_profile` varchar(50) NOT NULL,
  `mod_dt_profile` date NOT NULL,
  `mod_tm_profile` time NOT NULL,
  `mod_user_profile` varchar(50) NOT NULL,
  `isActiveProfile` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `title_profile`, `desc_profile`, `img_profile`, `cr_dt_profile`, `cr_tm_profile`, `cr_user_profile`, `mod_dt_profile`, `mod_tm_profile`, `mod_user_profile`, `isActiveProfile`) VALUES
(2, 'Our Profile', '<p>PT JAS Aero-Engineering Services (JAS Aero) is a subsidiary of CAS Group which operates as a leading provider of aircraft technical maintenance and repairs at 17 major Indonesian airports. JAS Aero provides services for large and small aircraft, including technical certification (CRS), maintenance and repairs, technical ramp equipment such as ground power units (GPU), air starter units (APU), air conditioning units (ACU), portable water and toilets space tools, as well as administration of bonded storage for wheels, spare parts, and consumables. JAS Aero is supported by 270 staff, including 80 licensed technicians and 50 mechanical workers. JAS Aero became part of the CAS Destination segment after revitalizing the CAS Group brand.</p>', 'file_1535726312.png', '2018-08-31', '21:38:32', 'Andriansyah Doni', '2018-09-07', '14:41:15', 'Andriansyah Doni', 'Y'),
(3, 'Our Approvals', '<p>PT JAS Aero-Engineering Services has 15 authorities consisting of DGCA Indonesia, FAA, EASA, CAAS, CASA, CAAM, CAAP, CAAT, CAASL, CAA ROC, MOLIT, UAE GCAA, QCAA, DGCA Turkish, and PACA.</p>\r\n<p>In addition we also have 10 quality airlines for several types of aircraft consisting of:</p>\r\n<ul>\r\n<li>Emirates - A320/B777/A380</li>\r\n<li>Etihad - A330/B777</li>\r\n<li>Jetstar International - A320/A321/B787</li>\r\n<li>Jetstar Asia - A320</li>\r\n<li>Royal Brunei - A319/A320/B787</li>\r\n<li>Turkish Airlines - A330</li>\r\n<li>Air New Zealand - B767</li>\r\n<li>Thai Airways - A320/A330/B747/B777/B787</li>\r\n<li>Indonesia Air Asia - A320</li>\r\n<li>Indonesia Air Asia X - A320</li>\r\n</ul>', 'file_1535726568.png', '2018-08-31', '21:42:48', 'Andriansyah Doni', '2018-09-07', '15:58:47', 'Andriansyah Doni', 'Y'),
(4, 'Our Customers', '<p>So far we have approximately 43 customers spread across Asia, Europe and Australia.</p>', 'file_1535726651.png', '2018-08-31', '21:44:11', 'Andriansyah Doni', '2018-09-07', '16:01:10', 'Andriansyah Doni', 'Y'),
(5, 'Our Capabilities', '<p>With the support of trained human resources and experience in serving our airlines, we are able to maintain several types of large-bodied aircrafts from Airbus and Boeing manufacturers.</p>\r\n<p>In addition, we are also able to maintain several types of aircraft engines including Rolls Royce Trent, GEnx Series, and GP7200.</p>', 'file_1535726687.png', '2018-08-31', '21:44:47', 'Andriansyah Doni', '2018-09-07', '14:38:36', 'Andriansyah Doni', 'Y'),
(6, 'Our Stations', '<p>Until now PT JAS Aero-Engineering Service has 17 network stations spread across airports in Indonesia. Seven of them are supported by GSE. There are three major stations namely Cengkareng, Surabaya and Denpasar, the rest are small stations.</p>\r\n<p>Both large and small stations, as a whole, can serve large body aircraft such as Boeing and Airbus owned by foreign and local companies.</p>', 'file_1535726885.png', '2018-08-31', '21:48:05', 'Andriansyah Doni', '2018-09-07', '15:58:41', 'Andriansyah Doni', 'Y'),
(7, 'Our Commitment', '<p>Our company in focusing on quality and safety through Safety Management Systems (SMS) implemented in 2010, training by Approved Maintenance Training Organization (AMTO) part 147, Recurrent Training by Internally and from airlines operator. Continuing improvement to meet best industries practices, Integrated Quality Program (IQP) and Enhanced Safety Through Human Error Reduction (ESTHER) implemented in 2004.</p>\r\n<p>We have seamless coordination and communication from Maintenance Control Centre (24/7) and Production Control for short term tasks.</p>\r\n<p>Being part of SIAEC Line Maintenance International network of 25 global JVS, JAE will provide consistent services with best practices and of the highest quality.</p>', '', '2018-08-31', '21:50:15', 'Andriansyah Doni', '2018-09-07', '14:43:18', 'Andriansyah Doni', 'Y'),
(8, 'Our Services', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">We provide and support aircraft needs shortly after the aircraft landed.</span> With the support of trained mechanics, we make sure the aircraft is in good condition before taking off for the next flight.</span></p>', '', '2018-09-06', '20:26:52', 'Andriansyah Doni', '2018-09-06', '20:27:22', 'Andriansyah Doni', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_service` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post_slug` varchar(100) NOT NULL,
  `desc_service` text NOT NULL,
  `detail_service` text NOT NULL,
  `icon_service` varchar(40) NOT NULL,
  `img_service` varchar(100) NOT NULL,
  `cr_dt_service` date NOT NULL,
  `cr_tm_service` time NOT NULL,
  `cr_user_service` varchar(50) NOT NULL,
  `mod_dt_service` date NOT NULL,
  `mod_tm_service` time NOT NULL,
  `mod_user_service` varchar(50) NOT NULL,
  `isActiveService` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_service`, `title`, `post_slug`, `desc_service`, `detail_service`, `icon_service`, `img_service`, `cr_dt_service`, `cr_tm_service`, `cr_user_service`, `mod_dt_service`, `mod_tm_service`, `mod_user_service`, `isActiveService`) VALUES
(8, 'Certification', 'certification', '<p><span id=\"result_box\" class=\"\" lang=\"en\">Provide certification release to service before flight. E</span>nsure the aircraft is in a flight-worthy condition for the safety of passengers and crew.</p>', '<p style=\"text-align: justify;\">JAE Operations engineers under oversight and authorization from the Quality and Safety Department is responsible for administering compliance with regulatory authorities and safety standards in accordance with the company&rsquo;s Safety Management System.</p>\r\n<p style=\"text-align: justify;\">Also we are pleased to be the first company in Indonesia to certify the A350 series aircraft with RR Trent XWB.</p>', '-', 'file_1536506929.png', '2018-08-31', '11:11:02', 'Andriansyah Doni', '2018-09-12', '22:49:36', 'Andriansyah Doni', 'Y'),
(9, 'Bonded Store', 'bonded-store', '<p>Spare parts storage is located in several main stations such as CGK, DPS, and SUB immediately to reduce the replacement of spare parts with support from the government such as customs and excise.</p>', '<p style=\"text-align: justify;\">JAE has bonded stores strategically within Operations in CGK, DPS and soon SUB airports to reduce spares transition time during replacement and has support from government agencies like customs to ensure secure environmentally controlled, storage facilities, minimize duty taxes and reduce import /export processing time.</p>\r\n<p style=\"text-align: justify;\">Maximum storage time is one (1) calendar year as per regulations. Expired spares will be returned to Airlines for renewal.</p>', '-', 'file_11536507825.png', '2018-09-09', '22:43:45', 'Andriansyah Doni', '2018-09-12', '22:49:32', 'Andriansyah Doni', 'Y'),
(10, 'Ground Support Equipment (GSE)', 'ground-support-equipment-gse', '<p>Support aircraft operations when on the ground both before departure and after arriving at the airport. The functions of this equipment include ground power operations, aircraft mobility, and loading operations (passengers and goods).</p>', '<p style=\"text-align: justify;\"><strong>Ground Support Equipment&nbsp;(GSE)</strong> is the&nbsp;support equipment&nbsp;found at several airports usually on the ramp servicing area by the terminal and used to service the aircraft between flights during transits.</p>\r\n<p style=\"text-align: justify;\">Ground handling addresses the many service requirements of a passenger aircraft between the time it arrives at a terminal gate and the time it departs for its next flight. JAE places high value on speed, efficiency, and accuracy which are important in ground handling services in order to minimize the turnaround time.</p>\r\n<p style=\"text-align: justify;\">We have extensive capability to provide ground support equipment like:</p>\r\n<ul>\r\n<li style=\"text-align: justify;\">GPU: 180KVA</li>\r\n<li style=\"text-align: justify;\">ACU:&nbsp; 150 tons</li>\r\n<li style=\"text-align: justify;\">Air Starter units</li>\r\n<li style=\"text-align: justify;\">Portable water servicing truck</li>\r\n<li style=\"text-align: justify;\">Lavatory servicing truck</li>\r\n</ul>', '-', 'file_1536507252.png', '2018-08-31', '15:12:07', 'Andriansyah Doni', '2018-09-12', '22:49:27', 'Andriansyah Doni', 'Y'),
(11, 'Labor Utilization', 'labor-utilization', '<p>Checking the condition of the aircraft, both check the aircraft cabin and inspect the aircraft to make sure there is no damage to the aircraft. Supported by the availability of experienced and competent mechanics and engineers in several types of aircraft engines, also the availability of periodic training for mechanics and engineers.</p>', '<p style=\"text-align: justify;\">We provide aircraft checks as follows:</p>\r\n<ul>\r\n<li style=\"text-align: justify;\">Defect rectification</li>\r\n<li style=\"text-align: justify;\">A check</li>\r\n<li style=\"text-align: justify;\">Transit check</li>\r\n<li style=\"text-align: justify;\">Pre departure check</li>\r\n<li style=\"text-align: justify;\">Stay over check/daily check</li>\r\n</ul>', '-', 'file_1536506989.png', '2018-08-31', '15:08:24', 'Andriansyah Doni', '2018-09-12', '22:49:12', 'Andriansyah Doni', 'Y'),
(12, 'Technical Ramp', 'technical-ramp', '<p>Support that includes marshalling of aircraft to the parking stand and aircraft pushback.&nbsp;Services include fight deck communication, starting, moving aircraft, exterior and interior cleaning.</p>', '<p style=\"text-align: justify;\">Our technical ramp are include:</p>\r\n<p style=\"text-align: justify;\"><strong>Marshalling at arrival and/or departure</strong></p>\r\n<p style=\"text-align: justify;\">Parking</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Position and/or remove wheelchocks.</li>\r\n<li>Position and/or remove landing gear locks, engine blanking covers, pitot covers, surface control locks, tailstands and/or aircraft tethering.</li>\r\n<li>Operate Ground Power Unit (GPU).</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Cooling and Heating</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Operate cooling unit.</li>\r\n<li>Operate heating unit.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Ramp to Flight Deck Communication</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Provide headsets.</li>\r\n<li>Perform ramp to flight deck communication (during tow-in and/or push back, during engine starting, for other purposes).</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Starting</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Operate air start unit.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Safety Measures</strong></p>\r\n<p style=\"text-align: justify;\">Moving of aircraft</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Provide or arrange for tow-in and/or pushback tractor.</li>\r\n<li>Towbar to be provided by the Carrier.</li>\r\n<li>Towbar to be provided by the Handling Company.</li>\r\n<li>Store and maintain towbar(s) provided by the Carrier.</li>\r\n<li>Tow-in and/or push back aircraft.</li>\r\n<li>Tow aircraft between other agreed points.</li>\r\n<li>Provide authorised cockpit brake operator in connection with towing.</li>\r\n<li>Provide wing-walker(s).</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Exterior and Interior Cleaning</strong></p>\r\n<p style=\"text-align: justify;\">Toilet Services</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Arrange for Servicing (empty, clean, flush toilets and replenish fluids).</li>\r\n<li>trituator/disposal service.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Water Service</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Provide or arrange for draining water tanks, replenish of water tanks with drinking water, water quality tests.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Cabin Equipment</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Re-arrange cabin by removing, installing, repositioning, equipment (for example, seat and cabin divider(s)).</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', '-', 'file_1536507943.png', '2018-08-31', '11:09:30', 'Andriansyah Doni', '2018-09-12', '22:46:41', 'Andriansyah Doni', 'Y'),
(17, 'Aircraft Exterior and Interior Cleaning', 'aircraft-exterior-and-interior-cleaning', '<p>Perform cleaning of the interior and exterior of the aircraft. Providing comfort to passengers during the flight.</p>', '<p style=\"text-align: justify;\"><strong>Exterior Cleaning</strong></p>\r\n<p style=\"text-align: justify;\">Perform cleaning in accordance with Carriers written instructions of:</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Exterior Fuselage Washing</li>\r\n<li>Exterior Belly Washing</li>\r\n<li>Exterior Fuselage Polishing</li>\r\n</ul>\r\n<p style=\"text-align: justify;\"><strong>Interior Cleaning</strong></p>\r\n<ul>\r\n<li style=\"text-align: justify;\">Aircraft Cabin Cleaning</li>\r\n<li style=\"text-align: justify;\">Carpet Deep Cleaning</li>\r\n<li style=\"text-align: justify;\">Cargo Deep Cleaning</li>\r\n</ul>', '-', 'file_1536507031.png', '2018-08-31', '15:10:28', 'Andriansyah Doni', '2018-09-12', '22:47:31', 'Andriansyah Doni', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(3) NOT NULL,
  `slider_name` varchar(30) NOT NULL,
  `desc_slider` text NOT NULL,
  `img_slider` varchar(100) NOT NULL,
  `post_date_slider` date NOT NULL,
  `post_time_slider` time NOT NULL,
  `post_user_slider` varchar(50) NOT NULL,
  `mod_date_slider` date NOT NULL,
  `mod_time_slider` time NOT NULL,
  `mod_user_slider` varchar(50) NOT NULL,
  `isActiveSlider` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `slider_name`, `desc_slider`, `img_slider`, `post_date_slider`, `post_time_slider`, `post_user_slider`, `mod_date_slider`, `mod_time_slider`, `mod_user_slider`, `isActiveSlider`) VALUES
(1, 'Cockpit Check', '<p><span id=\"result_box\" class=\"short_text\" lang=\"en\"><span class=\"\">Ensure the instrument has no failure</span></span></p>', 'file_1536243954.jpg', '2018-09-06', '21:25:54', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(3, 'Cabin Check', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Guarantee passenger comfort with a clean passenger cabin</span></span></p>', 'file_1536244314.jpg', '2018-09-06', '21:31:54', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(4, 'Checking', '<p><span id=\"result_box\" class=\"\" lang=\"en\"><span class=\"\">Ensure there is no damage to the functional aircraft</span></span></p>', 'file_1536244963.jpg', '2018-09-06', '21:42:43', 'Andriansyah Doni', '0000-00-00', '00:00:00', '', 'Y'),
(5, 'Marshall', '<p><span id=\"result_box\" class=\"short_text\" lang=\"en\"><span class=\"\">Direct the plane to the ramp</span><br /></span></p>', 'file_1536245106.jpg', '2018-09-06', '21:45:06', 'Andriansyah Doni', '2018-09-06', '21:52:03', 'Andriansyah Doni', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(5) NOT NULL,
  `complete_name` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `users_level` enum('Sadmin','Admin','User') NOT NULL DEFAULT 'User',
  `pass_encrypt` varchar(100) NOT NULL,
  `users_postdate` date NOT NULL,
  `users_posttime` time NOT NULL,
  `users_postuser` varchar(50) NOT NULL,
  `users_moddate` date NOT NULL,
  `users_modtime` time NOT NULL,
  `users_moduser` varchar(50) NOT NULL,
  `is_active_users` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `complete_name`, `gender`, `phone_no`, `email`, `photo`, `users_level`, `pass_encrypt`, `users_postdate`, `users_posttime`, `users_postuser`, `users_moddate`, `users_modtime`, `users_moduser`, `is_active_users`) VALUES
(1, 'Andriansyah Doni', 'M', '081210048252', 'andrean.devz@gmail.com', '', 'Sadmin', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-03-17', '21:12:00', '', '2018-08-26', '11:15:00', 'Andriansyah Doni', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id_career`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id_facility`);

--
-- Indexes for table `identitas_web`
--
ALTER TABLE `identitas_web`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id_app` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id_career` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id_facility` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `identitas_web`
--
ALTER TABLE `identitas_web`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
