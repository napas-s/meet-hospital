<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$album_id    		= $_POST['album_id'];
	$album_title    	= $_POST['album_title'];
	$album_detail    	= $_POST['album_detail'];
	$album_status    	= $_POST['album_status'];
	$member_addby 		= $_SESSION["User"];

    $check   = "SELECT * FROM album WHERE album_title='$album_title' AND album_id != '$album_id' ";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

    if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?id=$album_id&icon=warning&message=มีชื่ออัลบั้มนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

        $sql = "UPDATE album SET
            album_title	        ='$album_title',
            album_detail	    ='$album_detail',
            album_status	    ='$album_status',
            album_updateby	    ='$member_addby',
            album_updatedate	='$date2'
            WHERE album_id=$album_id";

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$album_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$album_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }

    }

?>