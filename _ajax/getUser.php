<?PHP
    // นำเข้าไฟล์ฐานข้อมูล
    require_once('../_database/connection.php');

    $idCardNumber         = $_GET['idCardNumber'];

    $sqlMeet="SELECT * FROM meet_service WHERE mt_idcardNumber = $idCardNumber AND mt_status != 3 ";
    $sql_query_meet = mysqli_query($con, $sqlMeet)or die(mysqli_error($con));
    $user = mysqli_fetch_assoc($sql_query_meet);

    $res[] = '';

    if ($user) {
      $res = [
        'idcardNumber' => $user['mt_idcardNumber'],
        'meet_yourlink' => "checkmeet.php?idCardNumber=".$user['mt_idcardNumber'],
      ];
    }

    echo json_encode($res);

    // $sqlUser="SELECT users.user_iden13, users.user_prename, users.user_prenameOthers, 
    //             users.user_fname, users.user_lname, users.user_birthday, users_contact.user_phone_moblie_1_pt
    //           FROM users 
    //           LEFT JOIN users_contact ON users.user_id = users_contact.user_id
    //           WHERE users.user_iden13=$idCardNumber
    //           ";
    // $sql_query_user = mysqli_query($con, $sqlUser)or die(mysqli_error($con));
    // $user = mysqli_fetch_assoc($sql_query_user);

    // $res[] = '';

    // if ($user) {
    //   $res = [
    //     'user_prename' => $user['user_prename'],
    //     'user_prenameOthers' => $user['user_prenameOthers'],
    //     'user_fname' => $user['user_fname'],
    //     'user_lname' => $user['user_lname'],
    //     'user_birthday' => $user['user_birthday'] ? date("d-m-Y", strtotime($user['user_birthday'])) : date("d-m-Y"),
    //     'user_phone_moblie_1_pt' => $user['user_phone_moblie_1_pt'] ? $user['user_phone_moblie_1_pt'] : '-',
    //   ];
    // }


    //echo json_encode($res);

?>