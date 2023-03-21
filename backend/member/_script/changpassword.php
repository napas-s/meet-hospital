<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");

    $member_id          = $_POST['member_id'];
	$member_updateby    = $_SESSION["User"];
	$member_password_old= md5($_POST['member_password_old']);
	$member_password 	= md5($_POST['member_password']);
	$is_change 	        = $_POST['is_change'];

    $sql="SELECT * FROM member WHERE member_id = $member_id ";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($sql_query);

    if ($is_change == 2)
    {
        if ($member_password_old != $row['member_password'])
        {
            echo "<script type='text/javascript'>";
            echo "window.location='../changpassword.php?id=$member_id&icon=error&message=รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบข้อมูล';";
            echo "</script>";
        } else
        {
            echo "<script type='text/javascript'>";
            echo "window.location='../changpassword.php?id=$member_id&is_change=1';";
            echo "</script>";
        }
    }

    if ($is_change == 1) {
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
    } else {
        echo "<script type='text/javascript'>";
        echo "window.location='../changpassword.php?id=$member_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }

?>