<?php
// error_reporting(0);

//host, user, password, database
$con= mysqli_connect("localhost","root","","db_meet_hospital") or die("Error: " . mysqli_error($con));
//เซ็ตค่าเป็น UTF 8 เพื่อใช้งานภาษาไทย
mysqli_set_charset($con, "utf8");

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

?>

