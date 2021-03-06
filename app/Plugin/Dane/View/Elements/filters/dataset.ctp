<ul class="options list-group">
    <?
    $field = $filter['filter']['field'];
    $name = str_replace('.', ':', $field);
    $value = array_key_exists($field, $conditions) ? $conditions[$field] : false;

    // debug($value, true, false);

    if (isset($facet['params']['options']) && is_array($facet['params']['options']) && !empty($facet['params']['options'])) {
        foreach ($facet['params']['options'] as $option) {

            // debug($option, true, false);

            $fid = 'filter_input_' . $field . $option['id'];
            if (is_array($value))
                $checked = in_array($option['id'], $value);
            else
                $checked = ($option['id'] == $value);

            // debug($checked, true, false);

            ?>
            <li class="option checkbox list-group-item">
                <span class="badge"><?= $this->Number->currency($option['count'], '', array('places' => 0)) ?></span>

                <div class="checkbox-inline">
                    <input<? if ($checked) { ?> checked="checked"<? } ?> id="<?= $fid ?>" type="checkbox"
                                                                         name="<?= $name ?>[]"
                                                                         value="<?= $option['id'] ?>"/>
                    <label for="<?= $fid ?>"><?= $option['label'] ?></label>
                </div>
            </li>
        <?
        }
    }
    ?>
</ul>