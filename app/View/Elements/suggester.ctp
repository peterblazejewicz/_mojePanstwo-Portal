<?php $this->Combinator->add_libs('js', 'suggester.js') ?>

<form class="searchInput" action="<?= $action ?>">
    <div class="input-group main_input">
                   	
        <input data-datasearch="<?= htmlspecialchars(json_encode(array(
        	'preset' => $preset,
        	'displayDatasetName' => $displayDatasetName,
        ))) ?>" name="q" value="" type="text" autocomplete="off"
               placeholder="<?= $placeholder ?>"
               class="datasearch form-control input-lg">
        <span class="input-group-btn">
              <button class="btn btn-success btn-lg" type="submit" data-icon="&#xe600;"></button>
        </span>
    </div>
</form>