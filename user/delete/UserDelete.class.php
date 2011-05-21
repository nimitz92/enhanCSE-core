<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UserDeleteRequest.class.php');
require_once('UserDeleteContext.class.php');
require_once('UserDeleteResponse.class.php');

class UserDelete implements Operation {
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
		return new UserDeleteRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UserDeleteContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UserDeleteResponse();
	}
}

?>