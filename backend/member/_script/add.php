<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$member_fullname    = $_POST['member_fullname'];
	$member_user 	    = $_POST['member_user'];
	$member_tel 	    = $_POST['member_tel'];
	$member_password 	= md5($_POST['member_password']);
	$member_lavel 	    = $_POST['member_lavel'];
	$member_addby 		= $_SESSION["User"];
	$upload             = $_FILES['member_img']['name'];

	$check   = "SELECT * FROM member  WHERE member_user='$member_user'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีชื่อผู้ใช้นี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

		if($upload !='') {
			$path="../../../uploads/member/";
			$type = strrchr($_FILES['member_img']['name'],".");
			$newname =$numrand.$date1.$type;

			$path_copy=$path.$newname;
			$path_link="../../../uploads/member/".$newname;
			move_uploaded_file($_FILES['member_img']['tmp_name'],$path_copy);
		}else{
			$newname = "";
		}

		$sql = "INSERT INTO member (member_img,member_fullname, member_tel, member_user, member_password,member_lavel, member_addby, member_adddate)
				VALUES
				('$newname','$member_fullname','$member_tel', '$member_user','$member_password', '$member_lavel', '$member_addby', '$date')";

		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

		if($result){

			$id = mysqli_insert_id($con);

			echo "<script type='text/javascript'>";
			echo "window.location='../form.php?id=$id&icon=success&message=เพิ่มข้อมูลเรียบร้อยแล้ว';";
			echo "</script>";

		}else{
			echo "<script type='text/javascript'>";
			echo "window.location='../form.php?icon=error&message=เพิ่มข้อมูลไม่สำเร็จ';";
			echo "</script>";
		}
	}

 ?>