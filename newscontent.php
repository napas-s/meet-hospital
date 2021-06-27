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
                <div id="posts">

                    <?PHP if(!empty($_GET['p'])){?>
                        <?php
                            $Id = $_GET['p'];
                            $sql="SELECT * FROM news WHERE news_id = $Id AND news_status = '1'";
                            $sql_query = mysqli_query($con,$sql)or die(mysqli_error($con));
                            $row = mysqli_fetch_assoc($sql_query);
                        ?>
                        <div class="entry clearfix">

                            <div class="entry-image">
                                <?PHP if(!empty($row['news_img_cover'])){ ?>
                                    <img  src="<?PHP base_url() ?>uploads/news/<?PHP echo $row['news_img_cover']; ?>" alt="<?PHP echo $row['news_title']; ?>">
                                <?PHP }else{ ?>
                                    <img class="content-img" src="<?PHP base_url() ?>assets/images/no-image.jpeg" alt="<?PHP echo $row['news_title']; ?>">
                                <?PHP } ?>
                            </div>

                            <div class="entry-title">
                                <h2><?PHP echo $row['news_title']; ?></h2>
                            </div>

                            <ul class="entry-meta clearfix" style="margin-left: 0px;">
                                <li><i class="icon-calendar3"></i> <?PHP echo $row['news_updatedate'];?></li>
                                <li><i class="icon-user"></i> <?PHP echo $row['news_updateby'];?></li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="entry-content notopmargin">
                                <?PHP echo $row['news_content']; ?>
                            </div>

                            <ul class="pager nomargin">
                                <li class="previous"><a href="news.php">← ย้อนกลับ</a></li>
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