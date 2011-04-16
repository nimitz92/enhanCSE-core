<?php 
require_once(SBINTERFACES);

require_once('AuthenticateRequest.class.php');
require_once('AuthenticateContext.class.php');
require_once('AuthenticateTransform.class.php');
require_once('AuthenticateResponse.class.php');

class Authenticate implements Operation {

	// Operation interface
	public function getRequestService(){
		return new AuthenticateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new AuthenticateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return new AuthenticateTransform();
	}
	
	// Operation interface
	public function getResponseService(){
		return new AuthenticateResponse();
	}
}

?>