<meta charset="UTF-8" />
<?PHP
	@session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
    $date               = date("Y-m-d H:i:s");
	$date1              = date("Ymd_His");
	$numrand            = (mt_rand());
	$albumId 		    = $_POST["albumId"];
	$member_addby 		= $_SESSION["User"];

    extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {

        $file_name=$date1.$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

        if(in_array($ext,$extension)) {
            if(!file_exists("../../../uploads/album/".$file_name)) {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../../uploads/album/".$file_name);
            }else {
                $filename=basename($file_name,$ext);
                $filename=$filename.time().$ext;
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../../../uploads/album/".$filename);
            }
        }else {
            array_push($error,"$file_name, ");
        }

        $sql = "INSERT INTO album_des (des_img,albumId,des_addby, des_adddate)
				VALUES
				('$file_name','$albumId','$member_addby', '$date')";

		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    }

    if($result){

        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$albumId';";
        echo "</script>";

    }else{

        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$albumId';";
        echo "</script>";

    }

?>