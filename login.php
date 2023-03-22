<!DOCTYPE html>
<html lang="en">
<head>

	<!-- นำเข้าไฟล์ config part file เพื่อเรียกใช้ part file ปัจจุบัน -->
    <?PHP include_once('assets/vendor/base_url.php'); ?>

    <!-- นำเข้าไฟล์ฐานข้อมูล -->
    <?PHP require_once('_database/connection.php'); ?>
    <?php
        $sql_setting="SELECT * FROM setting";
        $sql_query_setting = mysqli_query($con,$sql_setting)or die(mysqli_error($con));
        $setting = mysqli_fetch_assoc($sql_query_setting);
    ?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?PHP if(isset($setting_temp['name_web'])){ ?>
        <title><?PHP echo $setting_temp['name_web']; ?></title>
    <?PHP } ?>
    <?PHP if(isset($setting_temp['icon_web'])){ ?>
        <link rel="icon" href="<?PHP echo base_url(); ?>uploads/setting/<?PHP echo $setting_temp['icon_web']; ?>" type ="image/x-icon">
    <?PHP } ?>

	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?PHP base_url()?>assets/vendor/Login_v14/css/main.css">

    <style>
        img{  width: 100%; }
        .alert_box{
            font-size: 14px;
            padding: 1rem;
            border: 1px solid red;
            border-radius: 10px;
            color: #e25656;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="_login/login.php" method="post">
					<span class="login100-form-title p-b-32">
						<?PHP if(isset($setting_temp['logo_web'])){ ?>
                        	<img src="<?PHP echo base_url(); ?>uploads/setting/<?PHP echo $setting_temp['logo_web']; ?>" alt="" class="img-topnav" />
						<?PHP } ?>
					</span>

                    <?PHP if(!empty($_GET['er'])){ ?>
                        <div class="container-login100-form-alert alert_box">
                            ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง!!
                        </div>
                    <?PHP } ?>

					<span class="txt1 p-b-11">
						ชื่อผู้ใช้
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "กรุณากรอกข้อมูล">
						<input class="input100" type="text" id="txt_username" name="txt_username" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						รหัสผ่าน
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "กรุณากรอกข้อมูล">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" id="txt_password" name="txt_password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							เข้าสู่ระบบ
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/bootstrap/js/popper.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/select2/select2.min.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?PHP base_url()?>assets/vendor/Login_v14/js/main.js"></script>

</body>
</html>