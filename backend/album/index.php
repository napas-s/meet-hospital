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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="nc-icon nc-image"></i> กิจกรรมของเรา</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">ลำดับ</th>
                                        <th class="text-center" style="width: 150px;">ภาพหน้าปก</th>
                                        <th>ชื่ออัลบั้ม</th>
                                        <th class="text-center" style="width: 70px;">สถานะ</th>
                                        <th class="disabled-sorting text-center" style="width: 100px;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง member
                                    $query_album = "SELECT * FROM album ORDER BY album_id ASC;" or die("Error:" . mysqli_error($con));
                                    $result_album = mysqli_query($con, $query_album);
                                    $i = 1;
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                    <?PHP  while($row = mysqli_fetch_array($result_album)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo str_pad($row['album_id'], 4, '0', STR_PAD_LEFT); ?></td>
                                        <td class="text-center">
                                            <?PHP
                                                $sql_des="SELECT * FROM album_des WHERE albumId = $row[album_id] ORDER BY des_status DESC ";
                                                $sql_query_des = mysqli_query($con,$sql_des)or die(mysqli_error($con));
                                                $des = mysqli_fetch_assoc($sql_query_des);
                                            ?>
                                            <?PHP if(count($des) != 0){ ?>
                                                <img style="max-height: 100px; width:auto;" id="preView" src="<?PHP base_url() ?>../../uploads/album/<?PHP echo $des['des_img']; ?>" alt="your image" />
                                            <?PHP }else{ ?>
                                                <img style="max-height: 100px; width:auto;" id="preView" src="<?PHP base_url() ?>../../assets/images/no-image.jpeg" alt="your image" />
                                            <?PHP } ?>
                                        </td>
                                        <td><?PHP echo $row['album_title']; ?></td>
                                        <td class="text-center">
                                            <!-- เช็คค่า news_status -->
                                            <?PHP if($row['album_status'] == 1){ ?>  <!-- ถ้า news_status == 1 -->
                                                <span class="badge badge-pill badge-success">เปิดใช้งาน</span>
                                            <?PHP }else{ ?> <!-- ถ้า news_status == 0 -->
                                                <span class="badge badge-pill badge-danger">ปิดการใช้งาน</span>
                                            <?PHP } ?>
                                        </td>
                                        <td class="text-center">
                                            <button id="<?PHP echo $row['album_id']; ?>" class="btn btn-warning btn-icon btn-sm" onclick="showModel(this)" data-toggle="modal" data-target="#showModel" data-id="<?PHP echo $row['album_id']; ?>" data-status="<?PHP echo $row['album_status']; ?>" data-message="<?PHP if($row['album_status'] == 1){ ?>คุณต้องการซ่อนรายการนี้หรือไม่ ? <?PHP }else{ ?>คุณต้องการแสดงรายการนี้หรือไม่ ?<?PHP } ?>"   type="button" rel="tooltip" >
                                                <?PHP if($row['album_status'] == 1){ ?>
                                                    <i class="fa fa-eye-slash"></i>
                                                <?PHP }else{ ?>
                                                    <i class="fa fa-eye"></i>
                                                <?PHP } ?>
                                            </button>
                                            <a href="form.php?id=<?PHP echo $row['album_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <a href="#"  onclick="deleteModel(this)" data-toggle="modal" data-target="#deleteModel" data-id="<?PHP echo $row['album_id']; ?>" data-message="คุณต้องการลบข้อมูลรายการนี้หรือไม่ ?" type="button" rel="tooltip">
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

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>