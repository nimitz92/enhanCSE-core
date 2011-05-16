<?php 
require_once(SBINTERFACES);

class SessionGetRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'sessionid' => $_GET['sessionid'],
			'db' => $_GET['db']
		);
		
		return $model;
	}
}

?>
