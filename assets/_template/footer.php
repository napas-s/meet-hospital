    <footer id="footer" class="dark">

        <div id="copyrights">

            <div class="container clearfix">
                <div class="col_half">
                    <?PHP if(isset($setting['name_web'])){ ?>
                    Copyrights © 2021 All Rights Reserved by <?PHP echo $setting['name_web']; ?>.<br>
                    <?PHP } ?>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">·</span> <i class="icon-headphones"></i> +91-11-6541-6369
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