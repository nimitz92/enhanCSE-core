<?php 
require_once(SBINTERFACES);

class LoginRequest implements RequestService {
	
	// RequestService interface
	public function processRequest(){
	
		// TODO check for null and throw exceptions and initialize $model['conn'] with db connection
		$model = array(
			'username' => $_GET['username'],
			'password' => $_GET['password'],
			'db' => $_GET['db']
		);
		
		return $model;
	}
}

?>
