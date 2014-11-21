<?php $this->Combinator->add_libs('css', '../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min') ?>

<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min', array('block' => 'scriptBlock')); ?>
<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/locales/bootstrap-wysihtml5.pl-PL', array('block' => 'scriptBlock')); ?>

<?php $this->Combinator->add_libs('css', $this->Less->css('pisma', array('plugin' => 'Pisma'))) ?>
<?php $this->Combinator->add_libs('js', 'jquery_steps.js') ?>
<?php $this->Combinator->add_libs('js', 'Pisma.pisma.js') ?>

<div class="appHeader">
    <div class="container innerContent">

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <? echo $this->Element('Pisma.menu', array(
                'selected' => 'nowe'
            )); ?>
        </div>

    </div>
</div>

<div class="container">

    <div id="stepper">

        <h2>Wybierz szablon pisma</h2>
        <section>

            <div class="block">
                <div class="block-header">
                    <h2>Wybierz szablon pisma</h2>
                </div>
                <div class="content">

                    <? debug($forms); ?>

                </div>
            </div>


        </section>

        <h2>Wybierz adresata</h2>
        <section>

            <div class="block">
                <div class="block-header">
                    <h2>Wybierz adresata pisma</h2>
                </div>
            </div>

        </section>

        <h2>Wpisz treść</h2>
        <section>
            <div id="editor" class="loading"></div>
        </section>

        <h2>Zapisz i wyślij</h2>
        <section>
            <p>The next and previous buttons help you to navigate through your content.</p>
        </section>

    </div>

</div>