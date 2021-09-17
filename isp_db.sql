-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 10:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` tinyint(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`, `image`, `status`, `createdat`) VALUES
(1, 'admin@gmail.com', '12', 'images/admin/5070179d8b.png', 0, '2021-04-10 11:10:51'),
(6, 'admin2@gmail.com', '12', 'images/admin/d8c5f8233b.png', 2, '2021-04-22 13:30:26'),
(8, 'rijvialam@gmail.com', '1234', 'images/admin/56acf6bc94.jpg', 0, '2021-06-22 07:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `area_table`
--

CREATE TABLE `area_table` (
  `areaId` int(11) NOT NULL,
  `areaName` varchar(300) NOT NULL,
  `junk` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area_table`
--

INSERT INTO `area_table` (`areaId`, `areaName`, `junk`) VALUES
(1, 'Basabo', 0),
(2, 'Mugda', 0),
(3, 'Malibag', 0),
(4, 'Khilgaon', 0),
(5, 'Tika Tuli', 0),
(6, 'Khilgaon', 0),
(7, '', 1),
(8, 'Khilgaon sdsfdsfsdfds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain_table`
--

CREATE TABLE `complain_table` (
  `com_id` int(11) NOT NULL,
  `complain` text NOT NULL,
  `com_read` tinyint(4) NOT NULL,
  `com_time` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `customer_username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain_table`
--

INSERT INTO `complain_table` (`com_id`, `complain`, `com_read`, `com_time`, `customer_id`, `customer_username`) VALUES
(47, 'Net slow\r\n', 1, '2021-06-22 14:07:23', 17, 'Raj'),
(48, 'sdfsdf  sdfs', 1, '2021-07-07 19:31:13', 17, 'Raj'),
(49, 'jjj', 0, '2021-09-02 19:08:48', 12, 'joy');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(11) NOT NULL,
  `firstName` varchar(300) NOT NULL,
  `lastName` varchar(300) NOT NULL,
  `customer_username` varchar(300) NOT NULL,
  `customer_email` varchar(300) NOT NULL,
  `customer_password` varchar(300) NOT NULL,
  `customer_phone` varchar(300) NOT NULL,
  `customer_address` text NOT NULL,
  `area_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blockuser` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `firstName`, `lastName`, `customer_username`, `customer_email`, `customer_password`, `customer_phone`, `customer_address`, `area_id`, `created_at`, `blockuser`) VALUES
(10, 'munna', 'a', 'munna', 'munna@g.c', '123', '12345678124', '', 0, '2021-06-22 07:16:14', 0),
(11, '', '', 'nahid', '', '', '', '', 0, '2021-06-22 07:16:20', 0),
(12, 'munna', 'jj', 'joy', 'dfdf@g.c', '12', '44444', '', 2, '2021-06-22 07:16:24', 0),
(13, 'joy', 'mr', 'iqbal', 'aaf@g.c', '11111111', '11111111111', '', 2, '2021-06-22 07:16:30', 0),
(14, '', '', 'golocl', '', '', '', '', 0, '2021-06-22 07:16:35', 0),
(15, '', '', 'pappu', '', '', '', '', 0, '2021-06-22 07:16:48', 0),
(16, 'ff', 'ss', 'sap', 'sf@g.c', '12345678', '12345678945', '', 1, '2021-06-22 07:16:53', 0),
(17, 'joy', 'jj', 'raj', 'f@g.c', '123', '11111111111', '', 2, '2021-06-22 07:55:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `ID` int(255) NOT NULL,
  `e_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_salary` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`ID`, `e_name`, `e_number`, `emp_salary`, `e_address`, `e_image`) VALUES
(2, 'Jamal', '01537532838', '10000', 'malibagh', 'images/admin/6c27efe059.jpeg'),
(4, 'Kamal', '01537532838', '12000', 'basabo', 'images/admin/aa8879cc46.png'),
(8, 'Nahid', '01654789', '15000', 'Mugda ', 'images/admin/92a4b7765f.png');

-- --------------------------------------------------------

--
-- Table structure for table `pacage_table`
--

CREATE TABLE `pacage_table` (
  `pacage_id` int(11) NOT NULL,
  `pacage_name` varchar(200) NOT NULL,
  `pacage_speed` int(11) NOT NULL,
  `pacage_desc` text NOT NULL,
  `pacage_price` varchar(200) NOT NULL,
  `pacage_total_subs` int(11) NOT NULL,
  `offer_status` tinyint(4) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacage_table`
--

INSERT INTO `pacage_table` (`pacage_id`, `pacage_name`, `pacage_speed`, `pacage_desc`, `pacage_price`, `pacage_total_subs`, `offer_status`, `month`, `delete_status`) VALUES
(1, 'Cyber Pro ', 20, '<ul>\r\n                                    <li>Unlimited Browsing</li> \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n</ul>', '1000', 0, 0, 0, 0),
(2, 'Cyber Max', 30, '<ul>\r\n                                    <li>Unlimited Browsing</li> \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n                                </ul>', '1500', 0, 0, 0, 0),
(3, 'Cyber Ultra', 50, '<ul>\r\n                                    <li>Unlimited Browsing</li>  \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n                                </ul>', '2000', 0, 0, 0, 0),
(4, 'Basic', 20, '<ul>\r\n                                    <li>Unlimited Browsing</li>  \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n                                </ul>', '700', 0, 1, 6, 0),
(5, 'Standard', 35, '<ul>\r\n                                    <li>Unlimited Browsing</li>  \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n                                </ul>', '2000', 0, 1, 6, 0),
(6, 'Premium', 35, '<ul>\r\n                                    <li>Unlimited Browsing</li>  \r\n                                    <li>100 mbps YouTube</li>\r\n                                    <li>100 mbps BDIX Server</li>\r\n                                    <li>Secure Real IP</li>\r\n                                    <li>Line Charge- 1000/-</li>\r\n                                </ul>', '3000', 0, 1, 6, 0),
(7, 'Offer Package', 20, 'Offer price only for 6 months. And line charge -/1000tk.', '700', 0, 1, 6, 0),
(9, 'Offer Package 2', 25, 'Offer price only for 6 months. And line charge -/1000tk.	', '800', 0, 0, 0, 0),
(11, 'Offer 4', 40, 'offer offer', '900', 0, 1, 6, 0),
(12, 'Offer 5', 40, 'ASADSFGKKJJHGSASDS', '900', 0, 1, 6, 0),
(13, 'pack 2', 1, 'df', '1', 0, 1, 0, 1),
(14, 'pack 2', 1, 'df', '1', 0, 0, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `s_id` int(11) NOT NULL,
  `e_ID` int(50) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_table`
--

INSERT INTO `salary_table` (`s_id`, `e_ID`, `month`, `salary`, `year`) VALUES
(16, 2, 'January', '10000', '2021'),
(17, 4, 'January', '11000', '2021'),
(20, 8, 'September', '15000', '2021'),
(21, 4, 'September', '12000', '2021'),
(22, 2, 'September', '10000', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `slide_table`
--

CREATE TABLE `slide_table` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_table`
--

INSERT INTO `slide_table` (`id`, `image`, `caption`) VALUES
(27, 'images/80f0d961d1.jpg', '<h1>Something and share your whatever</h1>\r\n              <h2>Else it easy for you to do whatever this thing does.</h2>\r\n\r\n              <a class=\"big-button\" href=\"complain.php\" title=\"\">Contact Us</a>\r\n              <div class=\"clear\"></div>\r\n         '),
(28, 'images/739e709a9c.jpg', '<h1>Something and share your whatever</h1>\r\n              <h2>Else it easy for you to do whatever this thing does.</h2>\r\n\r\n              <a class=\"big-button\" href=\"complain.php\" title=\"\">Contact Us</a>\r\n              <div class=\"clear\"></div>\r\n         '),
(29, 'images/b598bb3872.jpg', '<h1>Something and share your whatever</h1>\r\n              <h2>Else it easy for you to do whatever this thing does.</h2>\r\n\r\n              <a class=\"big-button\" href=\"complain.php\" title=\"\">Contact Us</a>\r\n              <div class=\"clear\"></div>\r\n         ');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_pacage`
--

CREATE TABLE `subscribe_pacage` (
  `subs_id` int(11) NOT NULL,
  `pacage_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `applytime` date NOT NULL DEFAULT current_timestamp(),
  `pacage_amount` varchar(200) NOT NULL,
  `subscribe_month` int(11) NOT NULL,
  `getway` varchar(150) NOT NULL,
  `account_no` bigint(155) DEFAULT NULL,
  `code_no` varchar(100) DEFAULT NULL,
  `confirmation` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe_pacage`
--

INSERT INTO `subscribe_pacage` (`subs_id`, `pacage_id`, `customer_id`, `applytime`, `pacage_amount`, `subscribe_month`, `getway`, `account_no`, `code_no`, `confirmation`) VALUES
(32, 1, 17, '2021-08-09', '1000', 2, 'Rocket', 1215469846, 'lh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `area_table`
--
ALTER TABLE `area_table`
  ADD PRIMARY KEY (`areaId`);

--
-- Indexes for table `complain_table`
--
ALTER TABLE `complain_table`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pacage_table`
--
ALTER TABLE `pacage_table`
  ADD PRIMARY KEY (`pacage_id`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `slide_table`
--
ALTER TABLE `slide_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_pacage`
--
ALTER TABLE `subscribe_pacage`
  ADD PRIMARY KEY (`subs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `area_table`
--
ALTER TABLE `area_table`
  MODIFY `areaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complain_table`
--
ALTER TABLE `complain_table`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pacage_table`
--
ALTER TABLE `pacage_table`
  MODIFY `pacage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slide_table`
--
ALTER TABLE `slide_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscribe_pacage`
--
ALTER TABLE `subscribe_pacage`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
