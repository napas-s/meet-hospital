<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../../../_database/connection.php');

    $amphureId = $_GET['amphureId'];
    $districtId = $_GET['districtId'];
    $dateNow = date('Y-m-d');

    $sql_amp = "SELECT * FROM se_amphures WHERE amp_name_th LIKE '$amphureId' ";
    $sql_query_amp = mysqli_query($con,$sql_amp)or die(mysqli_error($con));
    $amp = mysqli_fetch_assoc($sql_query_amp);

    $sql = "SELECT * FROM se_districts WHERE amphure_id = $amp[id] ORDER BY dis_code ASC";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

    while($row = mysqli_fetch_array($sql_query)) {
        if($row['dis_name_th'] == $districtId){
            echo "<option value='".$row['id']."' selected>".$row['dis_name_th']."</option>";
        }else{
            echo "<option value='".$row['id']."'>".$row['dis_name_th']."</option>";
        }
    }

?>