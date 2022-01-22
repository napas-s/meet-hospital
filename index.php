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
            </div>

            <div class="container">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs setup-panel" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" class="btn-panel" data-toggle="tab" aria-controls="step1" role="tab" title="ลงทะเบียน" >
                                    <span class="round-tab">
                                        <i class="icon-user4"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" class="btn-default" data-toggle="tab" aria-controls="step2" role="tab" title="นัดหมาย" >
                                    <span class="round-tab">
                                        <i class="icon-calendar3"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#complete" class="btn-default" data-toggle="tab" aria-controls="complete" role="tab" title="ยืนยันการนัดหมาย">
                                    <span class="round-tab">
                                        <i class="glyphicon icon-ok"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="registrationForm" role="form" action="_script/addMeet.php" method="post">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="tap-box">
                                    <h3><i class="icon-user4"></i> :: ลงทะเบียน</h3>
                                    <div class="col_full form-group">
                                        <label for="idcardNumber">เลขบัตรประชาชน</label>
                                        <input type="text" id="idcardNumber" name="idcardNumber" required="required" value="" class="n_tel sm-form-control" >
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="prename">คำนำหน้า</label>
                                        <select class="sm-form-control" name="prename" id="prename" onchange="prenameOtherChange(this.value)" required="true" >
                                            <option value="" disabled="" selected="">เลือกคำนำหน้า</option>
                                            <option value="นาย" >นาย</option>
                                            <option value="นางสาว" >นางสาว</option>
                                            <option value="นาง" >นาง</option>
                                            <option value="ด.ช." >ด.ช.</option>
                                            <option value="ด.ญ." >ด.ญ.</option>
                                            <option value="อื่นๆ" >อื่นๆ</option>
                                        </select>
                                        <div id="prenameOthers" class="form-group group-other">
                                            <br/>
                                            <input placeholder="โปรดระบุ" class="sm-form-control" type="text" name="prenameOther" id="prenameOther" value="" />
                                        </div>
                                    </div>
                                    <div class="col_half form-group">
                                        <label for="idcardNumber">ชื่อ</label>
                                        <input type="text" id="fname" name="fname" required="required" value="" class="sm-form-control">
                                    </div>
                                    <div class="col_half col_last form-group">
                                        <label for="idcardNumber">สกุล</label>
                                        <input type="text" id="lname" name="lname" required="required" value="" class="sm-form-control">
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="birthday">วัน/เดือน/ปีเกิด (ค.ศ.)</label>
                                        <div class="input-group">
                                            <input name="birthday" id="birthday" type="text" required="required" value="" class="sm-form-control tleft format" placeholder="วัน-เดือน-คศ">
                                            <span class="input-group-addon" style="padding: 9px 12px;">
                                                <i class="icon-calendar2"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="contact">เบอร์ติดต่อ</label>
                                        <input type="text" id="contact" name="contact" required="required" value="" class="n_tel sm-form-control" >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-block button button-border button-rounded button-fill button-green2 btn-panel nextBtn" type="button">
                                                <span>ลงทะเบียน<i class="icon-angle-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="tap-box">
                                    <h3><i class="icon-calendar3"></i> :: นัดหมาย</h3>
                                    <div class="col_full form-group">
                                        <label for="idcardNumber">จุดบริการ</label>
                                        <select class="sm-form-control" required="required" name="serpoint_id" id="serpoint_id" onchange="setTypeService(this.value)" >
                                        <option value="">กรุณาเลือกจุดบริการ</option>
                                        <?PHP
                                            $sqlPoint="SELECT * FROM services_point WHERE ser_point_status = 1 ";
                                            $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
                                        ?>
                                        <?PHP foreach($sql_query_point as $point){ ?>
                                            <option value="<?PHP echo $point['ser_point_id']; ?>" ><?PHP echo $point['ser_point_name']; ?></option>
                                        <?PHP } ?>
                                        </select>
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="birthday">ประเภทบริการ</label>
                                        <select class="sm-form-control" required="required" name="sertype_id" id="sertype_id" onchange="setDateService(this.value)">
                                            <option value="" >กรุณาเลือกประเภทบริการ</option>
                                        </select>
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="idcardNumber">บริการ</label>
                                        <select class="sm-form-control" required="required" name="service_id" id="service_id" >
                                            <option value="" >กรุณาเลือกบริการ</option>
                                            <?PHP
                                                $sqlService="SELECT * FROM services WHERE ser_status = 1 ";
                                                $sql_query_service = mysqli_query($con,$sqlService)or die(mysqli_error($con));
                                            ?>
                                            <?PHP foreach($sql_query_service as $service){ ?>
                                                <option value="<?PHP echo $service['ser_id']; ?>" ><?PHP echo $service['ser_name']; ?></option>
                                            <?PHP } ?>
                                        </select>
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="birthday">วันที่นัดหมายทันตกรรม</label><br/>
                                        <select class="sm-form-control" required="required" name="serdateId" id="serdateId" onchange="setTimeService(this.value)" ></select>
                                    </div>
                                    <div class="col_full form-group">
                                        <label for="birthday">เวลานัดหมายทันตกรรม</label><br/>
                                        <select class="sm-form-control" required="required" name="sertimeId" id="sertimeId" ></select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#" class="btn btn-block button button-border button-rounded button-fill button-green2 prev-step">
                                                <span><i class="icon-angle-left"></i> ย้อนกลับ</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-block button button-border button-rounded button-fill button-green2 nextBtn" type="button" onclick="meetPresent()">
                                                <span>ทำนัดหมาย<i class="icon-angle-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="tap-box">
                                    <h3><i class="glyphicon icon-ok"></i> :: ยืนยันการนัดหมาย</h3>
                                    <div id="meetPresent"></div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#step2" class="btn btn-block button button-border button-rounded button-fill button-green2 prev-step">
                                                <span><i class="icon-angle-left"></i> ย้อนกลับ</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-block button button-border button-rounded button-fill button-green2">
                                                <span>ยืนยันนัดหมาย</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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
        var RE = /^([a-zA-Z@0-9._])+$/;
        if(!RE.test(email))
        {
            return false;
        }
        return true;
    });

    $(document).ready(function () {
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