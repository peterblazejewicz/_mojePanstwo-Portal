<?

class Dataliner extends AppModel
{
    public function index($query)
    {
		
		App::import('model','Dane.Dataobject');
		$dataobject = new Dataobject();
		
        $data = array();
		
		if( !isset($query['page']) || !is_numeric($query['page']) )
			$query['page'] = 1;
			
		$objects = $dataobject->find('all', array(
			'conditions' => $query['conditions'],
			'order' => '_date desc',
			'limit' => 20,
			'page' => $query['page'],
		));
				
		foreach( $objects as $object ) {
			
			$object = $object['Dataobject'];			
			$data[] = array(
				'type' => 'blog_post',
				'date' => $object->getDate(),
				'title' => 'Prawo',
				'content' => '<div class="row"><div class="col-md-2"><img style="max-width: 56px;" src="' . $object->getThumbnailUrl(3) . '" /></div><div class="col-md-10"><a href="/dane/prawo/' . $object->getId() . '">' . $object->getTitle() . '</a></div></div>',
			);
			
		}
		
		return $data;
		
    }
}