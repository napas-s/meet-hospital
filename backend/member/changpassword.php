<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'เปลี่ยนรหัสผ่าน';
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
          if(!empty($_GET["id"])){
            $memberId = $_GET["id"];
            $sql="SELECT * FROM member WHERE member_id = $memberId ";
            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($sql_query);
          }
      ?>


      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/changpassword.php" method="post">
            <input type="hidden" name="member_id" id="member_id" value="<?PHP if(!empty($_GET['id'])){ echo $_GET['id'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
            <div class="card ">
              <div class="card-header ">
                  <h4 class="card-title">เปลี่ยนรหัสผ่าน</h4>
              </div>
              <div class="card-body ">
                <div class="form-group">
                  <label>ชื่อผู้ใช้ <small>(ใช้สำหรับเข้าสู่ระบบ)</small></label>
                  <input disabled class="form-control" type="text" name="member_user" id="member_user" value="<?PHP if(!empty($row['member_user'])){ echo $row['member_user']; } ?>" />
                </div>
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  <input class="form-control" type="text" name="member_password" id="member_password" required="true"   />
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-6"><a href="form.php?id=<?PHP echo $_GET['id']; ?>"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a></div>
                  <div class="col-md-6 text-right"><button type="submit" class="btn btn-success">บันทึกข้อมูล</button></div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

</div>


<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้า model เปลี่ยนรหัสผ่าน -->
<?PHP include_once('_action/changepassword.php'); ?>

<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.validate.min.js"></script>
<script>
    //ส่งค่า input ไปยัง form Validation ในไฟล์ assets/vendor/paper-dashboard/assets/js/function.js
    $(document).ready(function() {
      setFormValidation('#FormValidation');
    });
</script>

<!-- แจ้งเตือนมีการผิดพลาด (รับตัวแปลจากหน้า _script/add or _script/update) -->
<?PHP if(!empty($_GET['message'])){ ?>
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/sweetalert2@11.js"></script>
<input type="hidden" name="icon" id="icon" value="<?PHP if(!empty($_GET['icon'])){ echo $_GET['icon'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
<input type="hidden" name="message" id="message" value="<?PHP if(!empty($_GET['message'])){ echo $_GET['message'];}?>" /> <!-- ตัวแปรข้อความ -->

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