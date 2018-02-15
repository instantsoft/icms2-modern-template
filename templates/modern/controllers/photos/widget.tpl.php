<?php $this->addJS( $this->getJavascriptFileName('fileuploader') ); ?>
<?php $this->addJS( $this->getJavascriptFileName('photos') ); ?>
<?php $id = !empty($album['id']) ? $album['id'] : ''; ?>

<fieldset>

    <legend><?php echo LANG_PHOTOS; ?></legend>

    <div id="album-photos-widget" data-delete-url="<?php echo $this->href_to('delete'); ?>">

        <div class="previews_list">
            <?php if ($photos){ ?>
                <?php foreach($photos as $photo){ ?>
                    <?php $presets = array_keys($photo['image']); $small_preset = end($presets); ?>
                    <div class="preview block form-group" rel="<?php echo $photo['id']; ?>">
                        <div class="media">
                            <div class="thumb mr-3 position-relative list-group">
                                <a rel="edit_list" class="ajax-modal hover_image list-group-item list-group-item-action p-2" href="<?php echo html_image_src($photo['image'], $preset_big, true); ?>">
                                    <?php echo html_image($photo['image'], $small_preset, $photo['title']); ?>
                                </a>
                                <?php if(empty($is_edit)){ ?>
                                <a class="delete list-group-item list-group-item-action p-1 text-center fs-14" href="#" onclick="return icms.photos.remove(<?php echo $photo['id']; ?>)">
                                    <i class="fa fa-trash-o"></i>
                                    <?php echo LANG_DELETE; ?>
                                </a>
                                <?php } else { ?>
                                    <?php foreach ($photo['image'] as $preset => $path) { ?>
                                        <?php if($preset == $small_preset){ continue; } ?>
                                            <a title="<?php echo $photo['sizes'][$preset]['width']; ?> x <?php echo $photo['sizes'][$preset]['height']; ?>" rel="edit_list" href="<?php echo html_image_src($photo['image'], $preset, true); ?>"></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="media-body info">
                                <div class="title">
                                    <?php echo html_input('text', 'photos['.$photo['id'].']', $photo['title']); ?>
                                </div>
                                <div class="photo_content">
                                    <?php echo html_editor('content['.$photo['id'].']', $photo['content_source'], array('set_name' => 'photos')); ?>
                                </div>
                                <div class="photo_additional form-row">
                                    <div class="photo_privacy col">
                                        <?php echo html_select('is_private['.$photo['id'].']', array(LANG_PRIVACY_PUBLIC, LANG_PRIVACY_PRIVATE, LANG_PHOTOS_ACCESS_BY_LINK), $photo['is_private']); ?>
                                    </div>
                                    <?php if($types){ ?>
                                        <div class="photo_type col">
                                            <?php echo html_select('type['.$photo['id'].']', $types, $photo['type']); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <?php if(empty($is_edit)){ ?>

            <div class="preview_template block form-group" style="display:none">
                <div class="media">
                    <div class="thumb mr-3 position-relative list-group">
                        <a class="ajax-modal hover_image list-group-item list-group-item-action p-2" href="">
                            <img src="" />
                        </a>
                        <a class="delete list-group-item list-group-item-action p-1 text-center fs-14" href="#">
                            <i class="fa fa-trash-o"></i>
                            <?php echo LANG_DELETE; ?>
                        </a>
                    </div>
                    <div class="media-body info">
                        <div class="title">
                            <?php echo html_input('text', '', '', array('placeholder'=>LANG_PHOTOS_PHOTO_TITLE)); ?>
                        </div>
                        <div class="photo_content">
                            <textarea id="" class="textarea" name="" data-upload-url="<?php echo href_to('markitup', 'upload'); ?>"></textarea>
                        </div>
                        <div class="photo_additional form-row">
                            <div class="photo_privacy col">
                                <?php echo html_select('', array(LANG_PRIVACY_PUBLIC, LANG_PRIVACY_PRIVATE, LANG_PHOTOS_ACCESS_BY_LINK), (isset($album['is_private']) ? $album['is_private'] : 0)); ?>
                            </div>
                            <?php if($types){ ?>
                                <div class="photo_type col">
                                    <?php echo html_select('', $types); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:none"><?php echo html_editor('', '', array('set_name' => 'photos')); ?></div> <!-- чтобы редактор был подключен -->

            <div id="album-photos-uploader"></div>

            <script type="text/javascript">
                <?php echo $this->getLangJS('LANG_SELECT_UPLOAD', 'LANG_DROP_TO_UPLOAD', 'LANG_CANCEL', 'LANG_ERROR'); ?>
                icms.photos.createUploader('<?php echo $this->href_to('upload'); ?><?php echo $id ? '/' . $id : ''; ?>', function(){
                    var _album_id = $('#album_id').val();
                    if(!_album_id){
                        icms.modal.alert('<?php printf(LANG_PHOTOS_SELECT_ALBUM, $ctype['labels']['one']); ?>');
                        return false;
                    }
                    this.params = {
                        album_id: _album_id
                    };
                });
            </script>

        <?php } ?>

    </div>

</fieldset>