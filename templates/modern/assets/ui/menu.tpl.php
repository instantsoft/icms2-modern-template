<ul class="<?php echo $css_class; ?>">

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

            $css_classes = array();
            $css_classes_link = array();
            $css_classes_dropdown = 'ldropdown-menu';

            if ($item['childs_count'] > 0) { $css_classes[] = 'ldropdown'; }

            if ($item['level'] == 1) {
                $css_classes[] = 'nav-item';
                $css_classes_link[] = 'nav-link';
            }
            if ($item['level'] > 1) {
                $css_classes_link[] = 'ldropdown-item';
            }

            if ($is_active) { $css_classes_link[] = 'active'; }
            if (!empty($item['options']['class'])) { $css_classes[] = $item['options']['class']; }

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

        <li <?php if ($css_classes) { ?>class="<?php echo implode(' ', $css_classes); ?>"<?php } ?>>
            <?php if ($item['disabled']) { ?>
                <span class="item disabled"><?php html($item['title']); ?></span>
            <?php } else { ?>
                <a <?php if (!empty($item['title'])) {?>title="<?php echo html($item['title']); ?>"<?php } ?> <?php if ($css_classes_link) { ?>class="<?php echo implode(' ', $css_classes_link); ?>"<?php } ?> <?php echo $data_attr; ?> href="<?php echo !empty($item['url']) ? htmlspecialchars($item['url']) : 'javascript:void(0)'; ?>" <?php if ($onclick) { ?>onclick="<?php echo $onclick; ?>"<?php } ?> <?php if ($target) { ?>target="<?php echo $target; ?>"<?php } ?>>
                    <span class="wrap">
                        <?php if (!empty($item['title'])) { html($item['title']); } ?>
                        <?php if (isset($item['counter']) && $item['counter']){ ?>
                            <span class="counter"><?php html($item['counter']); ?></span>
                        <?php } ?>
                    </span>
                </a>
            <?php } ?>

            <?php if ($item['childs_count'] > 0) { ?><ul class="<?echo $css_classes_dropdown; ?>"><?php } ?>

        <?php $last_level = $item['level']; ?>

    <?php } ?>

    <?php for ($i=0; $i<$last_level; $i++) { ?>
        </li></ul>
    <?php } ?>