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
            <h1>กิจกรรมของเรา</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">หน้าแรก</a></li>
                <li class="active">กิจกรรมของเรา</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix mapabout">
                <div id="posts">

                    <?PHP if(!empty($_GET['p'])){?>
                        <?php
                            $Id = $_GET['p'];
                            $sql="SELECT * FROM album_des WHERE albumId = $Id";
                            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));

                            $sql_album="SELECT * FROM album WHERE album_id = $Id AND album_status = '1'";
                            $sql_query_album = mysqli_query($con,$sql_album)or die(mysqli_error($con));
                            $album = mysqli_fetch_assoc($sql_query_album);
                        ?>
                        <div class="col_full nobottommargin clearfix">

                            <h3><?PHP echo $album['album_title'] ?></h3>
                            <?PHP if(!empty($album['album_detail'])){ ?>
                                <div><?PHP echo $album['album_detail'] ?></div>
                                <br/>
                            <?PHP } ?>

                            <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
                                <?PHP  while($des = mysqli_fetch_array($sql_query)) {  ?>
                                    <a href="<?PHP base_url() ?>uploads/album/<?PHP echo $des['des_img']; ?>" data-lightbox="gallery-item"><img class="image_fade lazyload" loading="lazy" data-src="<?PHP base_url() ?>uploads/album/<?PHP echo $des['des_img']; ?>" alt="<?PHP echo $des['des_img']; ?>"></a>
                                <?PHP } ?>
                            </div>

                            <br/>
                            <br/>
                            <ul class="pager nomargin">
                                <li class="previous"><a href="album.php">← ย้อนกลับ</a></li>
                            </ul>

                        </div>

                    <?PHP }else{ ?>
                        <div class="center">
                            ยังไม่มีข้อมูล
                        </div>
                    <?PHP } ?>

				</div>
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