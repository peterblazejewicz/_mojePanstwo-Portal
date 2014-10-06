<?php
class DatalinerController extends DaneAppController {
	
	public $components = array('RequestHandler');
	
	public $uses = array('Dane.Dataobject');
	
	public function index() {
		
		$data = array();
		
		$objects = $this->Dataobject->find('all', array(
			'conditions' => array(
				'dataset' => 'prawo',
			),
			'order' => '_date desc',
		));
				
		foreach( $objects as $object ) {
			
			$object = $object['Dataobject'];			
			$data[] = array(
				'type' => 'blog_post',
				'date' => $object->getDate(),
				'title' => 'Prawo',
				'content' => 'jkl',
			);
			
		}
		
		
		$year = '2014';
		$data = array(
        array(
            'type'    =>  'blog_post',
            'date'    =>  $year . '-12-21',
            'title'   =>  'Blog Post',
            'content' => '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
        ),
        array(
            'type'    =>  'blog_post',
            'date'    =>  $year . '-11-21',
            'title'   =>  'Blog Post',
            'content' => '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
        ),
        array(
            'type'    =>  'blog_post',
            'date'    =>  $year . '-10-21',
            'title'   =>  'Blog Post',
            'content' => '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
        ),
        array(
            'type'    =>  'blog_post',
            'date'    =>  $year . '-09-21',
            'title'   =>  'Blog Post',
            'content' => '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
        )
    );
		
		$this->set('data', $data);
		$this->set('_serialize', 'data');
		
    }
	
}