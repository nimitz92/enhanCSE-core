<?php 
require_once(SBINTERFACES);

class GroupCreateResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){
		return json_encode($model);
	}
}

?>
