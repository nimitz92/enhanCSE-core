<?php 
require_once(SBINTERFACES);

class GroupInfoResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){
		return json_encode($model);
	}
}

?>
