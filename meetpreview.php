<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('assets/_template/headder.php') ?>

<!-- เนื้อหาของหน้า -->
<div id="wrapper" class="clearfix">

    <!-- นำเข้าไฟล์ Template ส่วนหัวบนเมนู -->
    <?PHP include_once('assets/_template/topbar.php') ?>
    <!-- นำเข้าไฟล์ Template ส่วนเมนู -->
    <?PHP include_once('assets/_template/navbar.php') ?>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="center">
                    <img class="logo-health" src="assets/images/ministry_of_public_health.png" />
                    <h3 class="c-text" style="margin-bottom: 0;">โรงพยาบาลส่งเสริมสุขภาพตำบลห้วยยาง</h3>
                    <h4 class="c-text" style="margin-bottom: 0;">อำเภอทับสะแก จังหวัดประจวบคีรีขันธ์</h4>
                    <h4 class="c-text" style="margin-bottom: 0;">ระบบจองคิวทันตกรรมออนไลน์</h4>
                </div>
                <div class="mgt_preview">
                    <?PHP if($_GET['message'] == 1){ ?>
                            <!-- แสดงข้อมูลถ้าลงทะเบียนสำเร็จ -->
                        <div class="alert alert-success">
                            <br/>
                            <?php if(isset($_GET["id"])){ ?>
                                <?PHP
                                    $Id = $_GET["id"];
                                    $sql="SELECT * FROM meet_service JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber WHERE meet_service.mt_id = $Id ";
                                    $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                                    $row = mysqli_fetch_assoc($sql_query);
                                ?>
                                <div class="preview_detail">
                                    <div class="center"><h4>คุณลงทะเบียนสำเร็จแล้ว</h4></div>
                                    <div class='mg_present'><b>เลขบัตรประชาชน : </b><?PHP if(isset($row['mt_idcardNumber'])){ echo $row['mt_idcardNumber']; } else{echo '-';}?></div>
                                    <?PHP if(isset($row['user_prename']) && isset($row['user_fname']) && isset($row['user_lname'])){ ?>
                                        <div class='mg_present'><b>ชื่อ - สกุล : </b><?PHP if($row['user_prename'] == "อื่นๆ"){echo $row['user_prenameOthers']; } else{echo $row['user_prename'];} ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?></div>
                                    <?PHP }else{ ?>
                                        <div class='mg_present'><b>ชื่อ - สกุล : </b><?PHP echo $row['user_prename']; ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?></div>
                                    <?PHP } ?>
                                    <div class='mg_present'><b>วัน/เดือน/ปีเกิด (ค.ศ.) : </b><?PHP if(isset($row['user_birthday'])){ echo date("d-m-Y", strtotime($row['user_birthday']));; } else{echo '-';} ?></div>
                                    <div class='mg_present'><b>เบอร์โทรศัพท์ : </b><?PHP if(isset($row['mt_tel'])){ echo $row['mt_tel']; } else{echo '-';} ?></div>
                                    <div class='divider'><i class='icon-screen'></i></div>
                                    <div class='mg_present'><b>จุดบริการ : </b><?PHP if(isset($row['mt_serpoint_id'])){ echo $row['mt_serpoint_id']; }  else{echo '-';}?></div>
                                    <div class='mg_present'><b>ประเภทบริการ : </b><?PHP if(isset($row['mt_sertype_id'])){ echo $row['mt_sertype_id']; } else{echo '-';} ?></div>
                                    <div class='mg_present'><b>บริการ : </b><?PHP if(isset($row['mt_service_id'])){ echo $row['mt_service_id']; } else{echo '-';} ?></div>
                                    <div class='mg_present'><b>วันที่นัดหมาย : </b><?PHP if(isset($row['mt_serdateId'])){ echo date("d-m-Y", strtotime($row['mt_serdateId']));} else{echo '-';} ?></div>
                                    <div class='mg_present'><b>เวลาที่นัดหมาย : </b><?PHP if(isset($row['mt_sertimeId'])){ echo $row['mt_sertimeId']; } else{echo '-';} ?></div>
                                    <br/>
                                    <div class="center">
                                        <a href="_script/pdfMeet.php?id=<?PHP echo $Id; ?>" class="btn btn-block button button-green2" type="button">
                                            <i class="icon-hand-up"></i>
                                            <span>ดาวน์โหลดนัดหมาย (PDF)</span>
                                        </a>
                                    </div>
                                    <hr/>
                                    <small>หมายเหตุ : กรุณาแคปหน้าจอหรือดาวน์โหลดเอกสารไว้เพื่อนำมาเป็นหลักฐานในการนัดหมายทันตกรรมของท่าน</small>
                                </div>
                                <br/>
                            <?php } ?>

                        </div>
                    <?PHP }else{ ?>
                        <!-- แสดงข้อมูลถ้าลงทะเบียนไม่สำเร็จ -->
                        <div class="alert alert-danger">
                            <br/>
                            <div class="center"><h4 class="mgb_no">คุณลงทะเบียนไม่สำเร็จ!!</h4></div>
                            <div class="preview_detail center" style="background-color: transparent;">
                                <a href="index.php" class="button button-rounded button-reveal button-large button-red tright">
                                    <i class="icon-angle-right"></i>
                                    <span>กรุณาลงทะเบียนใหม่อีกครั้ง</span>
                                </a>
                            </div>
                        </div>
                    <?PHP } ?>
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