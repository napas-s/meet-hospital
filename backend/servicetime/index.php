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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="nc-icon nc-tv-2"></i> ข้อมูลเวลาการบริการ</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">รหัส</th>
                                        <th>วันที่ให้บริการ</th>
                                        <th>ประเภทบริการ</th>
                                        <th>จุดบริการ</th>
                                        <th class="text-center" style="width: 70px;">สถานะ</th>
                                        <th class="disabled-sorting text-center" style="width: 120px;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง services
                                    $query_des = "SELECT * FROM services_des JOIN services_point ON services_point.ser_point_id = services_des.serpoint_id ORDER BY services_des.serdes_date ASC;" or die("Error:" . mysqli_error($con));
                                    $result_des = mysqli_query($con, $query_des);
                                    $i = 1;
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก services -->
                                    <?PHP  while($row = mysqli_fetch_array($result_des)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo str_pad($row['serdes_id'], 4, '0', STR_PAD_LEFT); ?></td>
                                        <td><?PHP echo $row['serdes_date']; ?></td>
                                        <td><?PHP if($row['sertype_id'] == 1){ ?>คลินิกทั่วไป<?PHP }else{ ?>คลินิกนอกเวลา<?PHP } ?></td>
                                        <td><?PHP echo $row['ser_point_name']; ?></td>
                                        <td class="text-center">
                                            <!-- เช็คค่า serdes_status -->
                                            <?PHP if($row['serdes_status'] == 1){ ?>  <!-- ถ้า serdes_status == 1 -->
                                                <span class="badge badge-pill badge-success">แสดงข้อมูล</span>
                                            <?PHP }else{ ?> <!-- ถ้า serdes_status == 2 -->
                                                <span class="badge badge-pill badge-danger">ซ่อนข้อมูล</span>
                                            <?PHP } ?>
                                        </td>
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#showModel" data-id="<?PHP echo $row['serdes_id']; ?>" data-status="<?PHP echo $row['serdes_status']; ?>"  data-message="<?PHP if($row['serdes_status'] == 1){ ?>คุณต้องการซ่อนรายการนี้หรือไม่ ? <?PHP }else{ ?>คุณต้องการแสดงรายการนี้หรือไม่ ?<?PHP } ?>" type="button" rel="tooltip" class="btn btn-warning btn-icon btn-sm" id="<?PHP echo $row['serdes_id']; ?>" onclick="showModel(this)">
                                                <?PHP if($row['serdes_status'] == 1){ ?>
                                                    <i class="fa fa-eye-slash"></i>
                                                <?PHP }else{ ?>
                                                    <i class="fa fa-eye"></i>
                                                <?PHP } ?>
                                            </button>
                                            <a href="form.php?id=<?PHP echo $row['serdes_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <a href="#"  onclick="deleteModel(this)" data-toggle="modal" data-target="#deleteModel" data-id="<?PHP echo $row['serdes_id']; ?>" data-message="คุณต้องการลบข้อมูลรายการนี้หรือไม่ ?" type="button" rel="tooltip">
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
        "columnDefs" : [{"targets":1, "type":"date-eu"}],
        order: [1, 'desc'],

      });

    });
</script>

<!-- ./จบนำเข้าไฟล์ js ที่ต้องการเพิ่มเติม เพื่อใช้ในหน้านี้เท่านั้น -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>