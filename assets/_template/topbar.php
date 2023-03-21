
<div id="top-bar">
    <div class="container clearfix">
        <div class="col_half nobottommargin">
            <?PHP if(isset($setting_temp['logo_web'])){ ?>
                <img src="<?PHP echo base_url(); ?>uploads/setting/<?PHP echo $setting_temp['logo_web']; ?>" alt="" class="img-topnav" />
            <?PHP } ?>
        </div>
        <div class="col_half fright col_last nobottommargin">
            <?PHP if(isset($setting_temp['name_web'])){ ?>
                <?PHP echo $setting_temp['name_web']; ?>
            <?PHP } ?>
        </div>
    </div>
</div>