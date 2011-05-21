<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupCreateRequest.class.php');
require_once('GroupCreateContext.class.php');
require_once('GroupCreateResponse.class.php');

class GroupCreate implements Operation {
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
		return new GroupCreateRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupCreateContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupCreateResponse();
	}
}

?>