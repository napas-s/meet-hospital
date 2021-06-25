-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2021 at 07:23 PM
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
  `about_googlemap` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'link google map',
  `about_lavel` int(1) NOT NULL COMMENT 'ประเภทเนื้อหา (1= เนื้อหา,2=รูปภาพ, 3= link google map)',
  `about_type` int(1) NOT NULL COMMENT 'ประเภท (1=ข้อมูลเกี่ยวกับองค์กร, 2=แผนผังองค์กร, 3=แผนที่องค์กร, 4=ตารางเวลาการให้บริการ)',
  `about_status` int(1) NOT NULL COMMENT 'สถานะการใช้งาน [1=แสดง, 0=ซ่อน]	',
  `about_updateby` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `about_updatedate` datetime NOT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลเกี่ยวกับองค์กร';

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_content`, `about_img`, `about_googlemap`, `about_lavel`, `about_type`, `about_status`, `about_updateby`, `about_updatedate`) VALUES
(1, '<p>dddddd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>svdgdf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dfgdfg</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\">sgdgdfg</div>\r\n', '104378529720210625_220556.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7799.138410869049!2d99.858551!3d12.209689!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51b42d703b0d112c!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Liq4Liy4Lih4Lij4LmJ4Lit4Lii4Lii4Lit4LiU!5e0!3m2!1sth!2sth!4v1624635317817!5m2!1sth!2sth\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 3, 1, 'ผู้ดูแลระบบ', '2021-06-25 23:31:22'),
(2, '', '72324455820210626_001543.jpeg', '', 2, 2, 1, 'ผู้ดูแลระบบ', '2021-06-26 00:15:43'),
(3, '<p>โรงพยาบาลสามร้อยยอด &nbsp;เดิมใช้ชื่อว่า&nbsp; &quot;โรงพยาบาลกุยบุรี&quot; &nbsp;แต่ต่อมาได้เปลี่ยนชื่อเป็น &quot;โรงพยาบาลสามร้อยยอด&quot;&nbsp;&nbsp;ตามสถานที่ตั้งของกิ่งอำเภอสามร้อยยอดเมื่อเดือน ตุลาคม 2539<br />\r\nโรงพยาบาลสามร้อยยอด &nbsp;&nbsp;ตั้งอยู่เลขที่&nbsp;51&nbsp;&nbsp; หมู่ที่ &nbsp;6&nbsp;&nbsp; ตำบลไร่ใหม่ &nbsp;&nbsp;กิ่งอำเภอสามร้อยยอด&nbsp;จังหวัดประจวบคีรีขันธ์&nbsp;มีเนื้อที่ทั้งหมด&nbsp;18&nbsp;ไร่&nbsp;&nbsp; 2&nbsp;&nbsp; งาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>พ.ศ. &nbsp;&nbsp;&nbsp; 2508&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เริ่มจากสถานีอนามัย&nbsp;ชั้น 2<br />\r\nพ.ศ.&nbsp;&nbsp;&nbsp; &nbsp;2518&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยกฐานะเป็นศูนย์การแพทย์ และอนามัย<br />\r\nพ.ศ.&nbsp;&nbsp;&nbsp; &nbsp;2519&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยกฐานะเป็นโรงพยาบาลอำเภอ&nbsp;ขนาด&nbsp;10&nbsp;เตียง<br />\r\nพ.ศ. &nbsp;&nbsp;&nbsp; 2527&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ยกฐานะเป็นโรงพยาบาล&nbsp;ขนาด 60 เตียง<br />\r\nพ.ศ. &nbsp;&nbsp;&nbsp; 2539&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปลี่ยนชื่อโรงพยาบาลกุยบุรี มาเป็น&nbsp;โรงพยาบาลสามร้อยยอด</p>\r\n\r\n<h3>รายนามผู้อำนวยการโรงพยาบาลสามร้อยยอด</h3>\r\n\r\n<ul>\r\n	<li>นายแพทย์วิทยา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; คุณานุกูล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2518-2529</li>\r\n	<li>นายแพทย์พิภพ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เจนสุทธิเวชกุล&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2529-2532</li>\r\n	<li>นายแพทย์สมเกียรติ&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ตั้งใจรักษาการดี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2532-2536(รก.)</li>\r\n	<li>นายแพทย์สมชาญ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; พงษ์ริยวัฒนา&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2536-2539(รก.)</li>\r\n	<li>แพทย์หญิงศรีสมัย&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เชื้อชาติ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2539-2543(รก.)</li>\r\n	<li>นายแพทย์ปิยะ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ลินลาวรรณ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; พ.ศ.2543-2546(รก.)</li>\r\n	<li>แพทย์หญิงศรีสมัย&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; เชื้อชาติ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2546-2551</li>\r\n	<li>นายแพทย์สมเกียรติ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ตั้งใจรักษาการดี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; พ.ศ.2551-30 ก.ย.2562</li>\r\n	<li>แพทย์หญิงวศินี&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; วีระไวทยะ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ต.ค.2562-ปัจจุบัน</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>วิสัยทัศน์ (VISION) ปี 2560 &ndash; 2564</strong></h3>\r\n\r\n<p>เป็นผู้นำให้บริการด้านสุขภาพที่มีคุณภาพมาตรฐาน บริหารจัดการตามหลักธรรมาภิบาล ผู้รับบริการมีพฤติกรรมสุขภาพที่ดี</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>พันธกิจ (MISSION) ปี 2560 &ndash; 2564</strong></h3>\r\n\r\n<ol>\r\n	<li>พัฒนาระบบบริการจัดการด้านสุขภาพให้มีประสิทธิภาพตามหลักธรรมาภิบาล</li>\r\n	<li>พัฒนาคุณภาพมาตรฐานด้านการรักษาพยาบาลการเฝ้าระวังป้องกันโรค&nbsp;&nbsp; การส่งเสริมสุขภาพ&nbsp; และฟื้นฟูสภาพ</li>\r\n	<li>ส่งเสริมและพัฒนาการใช้ภูมิปัญญาการแพทย์แผนไทยและการแพทย์ทางเลือก</li>\r\n	<li>สร้างเสริมพฤติกรรมสุขภาพที่ถูกต้องของประชาชน</li>\r\n	<li>พัฒนาระบบประกันสุขภาพให้ประชาชนเข้าถึงบริการได้อย่างเสมอภาคและเป็นธรรม</li>\r\n	<li>ส่งเสริมและจัดระบบการคุ้มครองผู้บริโภค</li>\r\n	<li>เสริมสร้างความเข้มแข็งของภาคีเครือข่าย</li>\r\n	<li>เสริมสร้างและพัฒนาสมรรถนะบุคลากร</li>\r\n	<li>พัฒนาระบบข้อมูลข่าวสาร&nbsp; เทคโนโลยีสารสนเทศให้มีประสิทธิภาพ</li>\r\n	<li>พัฒนาวิชาการและส่งเสริมการสร้างนวัตกรรมด้านสุขภาพ</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>ยุทธศาสตร์</h3>\r\n\r\n<ol>\r\n	<li>พัฒนาระบบบริหารจัดการภายในองค์กรและเครือข่ายให้สอดคล้องตามหลักธรรมาภิบาล</li>\r\n	<li>พัฒนาและจัดการระบบการรักษาพยาบาลเฝ้าระวังป้องกันโรค&nbsp; ส่งเสริมสุขภาพ&nbsp; และฟื้นฟุสภาพ</li>\r\n	<li>พัฒนาระบบการแพทย์แผนไทยและการแพทย์ทางเลือก</li>\r\n	<li>ส่งเสริมการจัดบริการสร้างเสริมพฤติกรรมการกูแลสุขภาพ</li>\r\n	<li>ส่งเสริมการจัดระบบบริการสุขภาพที่ประชาชนสามารถเข้าถึงได้อย่างครอบคลุมและทั่วถึง</li>\r\n	<li>พัฒนากลไกลการดำเนินงานควบคุม&nbsp; กำกับด้านคุ้มครองผู้บริโภคและด้านบริการสุขภาพ</li>\r\n	<li>&nbsp;พัฒนาภาคีเครือข่ายให้มีศักยภาพและส่งเสริมการมีส่วนร่วมในการดำเดินงาสร้างสุ๘ขภาพ</li>\r\n	<li>พัฒนาศักยภาพบุคลากร</li>\r\n	<li>พัฒนาระบบข้อมูลสารสนเทศ</li>\r\n	<li>พัฒนาองค์กรให้เป็นองค์กรแห่งการเรียนรู้</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', 1, 1, 1, 'ผู้ดูแลระบบ', '2021-06-26 00:03:01');

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

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `icon_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Icon Web',
  `logo_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Logo Web',
  `name_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อเว็บไซต์',
  `edit_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อัพเดตข้อมูลโดย',
  `edit_date` datetime DEFAULT NULL COMMENT 'วันที่อัพเดต'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `icon_web`, `logo_web`, `name_web`, `edit_by`, `edit_date`) VALUES
(14, 'icon3309549920210625_235337.png', 'logo3309549920210625_235337.png', 'ระบบจองคิวทันตกรรมออนไลน์', 'ผู้ดูแลระบบ', '2021-06-25 23:53:37');

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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้';

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
