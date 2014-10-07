<?
	$this->Combinator->add_libs('css', 'timeline');
	$this->Combinator->add_libs('css', 'multiple_select');
	$this->Combinator->add_libs('js', 'jquery_multiple_select');
	$this->Combinator->add_libs('js', 'timeline');
	$this->Combinator->add_libs('js', 'Dane.dataliner.js');
?>

<div class="dataliner" data-params="<?= htmlspecialchars(json_encode( $params )) ?>">
	<div class="options text-center" style="display: none;">
	   	<select multiple="multiple text-left">
	    <? foreach( $options as $option ) {?>
	        <option value="<?= $option['id'] ?>"><?= $option['nazwa'] ?></option>
	    <? } ?>
	    </select>
	</div>
	<div class="timeline"></div>
</div>