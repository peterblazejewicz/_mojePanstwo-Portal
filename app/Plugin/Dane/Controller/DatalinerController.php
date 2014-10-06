<?php
class DatalinerController extends DaneAppController {
	
	public $components = array('RequestHandler');
	
	public $uses = array('Dane.Dataobject');
	
	public function index() {
		
		$data = array();
		
		$conditions = $this->request->query['conditions'];
				
		$objects = $this->Dataobject->find('all', array(
			'conditions' => $conditions,
			'order' => '_date asc',
			'limit' => 30,
		));
				
		foreach( $objects as $object ) {
			
			$object = $object['Dataobject'];			
			$data[] = array(
				'type' => 'blog_post',
				'date' => $object->getDate(),
				'title' => 'Prawo',
				'content' => '<div class="row"><div class="col-md-2"><img style="max-width: 64px;" src="' . $object->getThumbnailUrl(3) . '" /></div><div class="col-md-10"><a href="/dane/prawo/' . $object->getId() . '">' . $object->getTitle() . '</a></div></div>',
			);
			
		}
		
		
				
		$this->set('data', $data);
		$this->set('_serialize', 'data');
		
    }
	
}