<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$des_id    		    = $_GET['id'];
	$albumId    	    = $_GET['albumId'];
	$status    	    = $_GET['status'];
	$member_addby 		= $_SESSION["User"];

    //ค้นหาว่าใน album_des มีภาพหน้าปกของ album หรือยัง ถ้ามีแล้วให้อัพเดตเป็น 0
    $check_album   = "SELECT * FROM album_des WHERE albumId = '$albumId' AND des_status='1' ";
	$sql_query_album = mysqli_query($con, $check_album);
    while($album = mysqli_fetch_array($sql_query_album)) {
        $sql_album = "UPDATE album_des SET des_status ='0' WHERE des_id=$album[des_id]";

        mysqli_query($con, $sql_album) or die ("Error in query: $sql " . mysqli_error($con));
    }

    $check   = "SELECT * FROM album_des WHERE des_id='$des_id' AND albumId = '$albumId' ";
    $sql_query = mysqli_query($con, $check);
    $row = mysqli_fetch_assoc($sql_query);

    if($status == 1){
        $status = 0;
    }else{
        $status = 1;
    }

    $sql = "UPDATE album_des SET des_status	='$status' WHERE des_id=$des_id";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$albumId';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$albumId';";
        echo "</script>";
    }

?>