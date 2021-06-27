<!DOCTYPE html>
<html lang="en">
<head>

    <!-- นำเข้าไฟล์ config part file เพื่อเรียกใช้ part file ปัจจุบัน -->
    <?PHP include_once('assets/vendor/base_url.php'); ?>

    <!-- นำเข้าไฟล์ฐานข้อมูล -->
    <?PHP require_once('_database/connection.php'); ?>
    <?php
        $sql_setting="SELECT * FROM setting";
        $sql_query_setting = mysqli_query($con,$sql_setting)or die(mysqli_error($con));
        $setting = mysqli_fetch_assoc($sql_query_setting);
    ?>

    <?PHP if(isset($setting['name_web'])){ ?>
        <title><?PHP echo $setting['name_web']; ?></title>
    <?PHP } ?>
    <?PHP if(isset($setting['icon_web'])){ ?>
        <link rel="icon" href="<?PHP echo base_url(); ?>uploads/setting/<?PHP echo $setting['icon_web']; ?>" type ="image/x-icon">
    <?PHP } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- นำเข้าไฟล์ config font -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/fonts/stylesheet.css">

    <!-- นำเข้า CSS -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/css/custom.css">

    <!-- นำเข้า Canvas css สำหรับตกแต่งเว็บไซต์ -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/style.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/colors.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>assets/vendor/canvas/css/fonts.css" type="text/css" />


</head>
<body class="stretched">

