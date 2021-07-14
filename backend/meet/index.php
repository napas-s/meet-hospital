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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="nc-icon nc-single-copy-04"></i> ประวัติการนัดหมาย</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar"></div>
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">เลขบัตรประชาชน</th>
                                        <th>ชื่อ - สกุล</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>บริการ</th>
                                        <th style="width: 150px;"> วันที่นัดหมาย</th>
                                        <th class="text-center" style="width: 100px;">สถานะ</th>
                                        <th class="disabled-sorting text-center" style="width: 100px;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
                                    // query ตาราง member
                                    $query_meet = "SELECT * FROM meet_service 
                                                   JOIN services_point ON services_point.ser_point_id = meet_service.mt_serpoint_id 
                                                   JOIN services ON services.ser_id = meet_service.mt_service_id 
                                                   JOIN services_des ON services_des.serdes_id = meet_service.mt_serdateId 
                                                   JOIN services_des_time ON services_des_time.des_time_id = meet_service.mt_sertimeId 
                                                   JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                                                   ORDER BY meet_service.mt_id ASC;" or die("Error:" . mysqli_error($con));
                                    $result_meet = mysqli_query($con, $query_meet);
                                    $i = 1;
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                    <?PHP  while($row = mysqli_fetch_array($result_meet)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo $row['mt_idcardNumber']; ?></td>
                                        <td></td>
                                        <td><?PHP echo $row['mt_tel']; ?></td>
                                        <td><?PHP echo $row['ser_name']; ?></td>
                                        <td>วันที่ <?PHP echo date("d-m-Y", strtotime($row['serdes_date'])) ; ?><br/>เวลา <?PHP echo $row['time_name']; ?> น.</td>
                                        <td  class="text-center">
                                            <!-- 0 = ทำการนัดหมายไว้ -->
                                            <!-- 1 = มาตามนัดหมาย -->
                                            <!-- 2 = ไม่มาตามนัดหมาย -->
                                            <?PHP if($row['mt_status'] == 0){ ?>
                                                <span class="badge badge-pill badge-warning">นัดหมายแล้ว</span>
                                            <?PHP }else if($row['mt_status'] == 1){ ?>
                                                <span class="badge badge-pill badge-success">นัดหมายสำเร็จ</span>
                                            <?PHP }else{ ?>
                                                <span class="badge badge-pill badge-danger">ยกเลิกนัดหมาย</span>
                                            <?PHP } ?>
                                        </td>
                                        <!-- <td>วันที่ <?PHP echo date("d-m-Y", strtotime($row['serdes_date'])); ?><br/>เวลา <?PHP echo $row['time_name']; ?> น.</td> -->
                                        <td class="text-center">
                                            <a href="form.php?id=<?PHP echo $row['mt_id']; ?>"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm"><i class="fa fa-edit"></i></button></a>
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

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>