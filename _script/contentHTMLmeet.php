<div class='mg_present'><b>เลขบัตรประชาชน : </b><?PHP echo $row['mt_idcardNumber'] ? $row['mt_idcardNumber'] : '-' ;?></div>
<?PHP if(isset($row['user_prename']) && isset($row['user_fname']) && isset($row['user_lname'])){ ?>
    <div class='mg_present'><b>ชื่อ - สกุล : </b><?PHP echo $row['user_prename'] == "อื่นๆ" ? $row['user_prenameOthers'] : $row['user_prename']; ?>&nbsp;<?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?></div>
<?PHP }else{ ?>
    <div class='mg_present'><b>ชื่อ - สกุล : </b><?PHP echo $row['user_prename']; ?> <?PHP echo $row['user_fname']; ?>&nbsp;<?PHP echo $row['user_lname']; ?></div>
<?PHP } ?>
<div class='mg_present'><b>วัน/เดือน/ปีเกิด (พ.ศ.) : </b><?PHP echo $row['user_birthday'] ? date("d-m-Y", strtotime($row['user_birthday'])) : '-'; ?></div>
<div class='mg_present'><b>เบอร์โทรศัพท์ : </b><?PHP echo $row['mt_tel'] ? $row['mt_tel']: '-'; ?></div>
<div class='divider'><i class='icon-screen'></i></div>
<div class='mg_present'><b>จุดบริการ : </b><?PHP echo $row['mt_serpoint_id'] ? $row['mt_serpoint_id']: '-'; ?></div>
<div class='mg_present'><b>ประเภทบริการ : </b><?PHP echo $row['mt_sertype_id'] ? $row['mt_sertype_id'] : '-'; ?></div>
<div class='mg_present'><b>บริการ : </b><?PHP echo $row['mt_service_id'] ? $row['mt_service_id'] : '-'; ?></div>
<div class='mg_present'><b>วันที่นัดหมาย : </b><?PHP echo$row['mt_serdateId'] ? date("d-m-Y", strtotime($row['mt_serdateId'])) : '-'; ?></div>
<div class='mg_present'><b>เวลาที่นัดหมาย : </b><?PHP echo $row['mt_sertimeId'] ? $row['mt_sertimeId'] : '-'; ?> น.</div>
<br/>
<div class="center">
    <a href="_script/pdfMeet.php?id=<?PHP echo $row['mt_id']; ?>" class="btn btn-block button button-green2" type="button">
        <i class="icon-hand-up"></i>
        <span>ดาวน์โหลดนัดหมาย (PDF)</span>
    </a>
</div>