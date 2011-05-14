<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('LoginRequest.class.php');
require_once('LoginContext.class.php');
require_once('LoginResponse.class.php');

class Login implements Operation {
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
		return new LoginRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new LoginContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new LoginResponse();
	}
}

?>