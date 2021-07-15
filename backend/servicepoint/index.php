<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลจุดบริการ';
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
                            <h4 class="card-title"><i class="nc-icon nc-tile-56"></i> ข้อมูลจุดบริการ</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">รหัสบริการ</th>
                                        <th>ชื่อจุดบริการ</th>
                                        <th class="text-center" style="width: 70px;">สถานะ</th>
                                        <th class="text-center" style="width: 120px;">อัพเดตข้อมูลล่าสุด</th>
                                        <th class="disabled-sorting text-center" style="width: 120px;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง services_point
                                    $query_services_point = "SELECT * FROM services_point ORDER BY ser_point_id ASC;" or die("Error:" . mysqli_error($con));
                                    $result_services_point = mysqli_query($con, $query_services_point);
                                    $i = 1;
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก services_point -->
                                    <?PHP  while($row = mysqli_fetch_array($result_services_point)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo str_pad($row['ser_point_id'], 4, '0', STR_PAD_LEFT); ?></td>
                                        <td><?PHP echo $row['ser_point_name']; ?></td>
                                        <td class="text-center">
                                            <!-- เช็คค่า ser_point_status -->
                                            <?PHP if($row['ser_point_status'] == 1){ ?>  <!-- ถ้า ser_point_status == 1 -->
                                                <span class="badge badge-pill badge-success">แสดงข้อมูล</span>
                                            <?PHP }else{ ?> <!-- ถ้า ser_point_status == 2 -->
                                                <span class="badge badge-pill badge-danger">ซ่อนข้อมูล</span>
                                            <?PHP } ?>
                                        </td>
                                        <td><?PHP echo $row['ser_point_updateby']; ?><br/> <small><i class="fa fa-clock-o"></i> <?PHP echo $row['ser_point_updatedate']; ?></small></td>
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#showModel" data-id="<?PHP echo $row['ser_point_id']; ?>" data-status="<?PHP echo $row['ser_point_status']; ?>"  data-message="<?PHP if($row['ser_point_status'] == 1){ ?>คุณต้องการซ่อนรายการนี้หรือไม่ ? <?PHP }else{ ?>คุณต้องการแสดงรายการนี้หรือไม่ ?<?PHP } ?>" type="button" rel="tooltip" class="btn btn-warning btn-icon btn-sm" id="<?PHP echo $row['ser_point_id']; ?>" onclick="showModel(this)">
                                                <?PHP if($row['ser_point_status'] == 1){ ?>
                                                    <i class="fa fa-eye-slash"></i>
                                                <?PHP }else{ ?>
                                                    <i class="fa fa-eye"></i>
                                                <?PHP } ?>
                                            </button>
                                            <a href="form.php?id=<?PHP echo $row['ser_point_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <a href="#"  onclick="deleteModel(this)" data-toggle="modal" data-target="#deleteModel" data-id="<?PHP echo $row['ser_point_id']; ?>" data-message="คุณต้องการลบข้อมูลรายการนี้หรือไม่ ?" type="button" rel="tooltip">
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

<!-- นำเข้าแจ้งเตือนก่อนตกลง delete -->
<?PHP include_once('_action/delete.php'); ?>
<!-- นำเข้าแจ้งเตือนก่อนตกลง ปิด/เปิด การใช้งาน -->
<?PHP include_once('_action/show.php'); ?>

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

<!-- แจ้งเตือนมีการผิดพลาด (รับตัวแปลจากหน้า _script/add or _script/update) -->
<?PHP if(isset($_GET['message'])){ ?>
<script src="<?PHP base_url() ?>../../assets/vendor/paper-dashboard/sweetalert2@11.js"></script>
<input type="hidden" name="icon" id="icon" value="<?PHP if(isset($_GET['icon'])){ echo $_GET['icon'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
<input type="hidden" name="title" id="title" value="<?PHP if(isset($_GET['title'])){ echo $_GET['title'];}?>" /> <!-- ตัวแปรข้อความ -->
<input type="hidden" name="message" id="message" value="<?PHP if(isset($_GET['message'])){ echo $_GET['message'];}?>" /> <!-- ตัวแปรข้อความ -->

<script>
    $(document).ready(function() {
      $icon = $('#icon').val();
      $title = $('#title').val();
      $message = $('#message').val();
      Swal.fire({
        title: $title,
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