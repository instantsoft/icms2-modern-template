<?php
    if( $ctype['options']['list_show_filter'] ) {
        $this->renderAsset('ui/filter-panel', array(
            'css_prefix'   => $ctype['name'],
            'page_url'     => $page_url,
            'fields'       => $fields,
            'props_fields' => $props_fields,
            'props'        => $props,
            'filters'      => $filters,
            'ext_hidden_params' => $ext_hidden_params,
            'is_expanded'  => $ctype['options']['list_expand_filter']
        ));
    }
?>

<?php if ($items){ ?>

    <div class="row content_list tiled <?php echo $ctype['name']; ?>_list">

        <?php foreach($items as $item){ ?>

            <?php $stop = 0; ?>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card h-100 tile <?php echo $ctype['name']; ?>_list_item<?php if (!empty($item['is_vip'])){ ?> is_vip<?php } ?>">

                <?php if (!empty($item['fields']['photo'])){ ?>
                    <?php $preset = $fields['photo']['options']['size_teaser']; ?>
                    <div class="photo hover-parent card-img-top" style="background-image: url(<?php echo html_image_src((empty($item['is_private_item']) ? $item['photo'] : default_images('private', $preset)), $preset, true); ?>);">
                        <?php if ($fields['date_pub']['is_in_list']){ ?>
                            <div class="hover-child position-absolute pos-b pos-l pos-r bg-opacity-4 text-white px-3 py-2" title="<?php echo $fields['date_pub']['title']; ?>">
                                <i class="fa fa-calendar"></i>
                                <?php echo $fields['date_pub']['handler']->parse( $item['date_pub'] ); ?>
                            </div>
                        <?php } ?>
                        <?php if (empty($item['is_private_item'])) { ?>
                            <a href="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>" class="photo-link">
                                <?php echo html_image($item['photo'], $preset, $item['title']); ?>
                            </a>
                        <?php } ?>
                        <?php unset($item['fields']['photo']); ?>
                    </div>
                <?php } ?>

                <div class="fields card-body p-3">

                <?php foreach($item['fields'] as $field){ ?>

                    <?php if ($stop === 2) { break; } ?>

                    <div class="field ft_<?php echo $field['type']; ?> f_<?php echo $field['name']; ?>">

                        <?php if ($field['label_pos'] != 'none'){ ?>
                            <div class="title_<?php echo $field['label_pos']; ?>">
                                <?php echo $field['title'] . ($field['label_pos']=='left' ? ': ' : ''); ?>
                            </div>
                        <?php } ?>

                        <?php if ($field['name'] == 'title' && $ctype['options']['item_on']){ ?>
                            <h2 class="value field-title-h">
                                <?php if ($item['parent_id']){ ?>
                                    <a class="parent_title text-dark" href="<?php echo rel_to_href($item['parent_url']); ?>"><?php html($item['parent_title']); ?></a>
                                    &rarr;
                                <?php } ?>
                                <?php if (!empty($item['is_private_item'])) { $stop++; ?>
                                    <?php html($item[$field['name']]); ?> <span class="is_private" title="<?php html($item['private_item_hint']); ?>"></span>
                                <?php } else { ?>
                                    <a class="title text-dark" href="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>">
                                        <?php html($item[$field['name']]); ?>
                                    </a>
                                    <?php if ($item['is_private']) { ?>
                                        <span class="is_private" title="<?php html(LANG_PRIVACY_HINT); ?>"></span>
                                    <?php } ?>
                                <?php } ?>
                            </h2>
                        <?php } else { ?>
                            <div class="value">
                                <?php if (!empty($item['is_private_item'])) { ?>
                                    <div class="private_field_hint"><?php echo $item['private_item_hint']; ?></div>
                                <?php } else { ?>
                                    <?php echo $field['html']; ?>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>

                <?php } ?>

                </div>

                <?php
					$show_bar = !empty($item['rating_widget']) ||
								$fields['user']['is_in_list'] ||
								!empty($ctype['options']['hits_on']) ||
								($ctype['is_comments'] && $item['is_comments_on']) ||
								!$item['is_approved'];
                ?>

                <?php if ($show_bar){ ?>
                    <small class="card-footer info_bar">
                        <?php if (!empty($item['rating_widget'])){ ?>
                            <div class="bar_item mr-2 bi_rating">
                                <?php echo $item['rating_widget']; ?>
                            </div>
                        <?php } ?>
                        <?php if ($fields['user']['is_in_list']){ ?>
                            <div class="bar_item mr-2 bi_user" title="<?php echo $fields['user']['title']; ?>">
                                <?php echo $fields['user']['handler']->parse( $item['user'] ); ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($ctype['options']['hits_on'])){ ?>
                            <div class="bar_item mr-2 bi_hits" title="<?php echo LANG_HITS; ?>">
                                <i class="fa fa-eye"></i>
                                <?php echo $item['hits_count']; ?>
                            </div>
                        <?php } ?>
                        <?php if ($ctype['is_comments'] && $item['is_comments_on']){ ?>
                            <div class="bar_item bi_comments">
                                <?php if (!empty($item['is_private_item'])) { ?>
                                    <i class="fa fa-comment-o"></i>
                                    <?php echo intval($item['comments']); ?>
                                <?php } else { ?>
                                    <i class="fa fa-comment-o"></i>
                                    <a href="<?php echo href_to($ctype['name'], $item['slug'].'.html'); ?>#comments" title="<?php echo LANG_COMMENTS; ?>">
                                        <?php echo intval($item['comments']); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if (!$item['is_approved']){ ?>
                            <div class="bar_item text-danger bi_not_approved <?php if (empty($item['is_new_item'])){ ?>is_edit_item<?php } ?>">
                                <?php echo !empty($item['is_draft']) ? LANG_CONTENT_DRAFT_NOTICE : (empty($item['is_new_item']) ? LANG_CONTENT_EDITED.'. ' : '').LANG_CONTENT_NOT_APPROVED; ?>
                            </div>
                        <?php } ?>
                    </small>
                <?php } ?>

            </div>
            </div>
        <?php } ?>

    </div>

    <?php if ($perpage < $total) { ?>
        <?php echo html_pagebar($page, $perpage, $total, $page_url, array_merge($filters, $ext_hidden_params)); ?>
    <?php } ?>

<?php } else {

    if(!empty($ctype['labels']['many'])){
        echo sprintf(LANG_TARGET_LIST_EMPTY, $ctype['labels']['many']);
    } else {
        echo LANG_LIST_EMPTY;
    }

}
