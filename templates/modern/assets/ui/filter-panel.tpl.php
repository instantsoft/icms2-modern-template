<?php $user = cmsUser::getInstance(); ?>

<?php if (!isset($is_expanded)){ $is_expanded = false; } unset($filters['user_id']); ?>

<?php $form_url = is_array($page_url) ? $page_url['base'] : $page_url; $form_url_sep = strpos($form_url, '?') === false ? '?' : '&'; ?>

<div class="mb-3 filter-panel <?php echo $css_prefix;?>-filter">

    <div class="card">

        <a class="card-header" role="button" data-toggle="collapse" href=".filter-collapsed" aria-expanded="true" aria-controls="toggleFilter">

            <span class="collapse<?php if(!$filters && !$is_expanded){ ?> show<?php } ?> filter-collapsed"><?php echo LANG_SHOW_FILTER; ?></span>

            <span class="collapse<?php if($filters || $is_expanded){ ?> show<?php } ?> filter-collapsed close" aria-hidden="true">&times;</span>

        </a>

        <div id="toggleFilter" class="collapse<?php if($filters || $is_expanded){ ?> show<?php } ?> filter-collapsed filter-container">

            <div class="card-body">

                <form action="<?php echo $form_url; ?>" method="get">

                    <?php echo html_input('hidden', 'page', 1); ?>

                    <?php if(!empty($ext_hidden_params)){ ?>

                        <?php foreach($ext_hidden_params as $fname => $fvalue){ ?>

                            <?php echo html_input('hidden', $fname, $fvalue); ?>
                            <?php if($filters){ $filters[$fname] = $fvalue; } ?>

                        <?php } ?>

                    <?php } ?>

                    <div class="form-row fields">

                        <?php $fields_count = 0; ?>

                        <?php foreach($fields as $name => $field){ ?>

                            <?php
                                if (!$field['is_in_filter']){ continue; }
                                if (!empty($field['filter_view']) && !$user->isInGroups($field['filter_view'])) { continue; }
                                $value = isset($filters[$name]) ? $filters[$name] : null;
                                $output = $field['handler']->setItem(array('ctype_name' => $css_prefix, 'id' => null))->getFilterInput($value);
                                if (!$output){ continue; }
                                $fields_count++;
                            ?>

                            <div class="form-group col-6 field ft_<?php echo $field['type']; ?> f_<?php echo $field['name']; ?>">
                                <label for="<?php echo $field['handler']->element_name; ?>" class="title"><?php echo $field['title']; ?></label>
                                <div class="value"><?php echo $output; ?></div>
                            </div>

                        <?php } ?>

                        <?php if (!empty($props_fields)){ ?>

                            <?php foreach($props as $prop){ ?>

                                <?php
                                    if (!$prop['is_in_filter']){ continue; }
                                    $field = $props_fields[$prop['id']];
                                    $field->setName("p{$prop['id']}");
                                    if ($prop['type'] == 'list' && !empty($prop['options']['is_filter_multi'])){ $field->setOption('filter_multiple', true); }
                                    if ($prop['type'] == 'number' && !empty($prop['options']['is_filter_range'])){ $field->setOption('filter_range', true); }
                                    $value = isset($filters["p{$prop['id']}"]) ? $filters["p{$prop['id']}"] : null;
                                    $fields_count++;
                                ?>

                                <div class="form-group col-6 field ft_<?php echo $prop['type']; ?> f_prop_<?php echo $prop['id']; ?>">
                                    <label class="title"><?php echo $prop['title']; ?></label>
                                    <div class="value"><?php echo $field->getFilterInput($value); ?></div>
                                </div>

                            <?php } ?>

                        <?php } ?>

                    </div>

                    <?php if ($fields_count) { ?>

                        <div class="form-inline">

                            <?php echo html_submit(LANG_FILTER_APPLY); ?>

                            <?php if (sizeof($filters)){ ?>

                                <a class="btn btn-link" href="<?php echo ((is_array($page_url) && !empty($page_url['cancel'])) ? $page_url['cancel'] : $form_url); ?>"><?php echo LANG_CANCEL; ?></a>
                                
                                <a class="btn btn-link" href="<?php echo $form_url.$form_url_sep.http_build_query($filters); ?>"><i class="fa fa-link text-primary pr-1"></i> <?php echo LANG_FILTER_URL; ?></a>

                            <?php } ?>

                        </div>

                    <?php } ?>

                </form>

            </div>

        </div>

    </div>

</div>
