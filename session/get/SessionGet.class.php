<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('SessionGetRequest.class.php');
require_once('SessionGetContext.class.php');
require_once('SessionGetResponse.class.php');

class SessionGet implements Operation {
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
		return new SessionGetRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new SessionGetContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new SessionGetResponse();
	}
}

?>