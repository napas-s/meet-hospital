<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $setpointId = $_GET['setpointId'];
    $settypeId  = $_GET['settypeId'];
    $dateNow = date('Y-m-d');

    $sql = "SELECT serdes_id,serpoint_id,sertype_id,serdes_date FROM services_des WHERE serpoint_id = $setpointId AND sertype_id = $settypeId AND serdes_date >= $dateNow ORDER BY serdes_date ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    echo "<option value=''>กรุณาเลือกวันที่นัดหมาย</option>";
    while($row = mysqli_fetch_array($sql_query)) {
        echo "<option value='".$row['serdes_id']."'>".date("d-m-Y", strtotime($row['serdes_date']))."</option>";
    }

?>