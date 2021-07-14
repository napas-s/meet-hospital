<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $setpointId = $_GET['setpointId'];
    $dateNow = date('Y-m-d');

    $sql = "SELECT * FROM services_des WHERE serpoint_id = $setpointId AND serdes_date >= $dateNow GROUP BY sertype_id ORDER BY serdes_date ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    echo "<option value=''>กรุณาเลือกประเภทบริการ</option>";
    while($row = mysqli_fetch_array($sql_query)) {
        if($row['sertype_id'] == 1){
            echo "<option value='".$row['sertype_id']."'>คลินิกทั่วไป</option>";
        }else{
            echo "<option value='".$row['sertype_id']."'>คลินิกนอกเวลา</option>";
        }
    }

?>