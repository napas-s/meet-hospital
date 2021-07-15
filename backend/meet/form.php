<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ประวัติการนัดหมาย';
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
              $meetId = $_GET["id"];
              $sql = "SELECT * FROM meet_service 
                    JOIN services_point ON services_point.ser_point_id = meet_service.mt_serpoint_id 
                    JOIN services ON services.ser_id = meet_service.mt_service_id 
                    JOIN services_des ON services_des.serdes_id = meet_service.mt_serdateId 
                    JOIN services_des_time ON services_des_time.des_time_id = meet_service.mt_sertimeId 
                    JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                    JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber 
                    WHERE meet_service.mt_id = $meetId;" or die("Error:" . mysqli_error($con));
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
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="title">ข้อมูลส่วนบุคคล</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>เลขบัตรประชาชน</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_iden13'])){ echo $row['user_iden13']; } ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>คำนำหน้า</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_prename'])){ echo $row['user_prename']; }else{echo '-';} ?>" />
                          </div>
                          <div id="prenameOthers" class="form-group <?PHP if(isset($row['user_prename'])){ if($row['user_prename'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                            <input disabled placeholder="โปรดระบุ" class="form-control" type="text" value="<?PHP if(isset($row['user_prenameOthers'])){ echo $row['user_prenameOthers']; } else{echo '-';}?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ชื่อ</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_fname'])){ echo $row['user_fname']; }else{echo '-';} ?>"/>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>นามสกุล</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_lname'])){ echo $row['user_lname']; }else{echo '-';} ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>เพศ</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_sex'])){ echo $row['user_sex']; }else{echo '-';} ?>"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>วัน/เดือน/ปีเกิด (ค.ศ.)</label>
                            <input disabled type="text" value="<?PHP if(isset($row['user_birthday'])){ echo date("d-m-Y", strtotime($row['user_birthday'])); }else{echo '-';} ?>" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>สัญชาติ<font color="red"><i>*</i></font></label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_nation'])){ echo $row['user_nation']; } else{echo '-';}?>"/>
                            </div>
                            <div id="nationOthers" class="form-group <?PHP if(isset($row['user_nation'])){ if($row['user_nation'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>" >
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_nationOther'])){ echo $row['user_nationOther']; }else{echo '-';} ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ประเทศที่เกิด</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_country'])){ echo $row['user_country']; } else{echo '-';}?>"/>
                            </div>
                            <div id="countryOthers" class="form-group <?PHP if(isset($row['user_country'])){ if($row['user_country'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_countryOther'])){ echo $row['user_countryOther']; }else{echo '-';} ?>"  />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>จังหวัดที่เกิด</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_province_birth'])){ echo $row['user_province_birth']; }else{echo '-';} ?>"/>
                            </div>
                            <div id="provinceOthers" class="form-group <?PHP if(isset($row['user_province_birth'])){ if($row['user_province_birth'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_provinceOther'])){ echo $row['user_provinceOther']; } else{echo '-';}?>" />
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>อาชีพ</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_job'])){ echo $row['user_job']; }else{echo '-';} ?>"/>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ศาสนา<font color="red"><i>*</i></font></label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_faith'])){ echo $row['user_faith']; }else{echo '-';} ?>"/>
                            </div>
                            <div id="faithOthers" class="form-group <?PHP if(isset($row['user_faith'])){ if($row['user_faith'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_faithOther'])){ echo $row['user_faithOther']; }else{echo '-';} ?>"  />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ระดับการศึกษาสูงสุด</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_education'])){ echo $row['user_education']; }else{echo '-';} ?>"/>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>สถานะภาพสมรส</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_marry_status'])){ echo $row['user_marry_status']; }else{echo '-';} ?>"/>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>หมู่เลือด</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_blood'])){ echo $row['user_blood']; }else{echo '-';} ?>"/>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ประวัติการแพ้ (ยา/อาหาร/อื่นๆ)</label>
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_allergy'])){ echo $row['user_allergy']; }else{echo '-';} ?>"/>
                            </div>
                            <div id="allergyOthers" class="form-group <?PHP if(isset($row['user_allergy'])){ if($row['user_allergy'] != "เคยแพ้"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_allergyOther'])){ echo $row['user_allergyOther']; }else{echo '-';} ?>" />
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชื่อ-นามสกุล บิดา</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_father_name'])){ echo $row['user_father_name']; } else{echo '-';}?>" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชื่อ-นามสกุล มารดา</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_mother_name'])){ echo $row['user_mother_name']; }else{echo '-';} ?>"  />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-md-6"><a href="index.php"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a></div>
                        <div class="col-md-6 text-right"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="title">รายละเอียดนัดหมาย</h5>
                    </div>
                    <div class="card-body">
                      <div><b>จุดบริการ : </b><?PHP if(isset($row['ser_point_name'])){ echo $row['ser_point_name']; } ?></div>
                      <div><b>ประเภทบริการ : </b><?PHP if(isset($row['mt_sertype_id'])){ ?> <?PHP if($row['mt_sertype_id'] == 1){echo 'คลินิกทั่วไป';}else{echo 'คลินิกนอกเวลา';} ?> <?PHP } ?></div>
                      <div><b>บริการ : </b><?PHP if(isset($row['ser_name'])){ echo $row['ser_name']; } ?></div>
                      <br/>
                      <div><b>วันที่นัดหมาย : </b><?PHP if(isset($row['serdes_date'])){ echo date("d-m-Y", strtotime($row['serdes_date'])); } ?></div>
                      <div><b>เวลาที่นัดหมาย : </b><?PHP if(isset($row['time_name'])){ echo $row['time_name']; } ?></div>
                      <br/>
                      <div><b>เบอร์โทรศัพท์ : </b><?PHP if(isset($row['mt_tel'])){ echo $row['mt_tel']; } ?></div>
                    </div>
                  </div>

                  <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
                    <input type="hidden" name="mtId" id="mtId" value="<?PHP if(isset($row['mt_id'])){ echo $row['mt_id'];}?>" /> <!-- ตัวแปร -->
                    <div class="card">
                      <div class="card-header">
                        <h5 class="title">สถานะการนัดหมาย</h5>
                      </div>
                      <div class="card-body">
                        <div class="form-check-radio">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="mt_status" id="mt_status" value="1" <? if($row['mt_status'] == 1){ echo 'checked'; } ?>> นัดหมายแล้ว
                            <span class="form-check-sign"></span>
                          </label>
                        </div>
                        <div class="form-check-radio">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="mt_status" id="mt_status" value="2" <? if($row['mt_status'] == 2){ echo 'checked'; } ?>> มาตามนัดหมาย/นัดหมายสำเร็จ
                            <span class="form-check-sign"></span>
                          </label>
                        </div>
                        <div class="form-check-radio">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="mt_status" id="mt_status" value="3" <? if($row['mt_status'] == 3){ echo 'checked'; } ?>> ไม่มาตามนัดหมาย/ยกเลิก
                            <span class="form-check-sign"></span>
                          </label>
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