<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('SessionCreateRequest.class.php');
require_once('SessionCreateContext.class.php');
require_once('SessionCreateResponse.class.php');

class SessionCreate implements Operation {
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
		return new SessionCreateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new SessionCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new SessionCreateResponse();
	}
}

?>