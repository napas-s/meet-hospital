<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../../_database/connection.php'); ?>

<!-- ตั้งค่าตัวแปรที่ต้องการส่งในหน้านี้ -->
<?PHP
    $breadcrumb =  'ข้อมูลพนักงาน';
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
                            <h4 class="card-title">บัญชีผู้ใช้งาน</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">รหัสผู้ใช้</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">เข้าใช้งานล่าสุด</th>
                                        <th class="disabled-sorting text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง member
                                    $query_member = "SELECT * FROM member ORDER BY member_id ASC;" or die("Error:" . mysqli_error($con));
                                    $result_member = mysqli_query($con, $query_member);
                                    $i = 1;
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                    <?PHP  while($row = mysqli_fetch_array($result_member)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo str_pad($row['member_id'], 4, '0', STR_PAD_LEFT); ?></td>
                                        <td><?PHP echo $row['member_fullname']; ?></td>
                                        <td><?PHP echo $row['member_user']; ?></td>
                                        <td class="text-center">
                                            <!-- เช็คค่า member_lavel -->
                                            <?PHP if($row['member_lavel'] == 1){ ?>  <!-- ถ้า member_lavel == 1 -->
                                                <span class="badge badge-pill badge-success">พนักงาน</span>
                                            <?PHP }else{ ?> <!-- ถ้า member_lavel == 2 -->
                                                <span class="badge badge-pill badge-success">ผู้ดูแลระบบ</span>
                                            <?PHP } ?>
                                        </td>
                                        <td class="text-center"><?PHP echo $row['last_login']; ?></td>
                                        <td class="text-center">
                                            <a href="form.php?id=<?PHP echo $row['member_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <a href="_script/delete.php?id=<?PHP echo $row['member_id']; ?>">
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

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>