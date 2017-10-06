<?php
    $config = cmsConfig::getInstance();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo ERR_FORBIDDEN; ?></title>
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/system.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/theme.css">
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/jquery-modal.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/core.js"></script>
    <script type="text/javascript" src="<?php echo $config->root; ?>templates/default/js/modal.js"></script>
</head>
<body>
    <div id="error404" class="h-100 d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="text-center">
                <h1 class="display-3">403</h1>
                <hr>
                <h2 class="mb-3"><?php echo ERR_FORBIDDEN; ?></h2>
                <?php if($message){ ?>
                    <h3><?php echo $message; ?></h3>
                <?php } ?>
                <div><a class="btn btn-secondary btn-block" href="<?php echo $config->root; ?>"><?php echo LANG_BACK_TO_HOME; ?></a></div>
            </div>
        </div>
    </div>
    <?php if($show_login_link){ ?>
        <div id="error-maintenance-footer" class="fixed-bottom text-center pb-2">
            <span>
                <a class="ajaxlink ajax-modal btn btn-link" title="<?php echo LANG_LOGIN_ADMIN; ?>" href="<?php echo href_to('auth', 'login'); ?>">
                    <i class="fa fa-key"></i>
                    <?php echo LANG_LOGIN_ADMIN; ?>
                </a>
            </span>
        </div>
    <?php } ?>
</body>
