<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>

<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลพนักงาน';
?>

<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('../_template/header.php') ?>

<!-- เนื้อหาของหน้า -->
<div class="wrapper ">

    <!-- นำเข้าไฟล์ Template ส่วนเมนูด้านข้าง -->
    <?PHP include_once('../_template/sidebar.php') ?>

    <div class="main-panel">
        <!-- นำเข้าไฟล์ Template ส่วนเมนูด้านข้าง -->
        <?PHP include_once('../_template/navbar.php') ?>
        <div class="content">

        <?php
            if(isset($_GET["id"])){
              $memberId = $_GET["id"];
              $sql="SELECT * FROM member WHERE member_id = $memberId ";
              $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
              $row = mysqli_fetch_assoc($sql_query);
            }
        ?>

            <?PHP if(isset($_GET["id"])){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="member_id" id="member_id" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title"><i class="nc-icon nc-chart-bar-32"></i> ข้อมูลบัญชีผู้ใช้</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-4 text-center">
                      <div class="form-group">
                        <?PHP if(!empty($row['member_img'])){ ?>
                          <img style="max-width: 360px;" id="preView" src="<?PHP base_url() ?>../../uploads/member/<?PHP echo $row['member_img']; ?>" alt="your image" />
                        <?PHP }else{ ?>
                          <img style="max-width: 360px;" id="preView" src="<?PHP base_url() ?>../../assets/images/no-image.jpeg" alt="your image" />
                        <?PHP } ?>
                      </div>
                      <input class="form-control" name="member_img" id="member_img" type='file' accept="image/*" onchange="readURL(this);" />
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>ชื่อ - นามสกุล</label>
                        <input class="form-control" type="text" name="member_fullname" id="member_fullname" value="<?PHP if(isset($row['member_fullname'])){ echo $row['member_fullname']; } ?>" required="true" />
                      </div>
                      <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input class="form-control" type="text" name="member_tel" id="member_tel" value="<?PHP if(isset($row['member_tel'])){ echo $row['member_tel']; } ?>"  />
                      </div>
                      <div class="form-group">
                        <label>ชื่อผู้ใช้ <small>(ใช้สำหรับเข้าสู่ระบบ)</small></label>
                        <input <?PHP if(isset($_GET["id"])){ ?>disabled<?PHP } ?> class="form-control" type="text" name="member_user" id="member_user" required="true" value="<?PHP if(isset($row['member_user'])){ echo $row['member_user']; }?>"/>
                        <input type="hidden" name="member_user_old" id="member_user_old" value="<?PHP if(isset($row['member_user'])){ echo $row['member_user']; }?>"/>
                      </div>
                      <?PHP if(empty($_GET["id"])){ ?>
                      <div class="form-group">
                        <label>รหัสผ่าน <small>(ใช้สำหรับเข้าสู่ระบบ)</small></label>
                        <input class="form-control" type="text" name="member_password" id="member_password" required="true" />
                      </div>
                      <?PHP } ?>
                      <div class="form-group">
                        <label>สถานะ</label>
                        <select class="form-control" name="member_lavel" id="member_lavel">
                          <option value="1" value="<?PHP if(isset($row['member_lavel'])){ if($row['member_user'] == 1){echo 'selected';} }?>" >พนักงาน</option>
                          <option value="2" value="<?PHP if(isset($row['member_lavel'])){ if($row['member_user'] == 2){echo 'selected';}  }?>">ผู้ดูแลระบบ</option>
                        </select>
                      </div>
                      <?PHP if(isset($_GET["id"])){ ?>
                        <div class="form-group">
                          <a href="changpassword.php?id=<?PHP echo $_GET['id']; ?>"><i class="nc-icon nc-tap-01"></i> เปลี่ยนรหัสผ่าน</a>
                        </div>
                      <?PHP } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-6"><a href="index.php"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a></div>
                    <div class="col-md-6 text-right"><button type="submit" class="btn btn-success">บันทึกข้อมูล</button></div>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>

</div>


<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.validate.min.js"></script>
<script>
    //ส่งค่า input ไปยัง form Validation ในไฟล์ assets/vendor/paper-dashboard/assets/js/function.js
    $(document).ready(function() {
      setFormValidation('#FormValidation');
    });
</script>

<!-- แจ้งเตือนมีการผิดพลาด (รับตัวแปลจากหน้า _script/add or _script/update) -->
<?PHP if(isset($_GET['message'])){ ?>
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/sweetalert2@11.js"></script>
<input type="hidden" name="icon" id="icon" value="<?PHP if(isset($_GET['icon'])){ echo $_GET['icon'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
<input type="hidden" name="message" id="message" value="<?PHP if(isset($_GET['message'])){ echo $_GET['message'];}?>" /> <!-- ตัวแปรข้อความ -->

<script>
    $(document).ready(function() {
      $icon = $('#icon').val();
      $message = $('#message').val();
      Swal.fire({
        text: $message,
        icon: $icon,
        confirmButtonText: 'ปิด'
      })
    });
</script>
<?PHP } ?>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>