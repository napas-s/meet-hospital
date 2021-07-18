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

if ($("#prename").length != 0) {
    $('#prename').select2({
        placeholder: "เลือกสถานะคำนำหน้า",
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

function prenameOtherChange(e){

    var value = e;
    var Other = document.getElementById("prenameOthers");
  
    if(value == "อื่นๆ"){
      Other.style.display = "block";
    }else{
      Other.style.display = "none";
    }
  }

var table = $('#datatable1').DataTable({
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
            next: '<i class="icon-chevron-right"></i>',
            previous: '<i class="icon-chevron-left"></i>'
        }
    },

});


//custom search input for data table
$(".dataTables_filter").hide();
$('#search').on( 'keypress', function () {
    var val = $("#search").val();
    table.search( val ).draw();
});

//select ประเภทบริการ
function setTypeService(e){

    var setpointId  = e;

    $.ajax({
        url: '_ajax/serviceType.php',
        type: "GET",
        data: { setpointId:setpointId},
        cache: false,
        beforeSend: function () { },
        success: function (response) {

            $("#sertype_id").html(response);
            $("#sertimeId").html('');

        },
        failure: function (errMsg) {
            alert(errMsg);
        }
    });

}

//select วันที่นัดหมาย
function setDateService(e){

    var setpointId  = $('#serpoint_id').val();
    var settypeId  = e;

    $.ajax({
        url: '_ajax/serviceDate.php',
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

//select เวลาที่นัดหมาย
function setTimeService(e){

    var setpointId  = $('#serpoint_id').val();
    var sertypeId  = $('#sertype_id').val();
    $.ajax({
        url: '_ajax/serviceTime.php',
        type: "GET",
        data: { serdateId:e, setpointId:setpointId,sertypeId:sertypeId},
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

//แสดงรายการยืนยันการนัดหมาย
function meetPresent(){

    var idcardNumber    = $('#idcardNumber').val();
    var prename         = $('#prename').val();
    var prenameOther    = $('#prenameOther').val();
    var fname           = $('#fname').val();
    var lname           = $('#lname').val();
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
        data: { lname:lname,fname:fname,prenameOther:prenameOther,prename:prename,idcardNumber:idcardNumber,birthday:birthday,contact:contact,setpointId:setpointId,settypeId:settypeId,setserviceId:setserviceId,serdateId:serdateId,sertimeId:sertimeId},
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

//loadding lazy
if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
        img.src = img.dataset.src;
    });
} else {
// Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src ='https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
}