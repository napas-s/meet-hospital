<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

    $setting_id             = $_POST['setting_id'];
    $name_web               = $_POST['name_web'];
    $tel               		= $_POST['tel'];
    $email               	= $_POST['email'];
    $facebook               = $_POST['facebook'];
    $twitter               	= $_POST['twitter'];
    $address               	= $_POST['address'];
	$edit_by                = $_SESSION["User"];
	$icon_web               = $_FILES['icon_web']['name'];
    $icon_web_old           = $_POST['icon_web_old'];
	$logo_web               = $_FILES['logo_web']['name'];
    $logo_web_old           = $_POST['logo_web_old'];

    if($icon_web != ""){
        $path="../../../uploads/setting/";
        $type = strrchr($_FILES['icon_web']['name'],".");
        $newnameIcon ='icon'.$numrand.$date1.$type;
        $path_copy=$path.$newnameIcon;

        $path_link="../../../uploads/setting/".$newnameIcon;
        move_uploaded_file($_FILES['icon_web']['tmp_name'],$path_copy);

        $sql_select="SELECT * FROM setting WHERE id = '$setting_id'";
        $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

        while($array = mysqli_fetch_array($sql_select_query)){
            @unlink ("../../../uploads/setting/$array[icon_web]");
        }
    }else{
        $newnameIcon = $icon_web_old;
    }

    if($logo_web != ""){
        $path="../../../uploads/setting/";
        $type = strrchr($_FILES['logo_web']['name'],".");
        $newnameLogo ='logo'.$numrand.$date1.$type;
        $path_copy=$path.$newnameLogo;

        $path_link="../../../uploads/setting/".$newnameLogo;
        move_uploaded_file($_FILES['logo_web']['tmp_name'],$path_copy);

        $sql_select="SELECT * FROM setting WHERE id = '$setting_id'";
        $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

        while($array = mysqli_fetch_array($sql_select_query)){
            @unlink ("../../../uploads/setting/$array[logo_web]");
        }
    }else{
        $newnameLogo = $logo_web_old;
    }

    $sql = "UPDATE setting SET
        icon_web		    ='$newnameIcon',
        logo_web		    ='$newnameLogo',
        name_web		    ='$name_web',
        tel		            ='$tel',
        email		        ='$email',
        facebook		    ='$facebook',
        twitter		        ='$twitter',
        address		        ='$address',
        edit_by	            ='$edit_by',
        edit_date	        ='$date2'
        WHERE id=$setting_id";


    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../index.php?icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }

?>