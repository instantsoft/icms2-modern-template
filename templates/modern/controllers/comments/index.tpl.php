<?php
    $this->setPageTitle($page_title);
    $this->addBreadcrumb(LANG_COMMENTS);
?>
<div class="page-header-rss">
    <h1><?php echo LANG_COMMENTS; ?></h1>
    <?php if ($rss_link){ ?>
        <a class="content_list_rss_icon" href="<?php echo $rss_link; ?>"><i class="fa fa-rss"></i></a>
    <?php } ?>
</div>

<?php if (count($datasets) > 1){
    $this->renderAsset('ui/datasets-panel', array(
        'datasets'        => $datasets,
        'dataset_name'    => $dataset_name,
        'current_dataset' => $dataset,
        'base_ds_url'     => $base_ds_url,
        'class_nav'       => 'nav nav-tabs'
    ));
} ?>

<?php echo $items_list_html;
