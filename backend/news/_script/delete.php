<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $news_id = $_GET['id'];

    $sql = "DELETE FROM news WHERE news_id=$news_id";
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