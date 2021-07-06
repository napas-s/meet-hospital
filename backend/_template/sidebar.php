<div class="sidebar" data-color="brown" data-active-color="danger">
      <div class="logo">
        <?PHP if(isset($setting['icon_web'])){ ?>
          <a href="../../index.php" target="_bank" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="<?PHP echo base_url(); ?>../../uploads/setting/<?PHP echo $setting['icon_web']; ?>">
            </div>
          </a>
        <?PHP } ?>
        <?PHP if(isset($setting['icon_web'])){ ?>
        <a href="../../index.php" target="_bank"  class="simple-text logo-normal">
          <img style="max-width: 80px;" src="<?PHP echo base_url(); ?>../../uploads/setting/<?PHP echo $setting['icon_web']; ?>">
        </a>
        <?PHP } ?>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <!-- เช็คว่ามีภาพโปรไฟล์จาก session ไหม -->
            <?PHP if($_SESSION["Img"] == ""){ ?>
              <!-- ถ้าไม่มีให้ดึงภาพ no img มาแสดง  -->
              <img src="../../assets/images/no-image.jpeg" />
            <?PHP }else{ ?>
              <!-- ถ้ามีให้ดึงภาพจากฐานข้อมูลมาแสดง -->
              <img src="../../uploads/member/<?PHP echo $_SESSION["Img"]; ?>" />
            <?PHP } ?>
            <!-- ./ เช็คว่ามีภาพโปรไฟล์ของไหม -->
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                <!-- ดึงข้อมูลชื่อผู้ใช้จาก session มาแสดง -->
                <?PHP echo $_SESSION["User"]; ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-ruler-pencil"></i></span>
                    <span class="sidebar-normal">บัญชีผู้ใช้ของฉัน</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="">
            <a href="../dashboard/index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="../news/index.php">
              <i class="nc-icon nc-align-left-2"></i>
              <p>ข่าวประชาสัมพันธ์</p>
            </a>
          </li>
          <li>
            <a href="../album/index.php">
              <i class="nc-icon nc-image"></i>
              <p>กิจกรรมของเรา</p>
            </a>
          </li>
          <li>
            <a data-toggle="collapse" href="#formsAbouts">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>
                ข้อมูลเกี่ยวกับองค์กร
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="formsAbouts">
              <ul class="nav">
                <li>
                  <a href="../about/about.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-single-copy-04"></i></span>
                    <span class="sidebar-normal"> ข้อมูลเกี่ยวกับองค์กร </span>
                  </a>
                </li>
                <li>
                  <a href="../about/organizationchart.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-vector"></i></span>
                    <span class="sidebar-normal"> แผนผังองค์กร </span>
                  </a>
                </li>
                <li>
                  <a href="../about/map.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-map-big"></i></span>
                    <span class="sidebar-normal"> แผนที่องค์กร </span>
                  </a>
                </li>
                <li>
                  <a href="../about/servicetime.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-watch-time"></i></span>
                    <span class="sidebar-normal"> ตารางเวลาการให้บริการ </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#formService">
              <i class="nc-icon nc-calendar-60"></i>
              <p>
                ข้อมูลการบริการนัดหมาย
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="formService">
              <ul class="nav">
                <li>
                  <a href="../servicetime/index.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-tv-2"></i></span>
                    <span class="sidebar-normal"> ข้อมูลเวลาการบริการ </span>
                  </a>
                </li>
                <li>
                  <a href="../servicepoint/index.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-tile-56"></i></span>
                    <span class="sidebar-normal"> ข้อมูลจุดบริการ </span>
                  </a>
                </li>
                <li>
                  <a href="../service/index.php">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-paper"></i></span>
                    <span class="sidebar-normal"> ข้อมูลการบริการ </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="../member/index.php">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>ข้อมูลพนักงาน</p>
            </a>
          </li>
          <li>
            <a href="../setting/index.php">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>ตั้งค่าเว็บไซต์</p>
            </a>
          </li>
        </ul>
      </div>
    </div>