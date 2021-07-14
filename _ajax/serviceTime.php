<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $serdateId = $_GET['serdateId'];

    $sql = "SELECT * FROM services_des JOIN services_des_time ON services_des_time.serdesId = services_des.serdes_id JOIN services_time ON services_time.time_id = services_des_time.destimeId WHERE  services_des.serdes_id = '$serdateId' ";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    echo "<option value=''>กรุณาเลือกเวลานัดหมาย</option>";
    while($row = mysqli_fetch_array($sql_query)) {
        echo "<option value='".$row['des_time_id']."'>".$row['time_name']."</option>";
    }

?>