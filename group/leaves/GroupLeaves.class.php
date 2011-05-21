<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupLeavesRequest.class.php');
require_once('GroupLeavesContext.class.php');
require_once('GroupLeavesResponse.class.php');

class GroupLeaves implements Operation {
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
		return new GroupLeavesRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupLeavesContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupLeavesResponse();
	}
}

?>