<div class="photo_filter">
    <form action="<?php echo $item['base_url']; ?>" method="get">
        <div class="navbar navbar-expand-lg navbar-light bg-light navbar-filter">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFilter"
                    aria-controls="navbarFilter" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarFilter">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <span title="<?php echo LANG_SORTING; ?>" class="nav-link dropdown-toggle <?php echo !isset($item['filter_selected']['ordering']) ? '' : 'active'; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $item['filter_panel']['ordering'][$item['filter_values']['ordering']]; ?>
                        </span>
                        <div class="dropdown-menu">
                            <?php foreach ($item['filter_panel']['ordering'] as $value => $name) { ?>
                                <?php $url_params = $item['url_params']; $url_params['ordering'] = $value; ?>
                                <a class="dropdown-item<?php echo ($item['filter_values']['ordering'] == $value) ? ' active' : '' ?>" href="<?php echo $page_url . '?' . http_build_query($url_params); ?>">
                                    <?php echo $name; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <span title="<?php echo LANG_PHOTOS_SORT_ORDERTO; ?>" class="nav-link dropdown-toggle <?php echo !isset($item['filter_selected']['orderto']) ? '' : 'active'; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $item['filter_panel']['orderto'][$item['filter_values']['orderto']]; ?>
                        </span>
                        <div class="dropdown-menu">
                            <?php foreach ($item['filter_panel']['orderto'] as $value => $name) { ?>
                                <?php $url_params = $item['url_params']; $url_params['orderto'] = $value; ?>
                                <a class="dropdown-item<?php echo ($item['filter_values']['orderto'] == $value) ? ' active' : '' ?>" href="<?php echo $page_url . '?' . http_build_query($url_params); ?>">
                                    <?php echo $name; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php if ($item['filter_panel']['types']) { ?>
                        <li class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle <?php echo !isset($item['filter_selected']['types']) ? '' : 'active'; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $item['filter_panel']['types'][$item['filter_values']['types']]; ?>
                            </span>
                            <div class="dropdown-menu">
                                <?php foreach ($item['filter_panel']['types'] as $value => $name) { ?>
                                    <?php $url_params = $item['url_params']; $url_params['types'] = $value; ?>
                                    <a class="dropdown-item<?php echo ($item['filter_values']['types'] == $value) ? ' active' : '' ?>" href="<?php echo $page_url . '?' . http_build_query($url_params); ?>">
                                        <?php echo $name; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle <?php echo !isset($item['filter_selected']['orientation']) ? '' : 'active'; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $item['filter_panel']['orientation'][$item['filter_values']['orientation']]; ?>
                        </span>
                        <div class="dropdown-menu">
                            <?php foreach ($item['filter_panel']['orientation'] as $value => $name) { ?>
                                <?php $url_params = $item['url_params']; $url_params['orientation'] = $value; ?>
                                <a class="dropdown-item<?php echo ($item['filter_values']['orientation'] == $value) ? ' active' : '' ?>" href="<?php echo $page_url . '?' . http_build_query($url_params); ?>">
                                    <?php echo $name; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if ($item['filter_values']['width'] || $item['filter_values']['height']) { ?>
                            <span class="nav-link dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo LANG_PHOTOS_MORE_THAN; ?> <?php html($item['filter_values']['width']); ?>
                                x <?php html($item['filter_values']['height']); ?>
                            </span>
                        <?php } else { ?>
                            <span class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo LANG_PHOTOS_SIZE; ?></span>
                        <?php } ?>

                        <div class="dropdown-menu filter-size-params">
                            <fieldset>
                                <legend class="text-nowrap"><?php echo LANG_PHOTOS_MORE_THAN; ?></legend>
                                <div class="form-group">
                                    <label><?php echo LANG_PHOTOS_SIZE_W; ?></label>
                                    <input type="text" name="width" value="<?php html($item['filter_values']['width']); ?>" placeholder="px" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo LANG_PHOTOS_SIZE_H; ?></label>
                                    <input type="text" name="height" value="<?php html($item['filter_values']['height']); ?>" placeholder="px" class="form-control">
                                </div>
                            </fieldset>
                            <div class="buttons">
                                <input type="submit" class="btn btn-secondary" value="<?php echo LANG_FIND; ?>">
                            </div>
                        </div>
                    </li>
                    <?php if ($item['filter_selected']) { ?>
                        <li class="nav-item">
                            <a title="<?php echo LANG_PHOTOS_CLEAR_FILTER; ?>" class="nav-link clear_filter" href="<?php echo $page_url; ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </li>
                    <?php } ?>
            </ul>
        </div>
    </form>
</div>