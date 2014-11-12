<?php $this->Combinator->add_libs('css', $this->Less->css('suggester')) ?>
<?php $this->Combinator->add_libs('js', 'suggester.js') ?>

<form class="suggesterBlock" action="<?= $action ?>">
    <div class="input-group main_input">
        <input name="q" value="" type="text" autocomplete="off" class="datasearch form-control input-lg"
               placeholder="<?= $placeholder ?>"
            <?php if (isset($app)) {
                echo 'data-app="' . $app . '"';
            } ?>
            />
        <span class="input-group-btn">
              <button class="btn btn-success btn-lg" type="submit" data-icon="&#xe600;"></button>
        </span>
    </div>
</form>