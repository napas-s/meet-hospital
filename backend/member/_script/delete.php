<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $member_id = $_POST['idDelete'];

    $sql_select="SELECT * FROM member WHERE member_id = '$member_id'";
    $sql_select_query = mysqli_query($con,$sql_select)or die(mysqli_error($con));

    while($array = mysqli_fetch_array($sql_select_query)){
        @unlink ("../../../uploads/member/$array[member_img]");
    }

    $sql = "DELETE FROM member WHERE member_id=$member_id";
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