<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$ser_point_name    		= $_POST['ser_point_name'];
	$ser_point_status 	    = $_POST['ser_point_status'];
	$ser_point_addby 			= $_SESSION["User"];

	$check   = "SELECT * FROM services_point  WHERE ser_point_name='$ser_point_name'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีชื่อจุดบริการนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

		$sql = "INSERT INTO services_point (ser_point_name,ser_point_status,ser_point_addby, ser_point_adddate)
				VALUES
				('$ser_point_name','$ser_point_status','$ser_point_addby', '$date')";

		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

		if($result){

			$id = mysqli_insert_id($con);

			echo "<script type='text/javascript'>";
			echo "window.location='../form.php?id=$id&icon=success&message=เพิ่มข้อมูลเรียบร้อยแล้ว';";
			echo "</script>";

		}else{
			echo "<script type='text/javascript'>";
			echo "window.location='../form.php?icon=error&message=เพิ่มข้อมูลไม่สำเร็จ';";
			echo "</script>";
		}
	}

 ?>