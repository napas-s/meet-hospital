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
	$ser_checkbox   		= $_POST['check-date-multiple'];
	$start_Date				= date("Y-m-d", strtotime($_POST['serdes_date_multiple_start']));
	$end_Date		    	= date("Y-m-d", strtotime($_POST['serdes_date_multiple_end']));
	$serdes_status    		= $_POST['serdes_status'];
	$session_user    		= $_SESSION["User"];

    if($sertype_id == 1){
		$destimeId = $_POST['destimeId1'];
	}else{
		$destimeId = $_POST['destimeId2'];
	}

    $num = 0;
	// แปลงค่าวันที่ จาก Thai To Eng
	$start_date_new = strtotime(DateEng($start_Date));
	$end_date_new  = strtotime(DateEng($end_Date));

    if ($ser_checkbox != 'on')
	{
        //เช็คว่าเคยมีการทำนัดหมายไปหรือยัง
        // $check_meet   = "SELECT * FROM meet_service WHERE mt_serdateId='$serdes_date' ";
        // $result_meet = mysqli_query($con, $check_meet) or die ("Error in query: $check_meet " . mysqli_error($con));
        // $num_meet     = mysqli_num_rows($result_meet);

        // if($num_meet > 0)
        // {

        //     echo "<script>";
        //     echo "window.location ='../form.php?id=$serdesId&icon=warning&message=ไม่สามารถแก้ไขข้อมูลนี้ได้ เนื่องจากมีการทำนัดหมายแล้ว!'; ";
        //     echo "</script>";

        // }

        // เช๋คข้อมูลซ้ำ
        $check   = "SELECT * FROM services_des WHERE serpoint_id='$serpoint_id' AND sertype_id='$sertype_id' AND serdes_date='$serdes_date' AND serdes_id != '$serdesId' ";
        $result1 = mysqli_query($con, $check) or die ("Error in query: $check " . mysqli_error($con));
        $num     = mysqli_num_rows($result1);

        if($num > 0)
        {

            echo "<script>";
            echo "window.location ='../form.php?id=$serdesId&icon=warning&message=มีข้อมูลเวลาการให้บริการนี้อยู่แล้ว!'; ";
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
    } else {
        for ($i = $start_date_new; $i <= $end_date_new; $i+=86400) { 

			$ser_date_range =  DateThai(date("Y-m-d", $i));

            //เช็คว่าเคยมีข้อมูลเดิมไหม
			$check   = "SELECT * FROM services_des WHERE serpoint_id='$serpoint_id' AND sertype_id='$sertype_id' AND serdes_date='$ser_date_range'";
			$result1 = mysqli_query($con, $check);
            $row     = mysqli_fetch_assoc($result1);
			$num     = mysqli_num_rows($result1);
            
            $set_serdesId = $row['serdes_id'];

            //เช็คว่าเคยมีการทำนัดหมายไปหรือยัง
            // $check_meet   = "SELECT * FROM meet_service WHERE mt_serdateId='$ser_date_range' ";
            // $result_meet = mysqli_query($con, $check_meet) or die ("Error in query: $check_meet " . mysqli_error($con));
            // $num_meet     = mysqli_num_rows($result_meet);

            // if($num_meet > 0)
            // {

            //     echo "<script>";
            //     echo "window.location ='../form.php?id=$set_serdesId&icon=warning&message=ไม่สามารถแก้ไขข้อมูล วันที่ ".date("d-m-Y", strtotime($ser_date_range))." นี้ได้ เนื่องจากมีการทำนัดหมายแล้ว!'; ";
            //     echo "</script>";

            // }

            if($num > 0)
            {
                // Update Data
                $sql_update = "UPDATE services_des SET
                serpoint_id	        ='$serpoint_id',
                sertype_id	        ='$sertype_id',
                serdes_status	    ='$serdes_status',
                serdes_updateby	    ='$session_user',
                serdes_updatedate	='$date2'
                WHERE serdes_id='$set_serdesId'";

                $result = mysqli_query($con, $sql_update) or die ("Error in query: $sql_update " . mysqli_error($con));

                $sqlTimeDelete = "DELETE FROM services_des_time WHERE serdesId = $set_serdesId";
                mysqli_query($con, $sqlTimeDelete) or die("Error in query : $sqlTimeDelete" .mysqli_error($con));

                foreach($destimeId as $key=> $time){

                    $sqlTime = "INSERT INTO services_des_time (serdesId,destimeId) VALUES ('$set_serdesId','$time')";
                    $resultTime = mysqli_query($con, $sqlTime) or die ("Error in query: $sqlTime " . mysqli_error($con));

                }

            } else {

                // เพิ่มลงฐานข้อมูล
                $sql_insert = "INSERT INTO services_des (serpoint_id,sertype_id,serdes_date,serdes_status,serdes_addby,serdes_adddate ,serdes_updateby,serdes_updatedate )
                VALUES ('$serpoint_id','$sertype_id','$ser_date_range','$serdes_status','$session_user','$date2','$session_user','$date2')";
                $result = mysqli_query($con, $sql_insert) or die ("Error in query: $sql_insert " . mysqli_error($con));
                $id_insert_detail = mysqli_insert_id($con);

                foreach($destimeId as $key=> $time){

                    $sql_insert_Time = "INSERT INTO services_des_time (serdesId,destimeId) VALUES ('$id_insert_detail','$time')";
                    $result_insert_Time = mysqli_query($con, $sql_insert_Time) or die ("Error in query: $sql_insert_Time " . mysqli_error($con));

                }
            }
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