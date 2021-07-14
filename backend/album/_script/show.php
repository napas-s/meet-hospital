<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");

	$album_id           = $_POST['idShow'];
	$name_user          = $_SESSION["User"];
    if($_POST['statusShow'] == 1){
        $status = 0;
    }else{
        $status = 1;
    }

    $sql = "UPDATE album SET
        album_status     ='$status',
        album_updateby   ='$name_user',
        album_updatedate ='$date'
        WHERE album_id=$album_id";

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