<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CreateRequest.class.php');
require_once('CreateContext.class.php');
require_once('CreateResponse.class.php');

class Create implements Operation {
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
		return new CreateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new CreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new CreateResponse();
	}
}

?>