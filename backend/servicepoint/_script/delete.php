<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $ser_point_id = $_POST['idDelete'];

    //เช็คว่าในตาราง services_des ว่ามีการใช้ id นี้หรือยัง ถ้ามีให้แจ้งเตือนห้ามลบข้อมูล
    $check   = "SELECT * FROM services_des WHERE serpoint_id='$ser_point_id'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{
        echo "<script>";
        echo "window.location ='../index.php?icon=warning&title=ไม่สามารถลบข้อมูลได้&message=มีการใช้ข้อมูลในเวลาการให้บริการ '; ";
		echo "</script>";

	} else {

        //ถ้าไม่การการนำ id นี้ไปใช้ให้ลบข้อมูลได้
        $sql = "DELETE FROM services_point WHERE ser_point_id=$ser_point_id";
        $result = mysqli_query($con, $sql) or die("Error in query : $sql" .mysqli_error($con));

        if($result){
            echo "<script>";
            echo "window.location ='../index.php'; ";
            echo "</script>";
        } else {
            echo "<script>";
            echo "window.location ='../index.php'; ";
            echo "</script>";
        }

    }
?>