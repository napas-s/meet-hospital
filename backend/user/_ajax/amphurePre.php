<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../../../_database/connection.php');

    $provinceId = $_GET['provinceId'];
    $amphureId = $_GET['amphureId'];
    $dateNow = date('Y-m-d');

    $sql = "SELECT * FROM se_amphures WHERE province_id = $provinceId ORDER BY amp_code ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    while($row = mysqli_fetch_array($sql_query)) {
        if($row['amp_name_th'] == $amphureId){
            echo "<option value='".$row['id']."' selected>".$row['amp_name_th']."</option>";
        }else{
            echo "<option value='".$row['id']."'>".$row['amp_name_th']."</option>";
        }
    }

?>