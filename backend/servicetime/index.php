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
                            <form action="index.php" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>ค้นหาจากจุดบริการ</label>
                                            <select class="form-control" name="point" id="point">
                                                <option value="">กรุณาเลือกข้อมูล</option>
                                                <?PHP
                                                    $sqlPoint="SELECT ser_point_id,ser_point_name,ser_point_status FROM services_point WHERE ser_point_status = 1 ";
                                                    $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
                                                ?>
                                                <?PHP foreach($sql_query_point as $point){ ?>
                                                    <option value="<?PHP echo $point['ser_point_id']; ?>" <?PHP if(isset($_GET['point'])){ if($_GET['point'] == $point['ser_point_id'] ){echo 'selected';} } ?>><?PHP echo $point['ser_point_name']?></option>
                                                <?PHP } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>ค้นหาจากประเภทคลินิก</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="">กรุณาเลือกข้อมูล</option>
                                                <option value="1" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "1" ){echo 'selected';} } ?>>คลินิกทั่วไป</option>
                                                <option value="2" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "2" ){echo 'selected';} } ?>>คลินิกนอกเวลา</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>ค้นหาจากวันที่ (ค.ศ.)</label>
                                            <input name="date" id="date" type="text" value="<?PHP if(isset($_GET['date'])){ echo $_GET['date']; } ?>" class="form-control datepicker" placeholder="วัน-เดือน-คศ">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" style="margin-top: 25px;" class="btn btn-block btn-success"><i class="nc-icon nc-tap-01"></i> ค้นหาข้อมูล</button>
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
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">รหัส</th>
                                        <th>วันที่ให้บริการ</th>
                                        <th>ประเภทบริการ</th>
                                        <th>จุดบริการ</th>
                                        <th class="text-center" style="width: 70px;">สถานะ</th>
                                        <th class="text-center" style="width: 120px;">อัพเดตข้อมูลล่าสุด</th>
                                        <th class="disabled-sorting text-center" style="width: 120px;">จัดการ</th>
                                    </tr>
                                </thead>
                                <?php

                                    //กำหนดค่าตัวแปร เมื่อไม่มีการค้นหา
                                    if(!empty($_GET['point'])){ $point = $_GET['point']; }else{  $point = ''; }
                                    if(!empty($_GET['type'])){ $type = $_GET['type']; }else{  $type = ''; }
                                    if(!empty($_GET['date'])){ $date = date("Y-m-d", strtotime($_GET['date'])); }else{  $date = ''; }

                                    // query ตาราง services_des
                                    $query_des = "SELECT * FROM services_des 
                                                  JOIN services_point ON services_point.ser_point_id = services_des.serpoint_id 
                                                  WHERE services_des.serpoint_id LIKE '%$point%' 
                                                  AND services_des.sertype_id LIKE '%$type%' 
                                                  AND services_des.serdes_date LIKE '%$date%' 
                                                  ORDER BY services_des.serdes_date DESC;" or die("Error:" . mysqli_error($con));
                                    $result_des = mysqli_query($con, $query_des);
                                ?>
                                <tbody>
                                    <!-- loop ข้อมูลที่ query ได้ จาก services_des -->
                                    <?PHP  while($row = mysqli_fetch_array($result_des)) {  ?>
                                    <tr>
                                        <td class="text-center"><?PHP echo str_pad($row['serdes_id'], 4, 'T0', STR_PAD_LEFT); ?></td>
                                        <td data-sort='YYYYMMDD'><?PHP echo $row['serdes_date']; ?></td>
                                        <td><?PHP if($row['sertype_id'] == 1){ ?>คลินิกทั่วไป<?PHP }else{ ?>คลินิกนอกเวลา<?PHP } ?></td>
                                        <td><?PHP echo $row['ser_point_name']; ?></td>
                                        <td class="text-center">
                                            <!-- เช็คค่า serdes_status -->
                                            <?PHP if($row['serdes_status'] == 1){ ?>  
                                                <!-- ถ้า serdes_status == 1 -->
                                                <span class="badge badge-pill badge-success">แสดงข้อมูล</span>
                                            <?PHP }else{ ?> 
                                                <!-- ถ้า serdes_status == 2 -->
                                                <span class="badge badge-pill badge-danger">ซ่อนข้อมูล</span>
                                            <?PHP } ?>
                                        </td>
                                        <td><?PHP echo $row['serdes_updateby']; ?><br/> <small><i class="fa fa-clock-o"></i> <?PHP echo $row['serdes_updatedate']; ?></small></td>
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
            "columnDefs" : [{"targets":1, "type":"date-eu"}],
            order: [1, 'desc'],

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