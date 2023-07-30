-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 12:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drswapnilpatnoorkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `achivements`
--

CREATE TABLE `achivements` (
  `id` int(6) UNSIGNED NOT NULL,
  `gallery_image` varchar(30) NOT NULL,
  `image_caption` varchar(30) NOT NULL,
  `description` tinytext DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achivements`
--

INSERT INTO `achivements` (`id`, `gallery_image`, `image_caption`, `description`, `category`, `department`, `date_added`) VALUES
(3, '1680196442.jpg', '', '', '', NULL, '2023-03-30 17:14:02'),
(5, '1680196486.jpg', '', '', '', NULL, '2023-03-30 17:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `appointment_for` varchar(35) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `mobile`, `email`, `appointment_for`, `appointment_date`, `appointment_time`, `date_added`, `text`) VALUES
(61, 'Vaibhav Ganesh Hamand', '9284101154', '', 'Weight Loss Treatments For Children', '2023-05-30', '00:00:00', '2023-05-05 06:22:53', 'vfsdsaa');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_group_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `experience` int(2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `about_doctor` text NOT NULL,
  `password` varchar(40) NOT NULL,
  `address_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `approved` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_group`
--

CREATE TABLE `doctor_group` (
  `doctor_group_id` int(11) NOT NULL,
  `approval` int(1) NOT NULL,
  `sort_order` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_group_description`
--

CREATE TABLE `doctor_group_description` (
  `doctor_group_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` text NOT NULL,
  `appointment _for` varchar(100) NOT NULL,
  `appointment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(3) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_details` varchar(1000) NOT NULL,
  `photo` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(3) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_details` text NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_student`
--

CREATE TABLE `feedback_student` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_student`
--

INSERT INTO `feedback_student` (`id`, `gallery_image`, `feedback`, `name`, `date_added`) VALUES
(12, '1682682240.png', 'Actually i meet the doctor for skin and hair and i was so satisfied with the treatment. Can see the results within 20 days, Dr  helped me in good diet plan for weight-loss. ', 'Pratik Kadam ', '2023-04-28 12:03:40'),
(14, '1682682841.png', 'I strongly recommend you to go for allergic treatment. Here you just need to have little patience & soon you will realise that its worth going.absolutely fine with no allergic reactions at all.', 'Hemant Parmar ', '2023-04-28 12:05:54'),
(15, '1682682907.png', 'Best Homeopathy & Weight loss clinic in Town ...My son Experienced treatment under his guidance and had a very good result in Few Months .. Best wishes to Dr. Patnoorkar sir', 'Ruchika Pache ', '2023-04-28 11:57:24'),
(16, '1682682949.png', 'Absolutely effective and with course given by doctor is good and simplified... My mother reduced 5 KG weight within 2 month.... Thank you Doctor Sir and team...', 'Sarang Deodikar', '2023-04-28 11:57:53'),
(17, '1682682999.png', 'Dr. Patnoorkar listens and understands the issue of patient\\\'s, diagnose and give accurate treatment. His treatment are very effective and starts working right from first dose.', 'Anjali Kulkarni ', '2023-04-28 12:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `image_caption` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_image`, `image_caption`, `description`, `category`, `department`, `date_added`, `height`, `width`) VALUES
(9, '1682751418.jpg', 'My FM Award', '', '', '', '2023-04-25 10:46:36', '250px', '300px'),
(10, '1682419628.jpg', ' Treatment ', '', '', '', '2023-04-25 10:47:08', '250px', '300px   '),
(11, '1682751035.jpg', 'Achievments', '', '', '', '2023-04-25 10:50:55', '250px', '300px   '),
(12, '1682419956.jpg', 'Weight Loss ', '', '', '', '2023-04-25 10:52:36', '250px  ', '300px'),
(16, '1682420375.jpg', 'Health Plus Clinic', '', '', '', '2023-04-25 10:57:03', '250px', '300px'),
(18, '1682753069.jpg', 'Health Plus Clinic', '', '', '', '2023-04-29 07:24:29', '250px  ', '300px  '),
(21, '1682753185.jpg', 'Health Plus Clinic', '', '', '', '2023-04-29 07:26:25', '250px', '300px  ');

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_packages`
--

CREATE TABLE `health_packages` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `package_name` varchar(200) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `cost` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_packages`
--

INSERT INTO `health_packages` (`id`, `gallery_image`, `description`, `package_name`, `fromdate`, `todate`, `cost`, `date_added`) VALUES
(5, '1683889247.jpg', 'jhghzfytgjasxgu', 'Arthritis treatmen', '2023-05-12', '2023-05-24', 500, '2023-05-13 11:12:48'),
(8, '1684135535.jpg', 'hello...........................', 'weight loss', '2023-05-15', '2023-05-16', 2000, '2023-05-15 07:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `helth_tips`
--

CREATE TABLE `helth_tips` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `image_caption` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Height` varchar(100) NOT NULL,
  `Width` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_config`
--

CREATE TABLE `image_config` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `index_slider`
--

CREATE TABLE `index_slider` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `slider_caption` varchar(100) NOT NULL,
  `slider_date_from` date NOT NULL,
  `slider_date_to` date NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `compressed_image` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `index_slider`
--

INSERT INTO `index_slider` (`id`, `type`, `slider_caption`, `slider_date_from`, `slider_date_to`, `slider_image`, `compressed_image`, `date_added`) VALUES
(21, 'mobile', '1', '2023-05-17', '2023-05-31', '1683194101.jpg', '', '2023-05-04 09:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_link` varchar(200) NOT NULL,
  `menu_level` int(11) NOT NULL,
  `has_parent` int(11) NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_description` text NOT NULL,
  `child_menu_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_link`, `menu_level`, `has_parent`, `meta_tags`, `meta_description`, `child_menu_name`, `title`) VALUES
(55, 'Home ', '', 1, 0, '', '', 'none', ''),
(56, 'Mens ', 'scandy-shoes-mens.php ', 1, 0, '', '', 'none', ''),
(57, 'womens ', 'scandy-shoes-womens.php', 1, 0, '', '', 'none', '');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` varchar(4) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(200) NOT NULL,
  `image_caption` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_gallery`
--

INSERT INTO `news_gallery` (`id`, `gallery_image`, `image_caption`, `description`, `category`, `department`, `date_added`, `height`, `width`) VALUES
(3, '1682421313.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:34:09', '300px', '300px  '),
(4, '1682421288.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:33:54', '300px', '300px   '),
(5, '1682421354.jpg', 'Health Plus Clinic', '', '', '', '2023-04-29 06:33:41', '300px', '300px '),
(6, '1682421413.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:32:42', '300px  ', '300px   '),
(7, '1682421433.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:31:50', '300px  ', '300px   '),
(9, '1682747869.jpg', 'Homeopathic Treatment', '', '', '', '2023-04-29 06:31:15', '300px ', '300px  '),
(10, '1682747895.jpg', 'Weight Loss for Women', '', '', '', '2023-04-29 06:29:53', '300px  ', '300px '),
(11, '1682748040.jpg', 'Weight Loss Treatment', '', '', '', '2023-04-29 06:05:49', '300px', '300px '),
(13, '1682748637.jpg', 'Infertility Treatment ', '', '', '', '2023-04-29 06:30:28', '300px  ', '300px'),
(14, '1682748729.jpg', 'Weight Loss Treatment', '', '', '', '2023-04-29 06:12:09', '300px', '300px   '),
(15, '1682748864.jpg', 'My FM', '', '', '', '2023-04-29 06:14:24', '300px ', '300px  '),
(16, '1682749054.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:17:34', '300px', '300px  '),
(17, '1682749728.jpg', 'Imunity Power', '', '', '', '2023-04-29 06:28:48', '300px', '300px  '),
(18, '1682750321.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:38:41', '300px  ', '300px'),
(19, '1682750490.jpg', 'Aggressiveness', '', '', '', '2023-04-29 06:41:30', '300px ', '300px   '),
(20, '1682750854.jpg', 'stress and anxiety ', '', '', '', '2023-04-29 06:48:56', '300px  ', '300px'),
(21, '1682750907.jpg', 'Weight Loss ', '', '', '', '2023-04-29 06:48:27', '300px ', '300px   ');

-- --------------------------------------------------------

--
-- Table structure for table `news_update`
--

CREATE TABLE `news_update` (
  `id` int(3) NOT NULL,
  `facility_name` varchar(1000) NOT NULL,
  `facility_details` varchar(5000) NOT NULL,
  `more_facility_details` varchar(5000) NOT NULL,
  `gallery_image` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news_update`
--

INSERT INTO `news_update` (`id`, `facility_name`, `facility_details`, `more_facility_details`, `gallery_image`, `date_added`) VALUES
(10, 'Facebook ', '<p><span style=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;color:\\\\\\\\&quot;\\\\&quot;\\\" #727272;=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" font-family:=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'eb=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" garamond\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\',=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" serif;=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" font-size:=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" 20px;=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" background-color:=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" #fbfbfb;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\">Losing weight, the two words themselves lead to another word, diet! But are you ready to lose weight by following a diet?</span></p>', '<p><span style=\\\"font-family: arial; font-size: 16px;\\\">Machinery (other than machines of heading 8450) for washing, cleaning, wringing, drying, ironing, pressing (including fusing presses), bleaching, dyeing, dressing, finishing, coating or impregnating textile yarns, fabrics or made up textile articles and machines for applying the paste to the base fabric or other support used in the manufacture of floor coverings such as linoleum; machines for reeling, unreeling, folding, cutting or pinking textile fabrics- drying machines</span><br></p>', '1683969470.jpg', '2023-05-16 09:37:20'),
(20, 'instagtram', '<p><span style=\\\"\\\\&quot;color:\\\" rgb(0,=\\\"\\\" 0,=\\\"\\\" 0);=\\\"\\\" font-family:=\\\"\\\" madefor-text,=\\\"\\\" helveticaneuew01-45ligh,=\\\"\\\" helveticaneuew02-45ligh,=\\\"\\\" helveticaneuew10-45ligh,=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 20px;=\\\"\\\" white-space:=\\\"\\\" pre-wrap;\\\\\\\"=\\\"\\\"><span style=\\\"\\\\&quot;font-weight:\\\" bold;\\\\\\\"=\\\"\\\">Blogging</span> has long been a popular way for people to express their passions, experiences and ideas with readers worldwide.</span><br></p>', '<p><span style=\\\"background-color: rgb(245, 245, 245);\\\">Machinery (other than machines of heading 8450) for washing, cleaning, wringing, drying, ironing, pressing (including fusing presses), bleaching, dyeing, dressing, finishing, coating or impregnating textile yarns, fabrics or made up textile articles and machines for applying the paste to the base fabric or other support used in the manufacture of floor coverings such as linoleum; machines for reeling, unreeling, folding, cutting or pinking textile fabrics- drying machines</span><br></p>', '1684215878.jpg', '2023-05-16 10:57:35'),
(25, 'Creative Blog', '<p><span yellow;=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" font-weight:=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" bold;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" rgb(245,=\\\"\\\\&quot;\\\\&quot;\\\" 245,=\\\"\\\\&quot;\\\\&quot;\\\" 245);\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\&quot;\\\">Designer-made</span><span rgb(245,=\\\"\\\\&quot;\\\\&quot;\\\" 245,=\\\"\\\\&quot;\\\\&quot;\\\" 245);\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\&quot;\\\">&nbsp;blog website templates built to meet your blog content.&nbsp;</span><br></p>', '<p><span style=\\\"background-color: rgb(245, 245, 245);\\\">Machinery (other than machines of heading 8450) for washing, cleaning, wringing, drying, ironing, pressing (including fusing presses), bleaching, dyeing, dressing, finishing, coating or impregnating textile yarns, fabrics or made up textile articles and machines for applying the paste to the base fabric or other support used in the manufacture of floor coverings such as linoleum; machines for reeling, unreeling, folding, cutting or pinking textile fabrics- drying machines</span><br></p>', '1684217244.jpg', '2023-05-16 10:58:00'),
(26, 'Creative Blog', '<p><span yellow;=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" font-weight:=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" bold;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\\" rgb(245,=\\\"\\\\&quot;\\\\&quot;\\\" 245,=\\\"\\\\&quot;\\\\&quot;\\\" 245);\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\&quot;\\\">Designer-made</span><span rgb(245,=\\\"\\\\&quot;\\\\&quot;\\\" 245,=\\\"\\\\&quot;\\\\&quot;\\\" 245);\\\\\\\\\\\\\\\"=\\\"\\\\&quot;\\\\&quot;\\\">&nbsp;blog website templates built to meet your blog content.&nbsp;</span><br></p>', '<p><span style=\\\"background-color: rgb(245, 245, 245);\\\">Machinery (other than machines of heading 8450) for washing, cleaning, wringing, drying, ironing, pressing (including fusing presses), bleaching, dyeing, dressing, finishing, coating or impregnating textile yarns, fabrics or made up textile articles and machines for applying the paste to the base fabric or other support used in the manufacture of floor coverings such as linoleum; machines for reeling, unreeling, folding, cutting or pinking textile fabrics- drying machines</span><br></p>', '1684219070.jpg', '2023-05-16 10:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `notification_list`
--

CREATE TABLE `notification_list` (
  `notify_id` int(11) NOT NULL,
  `notify_text` varchar(200) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification_list`
--

INSERT INTO `notification_list` (`notify_id`, `notify_text`, `fromdate`, `todate`) VALUES
(1, 'Homoeopathy Treatment for Arthritis,Spine Complaints,Hyperacidity,Migrain,Asthama ,Allergic Cold and Cough by Dr Swapnil Patnoorkar Contact on 9881138901 for more details', '2023-04-07', '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `oc_address`
--

CREATE TABLE `oc_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `company` varchar(40) NOT NULL,
  `address_1` varchar(128) NOT NULL,
  `address_2` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 0,
  `zone_id` int(11) NOT NULL DEFAULT 0,
  `custom_field` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oc_master_company`
--

CREATE TABLE `oc_master_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `gstn` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `sms_url` varchar(1000) NOT NULL,
  `sms_username` varchar(100) NOT NULL,
  `sms_password` varchar(100) NOT NULL,
  `sms_sender_id` varchar(100) NOT NULL,
  `email_url` varchar(1000) NOT NULL,
  `email_username` varchar(100) NOT NULL,
  `email_password` varchar(100) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oc_master_company`
--

INSERT INTO `oc_master_company` (`id`, `company_name`, `address1`, `address2`, `area`, `city`, `pincode`, `state`, `contact_person`, `email`, `mobile`, `logo`, `gstn`, `pan`, `sms_url`, `sms_username`, `sms_password`, `sms_sender_id`, `email_url`, `email_username`, `email_password`, `date_updated`) VALUES
(2, 'Dr.Swapnil Patnoorkar', 'Flat Number R-2, Chandrapushp Sankul, To, Shreya Nagar Rd, Kalda Corner, Shreya Nagar, Aurangabad, Maharashtra 431001', '', 'Contact For Diabetes Treatments!', 'Chh.Sambhaji Nagar ', 431003, 'Maharashtra ', 'dr.Swapnil Patnoorkar', 'contact@drswapnilpatnoorkar.com', ' 098811 38901', '', '', '', '', 'admin', '', '', '', '', '', '2022-09-09 09:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `oc_review`
--

CREATE TABLE `oc_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oc_upload`
--

CREATE TABLE `oc_upload` (
  `upload_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oc_user`
--

CREATE TABLE `oc_user` (
  `user_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oc_user`
--

INSERT INTO `oc_user` (`user_id`, `user_group_id`, `username`, `password`, `salt`, `firstname`, `lastname`, `email`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
(7, 0, 'admin', 'admin@2022', '', '', '', '', '', '', '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oc_user_group`
--

CREATE TABLE `oc_user_group` (
  `user_group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oc_zone`
--

CREATE TABLE `oc_zone` (
  `zone_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_reviews`
--

CREATE TABLE `patient_reviews` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(200) NOT NULL,
  `feedback` varchar(400) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `pincode_details`
--

CREATE TABLE `pincode_details` (
  `pincode_id` int(11) NOT NULL,
  `pincode_no` int(6) NOT NULL,
  `taluka` varchar(50) NOT NULL,
  `district` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `link`, `icon`) VALUES
(3, 'Facebook', 'https://www.facebook.com/HealthPlusClinicIndia/', 'bx bxl-facebook'),
(4, 'Linkedin', 'https://in.linkedin.com/posts/dr-swapnil-patnoorkar-b99a89103_weightloss-weightlosstransformation-he', 'bx bxl-linkedin'),
(5, 'YouTube', 'https://www.youtube.com/channel/UCOhoFQ8_n0vu_YgHYGnDnAw', 'bx bxl-youtube');

-- --------------------------------------------------------

--
-- Table structure for table `state_ls`
--

CREATE TABLE `state_ls` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `user_type` varchar(10) NOT NULL,
  `view` enum('y','n') NOT NULL DEFAULT 'n',
  `add` enum('y','n') NOT NULL DEFAULT 'n',
  `edit` enum('y','n') NOT NULL DEFAULT 'n',
  `delete` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`user_id`, `username`, `password`, `email`, `status`, `user_type`, `view`, `add`, `edit`, `delete`) VALUES
(1, 'admin', 'admin@2022', '', 'Y', 'admin', 'y', 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video_title` varchar(400) NOT NULL,
  `video_description` text NOT NULL,
  `video_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `video_embed_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_description`, `video_date`, `video_embed_code`) VALUES
(8, '', '', '2023-04-25 09:57:09', 'https://www.youtube.com/embed/_lEDe26DLys'),
(9, '', '', '2023-04-25 10:21:44', 'https://www.youtube.com/embed/dK05td4EwfE'),
(10, '', '', '2023-04-25 10:24:13', 'https://www.youtube.com/embed/6trESMJHpcc'),
(11, '', '', '2023-04-25 10:27:52', 'https://www.youtube.com/embed/eydzwmFltdw'),
(12, '', '', '2023-04-25 10:28:51', 'https://www.youtube.com/embed/vJ74T9whEEk'),
(13, '', '', '2023-04-25 10:29:18', 'https://www.youtube.com/embed/zXBFepVIWww'),
(14, '', '', '2023-04-25 10:29:57', 'https://www.youtube.com/embed/As5a0ucRIOY'),
(15, '', '', '2023-04-25 10:30:46', 'https://www.youtube.com/embed/gFUNheeHdMo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_group`
--
ALTER TABLE `doctor_group`
  ADD PRIMARY KEY (`doctor_group_id`);

--
-- Indexes for table `doctor_group_description`
--
ALTER TABLE `doctor_group_description`
  ADD PRIMARY KEY (`doctor_group_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_student`
--
ALTER TABLE `feedback_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_packages`
--
ALTER TABLE `health_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helth_tips`
--
ALTER TABLE `helth_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_config`
--
ALTER TABLE `image_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_slider`
--
ALTER TABLE `index_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_update`
--
ALTER TABLE `news_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_list`
--
ALTER TABLE `notification_list`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `oc_address`
--
ALTER TABLE `oc_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `oc_master_company`
--
ALTER TABLE `oc_master_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc_review`
--
ALTER TABLE `oc_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `oc_user`
--
ALTER TABLE `oc_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `oc_zone`
--
ALTER TABLE `oc_zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achivements`
--
ALTER TABLE `achivements`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_group`
--
ALTER TABLE `doctor_group`
  MODIFY `doctor_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_student`
--
ALTER TABLE `feedback_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `health_packages`
--
ALTER TABLE `health_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `helth_tips`
--
ALTER TABLE `helth_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_config`
--
ALTER TABLE `image_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `index_slider`
--
ALTER TABLE `index_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news_update`
--
ALTER TABLE `news_update`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notification_list`
--
ALTER TABLE `notification_list`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oc_address`
--
ALTER TABLE `oc_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oc_master_company`
--
ALTER TABLE `oc_master_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oc_review`
--
ALTER TABLE `oc_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oc_user`
--
ALTER TABLE `oc_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
