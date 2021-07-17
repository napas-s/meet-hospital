<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'กิจกรรมของเรา';
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
                $sql="SELECT * FROM album WHERE album_id = $Id ";
                $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($sql_query);
              }
          ?>

          <?PHP if(!empty($_GET["id"])){ ?>
            <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
            <input type="hidden" name="album_id" id="album_id" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" />

          <?PHP }else{ ?>
            <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
          <?PHP } ?>
            <div class="card ">
              <div class="card-header ">
                  <h4 class="card-title"><i class="nc-icon nc-image"></i> กิจกรรมของเรา</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>ชื่ออัลบั้ม</label>
                        <input class="form-control" type="text" name="album_title" id="album_title" value="<?PHP if(isset($row['album_title'])){ echo $row['album_title']; } ?>" required="true" />
                    </div>
                    <div class="form-group">
                        <label>สถานะ</label>
                        <select class="form-control" name="album_status" id="album_status">
                            <option value="1" <?PHP if(isset($row['album_status'])){ ?> <?PHP if($row['album_status'] == 1){echo 'selected';} ?> <?PHP }?> >แสดงเนื้อหา</option>
                            <option value="0" <?PHP if(isset($row['album_status'])){ ?> <?PHP if($row['album_status'] == 0){echo 'selected';} ?> <?PHP }?> >ซ่อนเนื้อหา</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>รายละเอียดเพิ่มเติม</label>
                      <textarea rows="4" id="album_detail" name="album_detail" class="form-control"><?PHP if(isset($row['album_detail'])){ echo $row['album_detail'];}?></textarea>
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

          <?php if(isset($_GET["id"])){ ?>
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="_script/dropzone.php" method="post">
                      <input type="hidden" name="albumId" id="albumId" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" />
                      <label>อัพโหลดไฟล์ภาพ</label>
                      <br/>
                      <input id="files" name="files[]" type="file" multiple class="form-control" accept="image/jpg" />
                      <button type="submit" id="btnUpload" class="btn btn-success btn-block">อัพโหลดไฟล์</button>
                      <small class="text-danger">คำแนะนำ: ไฟล์ไม่ควรมีขนาดใหญ่เกิน 1MB ต่อภาพ</small><br/>
                      <small class="text-danger">หมายเหตุ: <i class="nc-icon nc-bookmark-2"></i> คือการเลือกภาพนั้นเป็นภาพหน้าปก</small>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
              <?PHP include_once('../_template/pagination/album.php') ?>

                <?PHP if(!empty($pagination)){ ?>
                  <div style="text-align: right;">
                      <ul class="pagination">
                          <?php echo $pagination; ?>
                      </ul>
                  </div>
                  <br/>
                <?PHP } ?>
                <div class="row">
                  <?PHP  while($album_des = mysqli_fetch_array($nquery)) {  ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="album_img">
                        <div class="album_bookmark">
                          <a href="_script/cover.php?id=<?PHP echo $album_des['des_id']; ?>&albumId=<?PHP echo $album_des['albumId']; ?>&status=<?PHP echo $album_des['des_status']; ?>">
                            <button class="btn btn-round btn-icon <?PHP if($album_des['des_status'] == 1){ ?> btn-primary <?PHP } ?>"><i class="nc-icon nc-bookmark-2"></i></button>
                          </a>
                        </div>
                        <div class="album_remove">
                          <a href="#" onclick="deleteModel(this)" data-toggle="modal" data-target="#deleteModel" data-id="<?PHP echo $album_des['des_id']; ?>" data-albumid="<?PHP echo $album_des['albumId']; ?>" data-message="คุณต้องการลบรายการนี้หรือไม่ ?"   type="button" rel="tooltip">
                            <button class="btn btn-google btn-round btn-icon"><i class="nc-icon nc-simple-remove"></i></button>
                          </a>
                        </div>
                        <img  src="<?PHP base_url() ?>../../uploads/album/<?PHP echo $album_des['des_img']; ?>" alt="your image"  />
                      </div>
                    </div>
                  <?PHP } ?>
                </div>

                <?PHP if(!empty($pagination)){ ?>
                  <br/>
                  <div style="text-align: right;">
                      <ul class="pagination">
                          <?php echo $pagination; ?>
                      </ul>
                  </div>
                <?PHP } ?>

              </div>
            </div>
          <?PHP } ?>
        </div>
    </div>

</div>


<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าแจ้งเตือนก่อนตกลง delete -->
<?PHP include_once('_action/dropzone_delete.php'); ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.validate.min.js"></script>

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