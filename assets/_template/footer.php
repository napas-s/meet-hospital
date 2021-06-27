    <footer id="footer" class="dark">

        <div id="copyrights">

            <div class="container clearfix">
                <div class="col_half">
                    <?PHP if(!empty($setting['name_web'])){ ?>
                    Copyrights © 2021 All Rights Reserved by <?PHP echo $setting['name_web']; ?>.<br>
                    <?PHP } ?>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <?PHP if(!empty($setting['facebook'])){ ?>
                            <a target="_bank" href="<?PHP echo $setting['facebook']; ?>" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                        <?PHP } ?>
                        <?PHP if(!empty($setting['twitter'])){ ?>
                            <a target="_bank" href="<?PHP echo $setting['twitter']; ?>" class="social-icon si-small si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                        <?PHP } ?>
                    </div>

                    <div class="clear"></div>
                    <?PHP if(!empty($setting['email'])){ ?><i class="icon-envelope2"></i> <?PHP echo $setting['email']; ?> <span class="middot">·</span><?PHP } ?> <?PHP if(!empty($setting['tel'])){ ?><i class="icon-headphones"></i> <?PHP echo $setting['tel']; ?><?PHP } ?>
                </div>

            </div>

        </div>

    </footer>
    <!-- นำเข้า Canvas js สำหรับตกแต่งเว็บไซต์ -->
    <script type="text/javascript" src="<?PHP echo base_url(); ?>assets/vendor/canvas/js/jquery.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>assets/vendor/canvas/js/plugins.js"></script>
    <script type="text/javascript" src="<?PHP echo base_url(); ?>assets/vendor/canvas/js/functions.js"></script>

    <!-- นำเข้าไฟล์ js -->
    <script src="<?PHP echo base_url(); ?>assets/js/function.js"></script>

</body>
</html>