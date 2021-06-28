<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="_script/dropzone_delete.php" method="post" >
      <div class="modal-content">
        <div class="modal-body text-center">
          <input type="hidden" name="idDelete" id="idDelete" />
          <input type="hidden" name="albumIdDelete" id="albumIdDelete" />
          <div class="swalShow-icon swalShow-warning swalShow-icon-show" style="display: flex;">
            <div class="swalShow-icon-content">!</div>
          </div>
          <br/>
          <div id="messageDelete"></div>
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

function deleteModel(e){

  var idDelete = $(e).data('id');
  var albumIdDelete = $(e).data('albumid');
  var messageDelete = $(e).data('message');

  $('#idDelete').val(idDelete);
  $('#albumIdDelete').val(albumIdDelete);
  $('#messageDelete').html(messageDelete);

};

</script>