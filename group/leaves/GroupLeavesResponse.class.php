<?php 
require_once(SBINTERFACES);

class GroupLeavesResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){
		return json_encode($model);
	}
}

?>
