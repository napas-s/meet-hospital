<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');

	$idcardNumber           = $_POST['idcardNumber'];
	$birthday 	            = $_POST['birthday'];
	$contact 	            = $_POST['contact'];
	$serpoint_id 	        = $_POST['serpoint_id'];
	$sertype_id 	        = $_POST['sertype_id'];
	$service_id 	        = $_POST['service_id'];
	$serdateId 	            = $_POST['serdateId'];
	$sertimeId 	            = $_POST['sertimeId'];
	$dateMeetadd 	        = date("Y-m-d H:i:s");

    $sql = "INSERT INTO meet_service (
                mt_idcardNumber,
                mt_birthday,
                mt_tel,
                mt_serpoint_id,
                mt_sertype_id,
                mt_service_id,
                mt_serdateId,
                mt_sertimeId,
                mt_dateMeetadd
            )
            VALUES
            (
                '$idcardNumber',
                '$birthday',
                '$contact',
                '$serpoint_id',
                '$sertype_id',
                '$service_id',
                '$serdateId',
                '$sertimeId',
                '$dateMeetadd'
            )";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        $id = mysqli_insert_id($con);

        echo "<script type='text/javascript'>";
        echo "window.location='../meetpreview.php?id=$id&message=1';";
        echo "</script>";

    }else{
        echo "<script type='text/javascript'>";
        echo "window.location='../meetpreview.php?message=0';";
        echo "</script>";
    }

 ?>