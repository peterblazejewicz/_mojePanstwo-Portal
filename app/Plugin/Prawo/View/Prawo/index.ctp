<?php $this->Combinator->add_libs('css', $this->Less->css('prawo', array('plugin' => 'Prawo'))) ?>
<?php $this->Combinator->add_libs('js', 'Prawo.prawo.js') ?>

<div class="appHeader">
    <div class="container innerContent">
        <h1><?php echo __d('prawo', 'LC_USTAWY_HEADLINE'); ?></h1>

        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            
            <? echo $this->Element('suggester', array(
        		'preset' => 'prawo',
            	'displayDatasetName' => false,
            	'placeholder' => 'Szukaj w aktach prawnych...',
            	'action' => '/prawo',
        	)); ?>
            
            <div id="shortcuts">
                <ul>
                    <li class="active"><a href="/weszly">Niedawno weszły w życie</a></li>
                    <li><a href="/wejda">Niedługo wejdą w życie</a></li>
                    <li><a href="/slowa_kluczowe">Słowa kluczowe</a></li>
                </ul>
                <div class="shortcutArrow"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	
</div>