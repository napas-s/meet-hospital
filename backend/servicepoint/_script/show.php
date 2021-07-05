<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");

	$ser_point_id          = $_POST['idShow'];
	$ser_point_updateby    = $_SESSION["User"];
    if($_POST['statusShow'] == 1){
        $status = 2;
    }else{
        $status = 1;
    }

    $sql = "UPDATE services_point SET
        ser_point_status ='$status',
        ser_point_updateby ='$ser_point_updateby',
        ser_point_updatedate ='$date'
        WHERE ser_point_id=$ser_point_id";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../index.php';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../index.php';";
        echo "</script>";
    }

?>