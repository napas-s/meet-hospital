<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>

<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข่าวประชาสัมพันธ์';
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
              $Id = $_GET["id"];
              $sql="SELECT * FROM news WHERE news_id = $Id ";
              $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
              $row = mysqli_fetch_assoc($sql_query);
            }
        ?>

            <?PHP if(isset($_GET["id"])){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="news_id" id="news_id" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">ข่าวประชาสัมพันธ์</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-4 text-center">
                      <div class="form-group">
                        <?PHP if(!empty($row['news_img_cover'])){ ?>
                          <img style="max-height: 203px; width:auto;" id="preView" src="<?PHP base_url() ?>../../uploads/news/<?PHP echo $row['news_img_cover']; ?>" alt="your image" />
                          <input class="form-control" type="hidden" name="news_img_cover_old" id="news_img_cover_old" value="<?PHP if(isset($row['news_img_cover'])){ echo $row['news_img_cover']; } ?>" />
                        <?PHP }else{ ?>
                          <img style="max-height: 203px; width:auto;" id="preView" src="<?PHP base_url() ?>../../assets/images/no-image.jpeg" alt="your image" />
                        <?PHP } ?>
                      </div>
                    </div>
                    <div class="col-md-8">
                        <div style="margin-bottom: 10px;">
                            <label>ภาพหน้าปก (ขนาดแนะนำ 1140 X 456PX)</label>
                            <input class="form-control" name="news_img_cover" id="news_img_cover" type='file' accept="image/*" onchange="readURL(this);"/>
                        </div>
                        <div class="form-group">
                            <label>หัวข้อข่าวประชาสัมพันธ์</label>
                            <input class="form-control" type="text" name="news_title" id="news_title" value="<?PHP if(isset($row['news_title'])){ echo $row['news_title']; } ?>" required="true" />
                        </div>
                        <div class="form-group">
                            <label>สถานะ</label>
                            <select class="form-control" name="news_status" id="news_status">
                                <option value="1" <?PHP if(isset($row['news_status'])){ ?> <?PHP if($row['news_status'] == 1){echo 'selected';} ?> <?PHP }?> >แสดงเนื้อหา</option>
                                <option value="0" <?PHP if(isset($row['news_status'])){ ?> <?PHP if($row['news_status'] == 0){echo 'selected';} ?> <?PHP }?> >ซ่อนเนื้อหา</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="form-group">
                            <textarea id="news_content" name="news_content"><?PHP if(isset($row['news_content'])){ echo $row['news_content'];}?></textarea>
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

<!-- นำเข้ากล่องข้อความ ดึงลิงค์เชื่อมต่อจากภายนอก -->
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace( 'news_content',{
        height: 400
    });
</script>

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