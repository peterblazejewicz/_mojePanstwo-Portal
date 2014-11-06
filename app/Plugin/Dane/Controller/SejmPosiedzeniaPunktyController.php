<?php

App::uses( 'DataobjectsController', 'Dane.Controller' );

class SejmPosiedzeniaPunktyController extends DataobjectsController {
	public $uses = array( 'Dane.Dataobject' );
	public $helpers = array( 'Dane.Dataobject' );
	public $menu = array();
	public $breadcrumbsMode = 'app';

	public $objectOptions = array(
		'hlFields' => array(),
		'routes' => array(
			'description' => false,
		),
	);
	
	public $initLayers = array('related');
	
	public function debaty() {

		$this->_prepareView();
		$this->request->params['action'] = 'debaty';

		if ( isset( $this->request->params['pass'][0] ) && is_numeric( $this->request->params['pass'][0] ) ) {
			
			
			$subaction = ( isset( $this->request->params['pass'][1] ) && $this->request->params['pass'][1] ) ? $this->request->params['pass'][1] : 'view';
			$sub_id    = ( isset( $this->request->params['pass'][2] ) && $this->request->params['pass'][2] ) ? $this->request->params['pass'][2] : false;

			$debata = $this->API->getObject('sejm_debaty', $this->request->params['pass'][0], array(// 'layers' => 'neighbours',
			));
			$this->set( 'debata', $debata );
			
			switch ( $subaction ) {
				
				case "view": {
										
					$this->dataobjectsBrowserView( array(
						'source'         => 'sejm_debaty.wystapienia:' . $debata->getId(),
						'dataset'        => 'sejm_wystapienia',
						'noResultsTitle' => 'Brak wystąpień',
						'title' => 'Część #' . $debata->getData('punkt_i'),
						'order' => '_ord asc',
						'renderFile' => 'sejm_debaty-wystapienie',
						'class' => 'debata-wystapienia',
						'limit' => 100,
					) );
					
					// $this->set( 'title_for_layout', $miejscowosc->getTitle() . ' w gminie ' . $this->object->getTitle() );
					$this->render( 'debata' );
					break;
					
				}
				
				case "wystapienia": {
					
					if( $sub_id ) {
						
						$wystapienie = $this->API->getObject('sejm_wystapienia', $sub_id, array('layers' => 'html'));
						$this->set( 'wystapienie', $wystapienie );
						
						$this->render( 'wystapienie' );
						
					} else {
						
						$this->redirect( $debata->getUrl() );
						die();
						
					}
					
				}
				
			}
						

		} else {

			$this->redirect( $this->object->getUrl() );
			die();

		}

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
					'href' => '/dane/sejm_posiedzenia_punkty/' . $this->object->getId() . ',' . $this->object->getSlug() . '/debaty/' . $obj->getId(),
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