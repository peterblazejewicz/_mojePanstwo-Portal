<?php $this->Combinator->add_libs('css', '../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min') ?>

<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.all.min', array('block' => 'scriptBlock')); ?>
<?php echo $this->Html->script('../plugins/bootstrap3-wysiwyg/dist/locales/bootstrap-wysihtml5.pl-PL', array('block' => 'scriptBlock')); ?>

<?php $this->Combinator->add_libs('css', $this->Less->css('pisma', array('plugin' => 'Pisma'))) ?>
<?php $this->Combinator->add_libs('js', 'jquery_steps.js') ?>
<?php $this->Combinator->add_libs('js', 'Pisma.pisma.js') ?>

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


<div class="appHeader">
    <div class="container innerContent">

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <? echo $this->Element('Pisma.menu', array(
                'selected' => 'nowe'
            )); ?>
        </div>

    </div>
</div>

<div class="_container">

    <div id="stepper">

        <h2>Wybierz szablon pisma</h2>
        <section>

            <div class="container">

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

                    <div class="block search">
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
                                        <div class="pull-left">
                                            <p><a href="#"><?= $szablon['tytul'] ?></a></p>
                                        </div>
                                        <div class="pull-right">
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

            <div class="container">

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
                            <!-- 
                                http://api.mojepanstwo.pl/dane/dataset/instytucje/search.json?conditions[q]=%22ministerstwo%22 
                                http://mojepanstwo.pl/pisma/szablony/2.json
                            -->
                            <ul class="ul-raw">
                                <li class="row">
                                    <div>
                                        <p>Sąd Najwyższy RP</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="block">
                        <div class="block-header">
                            <input type="text" name="adresat" placeholder="Szukaj adresata..."/>
                        </div>
                        <div class="content" style="display: none;">

                        </div>
                    </div>

                </div>

            </div>

        </section>

        <h2>Wpisz treść</h2>
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-md-10">

                        <div id="editor-cont">

                            <div class="editor-controls">

                                <p class="control control-date">24 listopada 2014</p>

                                <p class="control control-sender">Jan Kowalski</p>

                                <p class="control control-addressee">Sąd Najwyższy RP</p>

                                <p class="control control-template">Wniosek o udostępnienie informacji publicznej</p>

                            </div>

                            <div id="editor" class="loading">

                                Na podstawie art. 61 Konstytucji RP oraz art. 10 ust. 1 <a target="_blank"
                                                                                           href="http://mojepanstwo.pl/dane/prawo/2007,ustawa-dostepie-informacji-publicznej">ustawy
                                    z dnia 6 września 2001 r. o dostępie do informacji publicznej</a> wnoszę o
                                udostępnienie informacji publicznej w postaci:<br/><br/><br/><br/>

                            </div>

                            <div class="editor-controls">

                                <p class="control control-signature">Z poważaniem<br/>Jan Kowalski</p>

                            </div>

                        </div>


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
            <div class="container">
				
				<form action="/pisma/nowe" method="post">
					
					<div class="row">
						<div class="col-md-10">
							<fieldset>
								<div class="form-group">
									<label for="inputTtitle" class="col-lg-2 control-label">Tytuł pisma</label>
									<div class="col-lg-10">
										<input name="tytul" class="form-control" id="inputTtitle" type="text">
										<p class="desc">Adresat pisma nie zobaczy powyższego tytułu. Będzie on używany tylko do organizacji Twoich pism.</p>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					
	                <div class="row">
	                    <div class="col-md-10">
								
							<div id="editor-cont" class="preview">
	
	                            <div class="editor-controls">
	
	                                <p class="control control-date">24 listopada 2014</p>
	
	                                <p class="control control-sender">Jan Kowalski</p>
	
	                                <p class="control control-addressee">Sąd Najwyższy RP</p>
	
	                                <p class="control control-template">Wniosek o udostępnienie informacji publicznej</p>
	
	                            </div>
	
	                            <div>
	
	                                Na podstawie art. 61 Konstytucji RP oraz art. 10 ust. 1 <a target="_blank"
	                                                                                           href="http://mojepanstwo.pl/dane/prawo/2007,ustawa-dostepie-informacji-publicznej">ustawy
	                                    z dnia 6 września 2001 r. o dostępie do informacji publicznej</a> wnoszę o
	                                udostępnienie informacji publicznej w postaci:<br/><br/><br/><br/>
	
	                            </div>
	
	                            <div class="editor-controls">
	
	                                <p class="control control-signature">Z poważaniem<br/>Jan Kowalski</p>
	
	                            </div>
	
	                        </div>
	
	                    </div>
	                    <div class="col-md-2">
	                        <div class="editor-tooltip">
	
	                            <ul class="form-buttons">
		                            <li class="inner-addon"><i class="glyphicon glyphicon-send"></i><input type="submit" name="send" value="Zapisz i wyślij" class="btn btn-primary" /></li>
		                            <li class="inner-addon"><i class="glyphicon glyphicon-saved"></i><input type="submit" name="save" value="Zapisz" class="btn btn-primary" /></li>
		                            <li class="inner-addon"><i class="glyphicon glyphicon-print"></i><input type="submit" name="print" value="Wydrukuj" class="btn btn-primary" /></li>
	                            </ul>
	
	                        </div>
	                    </div>
	                </div>
                
                </form>

            </div>
        </section>

    </div>

</div>