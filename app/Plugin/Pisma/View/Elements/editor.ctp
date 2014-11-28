<?
$szablony = array(
    array(
        'id' => '1',
        'tytul' => 'Wniosek o udostępnienie informacji publicznej',
    ),
    array(
        'id' => '2',
        'tytul' => 'Wniosek o wydanie wyciągu z KRS-u',
    ),
    array(
        'id' => '3',
        'tytul' => 'Wniosek o zwolnienie z kary grzywny w postępowaniu administracyjnym',
    ),
    array(
        'id' => '4',
        'tytul' => 'Odwołanie od decyzji wydanej w pierwszej instancji w postępowaniu administracyjnym',
    ),
);
?>



<?php $this->Combinator->add_libs('css', '../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min') ?>

<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min', array('block' => 'scriptBlock')); ?>
<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/locales/bootstrap-wysihtml5.pl-PL', array('block' => 'scriptBlock')); ?>

<?php $this->Combinator->add_libs('css', $this->Less->css('pisma', array('plugin' => 'Pisma'))) ?>
<?php $this->Combinator->add_libs('js', 'Pisma.jquery.autosize.min.js') ?>
<?php $this->Combinator->add_libs('js', 'Pisma.jquery_steps.js') ?>
<?php $this->Combinator->add_libs('js', 'Pisma.pisma.js') ?>

<div id="stepper">

    <h2>Wybierz szablon pisma</h2>
    <section>

        <div class="container szablony">

            <div class="col-md-10 col-md-offset-1">

                <p class="hint-title">Wybierz szablon, aby ułatwić tworzenie pisma. Na podstawie wybranego szablonu,
                    umieścimy w Twoim piśmie odpowiednie formułki prawne i inne informacje. Jeśli nie chcesz
                    wybierać szablonu - przejdź dalej.</p>

                <div id="chosen-template" class="block" style="display: none;">
                    <div class="block-header">
                        <h2 class="label pull-left">Wybrany szablon</h2>

                        <div class="pull-right">
                            <button class="btn btn-danger btn-xs">Usuń wybór</button>
                        </div>
                    </div>
                    <div class="content">
                        <ul class="ul-raw">
                            <li class="row">
                                <div>
                                    <p>Wniosek o udostępnienie informacji publicznej</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="block search ">
                    <div class="block-header">
                        <h2 class="label pull-left">Popularne szablony</h2>

                        <div class="pull-right">
                            <input type="text" name="szablon" placeholder="Szukaj szablonu..."/>
                        </div>
                    </div>
                    <div class="content">
                        <ul class="ul-raw">
                            <?
                            foreach ($szablony as $szablon) {
                                ?>
                                <li data-id="<?= $szablon['id'] ?>"
                                    data-title="<?= addslashes($szablon['tytul']) ?>" class="row">
                                    <div class="pull-left col-md-11">
                                        <p><a href="#"><?= $szablon['tytul'] ?></a></p>
                                    </div>
                                    <div class="pull-right  col-md-1">
                                        <button class="btn btn-success btn-xs">Wybierz</button>
                                    </div>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <h2>Wybierz adresata</h2>
    <section>

        <div class="container adresaci">

            <div class="col-md-10 col-md-offset-1">

                <p class="hint-title">Wybierz adresata, do którego chcesz napisać. To pozwoli automatycznie wypełnić
                    dane teleadresowe w Twoim piśmie.</p>

                <div id="chosen-addressee" class="block" style="display: none;">
                    <div class="block-header">
                        <h2 class="label pull-left">Wybrany adresat</h2>

                        <div class="pull-right">
                            <button class="btn btn-danger btn-xs">Usuń wybór</button>
                        </div>
                    </div>
                    <div class="content">
                        <ul class="ul-raw"></ul>
                    </div>
                </div>

                <div class="block">
                    <div class="block-header">
                        <input class="search" type="text" name="adresat" placeholder="Szukaj adresata..."/>
                    </div>
                    <div class="content" style="display: none"></div>
                </div>

            </div>

        </div>

    </section>

    <h2>Wpisz treść</h2>
    <section>
        <div class="container edit">

            <div class="row">
                <div class="col-md-10">
                    <? echo $this->Element('Pisma.render'); ?>
                </div>
                <div class="col-md-2">
                    <div class="editor-tooltip">

                        <div class="hints alert alert-info" style="margin-top: 40px;">
                            <ul>
                                <li>Skup się</li>
                                <li>Pisz zwięźle</li>
                                <li>Nie obrażaj</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <h2>Zapisz i wyślij</h2>
    <section>
        <div class="container preview">

            <form id="finalForm" action="/pisma/nowe" method="post">
                <input name="miejscowosc" type="hidden" maxlength="127"/>
                <input name="data_pisma" type="hidden" maxlength="10"/>
                <textarea name="nadawca" class="hide" maxlength="511"></textarea>
                <input name="adresat_id" type="hidden"/>
                <input name="szablon_id" type="hidden"/>
                <input name="tresc" type="hidden"/>
                <textarea class="hide" name="podpis" maxlength="255"/></textarea>

                <div class="row">
                    <div class="col-md-10">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputTtitle" class="col-lg-2 control-label">Tytuł pisma</label>

                                <div class="col-lg-10">
                                    <input name="tytul" class="form-control" id="inputTtitle" autocomplete="off"
                                           maxlength="255"
                                           type="text"<?php if (!empty($title)) echo ' value="' . $title . '"' ?>>

                                    <p class="desc">Adresat pisma nie zobaczy powyższego tytułu. Będzie on używany tylko
                                        do organizacji Twoich pism.</p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="row previewRender">
                    <div class="col-md-10">
                        <div id="editor-cont" class="loading"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="editor-tooltip">

                            <ul class="form-buttons">
                                <li class="inner-addon">
                                    <i class="glyphicon glyphicon-send"></i>
                                    <input type="submit" name="send" value="Zapisz i wyślij"
                                           class="btn btn-primary"/>
                                </li>
                                <li class="inner-addon">
                                    <i class="glyphicon glyphicon-saved"></i>
                                    <input type="submit" name="save" value="Zapisz" class="btn btn-primary"/>
                                </li>
                                <li class="inner-addon">
                                    <i class="glyphicon glyphicon-print"></i>
                                    <input type="submit" name="print" value="Wydrukuj" class="btn btn-primary"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
