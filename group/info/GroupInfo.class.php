<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupInfoRequest.class.php');
require_once('GroupInfoContext.class.php');
require_once('GroupInfoResponse.class.php');

class GroupInfo implements Operation {
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
		return new GroupInfoRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupInfoContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupInfoResponse();
	}
}

?>