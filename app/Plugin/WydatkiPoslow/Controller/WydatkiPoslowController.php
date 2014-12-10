<?php

App::uses('Sanitize', 'Utility');

class WydatkiPoslowController extends AppController
{
    public function index()
    {
	    
        $application = $this->getApplication();
        $api = $this->API->WydatkiPoslow();
        
        $stats = $api->getStats();  
                      
        $biura = array();
        foreach( $stats['biura'] as $d ) 
	        $biura[ $d['id'] ] = $d;
	    
	    $this->set('biura', $biura);
        $this->set('title_for_layout', 'Wydatki posłów');
        
    }
}