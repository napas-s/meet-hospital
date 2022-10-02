//แสดงภาพก่อนอับโหลด
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preView').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL2(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#preView2').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

//แสดง error หากช่องที่กำหนด ไม่มีการกรอกข้อมูล
function setFormValidation(id) {
    $(id).validate({
      highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
        $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
      },
      success: function(element) {
        $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
        $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
      },
      errorPlacement: function(error, element) {
        $(element).closest('.form-group').append(error);
      },
    });
}

//กำหนดให้กรอกเฉพาะภาษาอังกฤษ
function checkEng(e)
{
  var elem = e.value;
  if(!elem.match(/^([a-z0-9\_])+$/i))
  {
    e.value = "";
  }
}

//time service
function timeChange(e){

  var t1 = document.getElementById("Time1");
  var t2 = document.getElementById("Time2");

  if(e == 1){
    t1.style.display = "block";
    t2.style.display = "none";
  }else{
    t1.style.display = "none";
    t2.style.display = "block";
  }
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

function nationOtherChange(e){

  var value = e;
  var Other = document.getElementById("nationOthers");

  if(value == "อื่นๆ"){
    Other.style.display = "block";
  }else{
    Other.style.display = "none";
  }
}

function countryOtherChange(e){

  var value = e;
  var Other = document.getElementById("countryOthers");

  if(value == "อื่นๆ"){
    Other.style.display = "block";
  }else{
    Other.style.display = "none";
  }
}

function provinceOtherChange(e){

  var value = e;
  var Other = document.getElementById("provinceOthers");

  if(value == "อื่นๆ"){
    Other.style.display = "block";
  }else{
    Other.style.display = "none";
  }
}

function faithOtherChange(e){

  var value = e;
  var Other = document.getElementById("faithOthers");

  if(value == "อื่นๆ"){
    Other.style.display = "block";
  }else{
    Other.style.display = "none";
  }
}

function allergyOtherChange(e){

  var value = e;
  var Other = document.getElementById("allergyOthers");

  if(value == "เคยแพ้"){
    Other.style.display = "block";
  }else{
    Other.style.display = "none";
  }
}

function amphureChange(e){

  var province = e;

  $.ajax({
    url: '_ajax/amphure.php',
    type: "GET",
    data: { provinceId : province },
    cache: false,
    beforeSend: function () { },
    success: function (response) {

      $("#amphure_live_pt").html(response);

    },
    failure: function (errMsg) {
        alert(errMsg);
    }
  });

}

function districtChange(e){

  var amphure = e;

  $.ajax({
    url: '_ajax/district.php',
    type: "GET",
    data: { amphureId : amphure },
    cache: false,
    beforeSend: function () { },
    success: function (response) {

      $("#district_live_pt").html(response);

    },
    failure: function (errMsg) {
        alert(errMsg);
    }
  });

}

function zipcodeChange(e){

  var district = e;

  $.ajax({
    url: '_ajax/zipcode.php',
    type: "GET",
    data: { districtId : district },
    cache: false,
    beforeSend: function () { },
    success: function (response) {

      $("#zipcode_live_pt").val(response);

    },
    failure: function (errMsg) {
        alert(errMsg);
    }
  });

}

function amphureAuto(){

  var amphureHd = $('#amphure_live_pt_hd').val();
  var districtHd = $('#district_live_pt_hd').val();

  $.ajax({
    url: '_ajax/districtPre.php',
    type: "GET",
    data: { amphureId : amphureHd, districtId : districtHd },
    cache: false,
    beforeSend: function () { },
    success: function (response) {

      $("#district_live_pt").html(response);

    },
    failure: function (errMsg) {
        alert(errMsg);
    }
  });

}

function zipcodeAuto(){

  var district = $('#district_live_pt_hd').val();

  $.ajax({
    url: '_ajax/zipcodePre.php',
    type: "GET",
    data: { districtId : district },
    cache: false,
    beforeSend: function () { },
    success: function (response) {

      $("#zipcode_live_pt").val(response);

    },
    failure: function (errMsg) {
        alert(errMsg);
    }
  });

}

if ($("#prename").length != 0) {
  $('#prename').select2({
      placeholder: "เลือกคำนำหน้า",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#sex").length != 0) {
  $('#sex').select2({
      placeholder: "เลือกเพศ",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#nation").length != 0) {
  $('#nation').select2({
      placeholder: "เลือกสัญชาติ",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#country").length != 0) {
  $('#country').select2({
      placeholder: "เลือกประเทศ",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#province_birth").length != 0) {
  $('#province_birth').select2({
      placeholder: "เลือกจังหวัด",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#faith").length != 0) {
  $('#faith').select2({
      placeholder: "เลือกศาสนา",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#education").length != 0) {
  $('#education').select2({
      placeholder: "เลือกระดับการศึกษา",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#marry_status").length != 0) {
  $('#marry_status').select2({
      placeholder: "เลือกสถานะภาพสมรส",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#blood").length != 0) {
  $('#blood').select2({
      placeholder: "เลือกหมู่เลือด",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#allergy").length != 0) {
  $('#allergy').select2({
      placeholder: "เลือกประวัติการแพ้",
      selectOnClose: true,
      allowClear: true
  });
}
if ($("#relation_fam").length != 0) {
  $('#relation_fam').select2({
      placeholder: "เลือกความเกี่ยวข้อง",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#province_live_pt").length != 0) {
  $('#province_live_pt').select2({
      placeholder: "เลือกจังหวัด",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#amphure_live_pt").length != 0) {
  $('#amphure_live_pt').select2({
      placeholder: "เลือกอำเภอ / เขต",
      selectOnClose: true,
      allowClear: true
  });
}

if ($("#district_live_pt").length != 0) {
  $('#district_live_pt').select2({
      placeholder: "เลือกตำบล / แขวง",
      selectOnClose: true,
      allowClear: true
  });
}

if ($(".datepicker").length != 0) {
  $('.datepicker').datepicker({
    language:'th-th',
    format:'dd-mm-yyyy',
    autoclose: true,
  });
}

if ($(".datepicker-birthday").length != 0) {
  $('.datepicker-birthday').datepicker({
    language:'th-th',
    format:'dd-mm-yyyy',
    autoclose: true,
    endDate: new Date(new Date().setDate(new Date().getDate()))
  });
}