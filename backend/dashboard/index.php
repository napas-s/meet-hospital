<?PHP
    $breadcrumb =  'Dashboard';
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
                <div class="col-lg-4 col-md-12">
                    <div class="grid-head-dashboard">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <?PHP
                                    $queryUser = "SELECT * FROM users;"or die("Error:" . mysqli_error($con));
                                    $resultUser = mysqli_query($con, $queryUser)or die(mysqli_error($con));
                                    $numUser     = mysqli_num_rows($resultUser);
                                ?>
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-world-2 text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">จำนวน/คน</p>
                                            <p class="card-title"><?PHP echo $numUser; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <small class="stats"><i class="nc-icon nc-circle-10"></i> ผู้ลงทะเบียนนัดหมายออนไลน์</small>
                            </div>
                        </div>
                        <div class="card card-stats">
                            <div class="card-body ">
                                <?PHP
                                    $queryMeet1 = "SELECT * FROM meet_service WHERE mt_status = 1;"or die("Error:" . mysqli_error($con));
                                    $resultMeet1 = mysqli_query($con, $queryMeet1)or die(mysqli_error($con));
                                    $numMeet1     = mysqli_num_rows($resultMeet1);
                                ?>
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                        <i class="fa fa-calendar-o text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">รายการ</p>
                                            <p class="card-title"><?PHP echo $numMeet1; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <small class="stats"><i class="fa fa-clock-o"></i> นัดหมายออนไลน์ที่รอดำเนินการ</small>
                            </div>
                        </div>
                        <div class="card card-stats">
                            <div class="card-body ">
                                <?PHP
                                    $queryMeet2 = "SELECT * FROM meet_service WHERE mt_status = 2;"or die("Error:" . mysqli_error($con));
                                    $resultMeet2 = mysqli_query($con, $queryMeet2)or die(mysqli_error($con));
                                    $numMeet2     = mysqli_num_rows($resultMeet2);
                                ?>
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-single-copy-04 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">รายการ</p>
                                            <p class="card-title"><?PHP echo $numMeet2; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <small class="stats"><i class="fa fa-clock-o"></i> นัดหมายออนไลน์ที่สำเร็จ</small>
                            </div>
                        </div>
                        <div class="card card-stats">
                            <div class="card-body ">
                                <?PHP
                                    $queryMeet3 = "SELECT * FROM meet_service WHERE mt_status = 3;"or die("Error:" . mysqli_error($con));
                                    $resultMeet3 = mysqli_query($con, $queryMeet3)or die(mysqli_error($con));
                                    $numMeet3     = mysqli_num_rows($resultMeet3);
                                ?>
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-alert-circle-i text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">รายการ</p>
                                            <p class="card-title"><?PHP echo $numMeet3;?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <small class="stats"><i class="fa fa-clock-o"></i> นัดหมายออนไลน์ไม่สำเร็จ/ยกเลิก</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12" style="padding-top: 10px;">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title"><i class="nc-icon nc-calendar-60" style="margin-right: 20px;"></i> <?PHP echo date("d-m-Y"); ?></h4>
                            <h5 class="card-category">นัดหมายประจำวัน</h5>
                        </div>
                        <div class="card-body ">
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 120px;">เลขบัตรประชาชน</th>
                                        <th>จุดบริการ</th>
                                        <th class="text-center" style="width: 100px;">วันที่นัดหมาย</th>
                                        <th class="text-center" style="width: 100px;">เวลาที่นัดหมาย</th>
                                    </tr>
                                </thead>
                                <?php
                                    $dateToday = date('Y-m-d');
                                    // query ตาราง member
                                    $query_meet = "SELECT * FROM meet_service JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber WHERE meet_service.mt_serdateId = '$dateToday'  ORDER BY meet_service.mt_serdateId desc;"or die("Error:" . mysqli_error($con));
                                    $result_meet = mysqli_query($con, $query_meet)or die(mysqli_error($con));
                                    $i = 1;
                                ?>
                                <tbody>
                                    <?PHP  while($row = mysqli_fetch_array($result_meet)) {  ?>
                                        <tr>
                                            <td class="text-center"><?PHP echo $row['mt_idcardNumber']; ?></td>
                                            <td>
                                                <?PHP echo $row['mt_service_id']; ?> <small>(<?PHP echo $row['mt_sertype_id']; ?>)</small><br/><?PHP echo $row['mt_serpoint_id']; ?>
                                            </td>
                                            <td  class="text-center" data-sort='YYYYMMDD'><?PHP echo date("d-m-Y", strtotime($row['mt_serdateId'])) ; ?></td>
                                            <td  class="text-center"><?PHP echo $row['mt_sertimeId']; ?></td>
                                        </tr>
                                    <?PHP } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer ">
                            <a class="stats" href="../meet/index.php">
                                <i class="nc-icon nc-minimal-right"></i> ดูเพิ่มเติม...
                            </ๆ>
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
        pageLength: 10,
        searching:false,
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