<div class='menubar'>
    <div class='menubar-title ui-widget-header'>
        <div class='menubar-title-left'>
            <strong><?php eT("Administration");?></strong>
            <?php
                if(App()->user->id)
                { ?>
                --  <?php eT("Logged in as:");?><strong>
                    <a href="<?php echo $this->createUrl("/admin/user/sa/personalsettings"); ?>">
                        <?php echo Yii::app()->session['user'];?> <img src='<?php echo $sImageURL;?>profile_edit.png' alt='<?php eT("Edit your personal preferences");?>' /></a>
                </strong>
                <?php } ?>
        </div>
        <?php
            if($showupdate)
            { ?>
            <div class='menubar-title-right'><a href='<?php echo $this->createUrl("admin/globalsettings");?>'><?php echo sprintf(ngT('Update available: %s|Updates available: %s',count($aUpdateVersions)),$sUpdateText);?></a></div>
            <?php } ?>
    </div>
    <div class='menubar-main'>
        <div class='menubar-left'>
            <a href="<?php echo $this->createUrl("/admin/survey/sa/index"); ?>">
                <img src='<?php echo $sImageURL;?>home.png' alt='<?php eT("Default administration page");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>

            <img src='<?php echo $sImageURL;?>blank.gif' alt='' width='11' />
            <img src='<?php echo $sImageURL;?>separator.gif' id='separator1' class='separator' alt='' />

            <?php
                if(App()->user->checkAccess('users'))
                {?>
                <a href="<?php echo $this->createUrl("admin/user/sa/index"); ?>">
                    <img src='<?php echo $sImageURL;?>security.png' alt='<?php eT("Manage survey administrators");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php
                };
                if(App()->user->checkAccess('usergroups'))
                {?>
                <a href="<?php echo $this->createUrl("admin/usergroups/sa/index"); ?>">
                    <img src='<?php echo $sImageURL;?>usergroup.png' alt='<?php eT("Create/edit user groups");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php
                }
                if(App()->user->checkAccess('settings'))
                { ?>
                <a href="<?php echo $this->createUrl("admin/globalsettings"); ?>">
                    <img src='<?php echo $sImageURL;?>global.png' alt='<?php eT("Global settings");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <img src='<?php echo $sImageURL;?>separator.gif' class='separator' alt='' />
                <?php }
                if(App()->user->checkAccess('settings'))
                { ?>
                <a href="<?php echo $this->createUrl("admin/checkintegrity"); ?>">
                    <img src='<?php echo $sImageURL;?>checkdb.png' alt='<?php eT("Check Data Integrity");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php
                }
                if(App()->user->checkAccess('superadmin'))
                {

                    if (in_array(Yii::app()->db->getDriverName(), array('mysql', 'mysqli')) || Yii::app()->getConfig('demoMode') == true)
                    {

                    ?>

                    <a href="<?php echo $this->createUrl("admin/dumpdb"); ?>" >
                        <img src='<?php echo $sImageURL;?>backup.png' alt='<?php eT("Backup Entire Database");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/>
                    </a>

                    <?php } else { ?>
                    <img src='<?php echo $sImageURL; ?>backup_disabled.png' alt='<?php eT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump."); ?>' />
                    <?php } ?>

                <img src='<?php echo $sImageURL; ?>separator.gif' class='separator' alt='' />

                <?php
                }
                if(App()->user->checkAccess('labelsets'))
                {
                ?>

                <a href="<?php echo $this->createUrl("admin/labels/sa/view"); ?>" >
                    <img src='<?php echo $sImageURL;?>labels.png'  alt='<?php eT("Edit label sets");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <img src='<?php echo $sImageURL;?>separator.gif' class='separator' alt='' />
                <?php }
                if(App()->user->checkAccess('templates'))
                { ?>
                <a href="<?php echo $this->createUrl("admin/templates/sa/view"); ?>">
                    <img src='<?php echo $sImageURL;?>templates.png' alt='<?php eT("Template Editor");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php } ?>
            <img src='<?php echo $sImageURL;?>separator.gif' class='separator' alt='' />
            <?php
                if(App()->user->checkAccess('participantpanel'))
                { 	 ?>
                <a href="<?php echo $this->createUrl("admin/participants/sa/index"); ?>" >
                    <img src='<?php echo $sImageURL;?>cpdb.png' alt='<?php eT("Central participant database/panel");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php }
                if(App()->user->checkAccess('superadmin'))
                {   ?>
            <a href="<?php echo $this->createUrl("plugins/"); ?>" >
                <img src='<?php echo $sImageURL;?>plugin.png' alt='<?php eT("Plugin manager");?>' width='<?php echo $iconsize;?>' height='<?php echo $iconsize;?>'/></a>
                <?php }?>
        </div>
        <div class='menubar-right'>
            <label for='surveylist'><?php eT("Surveys:");?></label>
            <select id='surveylist' name='surveylist' onchange="if (this.options[this.selectedIndex].value!='') {window.open('<?php echo $this->createUrl("/admin/survey/sa/view/surveyid/"); ?>/'+this.options[this.selectedIndex].value,'_top')} else {window.open('<?php echo $this->createUrl("/admin/survey/sa/index/");?>','_top')}">
                <?php echo getSurveyList(false, $surveyid); ?>
            </select>
            <a href="<?php echo $this->createUrl("admin/survey/sa/index"); ?>">
                <img src='<?php echo $sImageURL;?>surveylist.png' alt='<?php eT("Detailed list of surveys");?>' />
            </a>

            <?php
                if (App()->user->checkAccess('surveys', ['crud' => 'create']))
                { ?>

                <a href="<?php echo $this->createUrl("admin/survey/sa/newsurvey"); ?>">
                    <img src='<?php echo $sImageURL;?>add.png' alt='<?php eT("Create, import, or copy a survey");?>' /></a>
                <?php } ?>


            <img id='separator2' src='<?php echo $sImageURL;?>separator.gif' class='separator' alt='' />
            <a href="<?php echo App()->createUrl('users/logout'); ?>" >
                <img src='<?php echo $sImageURL;?>logout.png' alt='<?php eT("Logout");?>' /></a>

            <a href="http://manual.limesurvey.org" target="_blank">
                <img src='<?php echo $sImageURL;?>showhelp.png' alt='<?php eT("LimeSurvey online manual");?>' /></a>
        </div>
    </div>
</div>
<p style='margin:0;font-size:1px;line-height:1px;height:1px;'>&nbsp;</p>
