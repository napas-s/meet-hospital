<?PHP

    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');
	date_default_timezone_set('Asia/Bangkok');

    $serpointId = $_GET['setpointId'];
    $sertypeId = $_GET['settypeId'];
    $dateNow = date("Y-m-d", strtotime("+543 years"));

    $sql = "SELECT serdes_id,serpoint_id,sertype_id,serdes_date FROM services_des WHERE serpoint_id = $serpointId AND sertype_id = $sertypeId AND serdes_date >= '$dateNow' ORDER BY serdes_date ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    echo "<option value=''>กรุณาเลือกวันที่นัดหมาย</option>";
    while($row = mysqli_fetch_array($sql_query)) { 
        echo "<option value='".$row['serdes_id']."'>".date("d-m-Y", strtotime($row['serdes_date']))."</option>";
    }

?>