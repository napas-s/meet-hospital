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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?PHP
                                $checkUser   = "SELECT * FROM users";
                                $resultUser = mysqli_query($con, $checkUser);
                                $numUser     = mysqli_num_rows($resultUser);
                            ?>
                            <h4 class="card-title"><i class="nc-icon nc-book-bookmark"></i> ข้อมูลผู้ลงทะเบียนนัดหมายทันตกรรม (<?PHP echo $numUser; ?>)</h4>
                        </div>
                        <div class="card-body">
                        <form action="index.php" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>ค้นหาจากหมวดหมู่เลือด</label>
                                            <select class="form-control mt-1" id="ublood" name="ublood"  >
                                            <option value="" >เลือกหมู่เลือด</option>
                                                <option value="A" <?PHP if(isset($_GET['ublood'])){ ?> <?PHP if($_GET['ublood'] == "A"){echo 'selected'; }?> <?PHP } ?>>A</option>
                                                <option value="B" <?PHP if(isset($_GET['ublood'])){ ?> <?PHP if($_GET['ublood'] == "B"){echo 'selected'; }?> <?PHP } ?>>B</option>
                                                <option value="AB" <?PHP if(isset($_GET['ublood'])){ ?> <?PHP if($_GET['ublood'] == "AB"){echo 'selected'; }?> <?PHP } ?>>AB</option>
                                                <option value="O" <?PHP if(isset($_GET['ublood'])){ ?> <?PHP if($_GET['ublood'] == "O"){echo 'selected'; }?> <?PHP } ?>>O</option>
                                                <option value="ไม่ทราบ" <?PHP if(isset($_GET['ublood'])){ ?> <?PHP if($_GET['ublood'] == "ไม่ทราบ"){echo 'selected'; }?> <?PHP } ?>>ไม่ทราบ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>เพศ</label>
                                            <select class="form-control" name="usex" id="usex">
                                                <option value="">กรุณาเลือกข้อมูล</option>
                                                <option value="ชาย" <?PHP if(isset($_GET['usex'])){ if($_GET['usex'] == "ชาย" ){echo 'selected';} } ?>>ชาย</option>
                                                <option value="หญิง" <?PHP if(isset($_GET['usex'])){ if($_GET['usex'] == "หญิง" ){echo 'selected';} } ?>>หญิง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" style="margin-top: 25px;" class="btn btn-block btn-success"><i class="nc-icon nc-tap-01"></i> ค้นหาข้อมูล</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="button" style="margin-top: 25px;" class="btn btn-block" data-toggle="modal" data-target="#import-data"><i class="nc-icon nc-share-66"></i> Import .CSV</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ค้นหา</label>
                                        <input name="search" id="search" type="text" value="" class="form-control" placeholder="ค้นหาข้อมูล">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="index.php" style="margin-top: 25px;"  type="button" class="btn btn-block btn-warning"><i class="nc-icon nc-refresh-69"></i> โหลดข้อมูลใหม่</a>
                                </div>
                                <div class="col-md-3">
                                    <a href='form.php' style="margin-top: 25px;" class='btn btn-block btn-info'>+ เพิ่มข้อมูล</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">เลขบัตรประชาชน</th>
                                            <th style="min-width: 150px;">ชื่อ-สกุล</th>
                                            <th class="text-center" style="width: 120px;">สถานะภาพสมรส</th>
                                            <th class="text-center" style="width: 80px;">สัญชาติ</th>
                                            <th class="text-center" style="width: 80px;">เพศ</th>
                                            <th class="text-center" style="width: 80px;">หมู่เลือด</th>
                                            <th class="disabled-sorting text-center" style="width: 150px;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?php

                                        //กำหนดค่าตัวแปร เมื่อไม่มีการค้นหา
                                        if(!empty($_GET['ublood'])){ $blood = $_GET['ublood']; }else{  $blood = ''; }
                                        if(!empty($_GET['usex'])){ $sex = $_GET['usex']; }else{  $sex = ''; }

                                        // query ตาราง member
                                        $query = "SELECT * FROM users WHERE user_blood LIKE '%$blood%' AND user_sex LIKE '%$sex%' ORDER BY user_id ASC;" or die("Error:" . mysqli_error($con));
                                        $result = mysqli_query($con, $query);
                                        $i = 1;
                                    ?>
                                    <tbody>
                                        <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                        <?PHP  while($row = mysqli_fetch_array($result)) {  ?>
                                        <tr>
                                            <td><?PHP echo $row['user_iden13']; ?></td>
                                            <td>
                                                <?PHP if(isset($row['user_prename']) && isset($row['user_fname']) && isset($row['user_lname'])){ ?>
                                                    <?PHP if($row['user_prename'] == "อื่นๆ"){echo $row['user_prenameOthers']; } else{echo $row['user_prename'];} ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?>
                                                <?PHP } else{ ?>
                                                    <div class="text-danger">ยังไม่มีข้อมูลส่วนบุคคล</div>
                                                <?PHP } ?>
                                            </td>
                                            <td>
                                                <?PHP if(isset($row['user_marry_status'])){ echo $row['user_marry_status'];}else{echo '-';} ?>
                                            </td>
                                            <td><?PHP if(isset($row['user_nation'])){ if($row['user_nation'] == "อื่นๆ"){echo $row['user_nationOther']; } else{echo $row['user_nation'];} }else{echo '-';} ?></td>
                                            <td class="text-center"><?PHP if(isset($row['user_sex'])){ echo $row['user_sex'];}else{echo '-';} ?></td>
                                            <td class="text-center"><?PHP if(isset($row['user_blood'])){ echo $row['user_blood'];}else{echo '-';} ?></td>
                                            <td class="text-center">
                                                <a href="history.php?id=<?PHP echo $row['user_id']; ?>"><button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm"><i class="nc-icon nc-single-copy-04"></i></button></a>
                                                <a href="form.php?id=<?PHP echo $row['user_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
                                                <a href="#"  onclick="deleteModel(this)" data-toggle="modal" data-target="#deleteModel" data-id="<?PHP echo $row['user_id']; ?>" data-message="คุณต้องการลบข้อมูลรายการนี้หรือไม่ ?" type="button" rel="tooltip">
                                                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm"><i class="fa fa-times"></i></button>
                                                </a>
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

<!-- นำเข้า modal import -->
<?PHP include_once('_action/import.php'); ?>

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้าแจ้งเตือนก่อนตกลง delete -->
<?PHP include_once('_action/delete.php'); ?>

<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {
      var table = $('#datatable').DataTable({
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

        //custom search input for data table
        $(".dataTables_filter").hide();
        $('#search').on( 'keypress', function () {
            var val = $("#search").val();
            table.search( val ).draw();
        });

    });
</script>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

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