<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../../../_database/connection.php');

    $amphureId = $_GET['amphureId'];
    $dateNow = date('Y-m-d');

    $sql = "SELECT * FROM se_districts WHERE amphure_id = $amphureId ORDER BY dis_code ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    echo "<option value='' disabled='' selected=''>กรุณาเลือกตำบล / แขวง</option>";
    while($row = mysqli_fetch_array($sql_query)) {
        echo "<option value='".$row['id']."'>".$row['dis_name_th']."</option>";
    }

?>