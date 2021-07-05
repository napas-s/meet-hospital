<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$ser_point_id    	   = $_POST['ser_point_id'];
    $ser_point_name        = $_POST['ser_point_name'];
    $ser_point_status      = $_POST['ser_point_status'];
	$ser_point_updateby    = $_SESSION["User"];

    $check   = "SELECT * FROM services_point WHERE ser_point_name='$ser_point_name' AND ser_point_id != '$ser_point_id' ";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

    if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?id=$ser_point_id&icon=warning&message=มีชื่อจุดบริการนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {


        $sql = "UPDATE services_point SET
            ser_point_name	    ='$ser_point_name',
            ser_point_status	    ='$ser_point_status',
            ser_point_updateby	='$ser_point_updateby',
            ser_point_updatedate	='$date2'
            WHERE ser_point_id=$ser_point_id";

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$ser_point_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$ser_point_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }

    }

?>