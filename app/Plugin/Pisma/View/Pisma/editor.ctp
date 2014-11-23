<?php $this->Combinator->add_libs('css', '../plugins/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min') ?>

<?php /*https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg*/ ?>
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

<div class="_container">

    <div id="stepper">

        <h2>Wybierz szablon pisma</h2>
        <section>

            <div class="container">
	            
	            <div class="col-md-10 col-md-offset-1">
	            	
	            	<p class="hint-title">Wybierz szablon, aby ułatwić tworzenie pisma. Na podstawie wybranego szablonu, umieścimy w Twoim piśmie odpowiednie formułki prawne i inne informacje. Jeśli nie chcesz wybierać szablonu - przejdź dalej.</p>
	            	
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
			            		<input type="text" name="szablon" placeholder="Szukaj szablonu..." />
			            	</div>
		            	</div>
		            	<div class="content">
			            	<ul class="ul-raw">
				            	<?
					            	foreach( array('Wniosek o udostępnienie informacji publicznej', 'Wniosek o wydanie wyciągu z KRS-u', 'Wniosek o zwolnienie z kary grzywny w postępowaniu administracyjnym', 'Odwołanie od decyzji wydanej w pierwszej instancji w postępowaniu administracyjnym') as $szablon ) {
						        ?>				            	
				            	<li class="row">
				            		<div class="pull-left">
					            		<p><a href="#"><?= $szablon ?></a></p>
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
	            	
	            	<p class="hint-title">Wybierz adresata, do którego chcesz napisać. To pozwoli automatycznie wypełnić dane teleadresowe w Twoim piśmie.</p>
			
		            <div id="chosen-addressee" class="block" style="display: none;">
		            	<div class="block-header">
			            	<h2 class="label pull-left">Wybrany adresat</h2>
			            	<div class="pull-right">
				            	<button class="btn btn-danger btn-xs">Usuń wybór</button>
			            	</div>
		            	</div>
		            	<div class="content">
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
			            	<input type="text" name="adresat" placeholder="Szukaj adresata..." />
		            	</div>
		            	<div class="content" style="display: none;">
			            	
		            	</div>
		        	</div>
        	
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