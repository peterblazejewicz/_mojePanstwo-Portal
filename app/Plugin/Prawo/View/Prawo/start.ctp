<?php $this->Combinator->add_libs( 'css', $this->Less->css( 'prawo', array( 'plugin' => 'Prawo' ) ) ) ?>
<?php $this->Combinator->add_libs( 'js', 'Prawo.prawo.js' ) ?>

<div class="appHeader">
	<div class="container innerContent">
		<h1>Przeglądaj <strong>prawo</strong> obowiązujące w Polsce</h1>

		<div class="col-xs-12 col-sm-8 col-sm-offset-2">

			<? echo $this->Element( 'suggester', array(
				'preset'             => 'prawo',
				'displayDatasetName' => false,
				'placeholder'        => 'Szukaj w prawie...',
				'action'             => '/prawo',
			) ); ?>

			<? echo $this->Element( 'Prawo.menu', array(
				'selected' => 'start'
			) ); ?>

		</div>
	</div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-md-8">
	
			<div class="block-group">
			
				<div class="block">
					<div class="block-header">
						<h2 class="label">Przeglądaj według <strong>haseł</strong></h2>
					</div>
					<div class="content">
						
						<ul class="keywords">
						<? foreach( $keywords as $keyword ) { ?>
							<li><a class="label label-primary" href="/dane/prawo_hasla/<?= $keyword['id'] ?>"><?= $keyword['q'] ?></a></li>
						<? } ?>
						</ul>
						
					</div>
				</div>
				
				<div class="block acts">
					<div class="block-header">
						<h2 class="label"><strong>Ustawy</strong>, które ostatnio weszły w życie</h2>
					</div>
					<div class="content">
						
						<ul class="acts">
						<? 
							$last_date = false;
							foreach( $ustawy as $act ) {
								
								$show_date = ($last_date===false) || ($last_date != $act->getData('data_wejscia_w_zycie'));
								$this->Dataobject->setObject($act);
						?>
							<li class="row">
								<div class="col-md-2">
									<? if( $show_date ) {?><p class="date"><?= $this->Czas->dataSlownie( $act->getData('data_wejscia_w_zycie') ) ?></p><? } ?>
								</div>
								<div class="col-md-10">
									<p class="title"><a href="/dane/prawo/<?= $act->getId() ?>"><?= $act->getData('typ_nazwa') ?> <?= $act->getShortTitle() ?></a></p>
									<? if( $opis = $act->getData('opis') ) {?><div class="desc"><?= $opis ?></div><? } ?>
								</div>
							</li>
						<? 
								$last_date = $act->getData('data_wejscia_w_zycie');
							} 
						?>
						</ul>
						
					</div>
				</div>
								
			
			</div>
			
		</div>
		<div class="col-md-4">
			
			
			<div class="block-group">
				
				
				
				<div class="block">
					<div class="block-header">
						<h2 class="label">Popularne</h2>
					</div>
					<div class="content">
						
						<ul class="popular">
						<? foreach( $popular as $act ) { ?>
							<li><a href="/dane/prawo/<?= $act['id'] ?>"><?= $act['nazwa'] ?></a></li>
						<? } ?>
						</ul>
						
					</div>
				</div>
				
				
			
			</div>
			
		</div>
		
	</div>
	
</div>