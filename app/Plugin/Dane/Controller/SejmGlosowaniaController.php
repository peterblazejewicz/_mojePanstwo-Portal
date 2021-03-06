<?php

App::uses('DataobjectsController', 'Dane.Controller');

class SejmGlosowaniaController extends DataobjectsController
{
    public $menu = array(
        array(
            'id' => 'view',
            'label' => 'LC_INDYWIDUALNE_WYNIKI_GLOSWANIA',
        ),
    );

    public function view()
    {
        parent::_prepareView();
        
        $this->object->loadLayer('wynikiKlubowe');
        $this->object->loadLayer('wynikiIndywidualne');
    }
} 