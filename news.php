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
            <h1>ข่าวสารและประชาสัมพันธ์</h1>
            <ol class="breadcrumb">
                <li><a href="index.php">หน้าแรก</a></li>
                <li class="active">ข่าวสารและประชาสัมพันธ์</li>
            </ol>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix mapabout">
                <!-- นำเข้าไฟล์ หาค่า pagination -->
                <?PHP include_once('assets/_template/pagination/news.php') ?>

                <?PHP if($rows != 0){ ?>
                    <div class="grid-news">
                        <?PHP  while($news = mysqli_fetch_array($nquery)) {  ?>
                            <div class="entry-news clearfix">
                                <div class="entry-image-news">
                                    <?PHP if(!empty($news['news_img_cover'])){ ?>
                                        <a href="newscontent.php?p=<?PHP echo $news['news_id']; ?>"><img class="image_fade" src="<?PHP base_url() ?>uploads/news/<?PHP echo $news['news_img_cover']; ?>" alt="<?PHP echo $news['news_title']; ?>"></a>
                                    <?PHP }else{ ?>
                                        <a href="newscontent.php?p=<?PHP echo $news['news_id']; ?>"><img class="image_fade" src="<?PHP base_url() ?>assets/images/no-image.jpeg" alt="<?PHP echo $news['news_title']; ?>"></a>
                                    <?PHP } ?>
                                </div>
                                <div class="entry-title">
                                    <a href="newscontent.php?p=<?PHP echo $news['news_id']; ?>"><?PHP echo $news['news_title']; ?></a>
                                </div>
                                <ul class="entry-meta clearfix" style="margin-left: 0;">
                                    <li><i class="icon-calendar3"></i> <?PHP echo $news['news_updatedate']; ?></li>
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