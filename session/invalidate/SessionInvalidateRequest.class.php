<?php 
require_once(SBINTERFACES);

class SessionInvalidateRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'sessionid' => $_GET['sessionid']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
