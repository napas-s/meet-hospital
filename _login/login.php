<meta charset="UTF-8" />
<?php
    //ประกาศใช้ session เพื่อ login (การใส่ @ นำหน้า session คือการปิด error ของ session)
	session_start();

    //เช็คว่ามีข้อมูลเข้ามาไหม ถ้าไม่มีให้เด้งกลับไปที่หน้า login และ แสดง error

    if(isset($_POST['txt_username'])){ //ถ้ามีข้อมูล

        // นำเข้าไฟล์ฐานข้อมูล
        require_once('../_database/connection.php');
        // ตั้งค่าวันที่และเวลา
        date_default_timezone_set('Asia/Bangkok');
        $date = date("Y-m-d H:i:s");

        //รับค่าจากหน้า Login
        $txt_username = $_POST['txt_username'];
        $txt_password = md5($_POST['txt_password']);

        //เช็คว่ามีค่าเข้ามาตามค่าที่ฟิกไว้สำหรับแอดมินหรือไม่ ถ้าใช่ให้เข้าสู่ระบบ ถ้าไม่ใช่ให้ไปตรวจสอบว่าเป็นสมาชิกในฐานข้อมูลหรือไม่
        //ข้อมูลตรงนี้กำหนดขึ้นเอง ไม่ได้มีในฐานข้อมูล เผื่อกรณีฉุกเฉินที่ยังไม่มีข้อมูลผู้ดูแลระบบในฐานข้อมูล ผู้ดูแลระบบจะสามารถเข้าสู่ระบบได้โดยไม่ต้องมีข้อมูลในฐานข้อมูล
        if($txt_username == 'admin' && $txt_password == md5('1234')){

            //เช็ตค่า SESSION เพื่อเข้าสู่ระบบ
            $_SESSION["Id"]     = '000';
            $_SESSION["User"]   = 'ผู้ดูแลระบบ';
            $_SESSION["Level"]  = '2';
            $_SESSION["Img"]    = 'admin.png';

            // ไปยังระบบหลังบ้าน
            echo "<script type='text/javascript'>";
            echo "window.location='../backend/dashboard/index.php'";
            echo "</script>";

        }else{

            //เช็คว่ามีข้อมูลอยู่ในฐานข้อมูลหรือไม่ ถ้าไม่มีให้เด้งกลับไปหน้า Login และแสดง error ถ้ามีให้อัพเดตวันที่ Login ล่าสุด และเข้าสู่ระบบ
            $sql="SELECT * FROM member Where member_user='".$txt_username."' and member_password='".$txt_password."' and member_status= '1' ";
            $result = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error($con));

            //mysqli_num_rows คือ นับจำนวนว่าในฐานข้อมูลมีข้อมูลอยู่กี่แถว
            if(mysqli_num_rows($result)==1){ //ถ้ามีข้อมูล

                //mysqli_fetch_array คือ การดึงข้อมูลในฐานข้อมูลมาแสดง
                $row = mysqli_fetch_array($result);

                //อัพเดตวันที่ Login ล่าสุด " last_login ='$date' "
                $member_id = $row["member_id"];
                $sqlUpdate = "UPDATE member SET last_login ='$date' WHERE member_id = '$member_id'";
                $result = mysqli_query($con, $sqlUpdate) or die ("Error in query: $sql " . mysqli_error($con));

                //เช็ตค่า SESSION เพื่อเข้าสู่ระบบ
                $_SESSION["Id"]     = $row["member_id"];
                $_SESSION["User"]   = $row["member_fullname"];
                $_SESSION["Level"]  = $row["member_lavel"];
                $_SESSION["Img"]    = $row["member_img"];

                // ไปยังระบบหลังบ้าน
                echo "<script type='text/javascript'>";
                echo "window.location='../backend/dashboard/index.php';";
                echo "</script>";

            }else{ // ถ้าไม่มีข้อมูล

                // ไปยังหน้า login และแสดง er == 1
                echo "<script type='text/javascript'>";
                echo "window.location='../login.php?er=1';";
                echo "</script>";

            }
        }
    }else{ // ถ้าไม่มีข้อมูล

        // ไปยังหน้า login และแสดง er == 1
        echo "<script type='text/javascript'>";
        echo "window.location='../login.php?er=1';";
        echo "</script>";
    }
?>