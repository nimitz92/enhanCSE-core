<?php 
require_once(SBINTERFACES);

class UserResetRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'uid' => $_GET['uid'],
			'db' => $_GET['db']
		);
		
		$model['valid'] = true;
		return $model;
	}
}

?>
