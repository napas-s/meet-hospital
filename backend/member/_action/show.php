<div class="modal fade" id="showModel" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="_script/show.php" method="post" >
      <div class="modal-content">
        <div class="modal-body text-center">
          <input type="hidden" name="idShow" id="idShow" />
          <input type="hidden" name="statusShow" id="statusShow" />
          <div class="swalShow-icon swalShow-warning swalShow-icon-show" style="display: flex;">
            <div class="swalShow-icon-content">!</div>
          </div>
          <br/>
          คุณต้องการซ่อน/แสดง รายการนี้หรือไม่ ?
          <br/>
          <br/>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <button type="submit" class="btn btn-default btn-link">ยืนยัน</button>
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">ปิด</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>

  $(".showModel").on('click', function(event){
    var idShow = $('.showModel').data('id');
    var statusShow = $('.showModel').data('status');

    $('#idShow').val(idShow);
    $('#statusShow').val(statusShow);

  });

</script>