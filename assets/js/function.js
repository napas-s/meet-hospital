function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

if ($("#serpoint_id").length != 0) {
    $('#serpoint_id').select2({
        placeholder: "กรุณาเลือกจุดบริการ",
        selectOnClose: true,
        allowClear: true
    });
}

if ($("#sertype_id").length != 0) {
    $('#sertype_id').select2({
        placeholder: "กรุณาเลือกประเภทบริการ",
        selectOnClose: true,
        allowClear: true
    });
}

if ($("#service_id").length != 0) {
    $('#service_id').select2({
        placeholder: "กรุณาเลือกบริการ",
        selectOnClose: true,
        allowClear: true
    });
}

if ($("#serdateId").length != 0) {
    $('#serdateId').select2({
        placeholder: "กรุณาเลือกวันที่นัดหมาย",
        selectOnClose: true,
        allowClear: true
    });
}

if ($("#sertimeId").length != 0) {
    $('#sertimeId').select2({
        placeholder: "กรุณาเลือกเวลานัดหมาย",
        selectOnClose: true,
        allowClear: true
    });
}

if ($(".format").length != 0) {
    $('.format').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
    });
}


function setPointService(e){

    var setpointId  = e;
    var settypeId  = $('#sertype_id').val();

    $.ajax({
        url: '_ajax/serviceType.php',
        type: "GET",
        data: { setpointId:setpointId,settypeId:settypeId},
        cache: false,
        beforeSend: function () { },
        success: function (response) {

            $("#serdateId").html(response);
            $("#sertimeId").html('');

        },
        failure: function (errMsg) {
            alert(errMsg);
        }
    });

}

function setTypeService(e){

    var setpointId  = $('#serpoint_id').val();
    var settypeId  = e;

    $.ajax({
        url: '_ajax/serviceType.php',
        type: "GET",
        data: { setpointId:setpointId,settypeId:settypeId},
        cache: false,
        beforeSend: function () { },
        success: function (response) {

            $("#serdateId").html(response);
            $("#sertimeId").html('');

        },
        failure: function (errMsg) {
            alert(errMsg);
        }
    });

}

function setTimeService(e){

    $.ajax({
        url: '_ajax/serviceTime.php',
        type: "GET",
        data: { serdateId:e},
        cache: false,
        beforeSend: function () { },
        success: function (response) {

            $("#sertimeId").html(response);

        },
        failure: function (errMsg) {
            alert(errMsg);
        }
    });
}

function meetPresent(){

    var idcardNumber    = $('#idcardNumber').val();
    var birthday        = $('#birthday').val();
    var contact         = $('#contact').val();
    var setpointId      = $('#serpoint_id').val();
    var settypeId       = $('#sertype_id').val();
    var setserviceId    = $('#service_id').val();
    var serdateId       = $('#serdateId').val();
    var sertimeId       = $('#sertimeId').val();

    $.ajax({
        url: '_ajax/meetPresent.php',
        type: "GET",
        data: { idcardNumber:idcardNumber,birthday:birthday,contact:contact,setpointId:setpointId,settypeId:settypeId,setserviceId:setserviceId,serdateId:serdateId,sertimeId:sertimeId},
        cache: false,
        beforeSend: function () { },
        success: function (response) {

            $("#meetPresent").html(response);

        },
        failure: function (errMsg) {
            alert(errMsg);
        }
    });

}