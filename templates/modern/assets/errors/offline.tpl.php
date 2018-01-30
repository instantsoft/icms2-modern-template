<?php
    $config = cmsConfig::getInstance();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo ERR_SITE_OFFLINE; ?> &mdash; <?php echo $config->sitename; ?></title>
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/system.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/theme.css">
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/jquery-modal.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/core.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/modal.js"></script>
</head>
<body>

    <?php
    $messages = cmsUser::getSessionMessages();
    if ($messages){ ?>
        <div class="sess_messages">
            <?php foreach($messages as $message){ ?>
                <div class="<?php echo $message['class']; ?>"><?php echo $message['text']; ?></div>
             <?php } ?>
        </div>
    <?php } ?>

    <div id="error-maintenance" class="d-flex h-100 align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="text-center">
                <i class="fa fa-wrench display-3" aria-hidden="true"></i>
                <h1><?php echo ERR_SITE_OFFLINE; ?></h1>
                <?php if ($reason) { ?>
                    <p class="h5"><?php echo $reason; ?></p>
                <?php } ?>
                <hr>
                <a class="ajaxlink ajax-modal btn btn-secondary" href="<?php echo href_to('auth', 'login'); ?>"><?php echo LANG_LOGIN_ADMIN; ?></a>
            </div>
        </div>
    </div>
</body>
