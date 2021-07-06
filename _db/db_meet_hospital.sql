-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2021 at 07:06 PM
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
  `about_content_googlemap` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายละเอียดเพิ่มเติมหน้าแผนที่',
  `about_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `about_googlemap` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'link google map',
  `about_lavel` int(1) NOT NULL COMMENT 'ประเภทเนื้อหา (1= เนื้อหา,2=รูปภาพ, 3= link google map)',
  `about_type` int(1) NOT NULL COMMENT 'ประเภท (1=ข้อมูลเกี่ยวกับองค์กร, 2=แผนผังองค์กร, 3=แผนที่องค์กร, 4=ตารางเวลาการให้บริการ)',
  `about_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `about_updateby` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `about_updatedate` datetime NOT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลเกี่ยวกับองค์กร';

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_content`, `about_content_googlemap`, `about_img`, `about_googlemap`, `about_lavel`, `about_type`, `about_status`, `about_updateby`, `about_updatedate`) VALUES
(1, '<p>dddddd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>svdgdf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dfgdfg</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">sgdgdfg</div>\r\n', '', '104378529720210625_220556.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7799.138410869049!2d99.858551!3d12.209689!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51b42d703b0d112c!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Liq4Liy4Lih4Lij4LmJ4Lit4Lii4Lii4Lit4LiU!5e0!3m2!1sth!2sth!4v1624635317817!5m2!1sth!2sth\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 3, 1, 'ผู้ดูแลระบบ', '2021-06-27 23:59:35'),
(2, '', NULL, '72324455820210626_001543.jpeg', '', 2, 2, 1, 'ผู้ดูแลระบบ', '2021-06-26 00:15:43'),
(3, '<p>โรงพยาบาลสามร้อยยอด &nbsp;เดิมใช้ชื่อว่า&nbsp; &quot;โรงพยาบาลกุยบุรี&quot; &nbsp;แต่ต่อมาได้เปลี่ยนชื่อเป็น &quot;โรงพยาบาลสามร้อยยอด&quot;&nbsp;&nbsp;ตามสถานที่ตั้งของกิ่งอำเภอสามร้อยยอดเมื่อเดือน ตุลาคม 2539<br />\r\nโรงพยาบาลสามร้อยยอด &nbsp;&nbsp;ตั้งอยู่เลขที่&nbsp;51&nbsp;&nbsp; หมู่ที่ &nbsp;6&nbsp;&nbsp; ตำบลไร่ใหม่ &nbsp;&nbsp;กิ่งอำเภอสามร้อยยอด&nbsp;จังหวัดประจวบคีรีขันธ์&nbsp;มีเนื้อที่ทั้งหมด&nbsp;18&nbsp;ไร่&nbsp;&nbsp; 2&nbsp;&nbsp; งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>พ.ศ. &nbsp;&nbsp;&nbsp; 2508&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เริ่มจากสถานีอนามัย&nbsp;ชั้น 2<br />\r\nพ.ศ.&nbsp;&nbsp;&nbsp; &nbsp;2518&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยกฐานะเป็นศูนย์การแพทย์ และอนามัย<br />\r\nพ.ศ.&nbsp;&nbsp;&nbsp; &nbsp;2519&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยกฐานะเป็นโรงพยาบาลอำเภอ&nbsp;ขนาด&nbsp;10&nbsp;เตียง<br />\r\nพ.ศ. &nbsp;&nbsp;&nbsp; 2527&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ยกฐานะเป็นโรงพยาบาล&nbsp;ขนาด 60 เตียง<br />\r\nพ.ศ. &nbsp;&nbsp;&nbsp; 2539&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปลี่ยนชื่อโรงพยาบาลกุยบุรี มาเป็น&nbsp;โรงพยาบาลสามร้อยยอด</p>\r\n\r\n<h3>รายนามผู้อำนวยการโรงพยาบาลสามร้อยยอด</h3>\r\n\r\n<ul>\r\n	<li>นายแพทย์วิทยา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; คุณานุกูล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2518-2529</li>\r\n	<li>นายแพทย์พิภพ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เจนสุทธิเวชกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2529-2532</li>\r\n	<li>นายแพทย์สมเกียรติ&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ตั้งใจรักษาการดี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2532-2536(รก.)</li>\r\n	<li>นายแพทย์สมชาญ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; พงษ์ริยวัฒนา&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2536-2539(รก.)</li>\r\n	<li>แพทย์หญิงศรีสมัย&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เชื้อชาติ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2539-2543(รก.)</li>\r\n	<li>นายแพทย์ปิยะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ลินลาวรรณ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; พ.ศ.2543-2546(รก.)</li>\r\n	<li>แพทย์หญิงศรีสมัย&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เชื้อชาติ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2546-2551</li>\r\n	<li>นายแพทย์สมเกียรติ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ตั้งใจรักษาการดี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2551-30 ก.ย.2562</li>\r\n	<li>แพทย์หญิงวศินี&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; วีระไวทยะ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ต.ค.2562-ปัจจุบัน</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>วิสัยทัศน์ (VISION) ปี 2560 &ndash; 2564</strong></h3>\r\n\r\n<p>เป็นผู้นำให้บริการด้านสุขภาพที่มีคุณภาพมาตรฐาน บริหารจัดการตามหลักธรรมาภิบาล ผู้รับบริการมีพฤติกรรมสุขภาพที่ดี</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>พันธกิจ (MISSION) ปี 2560 &ndash; 2564</strong></h3>\r\n\r\n<ol>\r\n	<li>พัฒนาระบบบริการจัดการด้านสุขภาพให้มีประสิทธิภาพตามหลักธรรมาภิบาล</li>\r\n	<li>พัฒนาคุณภาพมาตรฐานด้านการรักษาพยาบาลการเฝ้าระวังป้องกันโรค&nbsp;&nbsp; การส่งเสริมสุขภาพ&nbsp; และฟื้นฟูสภาพ</li>\r\n	<li>ส่งเสริมและพัฒนาการใช้ภูมิปัญญาการแพทย์แผนไทยและการแพทย์ทางเลือก</li>\r\n	<li>สร้างเสริมพฤติกรรมสุขภาพที่ถูกต้องของประชาชน</li>\r\n	<li>พัฒนาระบบประกันสุขภาพให้ประชาชนเข้าถึงบริการได้อย่างเสมอภาคและเป็นธรรม</li>\r\n	<li>ส่งเสริมและจัดระบบการคุ้มครองผู้บริโภค</li>\r\n	<li>เสริมสร้างความเข้มแข็งของภาคีเครือข่าย</li>\r\n	<li>เสริมสร้างและพัฒนาสมรรถนะบุคลากร</li>\r\n	<li>พัฒนาระบบข้อมูลข่าวสาร&nbsp; เทคโนโลยีสารสนเทศให้มีประสิทธิภาพ</li>\r\n	<li>พัฒนาวิชาการและส่งเสริมการสร้างนวัตกรรมด้านสุขภาพ</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>ยุทธศาสตร์</h3>\r\n\r\n<ol>\r\n	<li>พัฒนาระบบบริหารจัดการภายในองค์กรและเครือข่ายให้สอดคล้องตามหลักธรรมาภิบาล</li>\r\n	<li>พัฒนาและจัดการระบบการรักษาพยาบาลเฝ้าระวังป้องกันโรค&nbsp; ส่งเสริมสุขภาพ&nbsp; และฟื้นฟุสภาพ</li>\r\n	<li>พัฒนาระบบการแพทย์แผนไทยและการแพทย์ทางเลือก</li>\r\n	<li>ส่งเสริมการจัดบริการสร้างเสริมพฤติกรรมการกูแลสุขภาพ</li>\r\n	<li>ส่งเสริมการจัดระบบบริการสุขภาพที่ประชาชนสามารถเข้าถึงได้อย่างครอบคลุมและทั่วถึง</li>\r\n	<li>พัฒนากลไกลการดำเนินงานควบคุม&nbsp; กำกับด้านคุ้มครองผู้บริโภคและด้านบริการสุขภาพ</li>\r\n	<li>&nbsp;พัฒนาภาคีเครือข่ายให้มีศักยภาพและส่งเสริมการมีส่วนร่วมในการดำเดินงาสร้างสุ๘ขภาพ</li>\r\n	<li>พัฒนาศักยภาพบุคลากร</li>\r\n	<li>พัฒนาระบบข้อมูลสารสนเทศ</li>\r\n	<li>พัฒนาองค์กรให้เป็นองค์กรแห่งการเรียนรู้</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '', '', 1, 1, 1, 'ผู้ดูแลระบบ', '2021-06-26 00:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่ออัลบั้ม',
  `album_detail` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายละเอียด',
  `album_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `album_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `album_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `album_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `album_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_title`, `album_detail`, `album_status`, `album_addby`, `album_adddate`, `album_updateby`, `album_updatedate`) VALUES
(4, 'TEST 1', 'The standard Lorem Ipsum passage, used since the 1500s', 1, 'ผู้ดูแลระบบ', '2021-06-28 17:42:08', 'ผู้ดูแลระบบ', '2021-06-28 17:42:08'),
(5, 'TEST2', 'The standard Lorem Ipsum passage, used since the 1500s2', 1, 'ผู้ดูแลระบบ', '2021-06-28 18:06:50', 'ผู้ดูแลระบบ', '2021-06-28 18:06:50'),
(6, 'TEST 3', 'The standard Lorem Ipsum passage, used since the 1500s2', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:07:13', 'ผู้ดูแลระบบ', '2021-06-28 18:07:13'),
(7, 'TEST 4', 'The standard Lorem Ipsum passage, used since the 1500s2', 1, 'ผู้ดูแลระบบ', '2021-06-28 18:07:39', 'ผู้ดูแลระบบ', '2021-06-28 18:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `album_des`
--

CREATE TABLE `album_des` (
  `des_id` int(11) NOT NULL,
  `albumId` int(11) NOT NULL COMMENT 'รหัสอัลบั้ม',
  `des_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อรูปภาพ',
  `des_status` int(1) NOT NULL DEFAULT 0 COMMENT 'ภาพหน้าปก [1=ภาพหน้าปก, 0=ภาพปกติ]	',
  `des_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `des_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `album_des`
