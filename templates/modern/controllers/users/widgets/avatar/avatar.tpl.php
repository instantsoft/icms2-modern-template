<div class="widget_user_avatar navbar-light navbar-aside border">

    <div class="d-flex align-items-center border-bottom bg-light p-3 user_info">

        <div class="mr-3 avatar">
            <a href="<?php echo href_to('users', $user->id); ?>">
                <?php echo html_avatar_image($user->avatar, 'micro', $user->nickname); ?>
            </a>
        </div>

        <div class="name">
            <a href="<?php echo href_to('users', $user->id); ?>">
                <?php html($user->nickname); ?>
            </a>
        </div>

    </div>

    <?php $this->menu( $widget->options['menu'], $widget->options['is_detect'], 'nav px-3 py-2', $widget->options['max_items'] ); ?>

</div>
