<?PHP

    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $idCardNumber         = $_GET['idCardNumber'];
    $serdateId         = $_GET['serdateId'];

    $sql = "SELECT serdes_id, serdes_date FROM services_des WHERE serdes_id = $serdateId";
    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
    $date = mysqli_fetch_assoc($sql_query);

    $dateNow = $date['serdes_date'];

    $sqlMeet="SELECT * FROM meet_service WHERE mt_idcardNumber =$idCardNumber
              AND mt_serdateId = '$dateNow'
              ";
    $sql_query_meet = mysqli_query($con, $sqlMeet)or die(mysqli_error($con));

    echo mysqli_num_rows($sql_query_meet);

?>