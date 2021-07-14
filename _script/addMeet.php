<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');

    $idcardNumber           = $_POST['idcardNumber'];
    $birthday 	            = date("Y-m-d", strtotime($_POST['birthday']));;
    $contact 	            = $_POST['contact'];
    $serpoint_id 	        = $_POST['serpoint_id'];
    $sertype_id 	        = $_POST['sertype_id'];
    $service_id 	        = $_POST['service_id'];
    $serdateId 	            = $_POST['serdateId'];
    $sertimeId 	            = $_POST['sertimeId'];
    $dateMeetadd 	        = date("Y-m-d H:i:s");
    $date 				    = date("Y-m-d H:i:s");

    //ตรวจสอบว่าหมายเลขบัตรประชาชนนี้เคยมีอยู่แล้วไหม
    $checkIdcard   = "SELECT * FROM meet_service  
                    WHERE mt_serpoint_id='$serpoint_id' 
                    AND mt_sertype_id='$sertype_id' 
                    AND mt_service_id='$service_id'
                    AND mt_serdateId='$serdateId'
                    AND mt_sertimeId='$sertimeId'
                    AND mt_idcardNumber='$idcardNumber'
                    AND mt_status='0'
                ";
	$resultIdcard = mysqli_query($con, $checkIdcard);
	$Idcard     = mysqli_num_rows($resultIdcard);

    if($Idcard > 0){

        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=warning&title=ไม่สามารถทำนัดหมายนี้ได้&message=เนื่องจากคุณมีนัดหมายในรายการนี้แล้ว';";
        echo "</script>";

    }else{

        //ตรวจสอบใน meet_service ว่ามีการทำนัดหมายในรายการดังกล่าวไปหนือยัง
        $checkMeet   = "SELECT * FROM meet_service  
                        WHERE mt_serpoint_id='$serpoint_id' 
                        AND mt_sertype_id='$sertype_id' 
                        AND mt_service_id='$service_id'
                        AND mt_serdateId='$serdateId'
                        AND mt_sertimeId='$sertimeId'
                    ";
        $resultMeet = mysqli_query($con, $checkMeet);
        $meet     = mysqli_num_rows($resultMeet);

        if($meet > 0){

            echo "<script type='text/javascript'>";
            echo "window.location='../index.php?icon=error&title=ไม่สามารถทำนัดหมายนี้ได้&message=เนื่องจากเวลาดังกล่าวมีผู้นัดหมายแล้ว';";
            echo "</script>";

        }else{

            //เช็คก่อนว่าเคยมีหมายเลขบัตรประชาชนนี้หรือไม่
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
                    'SYSTEM',
                    '$date',
                    'SYSTEM',
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
                mt_dateMeetadd
            )
            VALUES
            (
                '$idcardNumber',
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
        }
    }

 ?>