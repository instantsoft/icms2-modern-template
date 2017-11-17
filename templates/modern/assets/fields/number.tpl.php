<?php if ($field->title) { ?><label for="<?php echo $field->id; ?>"><?php echo $field->title; ?></label><?php } ?>
<?php if($field->data['units']){ ?><div class="input-group"><?php } ?>
<?php echo html_input('text', $field->element_name, $value, array('id'=>$field->id, 'size'=>5, 'class'=>'input-number', 'required'=>(array_search(array('required'), $field->getRules()) !== false))); ?>
<?php if($field->data['units']){ ?><span class="input-group-addon"><?php html($field->data['units']); ?></span></div><?php } ?>