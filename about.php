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
                <div>
                    <h3 class="c-text">ข้อมูลเกี่ยวกับองค์กร</h3>
                </div>
                    <?php
                        $sql="SELECT * FROM about WHERE about_type = '1' AND about_status = '1'";
                        $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($sql_query);
                    ?>

                    <?PHP if(isset($row)){ ?>
                        <?PHP if($row['about_lavel'] == 1){ ?>
                            <?PHP echo $row['about_content']; ?>
                        <?PHP }else{ ?>
                            <div class="center">
                                <img style="width: 100%; height: auto" src="<?PHP base_url() ?>uploads/about/<?PHP echo $row['about_img']; ?>" alt="about image" />
                            </div>
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