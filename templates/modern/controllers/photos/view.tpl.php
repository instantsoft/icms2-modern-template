<?php

    $this->addJS($this->getJavascriptFileName('photos'));
    $this->addJS($this->getJavascriptFileName('jquery-owl.carousel'));
    $this->addJS($this->getJavascriptFileName('screenfull'));
    $this->addCSS('templates/default/css/jquery-owl.carousel.css');

    $this->setPageTitle($photo['title']);
    $this->setPageDescription($photo['content'] ? string_get_meta_description($photo['content']) : ($photo['title'].' — '.$album['title']));

    if ($ctype['options']['list_on']) {
        $this->addBreadcrumb($ctype['title'], href_to($ctype['name']));
    }
    if (isset($album['category'])) {
        foreach ($album['category']['path'] as $c) {
            $this->addBreadcrumb($c['title'], href_to($ctype['name'], $c['slug']));
        }
    }
    if ($ctype['options']['item_on']) {
        $this->addBreadcrumb($album['title'], href_to($ctype['name'], $album['slug']) . '.html');
    }
    $this->addBreadcrumb($photo['title']);

    if ($is_can_edit) {
        $this->addToolButton(array(
            'class' => 'edit',
            'title' => LANG_PHOTOS_EDIT_PHOTO,
            'href'  => $this->href_to('edit', $photo['id'])
        ));
    }

    if ($is_can_delete) {
        $this->addToolButton(array(
            'class'   => 'delete',
            'title'   => LANG_PHOTOS_DELETE_PHOTO,
            'href'    => 'javascript:icms.photos.delete()',
            'onclick' => "if(!confirm('" . LANG_PHOTOS_DELETE_PHOTO_CONFIRM . "')){ return false; }"
        ));
    }

?>

<div id="album-photo-item" class="content_item row" data-item-delete-url="<?php if ($is_can_delete){ echo $this->href_to('delete'); } ?>" data-id="<?php echo $photo['id']; ?>" itemscope itemtype="http://schema.org/ImageObject">
    <div class="left col-lg-9">
        <div class="inside">
            <div class="inside_wrap orientation_<?php echo $photo['orientation']; ?>" id="fullscreen_cont">
                <div id="photo_container" <?php if($full_size_img){?>data-full-size-img="<?php echo $full_size_img; ?>"<?php } ?>>
                    <?php echo $this->renderChild('view_photo_container', array(
                        'photos_url_params' => $photos_url_params,
                        'photo'      => $photo,
                        'preset'     => $preset,
                        'prev_photo' => $prev_photo,
                        'next_photo' => $next_photo
                    )); ?>
                </div>
            </div>
            <?php if($photos){ ?>
            <div id="related_photos_wrap">
                <h3 class="mt-4 mb-3 fs-20"><?php echo $related_title; ?></h3>
                <div class="album-photos-wrap owl-carousel" id="related_photos" data-delete-url="<?php echo href_to('photos', 'delete'); ?>">
                    <?php echo $this->renderChild('photos', array(
                        'photos'        => $photos,
                        'is_owner'      => false,
                        'user'          => $user,
                        'photo_wrap_id' => 'related_photos',
                        'preset_small'  => $preset_small,
                        'disable_flex'  => true
                    )); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="right col-lg-3 mt-3 mt-lg-0">
        <div class="photo_author mb-3">
            <span class="album_user" title="<?php echo LANG_AUTHOR ?>">
                <a href="<?php echo href_to('users', $photo['user']['id']); ?>">
                    <?php echo html_avatar_image($photo['user']['avatar'], 'micro', $photo['user']['nickname']); ?>
                </a>
            </span>
            <a href="<?php echo href_to('users', $photo['user']['id']); ?>" title="<?php echo LANG_AUTHOR ?>">
                <?php echo $photo['user']['nickname']; ?>
            </a>
            <span class="album_date" title="<?php echo LANG_DATE_PUB; ?>">
                <?php echo html_date_time($photo['date_pub']); ?>
            </span>
        </div>
        <?php if (!empty($photo['rating_widget'])){ ?>
            <div class="bar_item bi_rating bg-light border border-light p-2 mb-3">
                <?php echo $photo['rating_widget']; ?>
            </div>
        <?php } ?>

        <div class="share mb-3">
            <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,whatsapp" data-size="s"></div>
        </div>

        <?php if (!empty($photo['content'])){ ?>
            <div class="photo_content mb-3" itemprop="description">
                <?php echo $photo['content']; ?>
            </div>
        <?php } ?>

        <?php if (!empty($downloads)){ ?>
            <div class="dropdown mb-3">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-controls="photo-download">
                    <i class="fa fa-download"></i> <?php echo LANG_DOWNLOAD; ?>
                </button>
            <div class="dropdown-menu p-0 w-100 mt-1" id="photo-download" aria-labelledby="dropdownMenuButton">
                <div class="list-group list-group-flush">
                    <?php foreach ($downloads as $download) { ?>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php echo (!$download['link'] ? 'disabled' : ''); ?>" href="<?php echo $download['link'] ? $download['link']: '#'; ?>">
                            <span class="text-truncate"><?php echo $download['name']; ?></span>
                            <span class="badge badge-primary badge-pill"><?php echo $download['size']; ?></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            </div>
        <?php } ?>

        <div class="bg-light py-2 px-3 fs-14">
            <?php if ($photo['exif'] || $photo['camera']){ ?>
                <div class="exif_wrap">
                    <?php if ($photo['camera']){ ?>
                        <i class="fa fa-camera"></i>
                        <a href="<?php html(href_to('photos', 'camera-'.urlencode($photo['camera']))); ?>" class="text-dark">
                            <?php html($photo['camera']); ?>
                        </a>
                    <?php } ?>
                    <?php if ($photo['exif']){ ?>
                        <div class="exif_info">
                            <?php foreach ($photo['exif'] as $name => $value) { ?>
                                <span title="<?php echo string_lang('lang_exif_'.$name); ?>"><?php html($value); ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="dropdown-divider"></div>
            <?php } ?>

            <div class="photo_details">
                <?php foreach ($photo_details as $detail) { ?>
                    <div class="d-flex justify-content-between">
                        <div><?php echo $detail['name']; ?></div>
                        <div class="text-truncate pl-3">
                            <?php if(isset($detail['link'])){ ?>
                                <a href="<?php echo $detail['link']; ?>" title="<?php html($detail['value']); ?>">
                                    <?php echo $detail['value']; ?>
                                </a>
                            <?php } else { ?>
                                <?php echo $detail['value']; ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <meta itemprop="height" content="<?php echo $photo['sizes'][$preset]['height']; ?> px">
    <meta itemprop="width" content="<?php echo $photo['sizes'][$preset]['width']; ?> px">
</div>

<?php if ($hooks_html) { echo html_each($hooks_html); } ?>

<?php if (!empty($photo['comments_widget'])){ ?>
    <?php echo $photo['comments_widget']; ?>
<?php } ?>

<script type="text/javascript">
    icms.photos.init = true;
    icms.photos.mode = 'photo';
    $(function(){
        icms.photos.initCarousel('#related_photos', function (){
            left_height = $('#album-photo-item .inside_wrap').height();
            side_height = $('#album-photo-item .right').height();
            if(side_height <= left_height){
                $('#album-photo-item').append($('#related_photos_wrap'));
            }
        });
    });
</script>