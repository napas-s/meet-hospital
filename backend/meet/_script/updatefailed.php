<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');

	$Id    		        = $_POST['mtId'];
	$status             = $_POST['mt_status'];
	$updateby           = $_SESSION["User"];
	$updatedate         = date("Y-m-d H:i:s");

    $sql = "UPDATE meet_service SET mt_status ='$status', mt_status_updateby = '$updateby', mt_status_dateby = '$updatedate' WHERE mt_id = $Id";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../failedform.php?id=$Id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../failedform.php?id=$Id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }


?>