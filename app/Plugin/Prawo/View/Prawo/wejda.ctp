<?php $this->Combinator->add_libs('css', $this->Less->css('prawo', array('plugin' => 'Prawo'))) ?>
<?php $this->Combinator->add_libs('js', 'Prawo.prawo.js') ?>

<div class="appHeader">
    <div class="container innerContent">
        <h1>Przeglądaj <strong>prawo</strong> obowiązujące w Polsce</h1>

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">

            <? echo $this->Element('suggester', array(
                'preset' => 'prawo',
                'displayDatasetName' => false,
                'placeholder' => 'Szukaj w aktach prawnych...',
                'action' => '/prawo',
            )); ?>

            <? echo $this->Element('Prawo.menu', array(
                'selected' => 'wejda'
            )); ?>

        </div>
    </div>
</div>

<div class="container">

</div>