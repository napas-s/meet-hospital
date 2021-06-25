
<div id="top-bar">
    <div class="container clearfix">
        <div class="col_half nobottommargin">
            <?PHP if(isset($setting['logo_web'])){ ?>
                <img src="<?PHP echo base_url(); ?>uploads/setting/<?PHP echo $setting['logo_web']; ?>" alt="" class="img-topnav" />
            <?PHP } ?>
        </div>
        <div class="col_half fright col_last nobottommargin">
            <?PHP if(isset($setting['name_web'])){ ?>
                <?PHP echo $setting['name_web']; ?>
            <?PHP } ?>
        </div>
    </div>
</div>