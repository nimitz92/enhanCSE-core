<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CategoryGetRequest.class.php');
require_once('CategoryGetContext.class.php');
require_once('CategoryGetResponse.class.php');

class CategoryGet implements Operation {
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
		return new CategoryGetRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new CategoryGetContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new CategoryGetResponse();
	}
}

?>