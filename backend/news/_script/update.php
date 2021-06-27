<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	$news_id    		= $_POST['news_id'];
	$news_title    		= $_POST['news_title'];
	$news_content    	= $_POST['news_content'];
	$news_status    	= $_POST['news_status'];
	$name_user 			= $_SESSION["User"];
	$upload             = $_FILES['news_img_cover']['name'];

    $check   = "SELECT * FROM news WHERE news_title='$news_title' AND news_title != '$news_title' ";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

    if($num > 0)
	{

        echo "<script>";
        echo "window.location ='../form.php?id=$news_id&icon=warning&message=มีหัวข้อนี้อยู่แล้ว'; ";
		echo "</script>";

	} else {

        if($upload !='') {

            $path="../../../uploads/news/";
            $type = strrchr($_FILES['news_img_cover']['name'],".");
            $newname =$numrand.$date1.$type;
            $path_copy=$path.$newname;

            $path_link="../../../uploads/news/".$newname;
            move_uploaded_file($_FILES['news_img_cover']['tmp_name'],$path_copy);

            $sql_select="SELECT * FROM news WHERE news_id = '$news_id'";
            $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

            while($array = mysqli_fetch_array($sql_select_query)){
                @unlink ("../../../uploads/news/$array[news_img_cover]");
            }

            $sql = "UPDATE news SET
                news_title	            ='$news_title',
                news_content	        ='$news_content',
                news_status	            ='$news_status',
                news_img_cover		    ='$newname',
                news_updateby	        ='$name_user',
                news_updatedate	        ='$date2'
                WHERE news_id=$news_id";

        }else{

            $sql = "UPDATE news SET
                news_title	            ='$news_title',
                news_content	        ='$news_content',
                news_status	            ='$news_status',
                news_updateby	        ='$name_user',
                news_updatedate	        ='$date2'
                WHERE news_id=$news_id";

        }

        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

        if($result){
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$news_id&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
            echo "</script>";
        }
        else{
            echo "<script type='text/javascript'>";
            echo "window.location='../form.php?id=$news_id&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
            echo "</script>";
        }

    }

?>