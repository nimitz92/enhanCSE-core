<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('UserResetRequest.class.php');
require_once('UserResetContext.class.php');
require_once('UserResetResponse.class.php');

class UserReset implements Operation {
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
		return new UserResetRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new UserResetContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new UserResetResponse();
	}
}

?>