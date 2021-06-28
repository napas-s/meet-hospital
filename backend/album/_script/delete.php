<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $Id = $_POST['idDelete'];

    $sql_select="SELECT * FROM album_des WHERE albumId = '$Id'";
    $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

    while($array = mysqli_fetch_array($sql_select_query)){
        @unlink ("../../../uploads/album/$array[des_img]");
    }

    $sql = "DELETE FROM album WHERE album_id=$Id";
    $result = mysqli_query($con, $sql) or die("Error in query : $sql" .mysqli_error($con));

    if($result){
        echo "<script>";
        echo "window.location ='../index.php'; ";
        echo "</script>";
    } else {
        echo "<script>";
        echo "window.location ='../index.php'; ";
        echo "</script>";
    }
?>