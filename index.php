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
                    <h3 class="c-text" style="margin-bottom: 0;">โรงพยาบาลสามร้อยยอด</h3>
                    <h4 class="c-text" style="margin-bottom: 0;">กระทรวงสาธารณสุข</h4>
                    <h4 class="c-text" style="margin-bottom: 0;">ระบบจองนัดออนไลน์</h4>
                </div>
            </div>

            <div class="container clearfix">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="ลงทะเบียน">
                                    <span class="round-tab">
                                        <i class="icon-user4"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="นัดหมาย">
                                    <span class="round-tab">
                                        <i class="icon-calendar3"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="ยืนยันการนัดหมาย">
                                    <span class="round-tab">
                                        <i class="glyphicon icon-ok"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form id="registrationForm" role="form" action="">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="tap-box">
                                    <h3><i class="icon-user4"></i> :: ลงทะเบียน</h3>
                                    <div class="col_full">
                                        <label for="idcardNumber">เลขบัตรประชาชน</label>
                                        <input type="text" id="idcardNumber" name="idcardNumber" value="" class="sm-form-control">
                                    </div>
                                    <div class="col_full">
                                        <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                        <div class="input-group">
                                            <input name="birthday" id="birthday" type="text" value="" class="sm-form-control tleft format" placeholder="วัน-เดือน-คศ">
                                            <span class="input-group-addon" style="padding: 9px 12px;">
                                                <i class="icon-calendar2"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col_full">
                                        <label for="contact">เบอร์ติดต่อ</label>
                                        <input type="text" id="contact" name="contact" value="" class="sm-form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <a href="#" class="btn btn-block button button-border button-rounded button-fill button-green2" onclick="nextPrev(1)">
                                                <span>ลงทะเบียน<i class="icon-angle-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="tap-box">
                                    <h3><i class="icon-calendar3"></i> :: นัดหมาย</h3>
                                    <div class="col_full">
                                        <label for="idcardNumber">จุดบริการ</label>
                                        <select class="sm-form-control" name="serpoint_id" id="serpoint_id" onchange="setPointService(this.value)" >
                                        <?PHP
                                            $sqlPoint="SELECT * FROM services_point WHERE ser_point_status = 1 ";
                                            $sql_query_point = mysqli_query($con,$sqlPoint)or die(mysqli_error($con));
                                        ?>
                                        <?PHP foreach($sql_query_point as $point){ ?>
                                            <option value="<?PHP echo $point['ser_point_id']; ?>" ><?PHP echo $point['ser_point_name']; ?></option>
                                        <?PHP } ?>
                                        </select>
                                    </div>
                                    <div class="col_full">
                                        <label for="birthday">ประเภทบริการ</label>
                                        <select class="sm-form-control" name="sertype_id" id="sertype_id" onchange="setTypeService(this.value)">
                                            <option value="1" >คลินิกทั่วไป</option>
                                            <option value="2" >คลินิกนอกเวลา</option>
                                        </select>
                                    </div>
                                    <div class="col_full">
                                        <label for="idcardNumber">บริการ</label>
                                        <select class="sm-form-control" name="service_id" id="service_id" >
                                        <?PHP
                                            $sqlService="SELECT * FROM services WHERE ser_status = 1 ";
                                            $sql_query_service = mysqli_query($con,$sqlService)or die(mysqli_error($con));
                                        ?>
                                        <?PHP foreach($sql_query_service as $service){ ?>
                                            <option value="<?PHP echo $service['ser_id']; ?>" ><?PHP echo $service['ser_name']; ?></option>
                                        <?PHP } ?>
                                        </select>
                                    </div>
                                    <div class="col_full">
                                        <label for="birthday">วันที่นัดหมายทันตกรรม</label><br/>
                                        <select class="form-control" name="serdateId" id="serdateId" onchange="setTimeService(this.value)" ></select>
                                    </div>
                                    <div class="col_full">
                                        <label for="birthday">เวลานัดหมายทันตกรรม</label><br/>
                                        <select class="form-control" name="sertimeId" id="sertimeId" ></select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#" class="btn btn-block button button-border button-rounded button-fill button-green2 prev-step">
                                                <span><i class="icon-angle-left"></i> ย้อนกลับ</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <a onclick="meetPresent()" href="#" class="btn btn-block button button-border button-rounded button-fill button-green2 next-step">
                                                <span>ทำนัดหมาย<i class="icon-angle-right"></i></span>
                                            </a>
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
                                            <a href="#" class="btn btn-block button button-border button-rounded button-fill button-green2 prev-step">
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
                            <div class="clearfix"></div>
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

<script type="text/javascript">

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
        $(".next-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        });
        $(".prev-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });
    });

    $(document).ready(function () {

        var serpointId = $('#serpoint_id').val();
        var sertypeId  = $('#sertype_id').val();

        $.ajax({
            url: '_ajax/serviceDate.php',
            type: "GET",
            data: { serpointId: serpointId, sertypeId:sertypeId },
            cache: false,
            beforeSend: function () { },
            success: function (response) {

                $("#serdateId").html(response);

            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    });

</script>

</body>
</html>