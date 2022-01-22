<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลจุดบริการ';
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
              $servicepointId = $_GET["id"];
              $sql="SELECT * FROM services_point WHERE ser_point_id = $servicepointId ";
              $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
              $row = mysqli_fetch_assoc($sql_query);
            }
        ?>

            <?PHP if(isset($_GET["id"])){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="ser_point_id" id="ser_point_id" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" />

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title"><i class="nc-icon nc-tile-56"></i> ข้อมูลจุดบริการ</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ชื่อจุดบริการ</label>
                        <input class="form-control" type="text" name="ser_point_name" id="ser_point_name" value="<?PHP if(isset($row['ser_point_name'])){ echo $row['ser_point_name']; } ?>" required="true" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>สถานะ</label>
                          <select class="form-control" name="ser_point_status" id="ser_point_status">
                              <option value="1" <?PHP if(isset($row['ser_point_status'])){ ?> <?PHP if($row['ser_point_status'] == 1){echo 'selected';} ?> <?PHP }?> >แสดงข้อมูล</option>
                              <option value="0" <?PHP if(isset($row['ser_point_status'])){ ?> <?PHP if($row['ser_point_status'] == 0){echo 'selected';} ?> <?PHP }?> >ซ่อนข้อมูล</option>
                          </select>
                      </div>
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