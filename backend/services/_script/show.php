<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");

	$ser_id          = $_POST['idShow'];
	$ser_updateby    = $_SESSION["User"];
    if($_POST['statusShow'] == 1){
        $status = 2;
    }else{
        $status = 1;
    }

    $sql = "UPDATE services SET
        ser_status ='$status',
        ser_updateby ='$ser_updateby',
        ser_updatedate ='$date'
        WHERE ser_id=$ser_id";

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