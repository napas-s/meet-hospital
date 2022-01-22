<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$ser_id    		 = $_POST['ser_id'];
    $ser_name        = $_POST['ser_name'];
    $ser_status      = $_POST['ser_status'];
	$ser_updateby    = $_SESSION["User"];

    $check   = "SELECT * FROM services WHERE ser_name='$ser_name' AND ser_id != '$ser_id' ";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

    if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?id=$ser_id&icon=warning&message=มีชื่อบริการนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {


        $sql = "UPDATE services SET
            ser_name	    ='$ser_name',
            ser_status	    ='$ser_status',
            ser_updateby	='$ser_updateby',
            ser_updatedate	='$date2'
            WHERE ser_id=$ser_id";

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$ser_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$ser_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }

    }

?>