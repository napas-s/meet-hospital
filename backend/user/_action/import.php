<div class="modal fade" id="import-data" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="_script/import.php" method="post" id="FormValidation" enctype="multipart/form-data" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        การอ้างอิงจะต้องอ้างอิงข้อมูลตามที่กำหนดไว้ในระบบ เพื่อความถูกต้องในการเพิ่มข้อมูล ดังนี้<br/>
                        <ul>
                            <li>คำนำหน้า</li>
                            <li>เพศ</li>
                            <li>วัน-เดือน-ปีเกิด (พ.ศ)</li>
                            <li>สัญชาติ</li>
                            <li>ประเทศที่เกิด</li>
                            <li>จังหวัดที่เกิด</li>
                            <li>ศาสนา</li>
                            <li>ระดับการศึกษาสูงสุด</li>
                            <li>สถานะภาพสมรส</li>
                            <li>หมู่เลือด</li>
                            <li>ประวัติการแพ้</li>
                        </ul>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label >เลือกไฟล์ .CSV</label>
                    </div>
                    <div class="form-group">
                        <input accept=".csv" class="form-control" type="file" name="import" id="import" required="true" style="opacity: 1;" />
                    </div>
                    <div class="form-group">
                        <a href="../../assets/file_dowloads/refer-data.zip" download="" class="text-danger">ดาวน์โหลดข้อมูลอ้างอิง</a>
                    </div>
                    <div class="form-group">
                        <a href="../../assets/file_dowloads/import-data-user.zip" download="">ดาวน์โหลด Template File</a><br/>
                        <div class="alert alert-info">
                            <small>
                            ช่องหมายเลขบัตรประชาชน ต้องตั้งค่าเป็นตัวเลขเท่านั้น <br/>
                            ยกตัวอย่าง เช่น 2.34568E+12 จะไม่สามารถเพิ่มข้อมูลได้ ต้องเป็น 9874563210213 เท่านั้น</small>
						</div>
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