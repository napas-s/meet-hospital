<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$about_content 	    = $_POST['about_content'];
    if(isset($_POST['about_googlemap'])){
	    $about_googlemap 	= $_POST['about_googlemap'];
    }else{
        $about_googlemap 	= NULL;
    }
    if(isset($_POST['about_content_googlemap'])){
	    $about_content_googlemap 	= $_POST['about_content_googlemap'];
    }else{
        $about_content_googlemap 	= NULL;
    }
	$about_type         = $_POST['about_type'];
	$about_lavel 	    = $_POST['about_lavel'];
	$about_status 	    = $_POST['about_status'];
	$about_updateby     = $_SESSION["User"];
	$upload             = $_FILES['about_img']['name'];

    if($about_type == 1){
        $page = 'about.php';
    }else if($about_type == 2){
        $page = 'organizationchart.php';
    }else if($about_type == 3){
        $page = 'map.php';
    }else{
        $page = 'servicetime.php';
    }

    if($upload !='') {
        $path="../../../uploads/about/";
        $type = strrchr($_FILES['about_img']['name'],".");
        $newname =$numrand.$date1.$type;

        $path_copy=$path.$newname;
        $path_link="../../../uploads/about/".$newname;
        move_uploaded_file($_FILES['about_img']['tmp_name'],$path_copy);
    }else{
        $newname = null;
    }

    $sql = "INSERT INTO about (about_img,about_content, about_googlemap, about_content_googlemap, about_lavel, about_type, about_status, about_updateby, about_updatedate)
            VALUES
            ('$newname','$about_content','$about_googlemap','$about_content_googlemap','$about_lavel', '$about_type','$about_status', '$about_updateby', '$date')";

    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){

        echo "<script type='text/javascript'>";
        echo "window.location='../$page?icon=success&message=เพิ่มข้อมูลเรียบร้อยแล้ว';";
        echo "</script>";

    }else{
        echo "<script type='text/javascript'>";
        echo "window.location='../$page?icon=error&message=เพิ่มข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }

 ?>