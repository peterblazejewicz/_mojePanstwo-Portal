<?
echo $this->Combinator->add_libs('css', $this->Less->css('dataobjectslider', array('plugin' => 'Dane')));
echo $this->Combinator->add_libs('css', $this->Less->css('view-sejmposiedzeniapunkty', array('plugin' => 'Dane')));
echo $this->Combinator->add_libs('css', $this->Less->css('view-sejmdebaty', array('plugin' => 'Dane')));
echo $this->Combinator->add_libs('js', 'Dane.dataobjects-ajax');
echo $this->Combinator->add_libs('js', 'Dane.filters');