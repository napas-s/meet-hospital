<!-- นำเข้าไฟล์ Template ส่วนหัว -->
<?PHP include_once('assets/_template/headder.php') ?>

<!-- เนื้อหาของหน้า -->
<div id="wrapper" class="clearfix">

    <!-- นำเข้าไฟล์ Template ส่วนหัวบนเมนู -->
    <?PHP include_once('assets/_template/topbar.php') ?>
    <!-- นำเข้าไฟล์ Template ส่วนเมนู -->
    <?PHP include_once('assets/_template/navbar.php') ?>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix mapabout">
                    <div class="heading-block center">
                        <h4>การเดินทาง</h4>
                    </div>
                    <?php
                        $sql="SELECT * FROM about WHERE about_type = '3' AND about_status = '1'";
                        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($sql_query);
                    ?>

                    <?PHP if(!empty($setting['tel'])){ ?>
                        <div style="margin-bottom:20px"><strong>เบอร์โทรศัพท์ : <a href="tel:<?PHP echo $setting['tel']; ?>"><?PHP echo $setting['tel']; ?></a></strong></div>
                    <?PHP } ?>
                    <?PHP if(!empty($setting['email'])){ ?>
                        <div style="margin-bottom:20px"><strong>อีเมล : <a href="mailto:<?PHP echo $setting['email']; ?>"><?PHP echo $setting['email']; ?></a></strong></div>
                    <?PHP } ?>
                    <?PHP if(!empty($setting['tel'])){ ?>
                        <a href="tel:<?PHP echo $setting['tel']; ?>" class="social-icon inline-block si-rounded si-light si-call" title="Call">
							<i class="icon-call"></i>
							<i class="icon-call"></i>
						</a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting['email'])){ ?>
                        <a href="mailto:<?PHP echo $setting['email']; ?>" class="social-icon inline-block si-rounded si-light si-email3" title="Email">
							<i class="icon-email3"></i>
							<i class="icon-email3"></i>
						</a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting['facebook'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting['facebook']; ?>" class="social-icon inline-block si-light si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting['twitter'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting['twitter']; ?>"  class="social-icon inline-block si-light si-rounded si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    <?PHP } ?>

                    <?PHP if(isset($row)){ ?>
                        <br/>
                        <?PHP if($row['about_lavel'] == 1){ ?>
                            <?PHP echo $row['about_content']; ?>
                        <?PHP }else if($row['about_lavel'] == 2){ ?>
                            <div class="center">
                                <img style="width: 100%; height: auto" src="<?PHP base_url() ?>uploads/about/<?PHP echo $row['about_img']; ?>" alt="about image" />
                            </div>
                        <?PHP }else{ ?>
                            <?PHP echo $row['about_content_googlemap']; ?>
                            <br/>
                            <?PHP echo $row['about_googlemap']; ?>
                        <?PHP } ?>
                    <?PHP }else{ ?>
                        <div class="center">
                            ยังไม่มีข้อมูล
                        </div>
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