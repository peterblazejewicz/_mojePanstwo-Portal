<?php $this->Combinator->add_libs('css', $this->Less->css('pisma_render', array('plugin' => 'Pisma'))) ?>

<div id="editor-cont">

    <div class="editor-controls">
        <div class="control control-date">
            <input type="text" class="datepicker">
            <input type="hidden" id="datepickerAlt" value="<?php echo date('Y-m-d') ?>">
            <input type="text" class="city empty" placeholder="Wybierz miejscowość" maxlength="127" style="display: none;">
        </div>

        <div class="control control-sender">
            <?php if (empty($pismo['nadawca'])) { ?>
                <textarea class="nadawca empty" placeholder="Wpisz dane nadawcy..." rows="1" maxlength="511"></textarea>
            <? } else { ?>
                <div class="pre"><?= str_replace("\n", '<br/>', $pismo['nadawca']) ?></div>
            <? } ?>
            <textarea class="sprawa empty hide" placeholder="Wpisz znak sprawy" rows="1"></textarea>
        </div>

        <div class="control control-addressee"><span class="empty">Wybierz adresata</span></div>

        <div class="control control-template"><span class="empty">Wybierz szablon pisma</span></div>

    </div>

    <div id="editor"></div>

    <div class="editor-controls">
        <div class="control control-signature">
            <?php if (empty($pismo['podpis'])) { ?>
                <textarea class="podpis empty" placeholder="Podpisz się" rows="1" maxlength="255"></textarea>
            <? } else { ?>
                <div class="pre"><?= str_replace("\n", '<br/>', $pismo['podpis']) ?></div>
            <? } ?>

        </div>
    </div>

</div>