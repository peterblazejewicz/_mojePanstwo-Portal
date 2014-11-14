<?php
$this->Combinator->add_libs('css', $this->Less->css('wyjazdy_poslow', array('plugin' => 'WyjazdyPoslow')));
$this->Combinator->add_libs('js', '../plugins/highmaps/js/highmaps');
$this->Combinator->add_libs('js', 'WyjazdyPoslow.wyjazdy_poslow.js');
?>

<div class="app-header">
	<div class="container">
		<h1>Wyjazdy zagraniczne posłów</h1>
	</div>
</div>

<div id="wyjazdyPoslowMap"></div>

<div class="container">
    <div class="block-group">
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali (całościowo)</h2>
			</div>
			
			<div class="content row">
				<div class="col-md-6">
					
					<h3>Indywidualnie</h3>
					
					<ul>
					<? foreach( $stats['calosc']['indywidualne'] as $i ) {?>
						<li class="row">
							<div class="col-md-2 text-right">
								<img src="http://resources.sejmometr.pl/mowcy/a/2/<?= $i['mowca_id'] ?>.jpg" />
							</div><div class="col-md-10">
								<p class="title"><a href="/dane/poslowie/<?= $i['id'] ?>"><?= $i['nazwa'] ?></a> <span class="klub">(<a href="/dane/sejm_kluby/<?= $i['klub_id'] ?>"><?= $i['skrot'] ?></a>)</span></p>
								<p><?= pl_dopelniacz($i['count'], 'wyjazd', 'wyjazdy', 'wyjazdów') ?> na kwotę <?= _currency($i['sum']) ?></p>
							</div>
						</li>
					<? } ?>
					</ul>
					
				</div>
				<div class="col-md-6">
					
					<h3>Klubowo</h3>
					
					<ul>
					<? foreach( $stats['calosc']['klubowe'] as $i ) {?>
						<li>
							<?= $i['nazwa'] ?>
						</li>
					<? } ?>
					</ul>
					
				</div>
			</div>
			
		</div>
	
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali na transport</h2>
			</div>
			
			<div class="content row">
				<div class="col-md-6">
					
					<h3>Indywidualnie</h3>
					
					<ul>
					<? foreach( $stats['transport']['indywidualne'] as $i ) {?>
						<li class="row">
							<div class="col-md-2">
								
							</div><div class="col-md-6">
								<?= $i['nazwa'] ?> (<?= $i['skrot'] ?>)
							</div><div class="col-md-4">
							</div>
						</li>
					<? } ?>
					</ul>
					
				</div>
				<div class="col-md-6">
					
					<h3>Klubowo</h3>
					
					<ul>
					<? foreach( $stats['transport']['klubowe'] as $i ) {?>
						<li>
							<?= $i['nazwa'] ?>
						</li>
					<? } ?>
					</ul>
					
				</div>
			</div>
			
		</div>
	
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali na hotele</h2>
			</div>
			
			<div class="content row">
				<div class="col-md-6">
					
					<h3>Indywidualnie</h3>
					
					<ul>
					<? foreach( $stats['hotel']['indywidualne'] as $i ) {?>
						<li>
							<?= $i['nazwa'] ?>
						</li>
					<? } ?>
					</ul>
					
				</div>
				<div class="col-md-6">
					
					<h3>Klubowo</h3>
					
					<ul>
					<? foreach( $stats['hotel']['klubowe'] as $i ) {?>
						<li>
							<?= $i['nazwa'] ?>
						</li>
					<? } ?>
					</ul>
					
				</div>
			</div>
			
		</div>
		
	</div>
		
</div>