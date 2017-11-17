<?php
    $this->addMenuItems('group_tabs', $this->controller->getGroupEditMenu($group));
?>

<div id="group_profile_tabs">
    <div class="tabs-menu">
        <?php $this->menu('group_tabs', true, 'nav nav-tabs mb-3'); ?>
    </div>
</div>