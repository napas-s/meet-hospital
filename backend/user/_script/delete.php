<meta charset="UTF-8" />
<?php

    require_once('../../../_database/connection.php');

    $Id = $_POST['idDelete'];


    $sql_user				="SELECT * FROM users WHERE user_id = $Id";
    $sql_query_user 		= mysqli_query($con,$sql_user)or die(mysqli_error($con));
    $user 					= mysqli_fetch_assoc($sql_query_user);

    $check   = "SELECT * FROM meet_service  WHERE mt_idcardNumber='$user[user_iden13]'";
	$result1 = mysqli_query($con, $check);
	$num     = mysqli_num_rows($result1);

	if($num > 0)
	{
        echo "<script>";
        echo "window.location ='../index.php?icon=warning&iden13=$user[user_iden13]&message=นี้มีทำการนัดหมายแล้ว ไม่สามารถลบข้อมูลได้'; ";
		echo "</script>";

	} else {
        $sql = "DELETE FROM users WHERE user_id=$Id";
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
    }
?>