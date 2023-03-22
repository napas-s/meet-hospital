<?PHP

    //ประกาศใช้ session เพื่อ login (การใส่ @ นำหน้า session คือการปิด error ของ session)
    session_start();
    @ob_start();
    //เช็คว่ามี session id อยู่หรือไม่ ถ้าไม่มีให้ไปยังหน้า login และแสดง er == 1
    if(!isset($_SESSION["Id"]) || $_SESSION["Id"]==""){
        echo "<script type='text/javascript'>";
        echo "window.location='../../login.php?er=1';";
        echo "</script>";
    }

    //ตั้งค่า timezone
    date_default_timezone_set('Asia/Bangkok');

?>
<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>
<?php
    $sql_setting="SELECT * FROM setting";
    $sql_query_setting = mysqli_query($con,$sql_setting)or die(mysqli_error($con));
    $setting_temp = mysqli_fetch_assoc($sql_query_setting);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- นำเข้าไฟล์ config part file เพื่อเรียกใช้ part file ปัจจุบัน -->
    <?PHP include_once('../../assets/vendor/base_url.php'); ?>

    <meta charset="utf-8" />
    <?PHP if(isset($setting_temp['icon_web'])){ ?>
        <link rel="icon" href="../../uploads/setting/<?PHP echo $setting_temp['icon_web']; ?>" type ="image/png">
    <?PHP } ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?PHP if(isset($setting_temp['name_web'])){ ?>
        <title>ระบบจัดการหลังบ้าน | <?PHP echo $setting_temp['name_web']; ?></title>
    <?PHP } ?>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />


    <!-- นำเข้าไฟล์  Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- นำเข้าไฟล์ CSS Files -->

    <link href="../../assets/vendor/paper-dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/vendor/paper-dashboard/assets/css/paper-dashboard.css" rel="stylesheet" />
    <link href="../../assets/vendor/paper-dashboard/assets/css/custom.css" rel="stylesheet" />

    <!-- นำเข้าไฟล์ CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/vendor/paper-dashboard/assets/demo/demo.css" rel="stylesheet" />

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap-datepicker/css/datepicker.css" type="text/css" />

</head>

<body class="">