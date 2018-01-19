<div class="navbar navbar-light bg-light navbar-aside">
<ul class="navbar-nav <?php echo $css_class; ?>">

    <?php $last_level = 0; ?>

    <?php foreach($menu as $id=>$item){ ?>

        <?php for ($i=0; $i<($last_level - $item['level']); $i++) { ?>
            </li></ul>
        <?php } ?>

        <?php if ($item['level'] <= $last_level) { ?>
            </li>
        <?php } ?>

        <?php

            $is_active = in_array($id, $active_ids);

            $nav_item = array();
            $nav_link = array();
            $dropdown = 'dropdown-menu';

            if ($item['childs_count'] > 0) {
                $nav_item[] = 'dropdown dropdown-level-'. $item['level'];
                $nav_link[] = 'dropdown-toggle';
            }

            if ($item['level'] == 1) {
                $nav_item[] = 'nav-item';
                $nav_link[] = 'nav-link';
            }
            if ($item['level'] > 1) {
                $nav_link[] = 'dropdown-item';
            }

            if ($is_active) { $nav_link[] = 'active'; }
            if (!empty($item['options']['class'])) { $nav_item[] = $item['options']['class']; }

            $onclick = isset($item['options']['onclick']) ? $item['options']['onclick'] : false;
            $onclick = isset($item['options']['confirm']) ? "return confirm('{$item['options']['confirm']}')" : $onclick;

            $target = isset($item['options']['target']) ? $item['options']['target'] : false;
            $data_attr = '';
            if (!empty($item['data'])) {
                foreach ($item['data'] as $key=>$val) {
                    $data_attr .= 'data-'.$key.'="'.$val.'" ';
                }
            }

        ?>

        <li <?php if ($nav_item) { ?>class="<?php echo implode(' ', $nav_item); ?>"<?php } ?>>
            <?php if ($item['disabled']) { ?>
                <span class="item disabled"><?php html($item['title']); ?></span>
            <?php } else { ?>
                <a <?php if (!empty($item['title'])) { ?><?php } ?>
                   <?php if ($nav_link) { ?>class="<?php echo implode(' ', $nav_link); ?>"<?php } ?> <?php echo $data_attr; ?>
                   href="<?php echo !empty($item['url']) ? htmlspecialchars($item['url']) : 'javascript:void(0)'; ?>"
                   <?php if ($onclick) { ?>onclick="<?php echo $onclick; ?>"<?php } ?>
                   <?php if ($target) { ?>target="<?php echo $target; ?>"<?php } ?>>
                    <span class="wrap">
                        <?php if (!empty($item['title'])) { html($item['title']); } ?>
                        <?php if (isset($item['counter']) && $item['counter']){ ?>
                            <span class="counter"><?php html($item['counter']); ?></span>
                        <?php } ?>
                    </span>
                </a>
            <?php } ?>

            <?php if ($item['childs_count'] > 0) { ?><ul class="<?echo $dropdown; ?>"><?php } ?>

        <?php $last_level = $item['level']; ?>

    <?php } ?>

    <?php for ($i=0; $i<$last_level; $i++) { ?>
        </li></ul>
    <?php } ?>
</div>
