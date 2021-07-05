<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $ser_point_id = $_POST['idDelete'];

    $sql = "DELETE FROM services_point WHERE ser_point_id=$ser_point_id";
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