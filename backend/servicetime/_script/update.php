<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$serdesId    		    = $_POST['serdesId'];
    $serpoint_id    		= $_POST['serpoint_id'];
	$sertype_id    			= $_POST['sertype_id'];
    if(!empty($_POST['serdes_date'])){
	    $serdes_date    		= date("Y-m-d", strtotime($_POST['serdes_date']));
    }else{
	    $serdes_date            = date("Y-m-d", strtotime($_POST['serdes_date_old']));
    }
	$serdes_status    		= $_POST['serdes_status'];
	$session_user    		= $_SESSION["User"];

    if($sertype_id == 1){
		$destimeId = $_POST['destimeId1'];
	}else{
		$destimeId = $_POST['destimeId2'];
	}

    $check   = "SELECT * FROM services_des WHERE serpoint_id='$serpoint_id' AND sertype_id='$sertype_id' AND serdes_date='$serdes_date' AND serdes_id != '$serdesId' ";
	$result1 = mysqli_query($con, $check) or die ("Error in query: $check " . mysqli_error($con));
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีข้อมูลเวลาการให้บริการนี้อยู่แล้ว!'; ";
		echo "</script>";

	} else {

        $sql = "UPDATE services_des SET
            serpoint_id	        ='$serpoint_id',
            sertype_id	        ='$sertype_id',
            serdes_date	        ='$serdes_date',
            serdes_status	    ='$serdes_status',
            serdes_updateby	    ='$session_user',
            serdes_updatedate	='$date2'
            WHERE serdes_id=$serdesId";

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        $sqlTimeDelete = "DELETE FROM services_des_time WHERE serdesId = $serdesId";
        mysqli_query($con, $sqlTimeDelete) or die("Error in query : $sqlTimeDelete" .mysqli_error($con));

        foreach($destimeId as $key=> $time){

            $sqlTime = "INSERT INTO services_des_time (serdesId,destimeId) VALUES ('$serdesId','$time')";
            $resultTime = mysqli_query($con, $sqlTime) or die ("Error in query: $sqlTime " . mysqli_error($con));

        }

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$serdesId&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$serdesId&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }
    }


?>