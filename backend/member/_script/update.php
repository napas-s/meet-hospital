<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$member_id    		= $_POST['member_id'];
	$member_user        = $_POST['member_user_old'];
    $member_fullname    = $_POST['member_fullname'];
	$member_tel 	    = $_POST['member_tel'];
	$member_lavel 	    = $_POST['member_lavel'];
	$member_updateby    = $_SESSION["User"];
	$upload             = $_FILES['member_img']['name'];

    $check   = "SELECT * FROM member WHERE member_user='$member_user' AND member_id != '$member_id' ";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

    if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?id=$member_id&icon=warning&message=มีชื่อผู้ใช้นี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

        if($upload !='') {

            $path="../../../uploads/member/";
            $type = strrchr($_FILES['member_img']['name'],".");
            $newname =$numrand.$date1.$type;
            $path_copy=$path.$newname;

            $path_link="../../../uploads/member/".$newname;
            move_uploaded_file($_FILES['member_img']['tmp_name'],$path_copy);

            $sql_select="SELECT * FROM member WHERE member_id = '$member_id'";
            $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

            while($array = mysqli_fetch_array($sql_select_query)){
                @unlink ("../../../uploads/member/$array[member_img]");
            }

            $sql = "UPDATE member SET
                member_fullname	    ='$member_fullname',
                member_tel	        ='$member_tel',
                member_lavel	    ='$member_lavel',
                member_img		    ='$newname',
                member_updateby	    ='$member_updateby',
                member_updatedate	='$date2'
                WHERE member_id=$member_id";

        }else{

            $sql = "UPDATE member SET
                member_fullname	    ='$member_fullname',
                member_tel	        ='$member_tel',
                member_lavel	    ='$member_lavel',
                member_updateby	    ='$member_updateby',
                member_updatedate	='$date2'
                WHERE member_id=$member_id";

        }

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$member_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$member_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }

    }

?>