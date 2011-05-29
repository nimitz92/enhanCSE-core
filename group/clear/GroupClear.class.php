<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupClearRequest.class.php');
require_once('GroupClearContext.class.php');
require_once('GroupClearResponse.class.php');

class GroupClear implements Operation {
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
		return new GroupClearRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupClearContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupClearResponse();
	}
}

?>