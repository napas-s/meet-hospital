<?PHP

    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $idcardNumber       = $_GET['idcardNumber'];
    $prename            = $_GET['prename'];
    $prenameOther       = $_GET['prenameOther'];
    $fname              = $_GET['fname'];
    $lname              = $_GET['lname'];
    $birthday           = $_GET['birthday'];
    $contact            = $_GET['contact'];
    $setpointId         = $_GET['setpointId'];
    $settypeId          = $_GET['settypeId'];
    $setserviceId       = $_GET['setserviceId'];
    $serdateId          = $_GET['serdateId'];
    $sertimeId          = $_GET['sertimeId'];

    $sqlPoint="SELECT ser_point_id,ser_point_name FROM services_point WHERE ser_point_id = $setpointId ";
    $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
    $point = mysqli_fetch_assoc($sql_query_point);

    $sqlService="SELECT ser_id,ser_name FROM services WHERE ser_id = $setserviceId ";
    $sql_query_service = mysqli_query($con,$sqlService)or die(mysqli_error($con));
    $service = mysqli_fetch_assoc($sql_query_service);

    $sqlDate="SELECT serdes_id,serdes_date FROM services_des WHERE serdes_id = $serdateId ";
    $sql_query_date = mysqli_query($con,$sqlDate)or die(mysqli_error($con));
    $dateRow = mysqli_fetch_assoc($sql_query_date);
    $date = date("d-m-Y", strtotime($dateRow['serdes_date']));

    $sqlTime="SELECT services_des_time.des_time_id,services_time.time_id,services_des_time.destimeId,services_time.time_name FROM services_des_time JOIN services_time ON services_time.time_id = services_des_time.destimeId  WHERE des_time_id = $sertimeId ";
    $sql_query_time = mysqli_query($con,$sqlTime)or die(mysqli_error($con));
    $time = mysqli_fetch_assoc($sql_query_time);

    if($settypeId == 1){
        $typeName = "คลินิกทั่วไป";
    }else{
        $typeName = "คลินิกนอกเวลา";
    }

    echo "<div class='mg_present'><b>เลขบัตรประชาชน : </b>".$idcardNumber."</div>";
    if($prename == 'อื่นๆ'){
        echo "<div class='mg_present'><b>ชื่อ - สกุล : </b>".$prenameOther.' '.$fname.' '.$lname."</div>";
    }else{
        echo "<div class='mg_present'><b>ชื่อ - สกุล : </b>".$prename .$fname .$lname."</div>";
    }
    echo "<div class='mg_present'><b>วัน/เดือน/ปีเกิด : </b>".$birthday."</div>";
    echo "<div class='mg_present'><b>เบอร์โทรศัพท์ : </b>".$contact."</div>";
    echo "<div class='divider'><i class='icon-screen'></i></div>";
    echo "<div class='mg_present'><b>จุดบริการ : </b>".$point['ser_point_name']."</div>";
    echo "<div class='mg_present'><b>ประเภทบริการ : </b>".$typeName."</div>";
    echo "<div class='mg_present'><b>บริการ : </b>".$service['ser_name']."</div>";
    echo "<div class='mg_present'><b>วันที่นัดหมาย : </b>".$date."</div>";
    echo "<div class='mg_present'><b>เวลาที่นัดหมาย : </b>".$time['time_name']."</div>";

?>