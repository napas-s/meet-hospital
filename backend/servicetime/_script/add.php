<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$serpoint_id    		= $_POST['serpoint_id'];
	$sertype_id    			= $_POST['sertype_id'];
	$ser_checkbox   		= $_POST['check-date-multiple'];
	$serdes_date    		= date("Y-m-d", strtotime($_POST['serdes_date']));
	$start_Date				= date("Y-m-d", strtotime($_POST['serdes_date_multiple_start']));
	$end_Date		    	= date("Y-m-d", strtotime($_POST['serdes_date_multiple_end']));
	$serdes_status    		= $_POST['serdes_status'];
	$session_user    		= $_SESSION["User"];

	$num = 0;
	// แปลงค่าวันที่ จาก Thai To Eng
	$start_date_new = strtotime(DateEng($start_Date));
	$end_date_new  = strtotime(DateEng($end_Date));

	if($sertype_id == 1){
		$destimeId = $_POST['destimeId1'];
	}else{
		$destimeId = $_POST['destimeId2'];
	}

	if ($ser_checkbox != 'on')
	{
		$check   = "SELECT * FROM services_des WHERE serpoint_id='$serpoint_id' AND sertype_id='$sertype_id' AND serdes_date='$serdes_date'";
		$result1 = mysqli_query($con, $check);
		$num     = mysqli_num_rows($result1);
	} else {
		for ($i = $start_date_new; $i <= $end_date_new; $i+=86400) { 

			$ser_date_range =  DateThai(date("Y-m-d", $i));

			$check   = "SELECT * FROM services_des WHERE serpoint_id='$serpoint_id' AND sertype_id='$sertype_id' AND serdes_date='$ser_date_range'";
			$result1 = mysqli_query($con, $check);
			$num     = mysqli_num_rows($result1);
		}
	}

	if($num > 0)
	{
        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีข้อมูลเวลาการให้บริการนี้อยู่แล้ว!'";
		echo "</script>";

	} else {

		if ($ser_checkbox != 'on')
		{
			$sqlDes = "INSERT INTO services_des (serpoint_id,sertype_id,serdes_date,serdes_status,serdes_addby,serdes_adddate ,serdes_updateby,serdes_updatedate ) VALUES ('$serpoint_id','$sertype_id','$serdes_date','$serdes_status','$session_user','$date','$session_user','$date')";
			$resultDes = mysqli_query($con, $sqlDes) or die ("Error in query: $sqlDes " . mysqli_error($con));
			$idDes = mysqli_insert_id($con);

			foreach($destimeId as $key=> $time){

				$sqlTime = "INSERT INTO services_des_time (serdesId,destimeId) VALUES ('$idDes','$time')";
				$resultTime = mysqli_query($con, $sqlTime) or die ("Error in query: $sqlTime " . mysqli_error($con));

			}
		} else {
			
			// เพิ่มข้อมูลระหว่างวันที่กำหนดให้อัตโนมัติ
			for ($i = $start_date_new; $i <= $end_date_new; $i+=86400) { 

				// แปลงค่าวันที่ Eng To Thai
				$ser_date_range =  DateThai(date("Y-m-d", $i));

				// เพิ่มลงฐานข้อมูล
				$sqlDes = "INSERT INTO services_des (serpoint_id,sertype_id,serdes_date,serdes_status,serdes_addby,serdes_adddate ,serdes_updateby,serdes_updatedate ) VALUES ('$serpoint_id','$sertype_id','$ser_date_range','$serdes_status','$session_user','$date','$session_user','$date')";
				$resultDes = mysqli_query($con, $sqlDes) or die ("Error in query: $sqlDes " . mysqli_error($con));
				$idDes = mysqli_insert_id($con);

				foreach($destimeId as $key=> $time){

					$sqlTime = "INSERT INTO services_des_time (serdesId,destimeId) VALUES ('$idDes','$time')";
					$resultTime = mysqli_query($con, $sqlTime) or die ("Error in query: $sqlTime " . mysqli_error($con));

				}
			}
		}

		if($resultDes){

			echo "<script type='text/javascript'>";
			echo "window.location='../index.php?icon=success&message=เพิ่มข้อมูลเรียบร้อยแล้ว';";
			echo "</script>";

		}else{
			echo "<script type='text/javascript'>";
			echo "window.location='../form.php?icon=error&message=เพิ่มข้อมูลไม่สำเร็จ';";
			echo "</script>";
		}
	}


	function DateEng($strDate)
	{
		$strYear = date("Y",strtotime($strDate))-543;
		$strMonth= date("m",strtotime($strDate));
		$strDay= date("d",strtotime($strDate));

		$fulldate = $strYear.'-'.$strMonth.'-'.$strDay;
		return $fulldate;
	}

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("m",strtotime($strDate));
		$strDay= date("d",strtotime($strDate));
		return $strYear.'-'.$strMonth.'-'.$strDay;
	}

 ?>