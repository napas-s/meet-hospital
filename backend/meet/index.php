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
                            <?PHP
                                $queryMeet1 = "SELECT * FROM meet_service "or die("Error:" . mysqli_error($con));
                                $resultMeet1 = mysqli_query($con, $queryMeet1)or die(mysqli_error($con));
                                $numMeet1     = mysqli_num_rows($resultMeet1);
                            ?>
                            <h4 class="card-title"><i class="nc-icon nc-single-copy-04"></i> ประวัติการนัดหมาย (<?PHP echo $numMeet1;?>)</h4>
                        </div>
                        <div class="card-body">
                            <form action="index.php" method="get">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ค้นหาจากจุดบริการ</label>
                                            <select class="form-control" name="point" id="point">
                                                <option value="">กรุณาเลือกข้อมูล</option>
                                                <?PHP
                                                    $sqlPoint="SELECT ser_point_id,ser_point_name,ser_point_status FROM services_point WHERE ser_point_status = 1 ";
                                                    $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
                                                ?>
                                                <?PHP foreach($sql_query_point as $point){ ?>
                                                    <option value="<?PHP echo $point['ser_point_name']; ?>" <?PHP if(isset($_GET['point'])){ if($_GET['point'] == $point['ser_point_name'] ){echo 'selected';} } ?>><?PHP echo $point['ser_point_name']?></option>
                                                <?PHP } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ค้นหาจากประเภทคลินิก</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="">กรุณาเลือกข้อมูล</option>
                                                <option value="คลินิกทั่วไป" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "คลินิกทั่วไป" ){echo 'selected';} } ?>>คลินิกทั่วไป</option>
                                                <option value="คลินิกนอกเวลา" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "คลินิกนอกเวลา" ){echo 'selected';} } ?>>คลินิกนอกเวลา</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ค้นหาจากบริการ</label>
                                        <select class="form-control" name="service" id="service">
                                            <option value="">กรุณาเลือกข้อมูล</option>
                                            <?PHP
                                                $sqlService="SELECT ser_id,ser_name,ser_status FROM services WHERE ser_status = 1 ";
                                                $sql_query_service = mysqli_query($con,$sqlService)or die(mysqli_error($con));
                                            ?>
                                            <?PHP foreach($sql_query_service as $service){ ?>
                                                <option value="<?PHP echo $service['ser_name']; ?>" <?PHP if(isset($_GET['service'])){ if($_GET['service'] == $service['ser_name'] ){echo 'selected';} } ?>><?PHP echo $service['ser_name']?></option>
                                            <?PHP } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ค้นหาจากสถานะ</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="" >กรุณาเลือกข้อมูล</option>
                                                <option value="1" <?PHP if(isset($_GET['status'])){ if($_GET['status'] == 1 ){echo 'selected';} } ?>>นัดหมายแล้ว</option>
                                                <option value="2" <?PHP if(isset($_GET['status'])){ if($_GET['status'] == 2 ){echo 'selected';} } ?>>นัดหมายสำเร็จ</option>
                                                <option value="3" <?PHP if(isset($_GET['status'])){ if($_GET['status'] == 3 ){echo 'selected';} } ?>>ไม่มาตามนัดหมาย/ยกเลิก</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ค้นหาจากวันที่ (พ.ศ.)</label>
                                            <input name="date" id="date" type="text" value="<?PHP if(isset($_GET['date'])){ echo $_GET['date']; } ?>" class="form-control datepicker" placeholder="วัน-เดือน-พ.ศ.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" style="margin-top: 25px;"  class="btn btn-block btn-success"><i class="nc-icon nc-tap-01"></i> ค้นหาข้อมูล</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>ค้นหา</label>
                                        <input name="search" id="search" type="text" value="" class="form-control" placeholder="ค้นหาข้อมูล">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="index.php" style="margin-top: 25px;"  type="button" class="btn btn-block btn-warning"><i class="nc-icon nc-refresh-69"></i> โหลดข้อมูลใหม่</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 120px;">เลขบัตรประชาชน</th>
                                            <th>ชื่อ - สกุล</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>จุดบริการ</th>
                                            <th>บริการ</th>
                                            <th class="text-center" style="width: 10%;"> วันที่นัดหมาย</th>
                                            <th class="text-center" style="width: 10%;"> เวลาที่นัดหมาย</th>
                                            <th class="text-center" style="width: 10%;">สถานะ</th>
                                            <th class="disabled-sorting text-center" style="width: 5%;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?php

                                        //กำหนดค่าตัวแปร เมื่อไม่มีการค้นหา
                                        if(!empty($_GET['point'])){ $point = $_GET['point']; }else{  $point = ''; }
                                        if(!empty($_GET['type'])){ $type = $_GET['type']; }else{  $type = ''; }
                                        if(!empty($_GET['status'])){ $status = $_GET['status']; }else{  $status = ''; }
                                        if(!empty($_GET['service'])){ $service = $_GET['service']; }else{  $service = ''; }
                                        if(!empty($_GET['date'])){ $date = date("Y-m-d", strtotime($_GET['date'])); }else{  $date = ''; }
                                        if(!empty($_GET['search'])){ $search = $_GET['search']; }else{  $search = ''; }

                                        // query ตาราง member
                                        $query_meet = "SELECT * FROM meet_service 
                                                    JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber
                                                    WHERE meet_service.mt_serpoint_id LIKE '%$point%' 
                                                    AND meet_service.mt_sertype_id LIKE '%$type%' 
                                                    AND meet_service.mt_status LIKE '%$status%' 
                                                    AND meet_service.mt_service_id LIKE '%$service%' 
                                                    AND meet_service.mt_idcardNumber LIKE '%$search%' 
                                                    AND meet_service.mt_serdateId LIKE '%$date%' 
                                                    ORDER BY meet_service.mt_serdateId desc;"or die("Error:" . mysqli_error($con));
                                        $result_meet = mysqli_query($con, $query_meet)or die(mysqli_error($con));
                                        $i = 1;
                                    ?>
                                    <tbody>
                                        <!-- loop ข้อมูลที่ query ได้ จาก member -->
                                        <?PHP  while($row = mysqli_fetch_array($result_meet)) {  ?>
                                        <tr>
                                            <td><?PHP echo $row['mt_idcardNumber']; ?></td>
                                            <td>
                                                <?PHP if(isset($row['user_prename']) && isset($row['user_fname']) && isset($row['user_lname'])){ ?>
                                                    <?PHP if($row['user_prename'] == "อื่นๆ"){echo $row['user_prenameOthers']; } else{echo $row['user_prename'];} ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?>
                                                <?PHP } else{ ?>
                                                    ยังไม่มีประวัติ  
                                                    <?PHP if($_SESSION["Level"] == 2){ ?>
                                                    <br/><a href="../user/form.php?id=<?PHP echo $row['user_id']; ?>">คลิกเพื่ออัพเดตข้อมูล <i class="fa fa-edit"></i></a>
                                                    <?PHP } ?>
                                                <?PHP } ?>
                                            </td>
                                            <td><?PHP echo $row['mt_tel']; ?></td>
                                            <td><?PHP echo $row['mt_serpoint_id']; ?> (<?PHP echo $row['mt_sertype_id']; ?>)</td>
                                            <td><?PHP echo $row['mt_service_id']; ?></td>
                                            <td  class="text-center" data-sort='YYYYMMDD'><?PHP echo date("d-m-Y", strtotime($row['mt_serdateId'])) ; ?></td>
                                            <td  class="text-center"><?PHP echo $row['mt_sertimeId']; ?> น.</td>
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
                                            <td class="text-center">
                                                <a href="form.php?id=<?PHP echo $row['mt_id']; ?>"><button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm"><i class="fa fa-eye"></i></button></a>
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

<!-- data table -->
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
                search: "ค้นหา",
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
            order: [[ 5, "desc" ]],

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

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('../_template/footer.php') ?>