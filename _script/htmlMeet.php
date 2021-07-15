<!-- นำเข้าไฟล์ฐานข้อมูล -->
<?PHP require_once('../_database/connection.php'); ?>

<?php
    $sql_setting="SELECT * FROM setting";
    $sql_query_setting = mysqli_query($con,$sql_setting)or die(mysqli_error($con));
    $setting = mysqli_fetch_assoc($sql_query_setting);
?>

<div style=" line-height: 0.7; color: #03673A; ">
    <div style="background-color: #dff0d8; width:100%;">
        <table style="width:100%;  padding: 10px">
            <tr>
                <td style="width: 100px;">
                    <img style="width:100px; margin-bottom:20px" src="../assets/images/ministry_of_public_health.png" />
                </td>
                <td style="width:auto">
                    <div><strong style="margin: 0; font-size:20px;">โรงพยาบาลสามร้อยยอด กระทรวงสาธารณสุข</strong></div>
                    <div><strong style="margin: 0; font-size:18px;">ใบนัดหมายทันตกรรมออนไลน์</strong></div>
                    <div style="font-size: 16px;"><strong>โทรศัพท์ : </strong><?PHP if(isset($setting['tel'])){ echo $setting['tel']; }else{ echo '-';} ?></div>
                </td>
            </tr>
        </table>
    </div>
    <?PHP
        $Id = $_GET["id"];
        $sql="SELECT * FROM meet_service JOIN users ON users.user_iden13 = meet_service.mt_idcardNumber WHERE mt_id = $Id ";
        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($sql_query);
    ?>
    <br/>
    <table style="width:100%;">
        <tr>
            <td style="width: auto;">
                <h3>รายละเอียดการนัดหมายทันตกรรม</h3>
                <hr/>
            </td>
        </tr>
    </table>
    <table style="width:100%; padding: 10px">
        <tr>
            <td>
                <div ><b>เลขบัตรประชาชน : </b><?PHP if(isset($row['mt_idcardNumber'])){ echo $row['mt_idcardNumber']; } ?></div>
                <?PHP if(isset($row['user_prename']) && isset($row['user_fname']) && isset($row['user_lname'])){ ?>
                    <div ><b>ชื่อ - สกุล : </b><?PHP if($row['user_prename'] == "อื่นๆ"){echo $row['user_prenameOthers']; } else{echo $row['user_prename'];} ?> <?PHP echo $row['user_fname']; ?> <?PHP echo $row['user_lname']; ?></div>
                <?PHP }else{ ?>
                    <div ><b>ชื่อ - สกุล : </b> - </div>
                <?PHP } ?>
                <?PHP if(isset($row['user_birthday'])){ ?>
                <div ><b>วัน/เดือน/ปีเกิด (ค.ศ.) : </b><?PHP if(isset($row['user_birthday'])){ echo date("d-m-Y", strtotime($row['user_birthday']));; } ?></div>
                <?PHP }else{ ?>
                    <div ><b>วัน/เดือน/ปีเกิด (ค.ศ.) : </b> - </div>
                <?PHP } ?>
                <div ><b>เบอร์โทรศัพท์ : </b><?PHP if(isset($row['mt_tel'])){ echo $row['mt_tel']; } ?></div>
                <br/>
                <img style="width:auto;" src="../assets/images/pdf-line.png" />
                <br/>
                <div ><b>จุดบริการ : </b><?PHP if(isset($row['mt_serpoint_id'])){ echo $row['mt_serpoint_id']; } ?></div>
                <div ><b>ประเภทบริการ : </b><?PHP if(isset($row['mt_sertype_id'])){ echo $row['mt_sertype_id']; } ?></div>
                <div ><b>บริการ : </b><?PHP if(isset($row['mt_service_id'])){ echo $row['mt_service_id']; } ?></div>
                <div ><b>วันที่นัดหมาย : </b><?PHP if(isset($row['mt_serdateId'])){ echo date("d-m-Y", strtotime($row['mt_serdateId']));} ?></div>
                <div ><b>เวลาที่นัดหมาย : </b><?PHP if(isset($row['mt_sertimeId'])){ echo $row['mt_sertimeId']; } ?></div>
            </td>
        </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div style="background-color: #dff0d8; ">
        <table style="width:100%; padding-bottom:10px; padding:5px; font-size:15px;">
            <tr>
                <td>
                    <div><b>หมายเหตุ :</b></div>
                    <div>1. กรุณาเก็บไฟล์ไว้เป็นหลักฐานในการนัดหมายทันตกรรมของท่าน</div>
                    <div>2. วันที่ทำการนัดหมาย : <?PHP if(isset($row['mt_dateMeetadd'])){ echo $row['mt_dateMeetadd']; } ?></div>
                </td>
            </tr>
        </table>
    </div>
</div>