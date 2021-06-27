<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$news_title    		= $_POST['news_title'];
	$news_content    	= $_POST['news_content'];
	$news_status    	= $_POST['news_status'];
	$name_user 			= $_SESSION["User"];
	$upload             = $_FILES['news_img_cover']['name'];

	$check   = "SELECT * FROM news  WHERE news_title='$news_title'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?icon=warning&message=มีหัวข้อนี้อยู่แล้ว!'; ";
		echo "</script>";

	} else {

		if($upload !='') {
			$path="../../../uploads/news/";
			$type = strrchr($_FILES['news_img_cover']['name'],".");
			$newname =$numrand.$date1.$type;

			$path_copy=$path.$newname;
			$path_link="../../../uploads/news/".$newname;
			move_uploaded_file($_FILES['news_img_cover']['tmp_name'],$path_copy);
		}else{
			$newname = "";
		}

		$sql = "INSERT INTO news (news_img_cover,news_title, news_content, news_status, news_addby, news_adddate, news_updateby, news_updatedate)
				VALUES
				('$newname','$news_title','$news_content', '$news_status', '$name_user', '$date', '$name_user', '$date')";

		$result = mysqli_query($con, $sql) or die(mysqli_error($con));

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