<?
$this->Combinator->add_libs('css', $this->Less->css('view-poslowie', array('plugin' => 'Dane')));
echo $this->Element('dataobject/pageBegin');
?>
	
	
	<? debug( $object->getLayer('wyjazdy') ); ?>
	
	
<?
echo $this->Element('dataobject/pageEnd');
?>