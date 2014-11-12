<?php

App::uses('DataobjectsController', 'Dane.Controller');

class DzielniceController extends DataobjectsController
{
    public $menu = array();

    public function view()
    {
        parent::view();

        $this->redirect('/dane/gminy/' . $this->object->getData('gminy.id') . '/dzielnice/' . $this->object->getId());
        die();

        $this->dataobjectsBrowserView(array(
            'source' => 'dzielnice.radni:' . $this->object->getId(),
            'dataset' => 'radni_dzielnic',
            'title' => 'Radni w tej dzielnicy',
            'noResultsTitle' => 'Brak radnych',
            'excludeFilters' => array(
                'dzielnica_id'
            ),
            'hlFields' => array('liczba_glosow'),
        ));
    }

} 