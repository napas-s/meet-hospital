<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');

    //รับค่าจาก form
    $idcardNumber           = $_POST['idcardNumber'];
    $birthday 	            = date("Y-m-d", strtotime($_POST['birthday']));
    $contact 	            = $_POST['contact'];
    $serpoint_id 	        = $_POST['serpoint_id'];
    $sertype_id 	        = $_POST['sertype_id'];
    $service_id 	        = $_POST['service_id'];
    $serdateId 	            = $_POST['serdateId'];
    $sertimeId 	            = $_POST['sertimeId'];
    $dateMeetadd 	        = date("Y-m-d H:i:s");
    $date 				    = date("Y-m-d H:i:s");
    $status 				= 1;

    //select point เก็บชื่อลงฐานข้อมูล
    $sql_point="SELECT * FROM services_point WHERE ser_point_id = $serpoint_id ";
    $sql_query_point = mysqli_query($con,$sql_point)or die(mysqli_error($con));
    $row_point = mysqli_fetch_assoc($sql_query_point);
    $point = $row_point['ser_point_name'];

    //select type เก็บชื่อลงฐานข้อมูล
    if($sertype_id == 1){
        $type = "คลินิกทั่วไป";
    }else{
        $type = "คลินิกนอกเวลา";
    }

    //select service เก็บชื่อลงฐานข้อมูล
    $sql_ser="SELECT * FROM services WHERE ser_id = $service_id ";
    $sql_query_ser = mysqli_query($con,$sql_ser)or die(mysqli_error($con));
    $row_ser = mysqli_fetch_assoc($sql_query_ser);
    $service = $row_ser['ser_name'];

    //select date เก็บชื่อลงฐานข้อมูล
    $sql_date="SELECT * FROM services_des WHERE serdes_id = $serdateId ";
    $sql_query_date = mysqli_query($con,$sql_date)or die(mysqli_error($con));
    $row_date = mysqli_fetch_assoc($sql_query_date);
    $date = $row_date['serdes_date'];

    //select time เก็บชื่อลงฐานข้อมูล
    $sql_time="SELECT * FROM services_des_time JOIN services_time ON services_time.time_id = services_des_time.destimeId WHERE des_time_id = $sertimeId ";
    $sql_query_time = mysqli_query($con,$sql_time)or die(mysqli_error($con));
    $row_time = mysqli_fetch_assoc($sql_query_time);
    $time = $row_time['time_name'];

    //ตรวจสอบว่าหมายเลขบัตรประชาชนนี้เคยทำรายการนี้ไปแล้วไหม ถ้ามีอยู่แล้วให้เด้งแจ้งเตือนแทน ถ้ายังไม่มีให้เพิ่มข้อมูล
    $checkIdcard   = "SELECT * FROM meet_service WHERE mt_serpoint_id='$point' AND mt_sertype_id='$type' AND mt_service_id='$service'AND mt_serdateId='$date'AND mt_sertimeId='$time'AND mt_idcardNumber='$idcardNumber'AND mt_status='$status'";
	$resultIdcard = mysqli_query($con, $checkIdcard);
	$Idcard     = mysqli_num_rows($resultIdcard);

    if($Idcard > 0){

        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=warning&title=ไม่สามารถทำนัดหมายนี้ได้&message=เนื่องจากคุณมีนัดหมายในรายการนี้แล้ว';";
        echo "</script>";

    }else{

        //ตรวจสอบใน meet_service ว่ามีการทำนัดหมายในรายการดังกล่าวไปหรือยัง
        $checkMeet   = "SELECT * FROM meet_service  
                        WHERE mt_serpoint_id='$point' 
                        AND mt_sertype_id='$type' 
                        AND mt_service_id='$service'
                        AND mt_serdateId='$date'
                        AND mt_sertimeId='$time'
                    ";
        $resultMeet = mysqli_query($con, $checkMeet);
        $meet     = mysqli_num_rows($resultMeet);

        if($meet > 0){

            echo "<script type='text/javascript'>";
            echo "window.location='../index.php?icon=error&title=ไม่สามารถทำนัดหมายนี้ได้&message=เนื่องจากเวลาดังกล่าวมีผู้นัดหมายแล้ว';";
            echo "</script>";

        }else{

            //เช็คก่อนว่าเคยมีหมายเลขบัตรประชาชนนี้หรือไม่ ถ้าไม่มีให้เพิ่มข้อมูล users ถ้ามีอยู่แล้วไม่ต้องทำอะไร
            $check   = "SELECT * FROM users  WHERE user_iden13='$idcardNumber'";
            $result1 = mysqli_query($con, $check);
            $num     = mysqli_num_rows($result1);

            if($num == 0){

                $sql = "INSERT INTO users (
                    user_iden13,
                    user_birthday,
                    user_addby,
                    user_adddate,
                    user_updateby,
                    user_updatedate
                )
                VALUES
                (
                    '$idcardNumber',
                    '$birthday',
                    'System',
                    '$date',
                    'System',
                    '$date'
                )";

                $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
                $userId = mysqli_insert_id($con);

                //ผู้ติดต่อกรณีฉุกเฉิน
                $sql_family = "INSERT INTO users_family (user_id)VALUES('$userId')";
                mysqli_query($con, $sql_family) or die ("Error in query: $sql_family " . mysqli_error($con));

                //ข้อมูลการติดต่อ
                $sql_contact = "INSERT INTO users_contact (user_id)VALUES('$userId')";
                mysqli_query($con, $sql_contact) or die ("Error in query: $sql_contact " . mysqli_error($con));

            }

            $sql = "INSERT INTO meet_service (
                mt_idcardNumber,
                mt_tel,
                mt_serpoint_id,
                mt_sertype_id,
                mt_service_id,
                mt_serdateId,
                mt_sertimeId,
                mt_status,
                mt_dateMeetadd
            )
            VALUES
            (
                '$idcardNumber',
                '$contact',
                '$point',
                '$type',
                '$service',
                '$date',
                '$time',
                '$status',
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
        }
    }

 ?>