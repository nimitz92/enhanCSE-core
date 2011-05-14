<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('AuthenticateRequest.class.php');
require_once('AuthenticateContext.class.php');
require_once('AuthenticateResponse.class.php');

class Authenticate implements Operation {
	protected 
		// adapter
		$adapter;
		
	// Constructor
	public function __construct(){
		$cl = new ComponentLoader();
		$this->adapter = $cl->load("base.adapter", SBROOT);
	}

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
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new AuthenticateResponse();
	}
}

?>