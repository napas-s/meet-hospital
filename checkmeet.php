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
            <h1>ตรวจสอบนัดหมาย</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">หน้าแรก</a></li>
                <li class="active">ตรวจสอบนัดหมาย</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row">
                    <div class="col-md-4">
                        <form action="checkmeet.php" method="get" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        สำหรับท่านที่ต้องการตรวจสอบนัดหมายที่กำลังจะมาถึง ท่านสามารถค้นหาได้จากหมายเลขบัตรประชาชนที่ได้ทำการลงทะเบียนไว้
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="sm-form-control" name="idCardNumber" id="idCardNumber" placeholder="หมายเลขบัตรประชาชน" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <button type="submit" style="margin: 0px;" class="btn btn-block button button-green center"><i class="nc-icon nc-tap-01"></i> ค้นหาข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br/>
                    </div>
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            <br/>
                            <div class="preview_detail">
                                <div class="center">
                                    <img class="logo-health" src="assets/images/ministry_of_public_health.png" />
                                    <h3 class="c-text" style="margin-bottom: 0;">โรงพยาบาลส่งเสริมสุขภาพ<br class="d-sm-none"/>ตำบลห้วยยาง</h3>
                                    <h4 class="c-text" style="margin-bottom: 0;">อำเภอทับสะแก จังหวัดประจวบคีรีขันธ์</h4>
                                    <h4 class="c-text" style="margin-bottom: 0;">ระบบจองคิวทันตกรรมออนไลน์</h4>
                                </div>
                                <hr/>
                                <?php if(!empty($_GET["idCardNumber"])){ ?>
                                    <?PHP
                                        $Id = $_GET["idCardNumber"];
                                        $dateNow = date("Y-m-d", strtotime("+543 years"));

                                        $sql="SELECT * FROM meet_service JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber 
                                                WHERE meet_service.mt_idcardNumber = $Id 
                                                AND mt_serdateId >= $dateNow
                                                ORDER BY mt_serdateId, mt_sertimeId ASC";
                                        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                                        $row = mysqli_fetch_assoc($sql_query);
                                    ?>
                                    <?PHP if(isset($row)) { ?>
                                        <?PHP include_once('_script/contentHTMLmeet.php') ?> 
                                        <hr/>
                                        <small>หมายเหตุ : กรุณาแคปหน้าจอหรือดาวน์โหลดเอกสารไว้เพื่อนำมาเป็นหลักฐานในการนัดหมายทันตกรรมของท่าน</small>
                                    <?PHP } else { ?>
                                        <div class="center"><h4 class="mgb_no">ยังไม่มีนัดหมาย!!</h4></div>
                                    <?PHP } ?>
                                <? } else {?>
                                    <div class="center"><h4 class="mgb_no">ยังไม่มีนัดหมาย!!</h4></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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

<!-- แจ้งเตือนมีการผิดพลาด (รับตัวแปลจากหน้า _script/addMeet) -->
<?PHP if(isset($_GET['message'])){ ?>
<script src="<?PHP base_url() ?>assets/vendor/paper-dashboard/sweetalert2@11.js"></script>
<input type="hidden" name="icon" id="icon" value="<?PHP if(isset($_GET['icon'])){ echo $_GET['icon'];}?>" /> <!-- ตัวแปร icon แจ้งเตือน -->
<input type="hidden" name="title" id="title" value="<?PHP if(isset($_GET['title'])){ echo $_GET['title'];}?>" /> <!-- ตัวแปร title แจ้งเตือน -->
<input type="hidden" name="message" id="message" value="<?PHP if(isset($_GET['message'])){ echo $_GET['message'];}?>" /> <!-- ตัวแปรข้อความ -->

<script>
    $(document).ready(function() {
      $icon = $('#icon').val();
      $message = $('#message').val();
      $title = $('#title').val();
      Swal.fire({
        title: $title,
        text: $message,
        icon: $icon,
        confirmButtonText: 'ปิด'
      })
    });
</script>
<?PHP } ?>

<script type="text/javascript">

    $('.n_tel').keypress( function(){
        var email = String.fromCharCode(event.keyCode);
        var RE = /^([0-9])+$/;
        if(!RE.test(email))
        {
            return false;
        }
        return true;
    });

    $(document).ready(function () {
        $('#birthday').datepicker({
            language:'th-th',
            format:'dd-mm-yyyy',
            autoclose: true,
            endDate: new Date(new Date().setDate(new Date().getDate()))
        });

        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();
        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            var $target = $(e.target);
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });
        $(".prev-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });

        $(".nextBtn").click(function (e) {

            var curStep = $(this).closest(".tab-pane"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if(isValid == true){
                var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
            }


        });
    });

</script>

</body>
</html>