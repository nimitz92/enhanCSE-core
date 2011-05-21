<?php 
require_once(SBINTERFACES);
require_once(SBCOMLOADER);

require_once('GroupAddRequest.class.php');
require_once('GroupAddContext.class.php');
require_once('GroupAddResponse.class.php');

class GroupAdd implements Operation {
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
		return new GroupAddRequest();
	}
	
	// Operation interface
	public function getContextService(){
		return new GroupAddContext();
	}
	
	// Operation interface
	public function getTransformService(){
		return $this->adapter->getTransformService();
	}
	
	// Operation interface
	public function getResponseService(){
		return new GroupAddResponse();
	}
}

?>