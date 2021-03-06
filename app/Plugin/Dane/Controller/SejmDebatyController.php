<?php

App::uses('DataobjectsController', 'Dane.Controller');

class SejmDebatyController extends DataobjectsController
{
    public $uses = array('Dane.Dataobject');
    public $menu = array();

    public function view()
    {
        parent::view();
        $stenogram = $this->object->loadLayer('stenogram');
        $this->set(compact('stenogram'));
    }
} 