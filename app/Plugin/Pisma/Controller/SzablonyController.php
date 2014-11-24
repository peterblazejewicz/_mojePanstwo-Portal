<?php

class SzablonyController extends AppController
{
	
	public $components = array('RequestHandler');
	
    public function view()
    {

        $output = array(
	        'id' => '1',
	        'tytul' => 'Wniosek',
	        'formula_start' => 'Na podstawie art. 61 Konstytucji RP oraz art. 10 ust. 1 ustawy z dnia 6 września 2001 r. o dostępie do informacji publicznej wnoszę o udostępnienie informacji publicznej w postaci:',
        );
        
        $this->set('output', $output);
        $this->set('_serialize', 'output');

    }
    
}