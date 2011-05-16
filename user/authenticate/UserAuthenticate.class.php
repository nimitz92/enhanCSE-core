<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UserAuthenticateRequest.class.php');
require_once('UserAuthenticateContext.class.php');
require_once('UserAuthenticateResponse.class.php');

class UserAuthenticate implements Operation {
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
		return new UserAuthenticateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UserAuthenticateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UserAuthenticateResponse();
	}
}

?>