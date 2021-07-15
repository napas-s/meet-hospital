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
                $userId = $_GET["id"];
                $sql="SELECT * FROM users 
                    JOIN users_contact ON users_contact.user_id = users.user_id 
                    JOIN users_family ON users_family.user_id = users.user_id 
                    WHERE users.user_id = $userId ";
                $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                $row = mysqli_fetch_assoc($sql_query);

                $query = "SELECT * FROM meet_service WHERE mt_idcardNumber = $row[user_iden13] ORDER BY mt_serdateId desc;"or die("Error:" . mysqli_error($con));
                $result = mysqli_query($con, $query)or die(mysqli_error($con));
                $numMeet     = mysqli_num_rows($result);
            ?>
            <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>เลขบัตรประชาชน</label>
                            <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_iden13'])){ echo $row['user_iden13']; } ?>" />
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ชื่อ - สกุล</label>
                                    <input disabled class="form-control" type="text" value="<?PHP if($row['user_prename'] == "อื่นๆ"){echo $row['user_prenameOthers']; } else{echo $row['user_prename'];} ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?>"/>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>สัญชาติ</label>
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_nation'])){ echo $row['user_nation']; } else{echo '-';}?>"/>
                                </div>
                                <div id="nationOthers" class="form-group <?PHP if(isset($row['user_nation'])){ if($row['user_nation'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>" >
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_nationOther'])){ echo $row['user_nationOther']; }else{echo '-';} ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>ศาสนา</label>
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_faith'])){ echo $row['user_faith']; }else{echo '-';} ?>"/>
                                </div>
                                <div id="faithOthers" class="form-group <?PHP if(isset($row['user_faith'])){ if($row['user_faith'] != "อื่นๆ"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_faithOther'])){ echo $row['user_faithOther']; }else{echo '-';} ?>"  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>สถานะภาพสมรส</label>
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_marry_status'])){ echo $row['user_marry_status']; }else{echo '-';} ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>หมู่เลือด</label>
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_blood'])){ echo $row['user_blood']; }else{echo '-';} ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>ประวัติการแพ้ (ยา/อาหาร/อื่นๆ)</label>
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_allergy'])){ echo $row['user_allergy']; }else{echo '-';} ?>"/>
                                </div>
                                <div id="allergyOthers" class="form-group <?PHP if(isset($row['user_allergy'])){ if($row['user_allergy'] != "เคยแพ้"){echo 'group-other'; }  }else{ echo 'group-other'; } ?>">
                                <input disabled class="form-control" type="text" value="<?PHP if(isset($row['user_allergyOther'])){ echo $row['user_allergyOther']; }else{echo '-';} ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-md-6"><a href="index.php"><button type="button" class="btn btn-danger">ย้อนกลับ</button></a></div>
                        <div class="col-md-6 text-right">
                            <a href="form.php?id=<?PHP echo $userId; ?>"><button type="button" class="btn btn-warning">แก้ไขประวัติ</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="nc-icon nc-book-bookmark"></i> ประวัติการนัดหมายทันตกรรม <?PHP echo $numMeet; ?> รายการ</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 120px"> วันที่</th>
                                            <th class="text-center" style="width: 120px"> เวลา</th>
                                            <th style="min-width: 150px;">จุดบริการ</th>
                                            <th style="min-width: 100px;">บริการ</th>
                                            <th style="width: 100px;">เบอร์ติดต่อ</th>
                                            <th class="text-center" style="width: 80px;">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                        <?PHP  while($row = mysqli_fetch_array($result)) {  ?>
                                        <tr>
                                            <td class="text-center" data-sort='YYYYMMDD'><?PHP echo date("d-m-Y", strtotime($row['mt_serdateId'])) ; ?></td>
                                            <td class="text-center" ><?PHP echo $row['mt_sertimeId']; ?></td>
                                            <td><?PHP echo $row['mt_serpoint_id']; ?> <br/>(<?PHP echo $row['mt_sertype_id']; ?>)</td>
                                            <td><?PHP echo $row['mt_service_id']; ?></td>
                                            <td><?PHP echo $row['mt_tel']; ?></td>
                                            <td  class="text-center">
                                                <?PHP if($row['mt_status'] == 1){ ?>
                                                    <!-- 1 = ทำการนัดหมายไว้ -->
                                                    <span class="badge badge-pill badge-warning">นัดหมายแล้ว</span>
                                                <?PHP }else if($row['mt_status'] == 2){ ?>
                                                    <!-- 2 = มาตามนัดหมาย -->
                                                    <span class="badge badge-pill badge-success">นัดหมายสำเร็จ</span>
                                                <?PHP }else{ ?>
                                                    <!-- 3 = ไม่มาตามนัดหมาย -->
                                                    <span class="badge badge-pill badge-danger">ยกเลิกนัดหมาย</span>
                                                <?PHP } ?>
                                            </td>
                                        </tr>
                                        <?PHP } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function() {
      $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        pageLength: 15,
        language: {
            sLengthMenu: "",
            search: 'ค้นหา',
            searchPlaceholder: "ค้นหา",
            processing: '<i class="nc-icon nc-refresh-69"></i><span class="ml-2">กำลังโหลดข้อมูล...</span> ',
            info: "แสดง หน้า _PAGE_ จาก _PAGES_",
            infoEmpty: "",
            zeroRecords: "ไม่พบข้อมูล",
            infoFiltered: "(ค้นหา จาก _MAX_ รายการ)",
            paginate: {
                first: 'หน้าแรก',
                last: 'หน้าสุดท้าย',
                next: '<i class="nc-icon nc-minimal-right"></i>',
                previous: '<i class="nc-icon nc-minimal-left"></i>'
            }
        },

      });

    });
</script>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- แจ้งเตือนมีการผิดพลาด (รับตัวแปลจากหน้า _script/add or _script/update) -->
<?PHP if(isset($_GET['message'])){ ?>
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/sweetalert2@11.js"></script>
<input type="hidden" name="icon" id="icon" value="<?PHP if(isset($_GET['icon'])){ echo $_GET['icon'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
<input type="hidden" name="message" id="message" value="<?PHP if(isset($_GET['message'])){ echo $_GET['message'];}?>" /> <!-- ตัวแปรข้อความ -->
<input type="hidden" name="iden13" id="iden13" value="<?PHP if(isset($_GET['iden13'])){ echo $_GET['iden13'];}?>" /> <!-- เลขบัตรประชาชน -->

<script>
    $(document).ready(function() {
      $icon = $('#icon').val();
      $message = $('#message').val();
      $iden13 = $('#iden13').val();
      Swal.fire({
        title: $iden13,
        text: $message,
        icon: $icon,
        confirmButtonText: 'ปิด'
      })
    });
</script>
<?PHP } ?>

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>