<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>

<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ตารางเวลาการให้บริการ';
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
            $sql="SELECT * FROM about WHERE about_type = 4 ";
            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($sql_query);
        ?>

            <?PHP if(isset($row) != ""){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="about_id" id="about_id" value="<?PHP if(isset($row['about_id'])){ echo $row['about_id'];}?>" />
            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <input type="hidden" name="about_type" id="about_type" value="4" />
              <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title"><i class="nc-icon nc-watch-time"></i> ตารางเวลาการให้บริการ</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ประเภทเนื้อหา</label>
                                <select onchange="showContent(this)" class="form-control" name="about_lavel" id="about_lavel">
                                    <option value="1" <?PHP if(isset($row['about_lavel'])){ if($row['about_lavel'] == 1){echo 'selected';} }?> >เนื้อหา</option>
                                    <option value="2" <?PHP if(isset($row['about_lavel'])){ if($row['about_lavel'] == 2){echo 'selected';}  }?>>รูปภาพ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>สถานะ</label>
                                <select class="form-control" name="about_status" id="about_status">
                                    <option value="1" <?PHP if(isset($row['about_status'])){ ?> <?PHP if($row['about_status'] == 1){echo 'selected';} ?> <?PHP }?> >แสดงเนื้อหา</option>
                                    <option value="0" <?PHP if(isset($row['about_status'])){ ?> <?PHP if($row['about_status'] == 0){echo 'selected';} ?> <?PHP }?> >ซ่อนเนื้อหา</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="showContent" style="display: none;">
                                <br/>
                                <div class="form-group">
                                    <textarea id="about_content" name="about_content"><?PHP if(isset($row['about_content'])){ echo $row['about_content'];}?></textarea>
                                </div>
                                <br/>
                            </div>
                            <div id="showContentImg" style="display: none;">
                                <label>เลือกรูปภาพ</label>
                                <input type="file" id="about_img" name="about_img" class="form-control" accept="image/*" onchange="readURL(this);"/>
                                <br/>
                                <div class="text-center">
                                    <?PHP if(!empty($row['about_img'])){ ?>
                                        <img style="width: auto;"  id="preView" src="<?PHP base_url() ?>../../uploads/about/<?PHP echo $row['about_img']; ?>" alt="your image" />
                                    <?PHP }else{ ?>
                                        <img style="width: auto;" id="preView" src="<?PHP base_url() ?>../../assets/images/no-image-banner.png" alt="your image" />
                                    <?PHP } ?>
                                </div>
                                <br/>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-6"></div>
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

<!-- นำเข้ากล่องข้อความ ดึงลิงค์เชื่อมต่อจากภายนอก -->
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'about_content',{
        height: 400
    });
</script>

<!-- validate input -->
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

<!-- เช็คสถานะการเลือกการแสดงผลของเนื้อหา -->
<script>

    $(document).ready(function() {

        var e = document.getElementById("about_lavel");
        var x = document.getElementById("showContentImg");
        var y = document.getElementById("showContent");
        if (e.value == 2) {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "block";
        }

    });
    function showContent(e){

        var x = document.getElementById("showContentImg");
        var y = document.getElementById("showContent");
        if (e.value == 2) {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "block";
        }
    }
</script>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>