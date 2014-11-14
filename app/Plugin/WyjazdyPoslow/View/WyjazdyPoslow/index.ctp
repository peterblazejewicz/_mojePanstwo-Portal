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
			
		</div>
	
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali na przeloty</h2>
			</div>
			
		</div>
	
		<div class="block">
			
			<div class="block-header">
				<h2 class="label">Najwięcej wydali na hotele</h2>
			</div>
			
		</div>
		
	</div>
		
</div>