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
          <div id="messageShow"></div>
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

 function showModel(e){

    var idShow = $(e).data('id');
    var statusShow = $(e).data('status');
    var messageShow = $(e).data('message');

    $('#idShow').val(idShow);
    $('#statusShow').val(statusShow);
    $('#messageShow').html(messageShow);

  };

</script>