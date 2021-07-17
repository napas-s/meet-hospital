<div class="modal fade" id="import-data" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="_script/import.php" method="post" id="FormValidation" enctype="multipart/form-data" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >เลือกไฟล์ .CSV</label>
                    </div>
                    <div class="form-group">
                        <input accept=".csv" class="form-control" type="file" name="import" id="import" required="true" style="opacity: 1;" />
                    </div>
                    <div class="form-group">
                        <a href="#">ดาวน์โหลด Template File</a>
                    </div>
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