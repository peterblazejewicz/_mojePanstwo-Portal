<?php

App::uses('DataobjectsController', 'Dane.Controller');

class PrawoHaslaController extends DataobjectsController
{

    public $objectOptions = array(
        'hlFields' => array(),
    );

    public function view()
    {

        parent::_prepareView();


        $this->dataobjectsBrowserView(array(
            'source' => 'prawo.haslo:' . $this->object->getId(),
            'dataset' => 'prawo',
            'order' => '_weight desc',
            /*
            'excludeFilters' => array(
                'wojewodztwo_id',
            ),
            */
        ));

        // $this->set('title_for_layout', __d('dane', 'LC_DANE_GMINY_W_WOJEWODZTWIE') . ' ' . $this->object->getData('nazwa'));

    }

    public function beforeRender()
    {

        // PREPARE MENU
        $href_base = '/dane/prawo_hasla/' . $this->request->params['id'];

        $menu = array(
            'items' => array(
                array(
                    'id' => '',
                    'href' => $href_base,
                    'label' => 'Akty prawne',
                ),
            )
        );

        $menu['selected'] = ($this->request->params['action'] == 'view') ? '' : $this->request->params['action'];
        $this->set('_menu', $menu);

    }
} 