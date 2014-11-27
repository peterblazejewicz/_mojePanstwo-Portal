<?php $this->Combinator->add_libs('css', $this->Less->css('pisma_render', array('plugin' => 'Pisma'))) ?>

<div id="editor-cont">

    <div class="editor-controls">
        <div class="control control-date">
            <input type="text" class="datepicker">
            <input type="text" class="city empty" placeholder="Wybierz miejscowość" maxlength="127">
        </div>

        <div class="control control-sender">
            <textarea class="nadawca empty" placeholder="Wpisz nadawcę" rows="1" maxlength="511"></textarea>
            <textarea class="sprawa empty hide" placeholder="Wpisz znak sprawy" rows="1"></textarea>
        </div>

        <div class="control control-addressee"><span class="empty">Wybierz odbiorcę</span></div>

        <div class="control control-template"><span class="empty">Wybierz szablon</span></div>

    </div>

    <div id="editor"></div>

    <div class="editor-controls">
        <div class="control control-signature">
            <textarea class="podpis empty" placeholder="Wpisz sygnaturę" rows="1" maxlength="255"></textarea>
        </div>
    </div>

</div>