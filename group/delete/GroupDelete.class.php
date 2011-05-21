<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupDeleteRequest.class.php');
require_once('GroupDeleteContext.class.php');
require_once('GroupDeleteResponse.class.php');

class GroupDelete implements Operation {
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
		return new GroupDeleteRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupDeleteContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupDeleteResponse();
	}
}

?>