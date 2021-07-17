<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('assets/_template/headder.php') ?>

<!-- เนื้อหาของหน้า -->
<div id="wrapper" class="clearfix">

    <!-- นำเข้าไฟล์ Template ส่วนหัวบนเมนู -->
    <?PHP include_once('assets/_template/topbar.php') ?>
    <!-- นำเข้าไฟล์ Template ส่วนเมนู -->
    <?PHP include_once('assets/_template/navbar.php') ?>

    <section id="page-title">
        <div class="container clearfix">
            <h1>ตารางเวลาการให้บริการ</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">หน้าแรก</a></li>
                <li class="active">ตารางเวลาการให้บริการ</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix mapabout">
                    <?php
                        $sql="SELECT * FROM about WHERE about_type = '4' AND about_status = '1'";
                        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($sql_query);
                    ?>
                    <?PHP if(isset($row)){ ?>
                        <?PHP if($row['about_lavel'] == 1){ ?>
                            <?PHP echo $row['about_content']; ?>
                            <?PHP }else{ ?>
                            <div class="center">
                                <img style="width: 100%; height: auto" src="<?PHP base_url() ?>uploads/about/<?PHP echo $row['about_img']; ?>" alt="about image" />
                            </div>
                        <?PHP } ?>
                    <?PHP } ?>

                    <form action="servicetime.php" method="get" style="margin-bottom: 0px;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="sm-form-control" name="point" id="point">
                                        <option value="">ค้นหาจากจุดบริการ</option>
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
                                    <select class="sm-form-control" name="type" id="type">
                                        <option value="">ค้นหาจากประเภทคลินิก</option>
                                        <option value="1" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "1" ){echo 'selected';} } ?>>คลินิกทั่วไป</option>
                                        <option value="2" <?PHP if(isset($_GET['type'])){ if($_GET['type'] == "2" ){echo 'selected';} } ?>>คลินิกนอกเวลา</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
									<input type="text" value="<?PHP if(isset($_GET['date'])){ echo $_GET['date']; } ?>" name="date" id="date" class="sm-form-control tleft format" placeholder="ค้นหาจากวันที่ (ค.ศ.)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" style="margin: 0px;" class="btn btn-block button button-green center"><i class="nc-icon nc-tap-01"></i> ค้นหาข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input name="search" id="search" type="text" value="" class="sm-form-control" placeholder="ค้นหาข้อมูล">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="servicetime.php" style="margin: 0px"  type="button" class="btn btn-block button button-amber"><i class="nc-icon nc-refresh-69"></i> โหลดข้อมูลใหม่</a>
                        </div>
                    </div>

                    <div class="table-responsive">
						<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
                                    <th style="width: 200px;" class="disabled-sorting text-center">วันที่ให้บริการ</th>
                                    <th style="width: 200px;" class="disabled-sorting text-center">เวลา</th>
                                    <th class="disabled-sorting text-center">ประเภทบริการ</th>
                                    <th>จุดบริการ</th>
								</tr>
							</thead>
                            <?php
                                //กำหนดค่าตัวแปร เมื่อไม่มีการค้นหา
                                if(!empty($_GET['point'])){ $point = $_GET['point']; }else{  $point = ''; }
                                if(!empty($_GET['type'])){ $type = $_GET['type']; }else{  $type = ''; }
                                if(!empty($_GET['date'])){ $date = date("Y-m-d", strtotime($_GET['date'])); }else{  $date = ''; }

                                $dateNow = date('Y-m-d');

                                // query ตาราง services_des
                                $queryser_des = "SELECT * FROM services_des 
                                                JOIN services_point ON services_point.ser_point_id = services_des.serpoint_id 
                                                JOIN services_des_time ON services_des_time.serdesId = services_des.serdes_id 
                                                JOIN services_time ON services_time.time_id = services_des_time.destimeId 
                                                WHERE services_des.serdes_status = 1
                                                AND services_des.serdes_date >= '$dateNow' 
                                                AND services_des.serpoint_id LIKE '%$point%' 
                                                AND services_des.sertype_id LIKE '%$type%' 
                                                AND services_des.serdes_date LIKE '%$date%' 
                                                ORDER BY services_des.serdes_date, services_time.time_name   ASC;" or die("Error:" . mysqli_error($con));
                                $resultser_des = mysqli_query($con, $queryser_des);
                            ?>
							<tbody>
                                <?PHP  while($serDes = mysqli_fetch_array($resultser_des)) {  ?>
                                    <tr>
                                        <td data-sort='YYYYMMDD' class="text-center"><?PHP echo date("d-m-Y", strtotime($serDes['serdes_date'])); ?></td>
                                        <td  class="text-center">
                                            <?PHP echo $serDes['time_name']; ?>
                                        </td>
                                        <td class="text-center"><?PHP if($serDes['sertype_id'] == 1){ ?>คลินิกทั่วไป<?PHP }else{ ?>คลินิกนอกเวลา<?PHP } ?></td>
                                        <td><?PHP echo $serDes['ser_point_name']; ?></td>
                                    </tr>
                                    <?PHP } ?>
							</tbody>
						</table>
					</div>

            </div>
        </div>
    </section>

</div>
<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('assets/_template/footer.php') ?>
<!-- นำเข้าไฟล์ Template js ส่วนท้าย -->
<?PHP include_once('assets/_template/footerjs.php') ?>

</body>
</html>