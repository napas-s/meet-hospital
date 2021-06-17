<?PHP

    //ประกาศใช้ session เพื่อ login (การใส่ @ นำหน้า session คือการปิด error ของ session)
    @session_start();
    //เช็คว่ามี session id อยู่หรือไม่ ถ้าไม่มีให้ไปยังหน้า login และแสดง er == 1
    if(!isset($_SESSION["Id"]) || $_SESSION["Id"]==""){
        Header("Location: ../../login.php?er=1");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ระบบจัดการหลังบ้าน</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

   <!-- นำเข้าไฟล์ config part file เพื่อเรียกใช้ part file ปัจจุบัน -->
   <?PHP include_once('../../assets/vendor/base_url.php'); ?>

  <!-- นำเข้าไฟล์  Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

  <!-- นำเข้าไฟล์ CSS Files -->

  <link href="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/css/paper-dashboard.css" rel="stylesheet" />
  <link href="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/css/custom.css" rel="stylesheet" />

  <!-- นำเข้าไฟล์ CSS Just for demo purpose, don't include it in your project -->
  <link href="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">