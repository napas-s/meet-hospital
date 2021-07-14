<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลผู้ลงทะเบียนนัดหมายทันตกรรม';
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
              $userId = $_GET["id"];
              $sql="SELECT * FROM users 
                    JOIN users_contact ON users_contact.user_id = users.user_id 
                    JOIN users_family ON users_family.user_id = users.user_id 
                    WHERE users.user_id = $userId ";
              $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
              $row = mysqli_fetch_assoc($sql_query);
            }
        ?>

            <?PHP if(isset($_GET["id"])){ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/update.php" method="post">
              <input type="hidden" name="userId" id="userId" value="<?PHP if(isset($_GET['id'])){ echo $_GET['id'];}?>" /> <!-- ตัวแปร -->

            <?PHP }else{ ?>
              <form id="FormValidation" class="form-horizontal" enctype="multipart/form-data" action="_script/add.php" method="post">
            <?PHP } ?>
              <div class="card ">
                <div class="card-body">
                  <!-- content -->
                  <div class="nav-tabs-navigation" style="text-align: left;">
                    <div class="nav-tabs-wrapper">
                      <ul id="tabs" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">ข้อมูลส่วนบุคคล</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">ข้อมูลการติดต่อ</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">ผู้ติดต่อกรณีฉุกเฉิน</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>เลขบัตรประชาชน<font color="red"><i>*</i></font></label>
                            <?PHP if(isset($row['user_iden13'])){ ?>
                            <input type="hidden" name="iden13_hd" id="iden13_hd" value="<?PHP if(isset($row['user_iden13'])){ echo $row['user_iden13'];}?>" />
                            <?PHP } ?>
                            <input class="form-control" type="text" name="iden13" id="iden13"<?PHP if(isset($_GET["id"])){echo'disabled'; }?> value="<?PHP if(isset($row['user_iden13'])){ echo $row['user_iden13']; } ?>" required="true" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>คำนำหน้า<font color="red"><i>*</i></font></label>
                            <select class="form-control" name="prename" id="prename" onchange="prenameOtherChange(this.value)" required="true" >
                              <option value="" disabled="" selected="">เลือกคำนำหน้า</option>
                              <option value="นาย" <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "นาย"){echo 'selected'; }?> <?PHP } ?>>นาย</option>
                              <option value="นางสาว" <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "นางสาว"){echo 'selected'; }?> <?PHP } ?>>นางสาว</option>
                              <option value="นาง" <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "นาง"){echo 'selected'; }?> <?PHP } ?>>นาง</option>
                              <option value="ด.ช." <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "ด.ช."){echo 'selected'; }?> <?PHP } ?>>ด.ช.</option>
                              <option value="ด.ญ." <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "ด.ญ."){echo 'selected'; }?> <?PHP } ?>>ด.ญ.</option>
                              <option value="อื่นๆ" <?PHP if(isset($row['user_prename'])){ ?> <?PHP if($row['user_prename'] == "อื่นๆ"){echo 'selected'; }?> <?PHP } ?>>อื่นๆ</option>
                            </select>
                          </div>
                          <div id="prenameOthers" class="form-group <?PHP if(isset($row['user_prename'])){ if($row['user_prename'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>"">
                            <input placeholder="โปรดระบุ" class="form-control" type="text" name="prenameOther" id="prenameOther" value="<?PHP if(isset($row['user_prenameOthers'])){ echo $row['user_prenameOthers']; } ?>" required="true" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ชื่อ<font color="red"><i>*</i></font></label>
                            <input class="form-control" type="text" name="fname" id="fname" value="<?PHP if(isset($row['user_fname'])){ echo $row['user_fname']; } ?>" required="true" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>นามสกุล<font color="red"><i>*</i></font></label>
                            <input class="form-control" type="text" name="lname" id="lname" value="<?PHP if(isset($row['user_lname'])){ echo $row['user_lname']; } ?>" required="true" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>เพศ<font color="red"><i>*</i></font></label>
                            <select class="form-control" name="sex" id="sex" required="true" >
                              <option value="">เลือกเพศ</option>
                              <option value="ชาย" <?PHP if(isset($row['user_sex'])){ ?> <?PHP if($row['user_sex'] == "ชาย"){echo 'selected'; }?> <?PHP } ?>>ชาย</option>
                              <option value="หญิง" <?PHP if(isset($row['user_sex'])){ ?> <?PHP if($row['user_sex'] == "หญิง"){echo 'selected'; }?> <?PHP } ?>>หญิง</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>วัน/เดือน/ปีเกิด (ค.ศ.)<font color="red"><i>*</i></font></label>
                            <input name="birthday" id="birthday" type="text" required="required" value="<?PHP if(isset($row['user_birthday'])){ echo date("d-m-Y", strtotime($row['user_birthday'])); } ?>" class="form-control datepicker" placeholder="วัน-เดือน-คศ">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>สัญชาติ<font color="red"><i>*</i></font></label>
                              <select class="form-control" name="nation" id="nation" onchange="nationOtherChange(this.value)"  required="true" >
                                <option value="" disabled="" selected="">เลือกสัญชาติ</option>
                                <option value="ไทย" <?PHP if(isset($row['user_nation'])){ ?> <?PHP if($row['user_nation'] == "ไทย"){echo 'selected'; }?> <?PHP } ?>>ไทย</option>
                                <option value="อื่นๆ" <?PHP if(isset($row['user_nation'])){ ?> <?PHP if($row['user_nation'] == "อื่นๆ"){echo 'selected'; }?> <?PHP } ?>>อื่นๆ</option>
                              </select>
                            </div>
                            <div id="nationOthers" class="form-group <?PHP if(isset($row['user_nation'])){ if($row['user_nation'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>" >
                              <input placeholder="โปรดระบุ"  class="form-control" type="text" name="nationOther" id="nationOther" value="<?PHP if(isset($row['user_nationOther'])){ echo $row['user_nationOther']; } ?>" required="true" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ประเทศที่เกิด</label>
                              <select class="form-control" name="country" id="country" onchange="countryOtherChange(this.value)"  >
                                <option value="" disabled="" selected="">เลือกประเทศ</option>
                                <option value="ไทย" <?PHP if(isset($row['user_country'])){ ?> <?PHP if($row['user_country'] == "ไทย"){echo 'selected'; }?> <?PHP } ?>>ไทย</option>
                                <option value="อื่นๆ" <?PHP if(isset($row['user_country'])){ ?> <?PHP if($row['user_country'] == "อื่นๆ"){echo 'selected'; }?> <?PHP } ?>>อื่นๆ</option>
                              </select>
                            </div>
                            <div id="countryOthers" class="form-group <?PHP if(isset($row['user_country'])){ if($row['user_country'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input placeholder="โปรดระบุ" class="form-control" type="text" name="countryOther" id="countryOther" value="<?PHP if(isset($row['user_countryOther'])){ echo $row['user_countryOther']; } ?>" required="true" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>จังหวัดที่เกิด</label>
                              <select class="form-control" name="province_birth" id="province_birth" onchange="provinceOtherChange(this.value)">
                                <option value="" disabled="" selected="">เลือกจังหวัด</option>
                                <?PHP
                                    $sql_se_provinces="SELECT * FROM se_provinces";
                                    $sql_query_se_provinces = mysqli_query($con,$sql_se_provinces)or die(mysqli_error($con));
                                ?>
                                <?PHP foreach($sql_query_se_provinces as $provinces){ ?>
                                    <option value="<?PHP echo $provinces['prov_name_th']; ?>" <?PHP if(isset($row['user_province_birth'])){ ?> <?PHP if($row['user_province_birth'] == $provinces['prov_name_th']){echo'selected';} ?> <?PHP } ?>><?PHP echo $provinces['prov_name_th']; ?></option>
                                <?PHP } ?>
                                <option value="อื่นๆ" <?PHP if(isset($row['user_province_birth'])){ ?> <?PHP if($row['user_province_birth'] == 'อื่นๆ'){echo'selected';} ?> <?PHP } ?>>อื่นๆ</option>
                              </select>
                            </div>
                            <div id="provinceOthers" class="form-group <?PHP if(isset($row['user_province_birth'])){ if($row['user_province_birth'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input placeholder="โปรดระบุ" class="form-control" type="text" name="provinceOther" id="provinceOther" value="<?PHP if(isset($row['user_provinceOther'])){ echo $row['user_provinceOther']; } ?>" required="true" />
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>อาชีพ</label>
                              <input class="form-control" type="text" name="job" id="job" value="<?PHP if(isset($row['user_job'])){ echo $row['user_job']; } ?>" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ศาสนา<font color="red"><i>*</i></font></label>
                              <select class="form-control" id="faith" name="faith" onchange="faithOtherChange(this.value)" required="true" >
                                <option value="" disabled="" selected="">เลือกศาสนา</option>
                                <option value="พุทธ"  <?PHP if(isset($row['user_faith'])){ ?> <?PHP if($row['user_faith'] == "พุทธ"){echo 'selected'; }?> <?PHP } ?>>พุทธ</option>
                                <option value="คริสต์"  <?PHP if(isset($row['user_faith'])){ ?> <?PHP if($row['user_faith'] == "คริสต์"){echo 'selected'; }?> <?PHP } ?>>คริสต์</option>
                                <option value="อิสลาม"  <?PHP if(isset($row['user_faith'])){ ?> <?PHP if($row['user_faith'] == "อิสลาม"){echo 'selected'; }?> <?PHP } ?>>อิสลาม</option>
                                <option value="ไม่ทราบ"  <?PHP if(isset($row['user_faith'])){ ?> <?PHP if($row['user_faith'] == "ไม่ทราบ"){echo 'selected'; }?> <?PHP } ?>>ไม่ทราบ</option>
                                <option value="อื่นๆ" <?PHP if(isset($row['user_faith'])){ ?> <?PHP if($row['user_faith'] == "อื่นๆ"){echo 'selected'; }?> <?PHP } ?>>อื่นๆ</option>
                              </select>
                            </div>
                            <div id="faithOthers" class="form-group <?PHP if(isset($row['user_faith'])){ if($row['user_faith'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input placeholder="โปรดระบุ" class="form-control" type="text" name="faithOther" id="faithOther" value="<?PHP if(isset($row['user_faithOther'])){ echo $row['user_faithOther']; } ?>" required="true" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ระดับการศึกษาสูงสุด</label>
                              <select class="form-control" id="education" name="education" >
                                <option value="" disabled="" selected="">เลือกระดับการศึกษา</option>
                                <option value="ไม่ได้ศึกษา" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ไม่ได้ศึกษา"){echo 'selected'; }?> <?PHP } ?>>ไม่ได้ศึกษา</option>
                                <option value="ไม่ทราบ" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ไม่ทราบ"){echo 'selected'; }?> <?PHP } ?>>ไม่ทราบ</option>
                                <option value="อนุบาล" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "อนุบาล"){echo 'selected'; }?> <?PHP } ?>>อนุบาล</option>
                                <option value="ประถมศึกษา" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ประถมศึกษา"){echo 'selected'; }?> <?PHP } ?>>ประถมศึกษา</option>
                                <option value="มัธยมศึกษาตอนต้น" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "มัธยมศึกษาตอนต้น"){echo 'selected'; }?> <?PHP } ?>>มัธยมศึกษาตอนต้น</option>
                                <option value="มัธยมศึกษาตอนปลาย" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "มัธยมศึกษาตอนปลาย"){echo 'selected'; }?> <?PHP } ?>>มัธยมศึกษาตอนปลาย</option>
                                <option value="ปวช/ปวส/เทคนิค" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ปวช/ปวส/เทคนิค"){echo 'selected'; }?> <?PHP } ?>>ปวช/ปวส/เทคนิค</option>
                                <option value="อนุปริญญา" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "อนุปริญญา"){echo 'selected'; }?> <?PHP } ?>>อนุปริญญา</option>
                                <option value="ปริญญาตรี" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ปริญญาตรี"){echo 'selected'; }?> <?PHP } ?>>ปริญญาตรี</option>
                                <option value="ปริญญาโท" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ปริญญาโท"){echo 'selected'; }?> <?PHP } ?>>ปริญญาโท</option>
                                <option value="ปริญญาเอก" <?PHP if(isset($row['user_education'])){ ?> <?PHP if($row['user_education'] == "ปริญญาเอก"){echo 'selected'; }?> <?PHP } ?>>ปริญญาเอก</option>
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>สถานะภาพสมรส<font color="red"><i>*</i></font></label>
                              <select class="form-control" id="marry_status" name="marry_status" required="true" >
                                <option value="" disabled="" selected="">เลือกสถานะภาพสมรส</option>
                                <option value="โสด" <?PHP if(isset($row['user_marry_status'])){ ?> <?PHP if($row['user_marry_status'] == "โสด"){echo 'selected'; }?> <?PHP } ?>>โสด</option>
                                <option value="แต่งงาน" <?PHP if(isset($row['user_marry_status'])){ ?> <?PHP if($row['user_marry_status'] == "แต่งงาน"){echo 'selected'; }?> <?PHP } ?>>แต่งงาน</option>
                                <option value="หย่า" <?PHP if(isset($row['user_marry_status'])){ ?> <?PHP if($row['user_marry_status'] == "หย่า"){echo 'selected'; }?> <?PHP } ?>>หย่า</option>
                                <option value="หม้าย" <?PHP if(isset($row['user_marry_status'])){ ?> <?PHP if($row['user_marry_status'] == "หม้าย"){echo 'selected'; }?> <?PHP } ?>>หม้าย</option>
                                <option value="แยกกันอยู่" <?PHP if(isset($row['user_marry_status'])){ ?> <?PHP if($row['user_marry_status'] == "แยกกันอยู่"){echo 'selected'; }?> <?PHP } ?>>แยกกันอยู่</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>หมู่เลือด<font color="red"><i>*</i></font></label>
                              <select class="form-control mt-1" id="blood" name="blood" required="true" >
                                <option value="" disabled="" selected="">เลือกหมู่เลือด</option>
                                <option value="A (เอ)" <?PHP if(isset($row['user_blood'])){ ?> <?PHP if($row['user_blood'] == "A (เอ)"){echo 'selected'; }?> <?PHP } ?>>A (เอ)</option>
                                <option value="B (บี)" <?PHP if(isset($row['user_blood'])){ ?> <?PHP if($row['user_blood'] == "B (บี)"){echo 'selected'; }?> <?PHP } ?>>B (บี)</option>
                                <option value="AB (เอบี)" <?PHP if(isset($row['user_blood'])){ ?> <?PHP if($row['user_blood'] == "AB (เอบี)"){echo 'selected'; }?> <?PHP } ?>>AB (เอบี)</option>
                                <option value="O (โอ)" <?PHP if(isset($row['user_blood'])){ ?> <?PHP if($row['user_blood'] == "O (โอ)"){echo 'selected'; }?> <?PHP } ?>>O (โอ)</option>
                                <option value="ไม่ทราบ" <?PHP if(isset($row['user_blood'])){ ?> <?PHP if($row['user_blood'] == "ไม่ทราบ"){echo 'selected'; }?> <?PHP } ?>>ไม่ทราบ</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>ประวัติการแพ้ (ยา/อาหาร/อื่นๆ)<font color="red"><i>*</i></font></label>
                              <select class="form-control mt-1" id="allergy"  name="allergy" onchange="allergyOtherChange(this.value)" required="true" >
                                <option value="" disabled="" selected="">เลือกประวัติการแพ้</option>
                                <option value="ไม่ทราบ" <?PHP if(isset($row['user_allergy'])){ ?> <?PHP if($row['user_allergy'] == "ไม่ทราบ"){echo 'selected'; }?> <?PHP } ?>>ไม่ทราบ</option>
                                <option value="ไม่เคยแพ้" <?PHP if(isset($row['user_allergy'])){ ?> <?PHP if($row['user_allergy'] == "ไม่เคยแพ้"){echo 'selected'; }?> <?PHP } ?>>ไม่เคยแพ้</option>
                                <option value="เคยแพ้" <?PHP if(isset($row['user_allergy'])){ ?> <?PHP if($row['user_allergy'] == "เคยแพ้"){echo 'selected'; }?> <?PHP } ?>>เคยแพ้</option>
                              </select>
                            </div>
                            <div id="allergyOthers" class="form-group <?PHP if(isset($row['user_allergy'])){ if($row['user_allergy'] != "เคยแพ้"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                              <input placeholder="โปรดระบุ" class="form-control" type="text" name="allergyOther" id="allergyOther" value="<?PHP if(isset($row['user_allergyOther'])){ echo $row['user_allergyOther']; } ?>" required="true" />
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชื่อ-นามสกุล บิดา</label>
                            <input class="form-control" type="text" name="father_name" id="father_name" value="<?PHP if(isset($row['user_father_name'])){ echo $row['user_father_name']; } ?>" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ชื่อ-นามสกุล มารดา</label>
                            <input class="form-control" type="text" name="mother_name" id="mother_name" value="<?PHP if(isset($row['user_mother_name'])){ echo $row['user_mother_name']; } ?>"  />
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel" aria-expanded="false">
                      <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                              <label>บ้านเลขที่ (ที่ติดต่อได้):<font color="red"><i>*</i></font></label>
                              <input required="true" type="text" class="form-control" name="home_no_pt" id="home_no_pt" value="<?PHP if(isset($row['user_home_no_pt'])){ echo $row['user_home_no_pt']; } ?>"  maxlength="255" size="255" placeholder="" autocomplete="off">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>หมู่ที่:</label>
                            <input type="text" class="form-control" name="moo_pt" id="moo_pt" value="<?PHP if(isset($row['user_moo_pt'])){ echo $row['user_moo_pt']; } ?>"  maxlength="255" size="255" placeholder="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ซอย:</label>
                            <input type="text" class="form-control" name="soi_pt" id="soi_pt" value="<?PHP if(isset($row['user_soi_pt'])){ echo $row['user_soi_pt']; } ?>"  maxlength="255" size="255" placeholder="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ถนน:</label>
                            <input type="text" class="form-control" name="road_pt" id="road_pt" value="<?PHP if(isset($row['user_road_pt'])){ echo $row['user_road_pt']; } ?>"  maxlength="255" size="255" placeholder="" autocomplete="off">
                          </div>
                        </div>
			                </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>จังหวัด:<font color="red"><i>*</i></font></label>
                            <select class="form-control" name="province_live_pt" id="province_live_pt" required="true" onchange="amphureChange(this.value)">
                              <option value="" >เลือกจังหวัด</option>
                                <?PHP
                                    $sql_provinces="SELECT * FROM se_provinces";
                                    $sql_query_provinces = mysqli_query($con,$sql_provinces)or die(mysqli_error($con));
                                ?>
                                <?PHP foreach($sql_query_provinces as $province){ ?>
                                    <option value="<?PHP echo $province['id']; ?>" <?PHP if(isset($row['user_province_live_pt'])){ ?> <?PHP if($row['user_province_live_pt'] == $province['prov_name_th']){echo'selected';} ?> <?PHP } ?>><?PHP echo $province['prov_name_th']; ?></option>
                                <?PHP } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>อำเภอ / เขต:<font color="red"><i>*</i></font></label>
                            <input type="hidden" class="form-control" name="amphure_live_pt_hd" id="amphure_live_pt_hd" value="<?PHP if(isset($row['user_amphure_live_pt'])){ echo $row['user_amphure_live_pt']; } ?>">
                            <select required="true" class="form-control" name="amphure_live_pt" id="amphure_live_pt"  onchange="districtChange(this.value)">
                              <option value="" >เลือกอำเภอ / เขต</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ตำบล / แขวง:<font color="red"><i>*</i></font></label>
                            <input type="hidden" class="form-control" name="district_live_pt_hd" id="district_live_pt_hd" value="<?PHP if(isset($row['user_district_live_pt'])){ echo $row['user_district_live_pt']; } ?>">
                            <select required="true" class="form-control" name="district_live_pt" id="district_live_pt"  onchange="zipcodeChange(this.value)">
                              <option value="" >เลือกตำบล / แขวง</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>รหัสไปรษณีย์:<font color="red"><i>*</i></font></label>
                          <input required="true" type="text" class="form-control" name="zipcode_live_pt" id="zipcode_live_pt" value="<?PHP if(isset($row['user_zipcode_live_pt'])){ echo $row['user_zipcode_live_pt']; } ?>" maxlength="5" size="5" placeholder="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์มือถือ#1:<font color="red"><i> * </i></font></label>
                            <input type="text" class="form-control" id="phone_moblie_1_pt" name="phone_moblie_1_pt" value="<?PHP if(isset($row['user_phone_moblie_1_pt'])){ echo $row['user_phone_moblie_1_pt']; } ?>" maxlength="50" size="50" placeholder="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์มือถือ#2:</label>
                            <input type="text" class="form-control" id="phone_moblie_2_pt" name="phone_moblie_2_pt" value="<?PHP if(isset($row['user_phone_moblie_2_pt'])){ echo $row['user_phone_moblie_2_pt']; } ?>" maxlength="50" size="50" placeholder="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์บ้าน:</label>
                            <input type="text" class="form-control" id="phone_home_pt" name="phone_home_pt" value="<?PHP if(isset($row['user_phone_home_pt'])){ echo $row['user_phone_home_pt']; } ?>" maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์ที่ทำงาน:</label>
                            <input type="text" class="form-control" id="phone_work_pt" name="phone_work_pt" value="<?PHP if(isset($row['user_phone_work_pt'])){ echo $row['user_phone_work_pt']; } ?>" maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" id="email_pt" name="email_pt" value="<?PHP if(isset($row['user_email_pt'])){ echo $row['user_email_pt']; } ?>" maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel" aria-expanded="false">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>ชื่อ-นามสกุล ผู้ที่ติดต่อได้ในกรณีฉุกเฉิน: <small class="text-muted mt-2"> (ไม่ต้องระบุคำนำหน้า)</small>
                              <font color="red"><i>*</i></font>
                            </label>
                            <input type="text" class="form-control" id="name_fam" name="name_fam" value="<?PHP if(isset($row['user_name_fam'])){ echo $row['user_name_fam']; } ?>" maxlength="255" size="255" placeholder=""  autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เกี่ยวข้องเป็น:<font color="red"><i>*</i></font></label>
                            <select class="form-control" id="relation_fam" name="relation_fam">
                              <option value="" >เลือกความเกี่ยวข้อง</option>
                              <option value="บิดา" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "บิดา"){echo 'selected'; }?> <?PHP } ?>>บิดา</option>
                              <option value="มารดา" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "มารดา"){echo 'selected'; }?> <?PHP } ?>>มารดา</option>
                              <option value="ลูกชาย" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ลูกชาย"){echo 'selected'; }?> <?PHP } ?>>ลูกชาย</option>
                              <option value="ลูกสาว" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ลูกสาว"){echo 'selected'; }?> <?PHP } ?>>ลูกสาว</option>
                              <option value="พี่ชาย/น้องชาย" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "พี่ชาย/น้องชาย"){echo 'selected'; }?> <?PHP } ?>>พี่ชาย/น้องชาย</option>
                              <option value="พี่สาว/น้องสาว" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "พี่สาว/น้องสาว"){echo 'selected'; }?> <?PHP } ?>>พี่สาว/น้องสาว</option>
                              <option value="สามี" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "สามี"){echo 'selected'; }?> <?PHP } ?>>สามี</option>
                              <option value="ภรรยา" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ภรรยา"){echo 'selected'; }?> <?PHP } ?>>ภรรยา</option>
                              <option value="ปู่/ตา" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ปู่/ตา"){echo 'selected'; }?> <?PHP } ?>>ปู่/ตา</option>
                              <option value="ย่า/ยาย" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ย่า/ยาย"){echo 'selected'; }?> <?PHP } ?>>ย่า/ยาย</option>
                              <option value="ป้า/น้า/อาผู้หญิง" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ป้า/น้า/อาผู้หญิง"){echo 'selected'; }?> <?PHP } ?>>ป้า/น้า/อาผู้หญิง</option>
                              <option value="ลุง/น้า/อาผู้ชาย" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ลุง/น้า/อาผู้ชาย"){echo 'selected'; }?> <?PHP } ?>>ลุง/น้า/อาผู้ชาย</option>
                              <option value="พี่เขย/น้องเขย/ลูกเขย" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "พี่เขย/น้องเขย/ลูกเขย"){echo 'selected'; }?> <?PHP } ?>>พี่เขย/น้องเขย/ลูกเขย</option>
                              <option value="พี่สะใภ้/น้องสะใภ้" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "พี่สะใภ้/น้องสะใภ้"){echo 'selected'; }?> <?PHP } ?>>พี่สะใภ้/น้องสะใภ้</option>
                              <option value="เพื่อน" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "เพื่อน"){echo 'selected'; }?> <?PHP } ?>>เพื่อน</option>
                              <option value="นายจ้าง" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "นายจ้าง"){echo 'selected'; }?> <?PHP } ?>>นายจ้าง</option>
                              <option value="ผู้บังคับบัญชา" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ผู้บังคับบัญชา"){echo 'selected'; }?> <?PHP } ?>>ผู้บังคับบัญชา</option>
                              <option value="คนรู้จัก" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "คนรู้จัก"){echo 'selected'; }?> <?PHP } ?>>คนรู้จัก</option>
                              <option value="เจ้าอาวาส" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "เจ้าอาวาส"){echo 'selected'; }?> <?PHP } ?>>เจ้าอาวาส</option>
                              <option value="หลาน" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "หลาน"){echo 'selected'; }?> <?PHP } ?>>หลาน</option>
                              <option value="ผู้ดูแล" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "ผู้ดูแล"){echo 'selected'; }?> <?PHP } ?>>ผู้ดูแล</option>
                              <option value="เจ้าหน้าที่" <?PHP if(isset($row['user_relation_fam'])){ ?> <?PHP if($row['user_relation_fam'] == "เจ้าหน้าที่"){echo 'selected'; }?> <?PHP } ?>>เจ้าหน้าที่</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์มือถือ#1:<font color="red"><i>*</i></font></label>
                            <input type="text" class="form-control" id="phone_moblie_1_fam" name="phone_moblie_1_fam" value="<?PHP if(isset($row['user_phone_moblie_1_fam'])){ echo $row['user_phone_moblie_1_fam']; } ?>"  maxlength="50" size="50" placeholder="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์มือถือ#2:</label>
                            <input type="text" class="form-control" id="phone_moblie_2_fam" name="phone_moblie_2_fam" value="<?PHP if(isset($row['user_phone_moblie_2_fam'])){ echo $row['user_phone_moblie_2_fam']; } ?>"  maxlength="50" size="50" placeholder="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์บ้าน:</label>
                            <input type="text" class="form-control" id="phone_home_fam" name="phone_home_fam" value="<?PHP if(isset($row['user_phone_home_fam'])){ echo $row['user_phone_home_fam']; } ?>"  maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>เบอร์โทรศัพท์ที่ทำงาน:</label>
                            <input type="text" class="form-control" id="phone_work_fam" name="phone_work_fam" value="<?PHP if(isset($row['user_phone_work_fam'])){ echo $row['user_phone_work_fam']; } ?>"  maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" id="email_fam" name="email_fam" value="<?PHP if(isset($row['user_email_fam'])){ echo $row['user_email_fam']; } ?>"  maxlength="100" size="100" placeholder="" autocomplete="off">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ./content -->
                </div>
                <div class="card-footer">
                  <?PHP if(isset($_GET["id"])){ ?>
                    <div class="form-group">
                      <small>อัพเดตข้อมูลล่าสุด :: <?PHP echo $row['user_updateby'];?> / <?PHP echo date("d-m-Y H:i:s", strtotime($row['user_updatedate']));?></small>
                    </div>
                    <br/>
                  <?PHP } ?>
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
<?PHP if(!empty($row['user_province_live_pt'])){ ?>
<!-- แสดงข้อมูลอำเภออัตโนมัติเมื่อมีข้อมูลอยู่แล้ว -->
<script>

  $(document).ready(function() {

    var province = $('#province_live_pt').val();
    var amphure = $('#amphure_live_pt_hd').val();

    $.ajax({
      url: '_ajax/amphurePre.php',
      type: "GET",
      data: { provinceId: province, amphureId : amphure },
      cache: false,
      beforeSend: function () { },
      success: function (response) {

        $("#amphure_live_pt").html(response);

        amphureAuto();
        zipcodeAuto();

      },
      failure: function (errMsg) {
          alert(errMsg);
      }
    });

  });

</script>
<?PHP } ?>

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