<?php $core = cmsCore::getInstance(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php $this->title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php $this->addMainCSS("templates/{$this->name}/css/system.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/theme.css"); ?>
    <?php $this->addMainCSS("templates/default/css/theme-modal.css"); ?>
    <?php $this->addMainJS("templates/default/js/jquery.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/theme.js"); ?>
    <?php $this->addMainJS("templates/default/js/jquery-modal.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/core.js"); ?>
    <?php $this->addMainJS("templates/default/js/modal.js"); ?>
    <?php if (cmsUser::isLogged()){ ?>
        <?php $this->addMainJS("templates/default/js/messages.js"); ?>
    <?php } ?>
    <?php $this->head(); ?>
    <meta name="csrf-token" content="<?php echo cmsForm::getCSRFToken(); ?>" />
    <style><?php include('options.css.php'); ?></style>
</head>
<body id="<?php echo $device_type; ?>_device_type" data-device="<?php echo $device_type; ?>">
    <div id="layout">
        <?php if (!$config->is_site_on){ ?>
            <div id="site_off_notice">
                <?php if (cmsUser::isAdmin()){ ?>
                    <?php printf(ERR_SITE_OFFLINE_FULL, href_to('admin', 'settings', 'siteon')); ?>
                <?php } else { ?>
                    <?php echo ERR_SITE_OFFLINE; ?>
                <?php } ?>
            </div>
        <?php } ?>

        <header class="d-none">
            <div class="container">
                <div class="widget_ajax_wrap" id="widget_pos_header"><?php $this->widgets('header', false, 'wrapper_plain'); ?></div>
                <?php
                    !$this->hasWidgetsOn('header_left') ? $if_header_left_off = 'offset-lg-6': '' ;
                ?>
                <div class="row mt-4">
                    <div class="col-lg-6 mb-4 widget_ajax_wrap" id="widget_pos_header_left">
                        <?php $this->widgets('header_left', false, 'wrapper_plain'); ?>
                    </div>
                    <div class="col-lg-6 mb-4 <?php echo $if_header_left_off; ?> widget_ajax_wrap" id="widget_pos_header_right">
                        <?php $this->widgets('header_right', false, 'wrapper_plain'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div id="logo">
                            <?php if ($core->uri) { ?>
                                <a href="<?php echo href_to_home(); ?>"></a>
                            <?php } else { ?>
                                <div class="bg-faded px-5 py-4">LOGO</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-4 widget_ajax_wrap" id="widget_pos_header_bottom">
                        <?php $this->widgets('header_bottom', false, 'wrapper_plain'); ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-8">
                    <?php if ($config->show_breadcrumbs && $core->uri && $this->isBreadcrumbs()){ ?>
                        <div id="breadcrumbs">
                            <?php $this->breadcrumbs(array('strip_last'=>false)); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 widget_ajax_wrap" id="widget_pos_header_bottom">
                    <?php $this->widgets('header_bottom', false, 'wrapper_plain'); ?>
                </div>
            </div>
        </div>

        <div id="body">
            <div class="container">
                <div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_maintop_fullwidth_top">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <a class="navbar-brand d-lg-none" href="#">
                                <?php html($this->options['owner_name'] ? $this->options['owner_name'] : cmsConfig::get('sitename')); ?>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php $this->widgets('maintop_fullwidth_top'); ?>
                            </div>
                        </nav>
                    </div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_maintop_fullwidth_center"><?php $this->widgets('maintop_fullwidth_center'); ?></div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_maintop_fullwidth_bottom"><?php $this->widgets('maintop_fullwidth_bottom'); ?></div>
                </div>
                <?php
                $messages = cmsUser::getSessionMessages();
                if ($messages){ ?>
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php foreach($messages as $message){ ?>
                            <div class="<?php echo $message['class']; ?>"><?php echo $message['text']; ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="row">
                <?php
                    $is_left_aside = $this->hasWidgetsOn('left_top', 'left_center', 'left_bottom');
                    $is_right_aside = $this->hasWidgetsOn('right_top', 'right_center', 'right_bottom');
                    if ($is_left_aside && $is_right_aside) {
                        $section_class = 'col-lg-6';
                    } else if ($is_left_aside || $is_right_aside) {
                        $section_class = 'col-lg-9';
                    } else {
                        $section_class = 'col-lg-12';
                    }
                ?>
                <section class="<?php echo $section_class; ?> mb-4">

                    <div class="widget_ajax_wrap mb-4" id="widget_pos_body_top"><?php $this->widgets('body_top'); ?></div>

                    <?php if ($this->isBody()){ ?>
                        <article class="mb-4">
                            <div id="controller_wrap"><?php $this->body(); ?></div>
                        </article>
                    <?php } ?>

                    <div class="widget_ajax_wrap mb-4" id="widget_pos_body-bottom"><?php $this->widgets('body_bottom'); ?></div>

                </section>

                <?php if($is_left_aside){ ?>
                    <aside class="col-lg-3 flex-first mb-4">
                        <div class="widget_ajax_wrap" id="widget_pos_right_top"><?php $this->widgets('right_top'); ?></div>
                        <div class="widget_ajax_wrap" id="widget_pos_right_center"><?php $this->widgets('right_center'); ?></div>
                        <div class="widget_ajax_wrap" id="widget_pos_right_bottom"><?php $this->widgets('right_bottom'); ?></div>
                    </aside>
                <?php } ?>
                <?php if($is_right_aside){ ?>
                    <aside class="col-lg-3 mb-4">
                        <div class="widget_ajax_wrap" id="widget_pos_right_top"><?php $this->widgets('right_top'); ?></div>
                        <div class="widget_ajax_wrap" id="widget_pos_right_center"><?php $this->widgets('right_center'); ?></div>
                        <div class="widget_ajax_wrap" id="widget_pos_right_bottom"><?php $this->widgets('right_bottom'); ?></div>
                    </aside>
                <?php } ?>
                </div>
                <div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_mainbottom_fullwidth_top"><?php $this->widgets('mainbottom-fullwidth_top'); ?></div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_mainbottom_fullwidth_center"><?php $this->widgets('mainbottom-fullwidth_center'); ?></div>
                    <div class="widget_ajax_wrap mb-4" id="widget_pos_mainbottom_fullwidth_bottom"><?php $this->widgets('mainbottom-fullwidth_bottom'); ?></div>
                </div>
            </div>
        </div>

    </div>
    <footer >
        <div class="container mb-4">
            <div class="widget_ajax_wrap" id="widget_pos_footer"><?php $this->widgets('footer'); ?></div>
        </div>
        <div class="container d-flex align-items-center bg-light py-3">

            <ul class="nav mr-auto">
                <li class="nav-item" id="copyright">
                    <span class="navbar-text px-lg-2">
                        <a href="<?php echo $this->options['owner_url'] ? $this->options['owner_url'] : href_to_home(); ?>">
                            <?php html($this->options['owner_name'] ? $this->options['owner_name'] : cmsConfig::get('sitename')); ?></a>
                        &copy;
                        <?php echo $this->options['owner_year'] ? $this->options['owner_year'] : date('Y'); ?>
                    </span>
                </li>
                <li class="nav-item" id="info">
                    <span class="navbar-text px-lg-2">

                        <span class="item powered_by">
                            <?php echo LANG_POWERED_BY_INSTANTCMS; ?>
                        </span>

                        <?php if ($config->debug && cmsUser::isAdmin()) { ?>

                            <?php $debug = cmsDebugging::getPointsTargets(); ?>

                            <span class="item debug_block">
                                <a href="#debug_block" title="<?php echo LANG_DEBUG; ?>" data-toggle="modal"><?php echo LANG_DEBUG; ?></a>
                            </span>

                            <span class="item debug_sql">
                                SQL: <?php echo $debug['db']['count']; ?>
                            </span>

                            <span class="item debug_events">
                                Events: <?php echo $debug['events']['count']; ?>
                            </span>

                            <span class="item debug_time">
                                Time: <?php echo cmsDebugging::getTime('cms', 4); ?> s
                            </span>

                            <span class="item debug_mem">
                                Mem: <?php echo round(memory_get_usage(true)/1024/1024, 2); ?> Mb
                            </span>

                        <?php } ?>

                    </span>
                </li>
            </ul>
            <div class="widget_ajax_wrap" id="widget_pos_footer_nav"><?php $this->widgets('footer_nav', false, 'wrapper_plain'); ?></div>
        </div>
    </footer>

    <?php if ($config->debug && cmsUser::isAdmin()){ ?>
        <div id="debug_block" class="modal fade" role="dialog" aria-hidden="true">
            <?php $this->renderAsset('ui/debug', array('core' => $core)); ?>
        </div>
    <?php } ?>

</body>
</html>