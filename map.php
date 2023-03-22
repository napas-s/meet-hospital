<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('assets/_template/headder.php') ?>

<!-- เนื้อหาของหน้า -->
<div id="wrapper" class="clearfix">

    <!-- นำเข้าไฟล์ Template ส่วนหัวบนเมนู -->
    <?PHP include_once('assets/_template/topbar.php') ?>
    <!-- นำเข้าไฟล์ Template ส่วนเมนู -->
    <?PHP include_once('assets/_template/navbar.php') ?>

    <section id="page-title">
        <div class="container clearfix">
            <h1>การเดินทาง</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">หน้าแรก</a></li>
                <li class="active">การเดินทาง</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix mapabout">
                    <?php
                        $sql="SELECT * FROM about WHERE about_type = '3' AND about_status = '1'";
                        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($sql_query);
                    ?>

                    <?PHP if(isset($row)){ ?>
                        <?PHP if($row['about_lavel'] == 1){ ?>
                            <?PHP echo $row['about_content']; ?>
                            <br/>
                        <?PHP }else if($row['about_lavel'] == 2){ ?>
                            <div class="center">
                                <img style="width: 100%; height: auto; max-width: 1140px" src="<?PHP base_url() ?>uploads/about/<?PHP echo $row['about_img']; ?>" alt="about image" />
                            </div>
                            <br/>
                        <?PHP }else{ ?>
                            <?PHP if(isset($row['about_content_googlemap'])){ ?>
                                <?PHP echo $row['about_content_googlemap']; ?>
                                <br/>
                            <?PHP } ?>
                            <?PHP echo $row['about_googlemap']; ?>
                            <br/>
                        <?PHP } ?>
                    <?PHP }else{ ?>
                        <div class="center">
                            ยังไม่มีข้อมูล
                        </div>
                    <?PHP } ?>

                    <?PHP if(!empty($setting_temp['tel'])){ ?>
                        <div style="margin-bottom:20px"><strong>เบอร์โทรศัพท์ : <a href="tel:<?PHP echo $setting_temp['tel']; ?>"><?PHP echo $setting_temp['tel']; ?></a></strong></div>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['email'])){ ?>
                        <div style="margin-bottom:20px"><strong>อีเมล : <a href="mailto:<?PHP echo $setting_temp['email']; ?>"><?PHP echo $setting_temp['email']; ?></a></strong></div>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['address'])){ ?>
                        <div style="margin-bottom:20px"><strong>ที่อยู่ : </strong><?PHP echo $setting_temp['address']; ?></a></div>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['tel'])){ ?>
                        <a href="tel:<?PHP echo $setting_temp['tel']; ?>" class="social-icon inline-block si-rounded si-light si-call" title="Call">
							<i class="icon-call"></i>
							<i class="icon-call"></i>
						</a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['email'])){ ?>
                        <a href="mailto:<?PHP echo $setting_temp['email']; ?>" class="social-icon inline-block si-rounded si-light si-email3" title="Email">
							<i class="icon-email3"></i>
							<i class="icon-email3"></i>
						</a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['facebook'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting_temp['facebook']; ?>" class="social-icon inline-block si-light si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['twitter'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting_temp['twitter']; ?>"  class="social-icon inline-block si-light si-rounded si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    <?PHP } ?>
            </div>
        </div>
    </section>

</div>
<!-- ./จบเนื้อหาของหน้า -->

<!-- นำเข้าไฟล์ Template ส่วนท้าย -->
<?PHP include_once('assets/_template/footer.php') ?>
<!-- นำเข้าไฟล์ Template js ส่วนท้าย -->
<?PHP include_once('assets/_template/footerjs.php') ?>

</body>
</html>