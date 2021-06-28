<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$album_title    	= $_POST['album_title'];
	$album_detail    	= $_POST['album_detail'];
	$album_status    	= $_POST['album_status'];
	$member_addby 		= $_SESSION["User"];

	$check   = "SELECT * FROM album  WHERE album_title='$album_title'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีชื่ออัลบั้มนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

		$sql = "INSERT INTO album (album_title, album_detail, album_status, album_addby, album_adddate, album_updateby, album_updatedate)
				VALUES
				('$album_title','$album_detail', '$album_status', '$member_addby', '$date', '$member_addby', '$date')";

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