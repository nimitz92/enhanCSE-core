<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupParentsRequest.class.php');
require_once('GroupParentsContext.class.php');
require_once('GroupParentsResponse.class.php');

class GroupParents implements Operation {
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
		return new GroupParentsRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupParentsContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupParentsResponse();
	}
}

?>