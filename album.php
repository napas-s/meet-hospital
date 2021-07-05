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
                    <h4>กิจกรรมของเรา</h4>
                </div>
                <!-- นำเข้าไฟล์ หาค่า pagination -->
                <?PHP include_once('assets/_template/pagination/album.php') ?>

                <?PHP if($rows != 0){ ?>
                    <div class="grid-news">
                        <?PHP  while($album = mysqli_fetch_array($nquery)) {  ?>
                            <div class="entry-news clearfix">
                                <div class="entry-image-news">
                                    <?PHP
                                        $sql_des="SELECT * FROM album_des WHERE albumId = $album[album_id] ORDER BY des_status DESC ";
                                        $sql_query_des = mysqli_query($con,$sql_des)or die(mysqli_error($con));
                                        $des = mysqli_fetch_assoc($sql_query_des);
                                    ?>
                                    <?PHP if(count($des) != 0){ ?>
                                        <a href="albumcontent.php?p=<?PHP echo $album['album_id']; ?>"><img class="image_fade" src="<?PHP base_url() ?>uploads/album/<?PHP echo $des['des_img']; ?>" alt="<?PHP echo $album['album_title']; ?>"></a>
                                    <?PHP }else{ ?>
                                        <a href="albumcontent.php?p=<?PHP echo $album['album_id']; ?>"><img class="image_fade" src="<?PHP base_url() ?>assets/images/no-image.jpeg" alt="<?PHP echo $album['album_title']; ?>"></a>
                                    <?PHP } ?>
                                </div>
                                <div class="entry-title">
                                    <a href="albumcontent.php?p=<?PHP echo $album['album_id']; ?>"><?PHP echo $album['album_title']; ?></a>
                                </div>
                                <ul class="entry-meta clearfix" style="margin-left: 0;">
                                    <li><i class="icon-calendar3"></i> <?PHP echo $album['album_updatedate']; ?></li>
                                </ul>
                            </div>
                        <?PHP } ?>
                    </div>
                <?PHP }else{ ?>
                    <div class="center">
                        ยังไม่มีข้อมูล
                    </div>
                <?PHP } ?>

                <?PHP if(!empty($pagination)){ ?>
                <div style="text-align: right;">
                    <ul class="pagination">
                        <?php echo $pagination; ?>
                    </ul>
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