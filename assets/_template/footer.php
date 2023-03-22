<footer id="footer" class="dark">

    <div id="copyrights">

        <div class="container clearfix">
            <div class="col_half">
                <?PHP if(!empty($setting_temp['name_web'])){ ?>
                Copyrights © 2021 All Rights Reserved by <?PHP echo $setting_temp['name_web']; ?>.<br>
                <?PHP } ?>
                <!-- <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div> -->
            </div>

            <div class="col_half col_last tright">
                <div class="fright clearfix">
                    <?PHP if(!empty($setting_temp['facebook'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting_temp['facebook']; ?>" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    <?PHP } ?>
                    <?PHP if(!empty($setting_temp['twitter'])){ ?>
                        <a target="_bank" href="<?PHP echo $setting_temp['twitter']; ?>" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    <?PHP } ?>
                </div>

                <div class="clear"></div>
                <?PHP if(!empty($setting_temp['email'])){ ?><i class="icon-envelope2"></i> <?PHP echo $setting_temp['email']; ?> <span class="middot">·</span><?PHP } ?> <?PHP if(!empty($setting_temp['tel'])){ ?><i class="icon-headphones"></i> <?PHP echo $setting_temp['tel']; ?><?PHP } ?>
            </div>

        </div>

    </div>

</footer>