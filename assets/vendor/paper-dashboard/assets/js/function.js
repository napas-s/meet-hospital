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