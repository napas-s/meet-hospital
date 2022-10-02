<meta charset="UTF-8" />
<?php
    @session_start();
    require_once('../../../_database/connection.php');

    date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$date2 = date("Y-m-d H:i:s");

	//ข้อมูลส่วนบุคคล
	$userId 	    		    = $_POST['userId'];
	$user_iden13 	    		= $_POST['iden13_hd'] ? $_POST['iden13_hd'] : '';
	$user_prename 	    		= $_POST['prename'] ? $_POST['prename'] : '';
	$user_prenameOthers 	    = $_POST['prenameOther'] ? $_POST['prenameOther'] : '';
	$user_fname 	    		= $_POST['fname'] ? $_POST['fname'] : '';
	$user_lname 	    		= $_POST['lname'] ? $_POST['lname'] : '';
	$user_sex 	    			= $_POST['sex'] ? $_POST['sex'] : '';
	$user_birthday 	    		= $_POST['birthday'] ? date("d-m-Y", strtotime($_POST['birthday'])) : '';
	$user_nation 	    		= $_POST['nation'] ? $_POST['nation'] : '';
	$user_nationOther 	    	= $_POST['nationOther'] ? $_POST['nationOther'] : '';
	$user_country 	    		= $_POST['country'] ? $_POST['country'] : '';
	$user_countryOther 	    	= $_POST['countryOther'] ? $_POST['countryOther'] : '';
	$user_province_birth 	    = $_POST['province_birth'] ? $_POST['province_birth'] : '';
	$user_provinceOther 	    = $_POST['provinceOther'] ? $_POST['provinceOther'] : '';
	$user_job 	    			= $_POST['job'] ? $_POST['job'] : '';
	$user_faith 	    		= $_POST['faith'] ? $_POST['faith'] : '';
	$user_faithOther 	    	= $_POST['faithOther'] ? $_POST['faithOther'] : '';
	$user_education 	    	= $_POST['education'] ? $_POST['education'] : '';
	$user_marry_status 	    	= $_POST['marry_status'] ? $_POST['marry_status'] : '';
	$user_blood 	    		= $_POST['blood'] ? $_POST['blood'] : '';
	$user_allergy 	    		= $_POST['allergy'] ? $_POST['allergy'] : '';
	$user_allergyOther 	    	= $_POST['allergyOther'] ? $_POST['allergyOther'] : '';
	$user_father_name 	    	= $_POST['father_name'] ? $_POST['father_name'] : '';
	$user_mother_name 	    	= $_POST['mother_name'] ? $_POST['mother_name'] : '';
	$member_name 				= $_SESSION["User"];
	$date 						= date("Y-m-d H:i:s");

	//ข้อมูลการติดต่อ
	$user_home_no_pt 	    	= $_POST['home_no_pt'];
	$user_moo_pt 	    		= $_POST['moo_pt'];
	$user_soi_pt 	    		= $_POST['soi_pt'];
	$user_road_pt 	    		= $_POST['road_pt'];

	//ค้นหาจังหวัด
	if($_POST['province_live_pt'] != ""){
		$province_live_pt 	    	= $_POST['province_live_pt'];
		$sql_province				="SELECT * FROM se_provinces WHERE id = $province_live_pt";
		$sql_query_province 		= mysqli_query($con,$sql_province)or die(mysqli_error($con));
		$province 					= mysqli_fetch_assoc($sql_query_province);
		$user_province_live_pt      = $province['prov_name_th'];
	}else{
		$user_province_live_pt      = NULL;
	}

	// ค้นหาอำเภอ
	if($_POST['amphure_live_pt'] != ""){
		$amphure_live_pt 	    	= $_POST['amphure_live_pt'];
		$sql_amphure				="SELECT * FROM se_amphures WHERE id = $amphure_live_pt";
		$sql_query_amphure 			= mysqli_query($con,$sql_amphure)or die(mysqli_error($con));
		$amphure 					= mysqli_fetch_assoc($sql_query_amphure);
		$user_amphure_live_pt      = $amphure['amp_name_th'];
	}else{
		$user_amphure_live_pt      = NULL;
	}

	// ค้นหาตำบล
	if($_POST['district_live_pt'] != ""){
		$district_live_pt 	    	= $_POST['district_live_pt'];
		$sql_district				="SELECT * FROM se_districts WHERE id = $district_live_pt";
		$sql_query_district 		= mysqli_query($con,$sql_district)or die(mysqli_error($con));
		$district 					= mysqli_fetch_assoc($sql_query_district);
		$user_district_live_pt      = $district['dis_name_th'];
	}else{
		$user_district_live_pt      = NULL;
	}
	$user_zipcode_live_pt 	    = $_POST['zipcode_live_pt'];
	$user_phone_moblie_1_pt 	= $_POST['phone_moblie_1_pt'];
	$user_phone_moblie_2_pt 	= $_POST['phone_moblie_2_pt'];
	$user_phone_home_pt 	    = $_POST['phone_home_pt'];
	$user_phone_work_pt 	    = $_POST['phone_work_pt'];
	$user_email_pt 	    		= $_POST['email_pt'];

	//ผู้ติดต่อกรณีฉุกเฉิน
	$user_name_fam 	    		= $_POST['name_fam'];
	$user_relation_fam 	    	= $_POST['relation_fam'];
	$user_phone_moblie_1_fam 	= $_POST['phone_moblie_1_fam'];
	$user_phone_moblie_2_fam 	= $_POST['phone_moblie_2_fam'];
	$user_phone_home_fam 	    = $_POST['phone_home_fam'];
	$user_phone_work_fam 	    = $_POST['phone_work_fam'];
	$user_email_fam 	    	= $_POST['email_fam'];

    $sql = "UPDATE users SET
            user_prename	        ='$user_prename',
            user_prenameOthers	    ='$user_prenameOthers',
            user_fname	            ='$user_fname',
            user_lname	            ='$user_lname',
            user_sex	            ='$user_sex',
            user_birthday	        ='$user_birthday',
            user_nation	            ='$user_nation',
            user_nationOther	    ='$user_nationOther',
            user_country	        ='$user_country',
            user_countryOther	    ='$user_countryOther',
            user_province_birth	    ='$user_province_birth',
            user_provinceOther	    ='$user_provinceOther',
            user_job	            ='$user_job',
            user_faith	            ='$user_faith',
            user_faithOther	        ='$user_faithOther',
            user_education	        ='$user_education',
            user_marry_status	    ='$user_marry_status',
            user_blood	            ='$user_blood',
            user_allergy	        ='$user_allergy',
            user_allergyOther	    ='$user_allergyOther',
            user_father_name	    ='$user_father_name',
            user_mother_name	    ='$user_mother_name',
            user_updateby	        ='$member_name',
            user_updatedate	        ='$date2'
        WHERE user_id               =$userId";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

    //ผู้ติดต่อกรณีฉุกเฉิน
    $sql_family = "UPDATE users_family SET
            user_name_fam	        ='$user_name_fam',
            user_relation_fam	    ='$user_relation_fam',
            user_phone_moblie_1_fam	='$user_phone_moblie_1_fam',
            user_phone_moblie_2_fam	='$user_phone_moblie_2_fam',
            user_phone_home_fam	    ='$user_phone_home_fam',
            user_email_fam	        ='$user_email_fam'
        WHERE user_id               =$userId";
    mysqli_query($con, $sql_family) or die ("Error in query: $sql_family " . mysqli_error($con));

    //ข้อมูลการติดต่อ
    $sql_contact = "UPDATE users_contact SET
            user_home_no_pt	            ='$user_home_no_pt',
            user_moo_pt	                ='$user_moo_pt',
            user_soi_pt	                ='$user_soi_pt',
            user_road_pt	            ='$user_road_pt',
            user_province_live_pt	    ='$user_province_live_pt',
            user_amphure_live_pt	    ='$user_amphure_live_pt',
            user_district_live_pt	    ='$user_district_live_pt',
            user_zipcode_live_pt	    ='$user_zipcode_live_pt',
            user_phone_moblie_1_pt	    ='$user_phone_moblie_1_pt',
            user_phone_moblie_2_pt	    ='$user_phone_moblie_2_pt',
            user_phone_home_pt	        ='$user_phone_home_pt',
            user_phone_work_pt	        ='$user_phone_work_pt',
            user_email_pt	            ='$user_email_pt'
        WHERE user_id                   =$userId";
    mysqli_query($con, $sql_contact) or die ("Error in query: $sql_contact " . mysqli_error($con));


    if($result){
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$userId&icon=success&message=อัพเดตข้อมูลเรียบร้อยแล้ว';";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "window.location='../form.php?id=$userId&icon=error&message=อัพเดตข้อมูลไม่สำเร็จ';";
        echo "</script>";
    }

?>