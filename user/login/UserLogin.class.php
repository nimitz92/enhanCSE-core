<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UserLoginRequest.class.php');
require_once('UserLoginContext.class.php');
require_once('UserLoginResponse.class.php');

class UserLogin implements Operation {
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
		return new UserLoginRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UserLoginContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UserLoginResponse();
	}
}

?>