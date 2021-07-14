<!DOCTYPE html>
<html lang="en">
<head>

    <!-- นำเข้าไฟล์ config part file เพื่อเรียกใช้ part file ปัจจุบัน -->
    <?PHP include_once('../assets/vendor/base_url.php'); ?>

    <!-- นำเข้าไฟล์ฐานข้อมูล -->
    <?PHP require_once('../_database/connection.php'); ?>
    <?php
        $sql_setting="SELECT * FROM setting";
        $sql_query_setting = mysqli_query($con,$sql_setting)or die(mysqli_error($con));
        $setting = mysqli_fetch_assoc($sql_query_setting);
    ?>

    <?PHP if(isset($setting['name_web'])){ ?>
        <title><?PHP echo $setting['name_web']; ?></title>
    <?PHP } ?>
    <?PHP if(isset($setting['icon_web'])){ ?>
        <link rel="icon" href="<?PHP echo base_url(); ?>../uploads/setting/<?PHP echo $setting['icon_web']; ?>" type ="image/x-icon">
    <?PHP } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- นำเข้าไฟล์ config font -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/fonts/stylesheet.css">

    <!-- นำเข้า CSS -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/css/custom.css">

    <!-- นำเข้า Canvas css สำหรับตกแต่งเว็บไซต์ -->
    <link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/style.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/colors.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/fonts.css" type="text/css" />

    <!-- Date & Time Picker CSS -->
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/components/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/components/timepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?PHP echo base_url(); ?>../assets/vendor/canvas/css/components/daterangepicker.css" type="text/css" />

</head>
<body class="stretched">

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="center">
                    <img class="logo-health" src="../assets/images/ministry_of_public_health.png" />
                    <h3 class="c-text" style="margin-bottom: 0;">โรงพยาบาลสามร้อยยอด</h3>
                    <h4 class="c-text" style="margin-bottom: 0;">กระทรวงสาธารณสุข</h4>
                    <h4 class="c-text" style="margin-bottom: 0;">ระบบจองนัดออนไลน์</h4>
                </div>
                <?PHP
                    $Id = $_GET["id"];
                    $sql="SELECT * FROM meet_service 
                            JOIN services_point ON services_point.ser_point_id = meet_service.mt_serpoint_id 
                            JOIN services ON services.ser_id = meet_service.mt_service_id 
                            JOIN services_des ON services_des.serdes_id = meet_service.mt_serdateId 
                            JOIN services_des_time ON services_des_time.serdesId = services_des.serdes_id 
                            JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                            WHERE meet_service.mt_id = $Id ";
                    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                    $row = mysqli_fetch_assoc($sql_query);
                ?>
                <br/>
                <div class="preview_detail_pdf">
                    <div><h4>รายละเอียดการนัดหมายทันตกรรม</h4></div>
                    <div class='mg_present'><b>เลขบัตรประชาชน : </b><?PHP if(isset($row['mt_idcardNumber'])){ echo $row['mt_idcardNumber']; } ?></div>
                    <div class='mg_present'><b>วัน/เดือน/ปีเกิด : </b><?PHP if(isset($row['mt_birthday'])){ echo $row['mt_birthday']; } ?></div>
                    <div class='mg_present'><b>เบอร์โทรศัพท์ : </b><?PHP if(isset($row['mt_tel'])){ echo $row['mt_tel']; } ?></div>
                    <div class='divider'><i class='icon-screen'></i></div>
                    <div class='mg_present'><b>จุดบริการ : </b><?PHP if(isset($row['ser_point_name'])){ echo $row['ser_point_name']; } ?></div>
                    <div class='mg_present'><b>ประเภทบริการ : </b><?PHP if(isset($row['mt_sertype_id'])){ ?> <?PHP if($row['mt_sertype_id'] == 1){echo 'คลินิกทั่วไป';}else{echo 'คลินิกนอกเวลา';} ?> <?PHP } ?></div>
                    <div class='mg_present'><b>บริการ : </b><?PHP if(isset($row['ser_name'])){ echo $row['ser_name']; } ?></div>
                    <div class='mg_present'><b>วันที่นัดหมาย : </b><?PHP if(isset($row['serdes_date'])){ echo $row['serdes_date']; } ?></div>
                    <div class='mg_present'><b>เวลาที่นัดหมาย : </b><?PHP if(isset($row['time_name'])){ echo $row['time_name']; } ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- นำเข้า Canvas js สำหรับตกแต่งเว็บไซต์ -->
    <script type="text/javascript" src="<?PHP echo base_url(); ?>../assets/vendor/canvas/js/jquery.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>../assets/vendor/canvas/js/plugins.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>../assets/vendor/canvas/js/functions.js"></script>

</body>
</html>