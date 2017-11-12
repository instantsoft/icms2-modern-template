<?php $this->addJS('templates/default/js/files.js'); ?>

<?php if ($field->title) { ?><label for="<?php echo $field->id; ?>"><?php echo $field->title; ?></label><?php } ?>

<?php if ($value){ ?>
    <?php $file = is_array($value) ? $value : cmsModel::yamlToArray($value); ?>
    <div id="file_<?php echo $field->element_name; ?>" class="value">
        <div class="input-group">
            <a class="form-control disabled" href="<?php echo $field->getDownloadURL($file); ?>"><?php echo $file['name']; ?></a>
            <span class="input-group-addon">
                <?php echo files_format_bytes($file['size']); ?>
            </span>
            <span class="input-group-btn">
                <a class="btn btn-secondary ajaxlink delete" href="javascript:" onclick="icms.files.remove('<?php echo $field->element_name; ?>')"><?php echo LANG_DELETE; ?></a>
            </span>
        </div>
    </div>
<?php } ?>

<div id="file_<?php echo $field->element_name; ?>_upload" <?php if ($value) { ?>style="display:none"<?php } ?>>
    <?php echo html_file_input($field->element_name); ?>
    <?php echo html_input('hidden', $field->element_name, ''); ?>
    <?php if($field->data['allowed_extensions']){ ?>
        <small class="form-text text-muted"><?php printf(LANG_PARSER_FILE_EXTS_FIELD_HINT, implode(', ', array_map(function($val) { return trim($val); }, explode(',', mb_strtoupper($field->data['allowed_extensions']))))); ?></small>
    <?php } ?>
    <?php if($field->data['max_size_mb']){ ?>
        <small class="form-text text-muted"><?php printf(LANG_PARSER_FILE_SIZE_FIELD_HINT, files_format_bytes($field->data['max_size_mb'])); ?></small>
    <?php } ?>
</div>

