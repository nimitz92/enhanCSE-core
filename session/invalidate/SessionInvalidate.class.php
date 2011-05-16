<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('SessionInvalidateRequest.class.php');
require_once('SessionInvalidateContext.class.php');
require_once('SessionInvalidateResponse.class.php');

class SessionInvalidate implements Operation {
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
		return new SessionInvalidateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new SessionInvalidateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new SessionInvalidateResponse();
	}
}

?>