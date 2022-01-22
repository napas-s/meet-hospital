<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$ser_name    		= $_POST['ser_name'];
	$ser_status 	    = $_POST['ser_status'];
	$ser_addby 			= $_SESSION["User"];

	$check   = "SELECT * FROM services  WHERE ser_name='$ser_name'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีชื่อบริการนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

		$sql = "INSERT INTO services (ser_name,ser_status,ser_addby, ser_adddate,ser_updateby,ser_updatedate)
				VALUES
				('$ser_name','$ser_status','$ser_addby', '$date','$ser_addby', '$date')";

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