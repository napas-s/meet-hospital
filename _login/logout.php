<?php
    //ประกาศใช้ session เพื่อ login (การใส่ @ นำหน้า session คือการปิด error ของ session)
    @session_start();
    //ล้างค่า session ที่มีอยู่ในระบบ
    session_destroy();
    //ไปยังหน้า login เมื่อล้างค่า session เสร็จแล้ว
    echo "<script type='text/javascript'>";
    echo "window.location='../login.php';";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0 url=index.php\">";

?>