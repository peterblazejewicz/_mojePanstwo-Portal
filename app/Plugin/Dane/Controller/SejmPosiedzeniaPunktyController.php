<?php

App::uses( 'DataobjectsController', 'Dane.Controller' );

class SejmPosiedzeniaPunktyController extends DataobjectsController {
	public $uses = array( 'Dane.Dataobject' );
	public $helpers = array( 'Dane.Dataobject' );
	public $menu = array();
	public $autoRelated = false;
	public $breadcrumbsMode = 'app';

	public $objectOptions = array(
		'hlFields' => array(),
		'routes' => array(
			'description' => false,
		),
	);

	public function view() {

		parent::view();
		$this->object->loadRelated();
		// $debaty = $this->object->getRelatedGroup( 'debaty' );
		
		/*
		if ( $debaty && isset( $debaty['objects'] ) && ! empty( $debaty['objects'] ) ) {

			$debata = $debaty['objects'][0];
			$this->redirect( '/dane/sejm_debaty/' . $debata->getId() );

		}
		*/

		return false;

	}
	
	public function beforeRender() {
	
		// debug( $this->object->getData() ); die();

		// PREPARE MENU
		$href_base = '/dane/sejm_posiedzenia_punkty/' . $this->request->params['id'] . ',' . $this->object->getSlug();

		$menu = array(
			'items' => array(
				array(
					'id'    => '',
					'href'  => $href_base,
					'label' => 'Podsumowanie',
				),
			)
		);
		
		
		
		if( 
			( $data = $this->object->getRelatedGroup('debaty') ) && 
			!empty( $data['objects'] )
		) {
			
			$debaty = array();
						
			foreach( $data['objects'] as $obj )
				$debaty[] = array(
					'id' => $obj->getId(),
					'label' => 'Część #' . $obj->getData('punkt_i'),
				);
			
			$menu['items'][] = array(
				'id'       => 'debaty',
				'label'    => 'Debaty',
				'dropdown' => array(
					'items' => $debaty,
				),
			);
			
		}
		
				

		$menu['selected'] = ( $this->request->params['action'] == 'view' ) ? '' : $this->request->params['action'];

		$this->set( '_menu', $menu );

	}

} 