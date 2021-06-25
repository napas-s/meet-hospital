<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>

<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ตั้งค่าเว็บไซต์';
?>

<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('../_template/header.php') ?>

<!-- เนื้อหาของหน้า -->
<div class="wrapper ">

    <!-- นำเข้าไฟล์ Template ส่วนเมนูด้านข้าง -->
    <?PHP include_once('../_template/sidebar.php') ?>

    <?php
        $sql="SELECT * FROM setting";
        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($sql_query);
    ?>

    <div class="main-panel">
        <!-- นำเข้าไฟล์ Template ส่วนเมนูด้านข้าง -->
        <?PHP include_once('../_template/navbar.php') ?>
        <div class="content">
            <?PHP if(isset($row)){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="setting_id" id="setting_id" value="<?PHP if(isset($row['id'])){ echo $row['id'];}?>" />

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <?PHP if(!empty($row['icon_web'])){ ?>
                                        <img style="width:auto;max-height: 100px;"  id="preView" src="<?PHP base_url() ?>../../uploads/setting/<?PHP echo $row['icon_web']; ?>" alt="icon image" />
                                        <input name="icon_web_old" id="icon_web_old" type='hidden' value="<?PHP echo $row['icon_web']; ?>"/>
                                    <?PHP }else{ ?>
                                        <img style="width:auto;max-height: 100px;"  id="preView" src="<?PHP base_url() ?>../../assets/images/no-image.jpeg" alt="icon image" />
                                    <?PHP } ?>
                                </div>
                                <label>Icon Web (ขนาด 30 X 30PX)</label>
                                <input class="form-control" name="icon_web" id="icon_web" type='file' accept="image/*" onchange="readURL(this);" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <?PHP if(!empty($row['logo_web'])){ ?>
                                        <img style="width:auto;max-height: 100px;"  id="preView2" src="<?PHP base_url() ?>../../uploads/setting/<?PHP echo $row['logo_web']; ?>" alt="logo image" />
                                        <input name="logo_web_old" id="logo_web_old" type='hidden' value="<?PHP echo $row['logo_web']; ?>"/>
                                    <?PHP }else{ ?>
                                        <img style="width:auto;max-height: 100px;"  id="preView2" src="<?PHP base_url() ?>../../assets/images/no-image.jpeg" alt="logo image" />
                                    <?PHP } ?>
                                </div>
                                <label>Logo Web (ขนาด 640 X 77PX)</label>
                                <input class="form-control" name="logo_web" id="logo_web" type='file' accept="image/*" onchange="readURL2(this);" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <label>ชื่อเว็บไซต์</label>
                                <input class="form-control" name="name_web" id="name_web" type='input' value="<?PHP if(isset($row['name_web'])){ echo $row['name_web'];}?>"  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 text-right"><button type="submit" class="btn btn-success">บันทึกข้อมูล</button></div>
                                </div>
                            </div>
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