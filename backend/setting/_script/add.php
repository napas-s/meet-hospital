<meta charset="UTF-8" />
<?php
	@session_start();
    require_once('../../../_database/connection.php');

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i:s");
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

    $name_web               = $_POST['name_web'];
	$icon_web               = $_FILES['icon_web']['name'];
	$logo_web               = $_FILES['logo_web']['name'];
	$edit_by                = $_SESSION["User"];

	if(!empty($icon_web)){
        $path1="../../../uploads/setting/";
        $type1 = strrchr($_FILES['icon_web']['name'],".");
        $newnameIcon ='icon'.$numrand.$date1.$type1;
        $path_copy1=$path1.$newnameIcon;

        $path_link1="../../../uploads/setting/".$newnameIcon;
        move_uploaded_file($_FILES['icon_web']['tmp_name'],$path_copy1);

    }else{
        $newnameIcon = NULL;
    }

    if(!empty($logo_web)){
        $path2="../../../uploads/setting/";
        $type2 = strrchr($_FILES['logo_web']['name'],".");
        $newnameLogo ='logo'.$numrand.$date1.$type2;
        $path_copy2=$path2.$newnameLogo;

        $path_link2="../../../uploads/setting/".$newnameLogo;
        move_uploaded_file($_FILES['logo_web']['tmp_name'],$path_copy2);

    }else{
        $newnameLogo = NULL;
    }

	$sql = "INSERT INTO setting (icon_web, logo_web, name_web, edit_by, edit_date)
			VALUES
			('$newnameIcon','$newnameLogo','$name_web', '$edit_by', '$date')";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

	if($result){

		echo "<script type='text/javascript'>";
		echo "window.location='../index.php?icon=success&message=เพิ่มข้อมูลเรียบร้อยแล้ว';";
		echo "</script>";

	}else{
		echo "<script type='text/javascript'>";
		echo "window.location='../index.php?icon=error&message=เพิ่มข้อมูลไม่สำเร็จ';";
		echo "</script>";
	}

 ?>