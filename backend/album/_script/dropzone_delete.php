<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $idDelete    		= $_POST['idDelete'];
	$albumIdDelete      = $_POST['albumIdDelete'];

    $sql_select="SELECT * FROM album_des WHERE des_id = '$idDelete'";
    $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

    while($array = mysqli_fetch_array($sql_select_query)){
        @unlink ("../../../uploads/album/$array[des_img]");
    }

    $sql = "DELETE FROM album_des WHERE des_id=$idDelete";
    $result = mysqli_query($con, $sql) or die("Error in query : $sql" .mysqli_error($con));

    if($result){
        echo "<script>";
        echo "window.location ='../form.php?id=$albumIdDelete'; ";
        echo "</script>";
    } else {
        echo "<script>";
        echo "window.location ='../form.php?id=$albumIdDelete'; ";
        echo "</script>";
    }
?>