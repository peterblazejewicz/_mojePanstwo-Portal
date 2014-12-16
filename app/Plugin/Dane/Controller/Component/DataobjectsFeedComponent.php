<?

class DataobjectsFeedComponent extends Component
{
	
	public $components = array(
        'Paginator',
        'RequestsHandler'
    );
	
	public $settings;
	
	public function __construct($collection, $settings = array()) {

        parent::__construct($collection, $settings);
        $this->settings = $settings;
        
    }
    
    public function beforeRender(Controller $controller) {
		
		$controller->loadModel('Dane.Dataobject');
		
		$controller->API->feed(array(
			'dataset' => $this->settings['dataset'],
			'id' => $this->settings['id'],
		));
		
		$controller->set('objects', $controller->API->getObjects());
		$controller->set('pagination', $controller->API->getPagination());
				
		$path = App::path('View', 'Dane');	    
	    $controller->view = $path[0] . '/Component/dataobjectsFeed/view.ctp';
	    
	}
	
}