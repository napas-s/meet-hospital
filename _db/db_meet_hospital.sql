-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2021 at 05:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_meet_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL COMMENT 'รหัส',
  `about_content` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายละเอียด',
  `about_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `about_lavel` int(1) NOT NULL COMMENT 'ประเภทเนื้อหา (1= เนื้อหา,2=รูปภาพ)',
  `about_type` int(1) NOT NULL COMMENT 'ประเภท (1=ข้อมูลเกี่ยวกับองค์กร, 2=แผนผังองค์กร, 3=แผนที่องค์กร)',
  `about_status` int(1) NOT NULL COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `about_updateby` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `about_updatedate` datetime NOT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลเกี่ยวกับองค์กร';

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `member_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `member_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `member_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `member_tel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `member_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพประจำตัวผู้ใช้',
  `member_lavel` int(1) NOT NULL COMMENT 'สถานะผู้ใช้งาน [1= พนักงาน, 2 = แอดมิน]',
  `member_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `member_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `member_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `member_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต',
  `member_status` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=ใช้งาน, 2=ระงับการใช้งาน]',
  `last_login` datetime DEFAULT NULL COMMENT 'เวลาที่เข้าสู่ระบบล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส';

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
