<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../../../_database/connection.php');

    $districtId = $_GET['districtId'];
    $dateNow = date('Y-m-d');

    $sql_dis = "SELECT * FROM se_districts WHERE dis_name_th LIKE '$districtId' ";
    $sql_query_dis = mysqli_query($con,$sql_dis)or die(mysqli_error($con));
    $dis = mysqli_fetch_assoc($sql_query_dis);

    $sql = "SELECT * FROM se_districts WHERE id = $dis[id] ORDER BY dis_code ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    while($row = mysqli_fetch_array($sql_query)) {
        echo $row['dis_code'];
    }

?>