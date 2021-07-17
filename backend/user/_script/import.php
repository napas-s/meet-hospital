<meta charset="UTF-8" />
<?php

    @session_start();
    require_once('../../../_database/connection.php');

    //กำหนดเวลา
    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

    //คัดลอกไฟล์ไปเก็บไว้ที่โฟลเดอร์ imports
    $path="../../../uploads/imports/";
    $type = strrchr($_FILES['import']['name'],".");
    $newname =$numrand.$date1.$type;

    $path_copy=$path.$newname;
    $path_link="../../../uploads/imports/".$newname;
    move_uploaded_file($_FILES['import']['tmp_name'],$path_copy);

    //กำหนดที่อยู่ของไฟล์ที่จะทำการอัพโหลด
	$file           = "../../../uploads/imports/".$newname;
    //กำหนดชื่อและเวลาสำหรับคนที่เพิ่มและอัพเดตข้อมูล
	$member_name 	= $_SESSION["User"];
	$date 			= date("Y-m-d H:i:s");

    //กำหนดตัวแปรเเจ้งตือน default
    $result = 0;
    $icon = 'error';
    $message = 'นำเข้าข้อมูลไม่สำเร็จ';
    $iden13 = '';

    //เลือกไฟล์ที่จะทำการอัพโหลด
    $objCSV = fopen($file, "r");

    //กำหนดตัวแปรจำนวนแถวเริ่มต้นในไฟล์ CSV
    $i = 0;
    while (($objArr = fgetcsv($objCSV, 500, ",")) !== FALSE) {

        //วนลูปเพื่อเก็บค่าจำนวนแถวทั้งหมดในไฟล์ CSV
        $i++;

        //อัพเดตข้อมูลในไฟล์ CSV โดยเว้นแถวแรกตำแหน่งที่ 0
        if($i > 1)
        {

            //เช็คว่าแถว "เลขบัตรประชาชน" ในไฟล์ CSV จำนวนมากกว่า 12 ตัวอักษร
            if(strlen($objArr[0]) > 12){

                //ตรวจสอบก่อนว่าเคยมี "เลขบัตรประชาชน" นี้ในฐานข้อมูลหรือยัง ถ้ามีให้อัพเดตข้อมูล ถ้าไม่มีให้เพิ่มข้อมูล
                $check   = "SELECT * FROM users  WHERE user_iden13='$objArr[0]'";
                $result1 = mysqli_query($con, $check);
                $num     = mysqli_num_rows($result1);

                if($num > 0)
                {

                    $sql = "UPDATE users SET
                        user_prename	        ='$objArr[1]',
                        user_prenameOthers	    ='$objArr[2]',
                        user_fname	            ='$objArr[3]',
                        user_lname	            ='$objArr[4]',
                        user_sex	            ='$objArr[5]',
                        user_birthday	        ='$objArr[6]',
                        user_nation	            ='$objArr[7]',
                        user_nationOther	    ='$objArr[8]',
                        user_country	        ='$objArr[9]',
                        user_countryOther	    ='$objArr[10]',
                        user_province_birth	    ='$objArr[11]',
                        user_provinceOther	    ='$objArr[12]',
                        user_job	            ='$objArr[13]',
                        user_faith	            ='$objArr[14]',
                        user_faithOther	        ='$objArr[15]',
                        user_education	        ='$objArr[16]',
                        user_marry_status	    ='$objArr[17]',
                        user_blood	            ='$objArr[18]',
                        user_allergy	        ='$objArr[19]',
                        user_allergyOther	    ='$objArr[20]',
                        user_father_name	    ='$objArr[21]',
                        user_mother_name	    ='$objArr[22]',
                        user_updateby	        ='$member_name',
                        user_updatedate	        ='$date'
                    WHERE user_iden13           ='$objArr[0]'";
                    mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

                }else{

                    $strSQL = "INSERT INTO users (";
                    $strSQL .= " user_iden13, ";
                    $strSQL .= " user_prename, ";
                    $strSQL .= " user_prenameOthers, ";
                    $strSQL .= " user_fname, ";
                    $strSQL .= " user_lname, ";
                    $strSQL .= " user_sex, ";
                    $strSQL .= " user_birthday, ";
                    $strSQL .= " user_nation, ";
                    $strSQL .= " user_nationOther, ";
                    $strSQL .= " user_country, ";
                    $strSQL .= " user_countryOther, ";
                    $strSQL .= " user_province_birth, ";
                    $strSQL .= " user_provinceOther, ";
                    $strSQL .= " user_job, ";
                    $strSQL .= " user_faith, ";
                    $strSQL .= " user_faithOther, ";
                    $strSQL .= " user_education, ";
                    $strSQL .= " user_marry_status, ";
                    $strSQL .= " user_blood, ";
                    $strSQL .= " user_allergy, ";
                    $strSQL .= " user_allergyOther, ";
                    $strSQL .= " user_father_name, ";
                    $strSQL .= " user_mother_name, ";
                    $strSQL .= " user_addby, ";
                    $strSQL .= " user_adddate, ";
                    $strSQL .= " user_updateby, ";
                    $strSQL .= " user_updatedate, ";
                    $strSQL .= " user_channel )";
                    $strSQL .="VALUES ";
                    $strSQL .="('".$objArr[0]."',";
                    $strSQL .="'".$objArr[1]."',";
                    $strSQL .="'".$objArr[2]."',";
                    $strSQL .="'".$objArr[3]."',";
                    $strSQL .="'".$objArr[4]."',";
                    $strSQL .="'".$objArr[5]."',";
                    $strSQL .="'".$objArr[6]."',";
                    $strSQL .="'".$objArr[7]."',";
                    $strSQL .="'".$objArr[8]."',";
                    $strSQL .="'".$objArr[9]."',";
                    $strSQL .="'".$objArr[10]."',";
                    $strSQL .="'".$objArr[11]."',";
                    $strSQL .="'".$objArr[12]."',";
                    $strSQL .="'".$objArr[13]."',";
                    $strSQL .="'".$objArr[14]."',";
                    $strSQL .="'".$objArr[15]."',";
                    $strSQL .="'".$objArr[16]."',";
                    $strSQL .="'".$objArr[17]."',";
                    $strSQL .="'".$objArr[18]."',";
                    $strSQL .="'".$objArr[19]."',";
                    $strSQL .="'".$objArr[20]."',";
                    $strSQL .="'".$objArr[21]."',";
                    $strSQL .="'".$objArr[22]."',";
                    $strSQL .="'".$member_name."',";
                    $strSQL .="'".$date."',";
                    $strSQL .="'".$member_name."',";
                    $strSQL .="'".$date."',";
                    $strSQL .="'Import Excel') ";
                    $objQuery =  mysqli_query($con, $strSQL) or die ("Error in query: $strSQL " . mysqli_error($con));

                }

                $result = $result+1;

                $icon = 'success';
                $message = 'นำเข้าข้อมูลเรียบร้อยแล้ว';
                $iden13 = '';

            }else{

                //จำนวน "เลขบัตรประชาชน" น้อยกว่า 12 ตัวอักษร
                $result = 0;
                $icon = 'warning';
                $message = 'เลขบัตรประชาชนไม่ถูกต้องบางส่วน กรุณาตรวจสอบข้อมูล!';
                $iden13 = 'นำเข้าข้อมูลไม่สำเร็จ';

            }

        }
    }

    if($result){

        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=$icon&message=$message&iden13=$iden13';";
        echo "</script>";

    }else{
        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=$icon&message=$message&iden13=$iden13';";
        echo "</script>";
    }

?>