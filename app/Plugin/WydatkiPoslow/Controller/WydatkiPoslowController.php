<?php

App::uses('Sanitize', 'Utility');

class WydatkiPoslowController extends AppController
{
    public function index()
    {
        
        $application = $this->getApplication();
        $this->set('title_for_layout', $application['Application']['name']);
        
        $api = $this->API->WydatkiPoslow();
        
        $stats = $api->getStats();
        debug('stats', $stats);
        
    }
}