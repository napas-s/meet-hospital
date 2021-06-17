<div class="sidebar" data-color="brown" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../../assets/images/no-image.jpeg">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
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
            <a data-toggle="collapse" href="#formsExamples">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>
                ข้อมูลเกี่ยวกับองค์กร
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="formsExamples">
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