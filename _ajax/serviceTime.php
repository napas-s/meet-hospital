<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $serdateId = $_GET['serdateId'];
    $setpointId = $_GET['setpointId'];
    $sertypeId = $_GET['sertypeId'];

    //เช็คว่าวันที่เวลานั้นว่งให้บริการที่เลือกหรือไม่
    $sqlMeet = "SELECT * FROM meet_service WHERE mt_serpoint_id = '$setpointId' AND mt_sertype_id = '$sertypeId' AND mt_serdateId = '$serdateId' AND mt_status != '2'";
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

            echo "<option value=''>กรุณาเลือกเวลานัดหมาย</option>";
            foreach($sql_query as $row){
                echo "<option value='".$row['des_time_id']."'>".$row['time_name']."</option>";
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

            echo "<option value=''>กรุณาเลือกเวลานัดหมาย</option>";

            foreach($sql_query as $row){
                echo "<option value='".$row['des_time_id']."'>".$row['time_name']."</option>";
            }
    }


?>