--

INSERT INTO `album_des` (`des_id`, `albumId`, `des_img`, `des_status`, `des_addby`, `des_adddate`) VALUES
(30, 4, '20210628_1742161.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 17:42:16'),
(31, 4, '20210628_1742162.jpg', 1, 'ผู้ดูแลระบบ', '2021-06-28 17:42:16'),
(33, 5, '20210628_1806576.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:06:57'),
(34, 5, '20210628_1806577.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:06:57'),
(35, 5, '20210628_1806578.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:06:57'),
(36, 5, '20210628_1806579.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:06:57'),
(37, 5, '20210628_18065710.jpg', 1, 'ผู้ดูแลระบบ', '2021-06-28 18:06:57'),
(38, 6, '20210628_18072911.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:07:29'),
(39, 6, '20210628_18072912(24).jpg', 1, 'ผู้ดูแลระบบ', '2021-06-28 18:07:29'),
(40, 7, '20210628_1807474.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:07:47'),
(41, 7, '20210628_1807475.jpg', 1, 'ผู้ดูแลระบบ', '2021-06-28 18:07:47'),
(42, 7, '20210628_1807479.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:07:47'),
(43, 7, '20210628_18074710.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:07:47'),
(44, 4, '20210628_1859126.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:12'),
(45, 4, '20210628_1859127.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:12'),
(46, 4, '20210628_1859128.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:12'),
(47, 4, '20210628_1859129.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:12'),
(48, 4, '20210628_18591210.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:12'),
(49, 4, '20210628_18591911.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:19'),
(50, 4, '20210628_18591912(24).jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:19'),
(51, 4, '20210628_18591920593.jpg', 0, 'ผู้ดูแลระบบ', '2021-06-28 18:59:19');

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
  `member_status` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=ใช้งาน, 2=ระงับการใช้งาน]',
  `last_login` datetime DEFAULT NULL COMMENT 'เวลาที่เข้าสู่ระบบล่าสุด',
  `member_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `member_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `member_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `member_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_img_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ภาพหน้าปก',
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หัวข้อ',
  `news_content` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เนื้อหา',
  `news_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]',
  `news_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `news_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `news_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `news_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_img_cover`, `news_title`, `news_content`, `news_status`, `news_addby`, `news_adddate`, `news_updateby`, `news_updatedate`) VALUES
