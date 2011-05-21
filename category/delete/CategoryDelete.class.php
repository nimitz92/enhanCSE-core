<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CategoryDeleteRequest.class.php');
require_once('CategoryDeleteContext.class.php');
require_once('CategoryDeleteResponse.class.php');

class CategoryDelete implements Operation {
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
		return new CategoryDeleteRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new CategoryDeleteContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new CategoryDeleteResponse();
	}
}

?>