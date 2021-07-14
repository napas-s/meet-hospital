<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");

	$member_id          = $_POST['member_id'];
	$member_updateby    = $_SESSION["User"];
	$member_password 	= md5($_POST['member_password']);

    $sql = "UPDATE member SET
        member_password ='$member_password',
        member_updateby ='$member_updateby',
        member_updatedate ='$date'
        WHERE member_id=$member_id";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$member_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$member_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }

?>