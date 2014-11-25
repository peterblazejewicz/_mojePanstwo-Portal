<?

class Pismo extends AppModel
{

	public function save($data) {
		
		$this->API = mpapiComponent::getApi()->Pisma();
		return $this->API->save( $data );
				
	}

}