<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $serdateId = $_GET['serdateId'];
    $setpointId = $_GET['setpointId'];
    $sertypeId = $_GET['sertypeId'];

    //select point value
    $sql_point="SELECT * FROM services_point WHERE ser_point_id = $setpointId ";
    $sql_query_point = mysqli_query($con,$sql_point)or die(mysqli_error($con));
    $row_point = mysqli_fetch_assoc($sql_query_point);
    $point = $row_point['ser_point_name'];

    //select type value
    if($sertypeId == 1){
        $type = "คลินิกทั่วไป";
    }else{
        $type = "คลินิกนอกเวลา";
    }

    //select date value
    $sql_date="SELECT * FROM services_des WHERE serdes_id = $serdateId ";
    $sql_query_date = mysqli_query($con,$sql_date)or die(mysqli_error($con));
    $row_date = mysqli_fetch_assoc($sql_query_date);
    $date = $row_date['serdes_date'];

    //เช็คว่าวันที่เวลานั้นว่างให้บริการที่เลือกหรือไม่
    $sqlMeet = "SELECT * FROM meet_service WHERE mt_serpoint_id = '$setpointId' AND mt_sertype_id = '$sertypeId' AND mt_serdateId = '$serdateId' AND mt_status != '3'";
    $sql_queryMeet = mysqli_query($con,$sqlMeet)or die(mysqli_error($con));
    $numMeet    = mysqli_num_rows($sql_queryMeet);

    // ถ้าไม่ว่าง ไม่ต้องแสดงเวลานั้น
    if($numMeet > 0){

        foreach($sql_queryMeet as $key=>$meet){

            $sql = "SELECT * FROM services_des 
                JOIN services_des_time ON services_des_time.serdesId = services_des.serdes_id 
                JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                WHERE services_des.serdes_id = '$serdateId' 
                AND services_des_time.des_time_id != '$meet[mt_sertimeId]'
              ";
            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

            echo "<option value=''>1กรุณาเลือกเวลานัดหมาย</option>";
            foreach($sql_query as $row){

                //select time value
                $sql_time="SELECT * FROM services_des_time JOIN services_time ON services_time.time_id = services_des_time.destimeId WHERE des_time_id = $row[des_time_id]";
                $sql_query_time = mysqli_query($con,$sql_time)or die(mysqli_error($con));
                $row_time = mysqli_fetch_assoc($sql_query_time);
                $time = $row_time['time_name'];

                //ตรวจสอบใน meet_service ว่ามีการทำนัดหมายในรายการดังกล่าวไปหรือยัง
                $checkMeet   = "SELECT * FROM meet_service  
                        WHERE mt_serpoint_id='$point' 
                        AND mt_sertype_id='$type' 
                        AND mt_serdateId='$date'
                        AND mt_sertimeId='$time'
                    ";
                $resultMeet = mysqli_query($con, $checkMeet);
                $meet     = mysqli_num_rows($resultMeet);

                if($meet > 0){
                    $select = '(มีการจองแล้ว)';
                    $disabled = 'disabled';
                }else{
                    $select = '';
                    $disabled = '';
                }

                echo "<option value='".$row['des_time_id']."' ".$disabled.">".$row['time_name']." ".$select."</option>";
            }

        }
    }else{
        //ถ้าว่างให้แสดงเวลาตามปกติ

        $sql = "SELECT * FROM services_des 
                JOIN services_des_time ON services_des_time.serdesId = services_des.serdes_id 
                JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                WHERE services_des.serdes_id = '$serdateId' 
              ";
            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

            echo "<option value=''>2กรุณาเลือกเวลานัดหมาย</option>";

            foreach($sql_query as $row){

                //select time value
                $sql_time="SELECT * FROM services_des_time 
                           JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                           WHERE des_time_id = $row[des_time_id]
                           ";
                $sql_query_time = mysqli_query($con,$sql_time)or die(mysqli_error($con));
                $row_time = mysqli_fetch_assoc($sql_query_time);
                $time = $row_time['time_name'];

                //ตรวจสอบใน meet_service ว่ามีการทำนัดหมายในรายการดังกล่าวไปหรือยัง
                $checkMeet   = "SELECT * FROM meet_service  
                        WHERE mt_serpoint_id='$point' 
                        AND mt_sertype_id='$type' 
                        AND mt_serdateId='$date'
                        AND mt_sertimeId='$time'
                        AND mt_status!='3'
                    ";
                $resultMeet = mysqli_query($con, $checkMeet);
                $meet     = mysqli_num_rows($resultMeet);

                if($meet > 0){
                    $select = '(มีการจองแล้ว)';
                    $disabled = 'disabled';
                }else{
                    $select = '';
                    $disabled = '';
                }

                echo "<option value='".$row['des_time_id']."' ".$disabled.">".$row['time_name']." ".$select."</option>";
            }
    }


?>