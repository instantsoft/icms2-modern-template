<?php
$config = cmsConfig::getInstance();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo ERR_PAGE_NOT_FOUND; ?></title>
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/system.css">
    <link type="text/css" rel="stylesheet" href="<?php echo $config->root; ?>templates/modern/css/theme.css">
</head>
<body>
<div id="error404" class="h-100 d-flex align-items-center">
    <div class="container d-flex justify-content-center">
        <div class="text-center">
            <h1 class="display-3">404</h1>
            <hr>
            <h2 class="mb-3"><?php echo ERR_PAGE_NOT_FOUND; ?></h2>
            <form action="<?php echo href_to('search'); ?>" method="get" class="mb-3">
                <div class="input-group">
                    <?php echo html_input('text', 'q', '', array('placeholder' => ERR_SEARCH_QUERY_INPUT)); ?>
                    <span class="input-group-btn">
                        <button type="submit" name="submit" class="button-submit btn btn-secondary"><?php echo ERR_SEARCH_TITLE; ?></button>
                    </span>
                </div>
            </form>

            <p><a class="btn btn-secondary btn-block" href="<?php echo $config->root; ?>"><?php echo LANG_BACK_TO_HOME; ?></a></p>
        </div>
    </div>
</div>

</body>
