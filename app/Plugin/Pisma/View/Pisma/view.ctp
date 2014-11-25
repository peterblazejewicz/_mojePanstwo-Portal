<?php $this->Combinator->add_libs('css', $this->Less->css('pisma', array('plugin' => 'Pisma'))) ?>
<?php $this->Combinator->add_libs('js', 'Pisma.pisma.js') ?>




<div class="appHeader">
    <div class="container innerContent">

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <? echo $this->Element('Pisma.menu', array(
                // 'selected' => 'nowe'
            )); ?>
        </div>

    </div>
</div>

<div class="container">

    <h1><?= $pismo['tytul'] ?></h1>

    <div class="col-md-10">
        <? echo $this->Element('Pisma.render'); ?>
    </div>
</div>