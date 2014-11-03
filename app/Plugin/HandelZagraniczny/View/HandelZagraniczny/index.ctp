<?php
$this->Combinator->add_libs('css', $this->Less->css('handel_zagraniczny', array('plugin' => 'HandelZagraniczny')));
$this->Combinator->add_libs('js', '../plugins/highmaps/js/highmaps');
$this->Combinator->add_libs('js', 'HandelZagraniczny.handel_zagraniczny.js');
?>

<div id="handelMap"></div>