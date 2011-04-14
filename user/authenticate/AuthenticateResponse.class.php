<?php 
require_once(SBINTERFACES);

class AuthenticateResponse implements ResponseService {
	
	// ResponseService interface
	public function processResponse($model){
		if($model['login'])
			$view = "<h1>Welcome ".$model['username']." !</h1>";
		else
			$view = "<h1>Invalid credentials</h1>";
		return $view;
	}
}

?>
