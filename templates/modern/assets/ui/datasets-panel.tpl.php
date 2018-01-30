<?php
    if(!isset($ds_prefix)){ $ds_prefix = '/'; }
    // todo Как-нибудь сократить проверку пустых переменных
    if(empty($class_nav)){ $class_nav = ''; }
    if(empty($class_item)){ $class_item = ''; }
    if(empty($class_link)){ $class_link = ''; }
    if(empty($class_desc)){ $class_desc = ''; }
?>
<div class="content_datasets">
    <ul class="<?php echo $class_nav ? $class_nav : 'pills-menu'?>">
        <?php $ds_counter = 0; ?>
        <?php foreach($datasets as $set){ ?>
            <?php $ds_selected = ($dataset_name == $set['name'] || (!$dataset_name && $ds_counter==0)); ?>
            <li class="<?php echo $class_item ? $class_item : 'nav-item'?> <?php if ($ds_selected){ ?>active <?php } ?><?php echo $set['name'].(!empty($set['target_controller']) ? '_'.$set['target_controller'] : ''); ?>">

                <?php $ds_url = sprintf($base_ds_url, ($ds_counter > 0 ? $ds_prefix.$set['name'] : '')); ?>

                <?php if ($ds_selected){ ?>
                    <div class="<?php echo $class_link ? $class_link : 'nav-link'?> active"><?php echo $set['title']; ?></div>
                <?php } else { ?>
                    <a class="<?php echo $class_link ? $class_link : 'nav-link'?>" href="<?php echo $ds_url; ?>"><?php echo $set['title']; ?></a>
                <?php } ?>

            </li>
            <?php $ds_counter++; ?>
        <?php } ?>
    </ul>
</div>
<?php if (!empty($current_dataset['description'])){ ?>
    <div class="content_datasets_description <?php echo $class_desc ? $class_desc : ''?>">
        <?php echo $current_dataset['description']; ?>
    </div>
<?php } ?>