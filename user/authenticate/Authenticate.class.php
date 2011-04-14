<?php 
require_once(SBINTERFACES);

require_once(dirname(__FILE__).'/AuthenticateRequest.class.php');
require_once(dirname(__FILE__).'/AuthenticateContext.class.php');
require_once(dirname(__FILE__).'/AuthenticateTransform.class.php');
require_once(dirname(__FILE__).'/AuthenticateResponse.class.php');

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