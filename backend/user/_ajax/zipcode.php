<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../../../_database/connection.php');

    $districtId = $_GET['districtId'];
    $dateNow = date('Y-m-d');

    $sql = "SELECT * FROM se_districts WHERE id = $districtId ORDER BY dis_code ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    while($row = mysqli_fetch_array($sql_query)) {
        echo $row['dis_code'];
    }

?>