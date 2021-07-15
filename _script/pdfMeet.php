<?php
// Include the main TCPDF library (search for installation path).
require_once('../assets/vendor/tcpdf/tcpdf.php');
require_once("../assets/vendor/tcpdf/class/class_curl.php");

// การตั้งค่าข้อความ ที่เกี่ยวข้องให้ดูในไฟล์ 
// tcpdf / config /  tcpdf_config.php 

// เริ่มสร้างไฟล์ pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// กำหนดรายละเอียดของไฟล์ pdf
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('โรงพยาบาลสามร้อยยอด');
$pdf->SetTitle('โรงพยาบาลสามร้อยยอด ');
$pdf->SetSubject('นัดหมายทันตกรรมออนไลน์');
$pdf->SetKeywords('โรงพยาบาลสามร้อยยอด, นัดหมายทันตกรรมออนไลน์');

// กำหนดแบ่่งหน้าอัตโนมัติ
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// กำหนดสัดส่วนของรูปภาพ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// กำหนดขอบเขตความห่างจากขอบ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetHeaderData(
    PDF_HEADER_LOGO, // โลโก้ กำหนดค่าในไฟล์  tcpdf_config.php 
    PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE,
    PDF_HEADER_STRING, // กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
    array(0,0,0),  // กำหนดสีของข้อความใน header rgb 
    array(255,255,255)   // กำหนดสีของเส้นคั่นใน header rgb 
);
$pdf->setFooterData(
    array(0,64,0),  // กำหนดสีของข้อความใน footer rgb 
    array(0,0,0)   // กำหนดสีของเส้นคั่นใน footer rgb 
);


// อนุญาตให้สามารถกำหนดรุปแบบ ฟอนท์ย่อยเพิมเติมในหน้าใช้งานได้
$pdf->setFontSubsetting(true);

// กำหนด ฟอนท์
$pdf->SetFont('thsarabun', '', 16, '', true);

// เพิ่มหน้า
$pdf->AddPage();

$path_info = pathinfo($_SERVER['REQUEST_URI']);
$http = ($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']."://":"http://";
$host = $_SERVER['SERVER_NAME'];
$pathDir = $path_info['dirname']."/";
$url = $http.$host.$pathDir;

// เรียกใช้งาน ฟังก์ชั่นดึงข้อมูลไฟล์มาใช้งาน
$html = curl_get($url."htmlMeet.php?id=$_GET[id]"); // path ไฟล์ 
// ถ้าทดสอบบน server ใช้เป็น http://www.example.com/data_html.php
// ภ้าทดสอบที่เครื่องก็ใช้ http://localhost/data_html.php

// สร้าง pdf ด้วยคำสั่ง writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$dateNow = date("dmy-h:i:s");
// แสดงไฟล์ pdf
$pdf->Output('meet_'.$dateNow.'.pdf', 'D');
?>