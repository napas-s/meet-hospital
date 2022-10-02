<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลเวลาการบริการ';
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
              $serdesId = $_GET["id"];
              $sql="SELECT * FROM services_des WHERE serdes_id = $serdesId ";
              $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
              $row = mysqli_fetch_assoc($sql_query);
            }
        ?>

            <?PHP if(isset($_GET["id"])){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="serdesId" id="serdesId" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" />

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title"><i class="nc-icon nc-tv-2"></i> ข้อมูลเวลาการบริการ</h4>
                </div>
                <div class="card-body ">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>ชื่อจุดบริการ</label>
                        <select class="form-control" name="serpoint_id" id="serpoint_id">
                          <?PHP
                            $sqlPoint="SELECT * FROM services_point WHERE ser_point_status = 1 ";
                            $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
                          ?>
                          <?PHP foreach($sql_query_point as $point){ ?>
                            <option value="<?PHP echo $point['ser_point_id']; ?>" <?PHP if(isset($row['serpoint_id'])){ ?> <?PHP if($row['serpoint_id'] == $point['ser_point_id']){echo 'selected';} ?> <?PHP }?>><?PHP echo $point['ser_point_name']; ?></option>
                          <?PHP } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>ประเภทบริการ</label>
                          <select class="form-control" name="sertype_id" id="sertype_id" onchange="timeChange(this.value)">
                              <option value="1" <?PHP if(isset($row['sertype_id'])){ ?> <?PHP if($row['sertype_id'] == 1){echo 'selected';} ?> <?PHP }?> >คลินิกทั่วไป</option>
                              <option value="2" <?PHP if(isset($row['sertype_id'])){ ?> <?PHP if($row['sertype_id'] == 2){echo 'selected';} ?> <?PHP }?> >คลินิกนอกเวลา</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>วันที่ให้บริการ (พ.ศ.)</label>
                        <input type="hidden" name="serdes_date_old" id="serdes_date_old" value="<?PHP if(isset($row['serdes_date'])){ ?><?PHP echo $row['serdes_date']; ?><?PHP }?>" >
                        <input type="text" name="serdes_date" id="serdes_date" class="form-control datepicker" value="<?PHP if(isset($row['serdes_date'])){ ?><?PHP echo date("d-m-Y", strtotime($row['serdes_date']));?><?PHP }?>" placeholder="<?PHP if(isset($row['serdes_date'])){ ?><?PHP echo date("d-m-Y", strtotime($row['serdes_date']));?><?PHP }else{ ?><?PHP echo date("d-m-Y", strtotime("+543 years")) ?><?PHP } ?>" <?PHP if(empty($_GET["id"])){ ?>required="true" <?PHP } ?>>
                      </div>
                      <div class="form-group">
                          <label>สถานะ</label>
                          <select class="form-control" name="serdes_status" id="serdes_status">
                              <option value="1" <?PHP if(isset($row['serdes_status'])){ ?> <?PHP if($row['serdes_status'] == 1){echo 'selected';} ?> <?PHP }?> >แสดงข้อมูล</option>
                              <option value="0" <?PHP if(isset($row['serdes_status'])){ ?> <?PHP if($row['serdes_status'] == 0){echo 'selected';} ?> <?PHP }?> >ซ่อนข้อมูล</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>เวลาให้บริการ</label>
                        <div id="Time1">
                          <?PHP
                            $sqlTime="SELECT * FROM services_time WHERE time_status = 1 AND time_type = 1 ";
                            $sql_query_time = mysqli_query($con,$sqlTime)or die(mysqli_error($con));
                          ?>

                          <?PHP if(empty($_GET["id"])){ ?>
                            <?PHP foreach($sql_query_time as $time){ ?>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="destimeId1[]" class="form-check-input" type="checkbox" value="<?PHP echo $time['time_id'] ?>" <?PHP if($time['time_status'] == 1){echo 'checked';} ?>>
                                  <span class="form-check-sign"></span>
                                  <?PHP echo $time['time_name'] ?>
                                </label>
                              </div>
                            <?PHP } ?>
                          <?PHP }else{ ?>

                            <?PHP foreach($sql_query_time as $time){ ?>
                              <?PHP
                                $sqlDesTime="SELECT * FROM services_des_time WHERE serdesId = $row[serdes_id] AND destimeId = $time[time_id]";
                                $sql_query_destime = mysqli_query($con,$sqlDesTime)or die(mysqli_error($con));
                                $des = mysqli_fetch_assoc($sql_query_destime);
                              ?>

                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="destimeId1[]" class="form-check-input" type="checkbox" value="<?PHP echo $time['time_id'] ?>"  <?PHP if(!empty($des['destimeId'])){ ?> <?PHP if($time['time_id'] == $des['destimeId']){echo 'checked';} ?> <?PHP } ?> >
                                  <span class="form-check-sign"></span>
                                  <?PHP echo $time['time_name'] ?>
                                </label>
                              </div>
                            <?PHP } ?>
                          <?PHP } ?>

                        </div>

                        <div id="Time2" style="display: none;">
                          <?PHP
                            $sqlTime="SELECT * FROM services_time WHERE time_status = 1 AND time_type = 2 ";
                            $sql_query_time = mysqli_query($con,$sqlTime)or die(mysqli_error($con));
                          ?>

                          <?PHP if(empty($_GET["id"])){ ?>
                              <?PHP foreach($sql_query_time as $time){ ?>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input name="destimeId2[]" class="form-check-input" type="checkbox" value="<?PHP echo $time['time_id'] ?>" <?PHP if($time['time_status'] == 1){echo 'checked';} ?>>
                                    <span class="form-check-sign"></span>
                                    <?PHP echo $time['time_name'] ?>
                                  </label>
                                </div>
                              <?PHP } ?>
                          <?PHP }else{ ?>

                            <?PHP foreach($sql_query_time as $time){ ?>
                              <?PHP
                                $sqlDesTime="SELECT * FROM services_des_time WHERE serdesId = $row[serdes_id] AND destimeId = $time[time_id]";
                                $sql_query_destime = mysqli_query($con,$sqlDesTime)or die(mysqli_error($con));
                                $des = mysqli_fetch_assoc($sql_query_destime);
                              ?>

                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="destimeId2[]" class="form-check-input" type="checkbox" value="<?PHP echo $time['time_id'] ?>" <?PHP if(!empty($des['destimeId'])){ ?> <?PHP if($time['time_id'] == $des['destimeId']){echo 'checked';} ?> <?PHP } ?> >
                                  <span class="form-check-sign"></span>
                                  <?PHP echo $time['time_name'] ?>
                                </label>
                              </div>
                            <?PHP } ?>
                          <?PHP } ?>
                        </div>
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

<!-- validate -->
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.validate.min.js"></script>
<!-- datepicker -->
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/bootstrap-datetimepicker.js"></script>

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

<script>
    //ส่งค่า input ไปยัง form Validation ในไฟล์ assets/vendor/paper-dashboard/assets/js/function.js
    $(document).ready(function() {
      setFormValidation('#FormValidation');
    });
</script>

<?PHP if(!empty($row['sertype_id'])){ ?>
  <input type="hidden" name="hd_sertype_id" id="hd_sertype_id" value="<?PHP if(isset($row['sertype_id'])){ echo $row['sertype_id'];}?>" />
  <script>
    $(document).ready(function() {
      var t1 = document.getElementById("Time1");
      var t2 = document.getElementById("Time2");
      var hd_sertype_id = document.getElementById("hd_sertype_id");

      if(hd_sertype_id.value == 1){
        t1.style.display = "block";
        t2.style.display = "none";
      }else{
        t1.style.display = "none";
        t2.style.display = "block";
      }
    });
  </script>
<?PHP } ?>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>