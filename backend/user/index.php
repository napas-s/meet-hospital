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
                            <h4 class="card-title"><i class="nc-icon nc-book-bookmark"></i> ข้อมูลผู้ลงทะเบียนนัดหมายทันตกรรม</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">เลขบัตรประชาชน</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th class="text-center" style="width: 10%;">สถานะภาพสมรส</th>
                                        <th class="text-center" style="width: 10%;">สัญชาติ</th>
                                        <th class="text-center" style="width: 10%;">เพศ</th>
                                        <th class="text-center" style="width: 10%;">หมู่เลือด</th>
                                        <th class="disabled-sorting text-center" style="width: 10%;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง member
                                    $query = "SELECT * FROM users ORDER BY user_id ASC;" or die("Error:" . mysqli_error($con));
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
                                        <td class="text-center">
                                            <?PHP if(isset($row['user_marry_status'])){ echo $row['user_marry_status'];}else{echo '-';} ?>
                                        </td>
                                        <td class="text-center"><?PHP if(isset($row['user_nation'])){ if($row['user_nation'] == "อื่นๆ"){echo $row['user_nationOther']; } else{echo $row['user_nation'];} }else{echo '-';} ?></td>
                                        <td class="text-center"><?PHP if(isset($row['user_sex'])){ echo $row['user_sex'];}else{echo '-';} ?></td>
                                        <td class="text-center"><?PHP if(isset($row['user_blood'])){ echo $row['user_blood'];}else{echo '-';} ?></td>
                                        <td class="text-center">
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

<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ js เบื้องต้น -->
<?PHP include_once('../_template/footerjs.php') ?>

<!-- นำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>

<!-- นำเข้าแจ้งเตือนก่อนตกลง delete -->
<?PHP include_once('_action/delete.php'); ?>
<!-- นำเข้าแจ้งเตือนก่อนตกลง ปิด/เปิด การใช้งาน -->
<?PHP include_once('_action/show.php'); ?>

<script>

    $(document).ready(function() {
      $('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        pageLength: 15,
        language: {
            sLengthMenu: "<a href='form.php' class='btn btn-info btn-md'>+ เพิ่มข้อมูล</a>",
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