<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupMembersRequest.class.php');
require_once('GroupMembersContext.class.php');
require_once('GroupMembersResponse.class.php');

class GroupMembers implements Operation {
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
		return new GroupMembersRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupMembersContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupMembersResponse();
	}
}

?>