(1, '113471169120210627_232938.jpg', 'The standard Lorem Ipsum passage, used since the 1500s1', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 1, 'ผู้ดูแลระบบ', '2021-06-27 23:29:38', 'ผู้ดูแลระบบ', '2021-06-27 23:29:55'),
(2, '83987859120210627_233102.jpg', 'The standard Lorem Ipsum passage, used since the 1500s2', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 1, 'ผู้ดูแลระบบ', '2021-06-27 23:29:38', 'ผู้ดูแลระบบ', '2021-06-27 23:31:02'),
(3, '181519368720210627_233123.jpg', 'The standard Lorem Ipsum passage, used since the 1500s3', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 1, 'ผู้ดูแลระบบ', '2021-06-27 23:29:38', 'ผู้ดูแลระบบ', '2021-06-27 23:31:23'),
(4, '120374951220210627_233147.jpg', 'The standard Lorem Ipsum passage, used since the 1500s4', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 1, 'ผู้ดูแลระบบ', '2021-06-27 23:29:38', 'ผู้ดูแลระบบ', '2021-06-27 23:31:47'),
(6, '58387091620210627_233228.jpg', 'The standard Lorem Ipsum passage, used since the 1500s5', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 1, 'ผู้ดูแลระบบ', '2021-06-27 23:29:38', 'ผู้ดูแลระบบ', '2021-06-27 23:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(11) NOT NULL COMMENT 'รหัส',
  `ser_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อบริการ',
  `ser_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `ser_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `ser_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `ser_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `ser_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลการบริการ';

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_name`, `ser_status`, `ser_addby`, `ser_adddate`, `ser_updateby`, `ser_updatedate`) VALUES
(1, 'ขูดหินปูน', 1, 'ผู้ดูแลระบบ', '2021-07-05 23:05:13', 'ผู้ดูแลระบบ', '2021-07-05 23:10:41'),
(3, 'ถอนฟัน', 1, 'ผู้ดูแลระบบ', '2021-07-05 23:11:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_des`
--

CREATE TABLE `services_des` (
  `serdes_id` int(11) NOT NULL COMMENT 'รหัส',
  `serpoint_id` int(11) NOT NULL COMMENT 'จุดบริการ',
  `sertype_id` int(11) NOT NULL COMMENT 'ประเภทบริการ [1= คลินิกทั่วไป,2=คลินิกนอกเวลา]',
  `serdes_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วันที่ให้บริการ',
  `serdes_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `serdes_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `serdes_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `serdes_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `serdes_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลวันที่เปิดให้บริการ';

--
-- Dumping data for table `services_des`
--

INSERT INTO `services_des` (`serdes_id`, `serpoint_id`, `sertype_id`, `serdes_date`, `serdes_status`, `serdes_addby`, `serdes_adddate`, `serdes_updateby`, `serdes_updatedate`) VALUES
(4, 4, 1, '2021-07-12', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:28:22', 'ผู้ดูแลระบบ', '2021-07-06 20:40:23'),
(5, 5, 2, '2021-07-06', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:29:49', 'ผู้ดูแลระบบ', '2021-07-06 20:42:53'),
(6, 4, 2, '2021-07-07', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:30:17', 'ผู้ดูแลระบบ', '2021-07-06 20:43:04'),
(7, 6, 2, '2021-07-15', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:30:50', 'ผู้ดูแลระบบ', '2021-07-06 20:43:12'),
(8, 4, 1, '2021-07-19', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:50:34', NULL, NULL),
(9, 5, 2, '2021-07-20', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:50:55', NULL, NULL),
(10, 5, 2, '2021-07-13', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:51:12', NULL, NULL),
(11, 4, 2, '2021-07-14', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:51:34', NULL, NULL),
(12, 4, 1, '2021-07-05', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:52:41', NULL, NULL),
(13, 4, 2, '2021-07-21', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:53:25', NULL, NULL),
(14, 4, 1, '2021-07-26', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:54:06', NULL, NULL),
(15, 5, 2, '2021-07-27', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:54:20', NULL, NULL),
(16, 4, 1, '2021-07-28', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:55:06', NULL, NULL),
(17, 4, 2, '2021-07-28', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:55:16', NULL, NULL),
(18, 4, 1, '2021-07-07', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:56:00', NULL, NULL),
(19, 4, 1, '2021-07-14', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:56:16', NULL, NULL),
(20, 4, 1, '2021-07-21', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:56:26', NULL, NULL),
(21, 6, 2, '2021-08-19', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:57:08', NULL, NULL),
(22, 4, 1, '2021-08-02', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:57:45', NULL, NULL),
(23, 5, 2, '2021-08-03', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:57:59', NULL, NULL),
(24, 4, 1, '2021-08-04', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:58:14', NULL, NULL),
(25, 4, 2, '2021-08-04', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:58:25', NULL, NULL),
(26, 4, 1, '2021-08-09', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:00:29', NULL, NULL),
(27, 5, 2, '2021-08-10', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:00:42', NULL, NULL),
(28, 4, 1, '2021-08-11', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:00:52', NULL, NULL),
(29, 4, 2, '2021-08-11', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:01:02', NULL, NULL),
(30, 4, 1, '2021-08-16', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:01:21', NULL, NULL),
(31, 5, 2, '2021-08-17', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:01:33', NULL, NULL),
(32, 4, 1, '2021-08-18', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:01:43', NULL, NULL),
(33, 4, 2, '2021-08-18', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:01:53', NULL, NULL),
(34, 4, 1, '2021-08-23', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:02:17', NULL, NULL),
(35, 5, 2, '2021-08-24', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:02:27', NULL, NULL),
(36, 4, 1, '2021-08-25', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:02:38', NULL, NULL),
(37, 4, 2, '2021-08-25', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:02:49', NULL, NULL),
(38, 4, 1, '2021-08-30', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:02:59', NULL, NULL),
(39, 5, 2, '2021-08-31', 1, 'ผู้ดูแลระบบ', '2021-07-06 21:03:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_des_time`
--

CREATE TABLE `services_des_time` (
  `des_time_id` int(11) NOT NULL COMMENT 'รหัส',
  `serdesId` int(11) NOT NULL COMMENT 'รหัสจากตาราง services_des',
  `destimeId` int(11) NOT NULL COMMENT 'เวลาที่ให้บริการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลประเภทบริการ';

--
-- Dumping data for table `services_des_time`
--

INSERT INTO `services_des_time` (`des_time_id`, `serdesId`, `destimeId`) VALUES
(240, 4, 1),
(241, 4, 2),
(242, 4, 3),
(243, 4, 4),
(244, 4, 5),
(245, 4, 6),
(246, 4, 7),
(247, 5, 14),
(248, 5, 15),
(249, 5, 16),
(250, 5, 17),
(251, 5, 18),
(252, 5, 19),
(253, 5, 20),
(254, 5, 21),
(255, 6, 14),
(256, 6, 15),
(257, 6, 16),
(258, 6, 17),
(259, 6, 18),
(260, 6, 19),
(261, 6, 20),
(262, 6, 21),
(263, 7, 14),
(264, 7, 15),
(265, 7, 16),
(266, 7, 17),
(267, 7, 18),
(268, 7, 19),
(269, 7, 20),
(270, 7, 21),
(271, 8, 1),
(272, 8, 2),
(273, 8, 3),
(274, 8, 4),
(275, 8, 5),
(276, 8, 6),
(277, 8, 7),
(278, 8, 8),
(279, 8, 9),
(280, 8, 10),
(281, 8, 11),
(282, 8, 12),
(283, 8, 13),
(284, 9, 14),
(285, 9, 15),
(286, 9, 16),
(287, 9, 17),
(288, 9, 18),
(289, 9, 19),
(290, 9, 20),
(291, 9, 21),
(292, 10, 14),
(293, 10, 15),
(294, 10, 16),
(295, 10, 17),
(296, 10, 18),
(297, 10, 19),
(298, 10, 20),
(299, 10, 21),
(300, 11, 14),
(301, 11, 15),
(302, 11, 16),
(303, 11, 17),
(304, 11, 18),
(305, 11, 19),
(306, 11, 20),
(307, 11, 21),
(308, 12, 1),
(309, 12, 2),
(310, 12, 3),
(311, 12, 4),
(312, 12, 5),
(313, 12, 6),
(314, 12, 7),
(315, 12, 8),
(316, 12, 9),
(317, 12, 10),
(318, 12, 11),
(319, 12, 12),
(320, 12, 13),
(321, 13, 14),
(322, 13, 15),
(323, 13, 16),
(324, 13, 17),
(325, 13, 18),
(326, 13, 19),
(327, 13, 20),
(328, 13, 21),
(329, 14, 1),
(330, 14, 2),
(331, 14, 3),
(332, 14, 4),
(333, 14, 5),
(334, 14, 6),
(335, 14, 7),
(336, 14, 8),
(337, 14, 9),
(338, 14, 10),
(339, 14, 11),
(340, 14, 12),
(341, 14, 13),
(342, 15, 14),
(343, 15, 15),
(344, 15, 16),
(345, 15, 17),
(346, 15, 18),
(347, 15, 19),
(348, 15, 20),
(349, 15, 21),
(350, 16, 1),
(351, 16, 2),
(352, 16, 3),
(353, 16, 4),
(354, 16, 5),
(355, 16, 6),
(356, 16, 7),
(357, 16, 8),
(358, 16, 9),
(359, 16, 10),
(360, 16, 11),
(361, 16, 12),
(362, 16, 13),
(363, 17, 14),
(364, 17, 15),
(365, 17, 16),
(366, 17, 17),
(367, 17, 18),
(368, 17, 19),
(369, 17, 20),
(370, 17, 21),
(371, 18, 1),
(372, 18, 2),
(373, 18, 3),
(374, 18, 4),
(375, 18, 5),
(376, 18, 6),
(377, 18, 7),
(378, 18, 8),
(379, 18, 9),
(380, 18, 10),
(381, 18, 11),
(382, 18, 12),
(383, 18, 13),
(384, 19, 1),
(385, 19, 2),
(386, 19, 3),
(387, 19, 4),
(388, 19, 5),
(389, 19, 6),
(390, 19, 7),
(391, 19, 8),
(392, 19, 9),
(393, 19, 10),
(394, 19, 11),
(395, 19, 12),
(396, 19, 13),
(397, 20, 1),
(398, 20, 2),
(399, 20, 3),
(400, 20, 4),
(401, 20, 5),
(402, 20, 6),
(403, 20, 7),
(404, 20, 8),
(405, 20, 9),
(406, 20, 10),
(407, 20, 11),
(408, 20, 12),
(409, 20, 13),
(410, 21, 14),
(411, 21, 15),
(412, 21, 16),
(413, 21, 17),
(414, 21, 18),
(415, 21, 19),
(416, 21, 20),
(417, 21, 21),
(418, 22, 1),
(419, 22, 2),
(420, 22, 3),
(421, 22, 4),
(422, 22, 5),
(423, 22, 6),
(424, 22, 7),
(425, 22, 8),
(426, 22, 9),
(427, 22, 10),
(428, 22, 11),
(429, 22, 12),
(430, 22, 13),
(431, 23, 14),
(432, 23, 15),
(433, 23, 16),
(434, 23, 17),
(435, 23, 18),
(436, 23, 19),
(437, 23, 20),
(438, 23, 21),
(439, 24, 1),
(440, 24, 2),
(441, 24, 3),
(442, 24, 4),
(443, 24, 5),
(444, 24, 6),
(445, 24, 7),
(446, 24, 8),
(447, 24, 9),
(448, 24, 10),
(449, 24, 11),
(450, 24, 12),
(451, 24, 13),
(452, 25, 14),
(453, 25, 15),
(454, 25, 16),
(455, 25, 17),
(456, 25, 18),
(457, 25, 19),
(458, 25, 20),
(459, 25, 21),
(460, 26, 1),
(461, 26, 2),
(462, 26, 3),
(463, 26, 4),
(464, 26, 5),
(465, 26, 6),
(466, 26, 7),
(467, 26, 8),
(468, 26, 9),
(469, 26, 10),
(470, 26, 11),
(471, 26, 12),
(472, 26, 13),
(473, 27, 14),
(474, 27, 15),
(475, 27, 16),
(476, 27, 17),
(477, 27, 18),
(478, 27, 19),
(479, 27, 20),
(480, 27, 21),
(481, 28, 1),
(482, 28, 2),
(483, 28, 3),
(484, 28, 4),
(485, 28, 5),
(486, 28, 6),
(487, 28, 7),
(488, 28, 8),
(489, 28, 9),
(490, 28, 10),
(491, 28, 11),
(492, 28, 12),
(493, 28, 13),
(494, 29, 14),
(495, 29, 15),
(496, 29, 16),
(497, 29, 17),
(498, 29, 18),
(499, 29, 19),
(500, 29, 20),
(501, 29, 21),
(502, 30, 1),
(503, 30, 2),
(504, 30, 3),
(505, 30, 4),
(506, 30, 5),
(507, 30, 6),
(508, 30, 7),
(509, 30, 8),
(510, 30, 9),
(511, 30, 10),
(512, 30, 11),
(513, 30, 12),
(514, 30, 13),
(515, 31, 14),
(516, 31, 15),
(517, 31, 16),
(518, 31, 17),
(519, 31, 18),
(520, 31, 19),
(521, 31, 20),
(522, 31, 21),
(523, 32, 1),
(524, 32, 2),
(525, 32, 3),
(526, 32, 4),
(527, 32, 5),
(528, 32, 6),
(529, 32, 7),
(530, 32, 8),
(531, 32, 9),
(532, 32, 10),
(533, 32, 11),
(534, 32, 12),
(535, 32, 13),
(536, 33, 14),
(537, 33, 15),
(538, 33, 16),
(539, 33, 17),
(540, 33, 18),
(541, 33, 19),
(542, 33, 20),
(543, 33, 21),
(544, 34, 1),
(545, 34, 2),
(546, 34, 3),
(547, 34, 4),
(548, 34, 5),
(549, 34, 6),
(550, 34, 7),
(551, 34, 8),
(552, 34, 9),
(553, 34, 10),
(554, 34, 11),
(555, 34, 12),
(556, 34, 13),
(557, 35, 14),
(558, 35, 15),
(559, 35, 16),
(560, 35, 17),
(561, 35, 18),
(562, 35, 19),
(563, 35, 20),
(564, 35, 21),
(565, 36, 1),
(566, 36, 2),
(567, 36, 3),
(568, 36, 4),
(569, 36, 5),
(570, 36, 6),
(571, 36, 7),
(572, 36, 8),
(573, 36, 9),
(574, 36, 10),
(575, 36, 11),
(576, 36, 12),
(577, 36, 13),
(578, 37, 14),
(579, 37, 15),
(580, 37, 16),
(581, 37, 17),
(582, 37, 18),
(583, 37, 19),
(584, 37, 20),
(585, 37, 21),
(586, 38, 1),
(587, 38, 2),
(588, 38, 3),
(589, 38, 4),
(590, 38, 5),
(591, 38, 6),
(592, 38, 7),
(593, 38, 8),
(594, 38, 9),
(595, 38, 10),
(596, 38, 11),
(597, 38, 12),
(598, 38, 13),
(599, 39, 14),
(600, 39, 15),
(601, 39, 16),
(602, 39, 17),
(603, 39, 18),
(604, 39, 19),
(605, 39, 20),
(606, 39, 21);

-- --------------------------------------------------------

--
-- Table structure for table `services_point`
--

CREATE TABLE `services_point` (
  `ser_point_id` int(11) NOT NULL COMMENT 'รหัส',
  `ser_point_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อจุดบริการ',
  `ser_point_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `ser_point_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `ser_point_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `ser_point_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `ser_point_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลจุดบริการ';

--
-- Dumping data for table `services_point`
--

INSERT INTO `services_point` (`ser_point_id`, `ser_point_name`, `ser_point_status`, `ser_point_addby`, `ser_point_adddate`, `ser_point_updateby`, `ser_point_updatedate`) VALUES
(4, 'คลินิกทันตกรรมทั่วไป', 1, 'ผู้ดูแลระบบ', '2021-07-05 23:17:14', 'ผู้ดูแลระบบ', '2021-07-06 15:15:34'),
(5, 'คลินิกทันตกรรมผู้ป่วยเรื้อรัง', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:28:46', NULL, NULL),
(6, 'คลินิกส่งเสริมสุขภาพเด็กดี', 1, 'ผู้ดูแลระบบ', '2021-07-06 20:29:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_time`
--

CREATE TABLE `services_time` (
  `time_id` int(11) NOT NULL COMMENT 'รหัส',
  `time_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ให้บริการ',
  `time_type` int(1) NOT NULL DEFAULT 1 COMMENT 'รหัสประเภทบริการ [1=คลินิกทั่วไป,2=คลินิกนอกเวลา]',
  `time_status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `time_addby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพิ่มข้อมูลโดย',
  `time_adddate` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `time_updateby` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `time_updatedate` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลประเภทบริการ';

--
-- Dumping data for table `services_time`
--

INSERT INTO `services_time` (`time_id`, `time_name`, `time_type`, `time_status`, `time_addby`, `time_adddate`, `time_updateby`, `time_updatedate`) VALUES
(1, '08.30 - 09.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(2, '09.00 - 09.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(3, '09.30 - 10.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(4, '10.00 - 10.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(5, '10.30 - 11.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(6, '11.00 - 11.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(7, '11.30 - 12.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(8, '13.00 - 13.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(9, '13.30 - 14.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(10, '14.00 - 14.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(11, '14.30 - 15.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(12, '15.00 - 15.30', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(13, '15.30 - 16.00', 1, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(14, '16.30 - 17.00', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(15, '17.00 - 17.30', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(16, '17.30 - 18.00', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(17, '18.00 - 18.30', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(18, '18.30 - 19.00', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(19, '19.00 - 19.30', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(20, '19.30 - 20.00', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06'),
(21, '20.00 - 20.30', 2, 1, 'System', '2021-07-06 15:44:06', 'System', '2021-07-06 15:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `icon_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Icon Web',
  `logo_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Logo Web',
  `name_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อเว็บไซต์',
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมล',
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Facebook',
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Twitter',
  `edit_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `edit_date` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `icon_web`, `logo_web`, `name_web`, `tel`, `email`, `facebook`, `twitter`, `edit_by`, `edit_date`) VALUES
(14, 'icon3309549920210625_235337.png', 'logo72795205520210627_200725.png', 'ระบบจองคิวทันตกรรมออนไลน์', '0123-456-7890', 'ex@email.com', 'https://www.facebook.com/samroiyodhospital', '', 'ผู้ดูแลระบบ', '2021-06-28 00:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `album_des`
--
ALTER TABLE `album_des`
  ADD PRIMARY KEY (`des_id`),
  ADD KEY `album_des_albumId_index` (`albumId`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `services_des`
--
ALTER TABLE `services_des`
  ADD PRIMARY KEY (`serdes_id`),
  ADD KEY `services_des_serpoint_id_index` (`serpoint_id`) USING BTREE;

--
-- Indexes for table `services_des_time`
--
ALTER TABLE `services_des_time`
  ADD PRIMARY KEY (`des_time_id`),
  ADD KEY `services_des_time_serdesId_index` (`serdesId`) USING BTREE,
  ADD KEY `services_des_time_destimeId_index` (`destimeId`) USING BTREE;

--
-- Indexes for table `services_point`
--
ALTER TABLE `services_point`
  ADD PRIMARY KEY (`ser_point_id`);

--
-- Indexes for table `services_time`
--
ALTER TABLE `services_time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `album_des`
--
ALTER TABLE `album_des`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_des`
--
ALTER TABLE `services_des`
  MODIFY `serdes_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `services_des_time`
--
ALTER TABLE `services_des_time`
  MODIFY `des_time_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=607;

--
-- AUTO_INCREMENT for table `services_point`
--
ALTER TABLE `services_point`
  MODIFY `ser_point_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_time`
--
ALTER TABLE `services_time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_des`
--
ALTER TABLE `album_des`
  ADD CONSTRAINT `album_des_albumId_foreign` FOREIGN KEY (`albumId`) REFERENCES `album` (`album_id`) ON DELETE CASCADE;

--
-- Constraints for table `services_des`
--
ALTER TABLE `services_des`
  ADD CONSTRAINT `services_des_serpoint_id_foreign` FOREIGN KEY (`serpoint_id`) REFERENCES `services_point` (`ser_point_id`) ON DELETE CASCADE;

--
-- Constraints for table `services_des_time`
--
ALTER TABLE `services_des_time`
  ADD CONSTRAINT `services_des_time_destimeId_foreign` FOREIGN KEY (`destimeId`) REFERENCES `services_time` (`time_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_des_time_serdesId_foreign` FOREIGN KEY (`serdesId`) REFERENCES `services_des` (`serdes_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
