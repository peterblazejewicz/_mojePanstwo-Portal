<?php
$this->Combinator->add_libs('css', $this->Less->css('wyjazdy_poslow', array('plugin' => 'WyjazdyPoslow')));
$this->Combinator->add_libs('js', '../plugins/highmaps/js/highmaps');
$this->Combinator->add_libs('js', 'WyjazdyPoslow.wyjazdy_poslow.js');
?>

<div id="wyjazdyPoslowMap"></div>