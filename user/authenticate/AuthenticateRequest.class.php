<?php 
require_once(SBINTERFACES);

class AuthenticateRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions
		$model = array(
			'username' => $_GET['username'],
			'password' => $_GET['password']
		);
		
		return $model;
	}
}

?>
