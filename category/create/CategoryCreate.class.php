<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('CategoryCreateRequest.class.php');
require_once('CategoryCreateContext.class.php');
require_once('CategoryCreateResponse.class.php');

class CategoryCreate implements Operation {
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
		return new CategoryCreateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new CategoryCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new CategoryCreateResponse();
	}
}

?>