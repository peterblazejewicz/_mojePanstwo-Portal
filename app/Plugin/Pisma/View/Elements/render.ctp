<?php $this->Combinator->add_libs('css', $this->Less->css('pisma_render', array('plugin' => 'Pisma'))) ?>

<div id="editor-cont">

    <div class="editor-controls">
        <div class="control control-date"><input type="text" class="datepicker"></div>

        <div class="control control-sender"><span class="empty">(Wybierz nadawcę)</span></div>

        <div class="control control-addressee"><span class="empty">(Wybierz odbiorcę)</span></div>

        <div class="control control-template"><span class="empty">(Wybierz szablon)</span></div>

    </div>

    <div id="editor"></div>

    <div class="editor-controls">
        <div class="control control-signature"><span class="empty">(Wybierz sygnaturę)</span></div>
    </div>

</div>